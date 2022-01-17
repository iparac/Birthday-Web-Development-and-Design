<?php
session_start();
include 'spojibaza.php';


$poruka = '';
if (isset($_POST['submit'])) {

    $korisnicko_ime = $_POST['korisnicko_ime'];
    $email = $_POST['email'];
    $sqlSelectKorisnickoIme = "SELECT * from korisnik WHERE korisnicko_ime ='$korisnicko_ime'";
    $sqlSelectEmail = "SELECT * from korisnik WHERE email ='$email'";
    $pronadenKorisnik = mysqli_query($conn, $sqlSelectKorisnickoIme);
    $pronadenEmail = mysqli_query($conn, $sqlSelectEmail);
    if (mysqli_num_rows($pronadenEmail) > 0 && mysqli_num_rows($pronadenKorisnik) > 0) {

        $znakovi = '0123456789abcdefghijklmnopqrstuvwxyz';
        $privremena_lozinka = substr(str_shuffle($znakovi), 0, 10);
        $privremena_lozinka_sha256 = hash("sha256", $privremena_lozinka);

        $korisnik_id = $row['korisnik_id'];
        $sqlUpdateLozinka = "update korisnik set lozinka='{$privremena_lozinka}' where korisnicko_ime ='$korisnicko_ime' and email='$email'";
        $sqlUpdateLozinkaSha = "update korisnik set lozinka_sha256='{$privremena_lozinka_sha256}' where korisnicko_ime ='$korisnicko_ime' and email='$email'";
        $updateRezultatLozinka = mysqli_query($conn, $sqlUpdateLozinka);
        $updateRezultatLozinkaSha = mysqli_query($conn, $sqlUpdateLozinkaSha);

        $to_email = $email;
        $headers = 'From: rodendan.sreca@gmail.com';
        $subject = 'Nova lozinka';
        $body = "Zatražili ste novu lozinku za Vaš račun. Lozinka je: $privremena_lozinka";

        if (mail($to_email, $subject, $body, $headers)) {
            $poruka = "Lozinka uspješno poslana.";
            echo "{$poruka} -> {$to_email}";


            //Dnevnik zaboravljena lozinka 
            $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
            $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
            $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
            $korisnik_id = $rowKorisnikId['korisnik_id'];

            $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 15";
            $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
            $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
            $nazivTip = $rowDnevnikId['naziv'];

            $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
            VALUES ('$korisnik_id', 15, '$nazivTip', NOW())";
            $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

            header("Location: zaboravljena_lozinka.php?success=Lozinka uspješno poslana");
            exit();
        } else {
            $poruka = "Error email nije poslan!";
            echo "{$poruka}";
            header("Location: zaboravljena_lozinka.php?success=Lozinka nije poslana. Pokusajte ponovno.");
            exit();
        }
    } else {
        $poruka = "Nije pronađen račun sa unesenim korisničkim imenom i emailom!";
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Oporavak lozinke</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Oporavak_lozinke">
    <meta name="keywords" content="ime, korisničko ime, prezime">
    <meta name="description" content="Stranica za oporavak lozinke korisnika, 31.03.2021.">


    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="javascript/iparac_jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/iparac.js"></script>

    <style>

.pomoc {
    position: relative;
}

.tekst {
    position: absolute;
    width: 800px;
    height: 150px;
    top: 20px;
    left: 20px;
    background-color: black;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
    opacity: 0.7;
}

p {opacity: 1;}

#pomoc{display:none;} 
</style>

<script>

function pomoc() {
    var div = document.getElementById("pomoc");
    div.style.display = div.style.display == "block" ? "none" : "block";
}
</script>

</head>

<header class="spojiSveStupceZaglavlje">
    <a href="#sadrzaj">
        <h1>Oporavak lozinke</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />
    <div class="pomoc" style="cursor:pointer;" onclick="pomoc();">
        <img src="multimedija/help.png" alt="instagram" height="30" width="30" />
        <div class="tekst" id="pomoc">
            <h4>Pomoć oko oporavka lozinke</h4>
            <p>Nakon što odaberete email i korisničko ime koje postoji za taj email, nova lozinka će biti poslana na uneseni email.</p>
        </div>
    </div>
</header>



<?php
include 'meni.php';
?>
<br><br><br>
<section id="sadrzaj">

    <div id="greska" style="color:red">
        <?php
        if (isset($greska)) {
            echo "<p>$greska</p>";
        }
        ?>
    </div>

    <form name="oporavak_lozinke" id="oporavak_lozinke" method="post" action="">
        <label for="korisnicko_ime">Korsiničko ime: </label>
        <input name="korisnicko_ime" id="korisnicko_ime" type="text" placeholder="Unesite korisničko ime" autofocus /><br>
        <label for="email">Email: </label>
        <input name="email" id="email" type="text" placeholder="Unesite email" /><br>
        <label for="submit"></label>
        <input name="submit" id="submit" type="submit" class="submit" value="Potvrdi" />
    </form>

    <div id="poruka" style="color:green">
        <?php
        if (isset($poruka)) {
            echo "<p>$poruka</p>";
        }
        ?>
    </div>
</section>


<footer class="footer">
    <address>&copy;2021. <a href="autor.html">Ivan Jure Parać</a></address>


    <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
    </a>
    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57" />
    </a>
</footer>


</html>