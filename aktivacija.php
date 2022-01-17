<?php
session_start();
$url = ($_SERVER["REQUEST_URI"]);
$razdvojiAktivacijskiKod = explode('=', $url);
include 'spojibaza.php';
$message = '';


//traži korisnika te mu potvrđuje račun
$sqlAktivacijskiKod = "SELECT * from korisnik WHERE aktivacijski_kod ='" . $razdvojiAktivacijskiKod[1] . "'";
$sqlPronadenAktivacijskiKod = mysqli_query($conn, $sqlAktivacijskiKod);
while ($row = mysqli_fetch_assoc($sqlPronadenAktivacijskiKod)) {

    if ($row) {
        if ($row['status_kor'] === '0') {
            $sqlUpdateAktivacijski = "UPDATE korisnik SET status_kor = '1' where korisnik_id='" . $row['korisnik_id'] . "'";
            $sqlSpremiAktivacijski = mysqli_query($conn, $sqlUpdateAktivacijski);
            $message = "Uspješno se potvrdili račun.";

            $sqlSelectKorisnickoIme = "SELECT * FROM korisnik WHERE korisnik_id = '" . $row['korisnik_id'] . "'";
            $sqlRezultatKorisnickoIme = mysqli_query($conn, $sqlSelectKorisnickoIme);
            $rowKorisnickoIme = mysqli_fetch_assoc($sqlRezultatKorisnickoIme);
            $korisnicko_ime = $rowKorisnickoIme['korisnicko_ime'];

            //Dnevnik aktivacija
            $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
            $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
            $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
            $korisnik_id = $rowKorisnikId['korisnik_id'];

            $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 17";
            $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
            $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
            $nazivTip = $rowDnevnikId['naziv'];

            $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 17, '$nazivTip', NOW())";
            $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
        } else {
            $message = "Račun je već aktiviran";

            $sqlSelectKorisnickoIme2 = "SELECT * FROM korisnik WHERE korisnik_id = '" . $row['korisnik_id'] . "'";
            $sqlRezultatKorisnickoIme = mysqli_query($conn, $sqlSelectKorisnickoIme2);
            $rowKorisnickoIme = mysqli_fetch_assoc($sqlRezultatKorisnickoIme);
            $korisnicko_ime = $rowKorisnickoIme['korisnicko_ime'];

            //Dnevnik aktivacija već potvrdenog racuna
            $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
            $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
            $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
            $korisnik_id = $rowKorisnikId['korisnik_id'];

            $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 18";
            $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
            $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
            $nazivTip = $rowDnevnikId['naziv'];

            $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 18, '$nazivTip', NOW())";
            $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
        }
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
    <title>Aktivacija</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Aktivacija">
    <meta name="keywords" content="aktivacija, korisničko ime, lozinka">
    <meta name="description" content="Stranica za aktivaciju korisnika, 10.06.2021.">
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script type="text/javascript" src="javascript/iparac.js"></script>



</head>

<header class="spojiSveStupceZaglavlje">
    <a href="#sadrzaj">
        <h1>Aktivacija</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />
</header>



<?php
include 'meni.php';
?>
<br><br><br>
<section id="sadrzaj">

    <div id="poruka" style="color:blue">
        <?php
        if (isset($message)) {
            echo "<p> $message</p>";
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