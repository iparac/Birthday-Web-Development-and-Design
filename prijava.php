<?php

session_start();
include "spojibaza.php";

if (isset($_POST['korisnicko_ime']) && isset($_POST['lozinka'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $korisnicko_ime = validate($_POST['korisnicko_ime']);
    $lozinka = validate($_POST['lozinka']);
    $zapamtiMe = $_POST['zapamtiMe'];
    $sqlBrojacPokusaja = "UPDATE korisnik SET broj_neuspjesnih_prijava = broj_neuspjesnih_prijava + 1 WHERE korisnicko_ime ='$korisnicko_ime'";
    $sqlBrojacPokusajaReset = "UPDATE korisnik SET broj_neuspjesnih_prijava = 0 WHERE korisnicko_ime = '$korisnicko_ime'";


    if (empty($korisnicko_ime)) {
        header("Location: prijava.php?error=Unesite korisničko ime");
        exit();
    } else if (empty($lozinka)) {
        header("Location: prijava.php?error=Unesite lozinku");
        exit();
    } else if (!empty($zapamtiMe)) {
        $sqlSelectKorisnik = "SELECT * FROM korisnik WHERE korisnicko_ime='$korisnicko_ime' AND lozinka='$lozinka'";
        $sqlPronadenKorisnik = mysqli_query($conn, $sqlSelectKorisnik);

        if (mysqli_num_rows($sqlPronadenKorisnik) === 1) {
            $row = mysqli_fetch_assoc($sqlPronadenKorisnik);

            if ($row['korisnicko_ime'] === $korisnicko_ime && $row['lozinka'] === $lozinka) {
                echo "Uspješno ste se logirali!";
                $rezultatReset = mysqli_query($conn, $sqlBrojacPokusajaReset);
                $_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
                $_SESSION['ime'] = $row['ime'];
                $_SESSION['korisnik_id'] = $row['korisnik_id'];
                $_SESSION['uloga_id'] = $row['uloga_id'];
                setcookie("korisnicko_ime", $korisnicko_ime, time() + 3600);
                echo "Kolačić postavljen uspješno";


                //Dnevnik uspjesna prijava + zapamti me 
                $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
                $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
                $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
                $korisnik_id = $rowKorisnikId['korisnik_id'];

                $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 2";
                $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
                $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
                $nazivTip = $rowDnevnikId['naziv'];

                $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                VALUES ('$korisnik_id', 2, 'Uspjesna prijava + Zapamti Me', NOW())";
                $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

                header("Location: index.php?=Kolačić postavljen uspješno");
                exit();
            }
        } else {
            $rezultatDodaj = mysqli_query($conn, $sqlBrojacPokusaja);

            //Dnevnik neuspjesna prijava + zapamti me 
            $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
            $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
            $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
            $korisnik_id = $rowKorisnikId['korisnik_id'];

            $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 4";
            $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
            $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
            $nazivTip = $rowDnevnikId['naziv'];

            $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                VALUES ('$korisnik_id', 4, 'Neuspjesna prijava + zapamti me', NOW())";
            $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

            //provjera broja neuspješnih prijava
            $sqlSelectIsBrojNeuspjesnihPrijavaVeci = "SELECT * FROM korisnik WHERE broj_neuspjesnih_prijava =3 AND korisnicko_ime='$korisnicko_ime' ";
            $broj_redaka = mysqli_query($conn, $sqlSelectIsBrojNeuspjesnihPrijavaVeci);
            if (mysqli_num_rows($broj_redaka) > 0) {
                $sqlUpdateUlogaId = "UPDATE korisnik SET uloga_id = 5 WHERE broj_neuspjesnih_prijava = 3 AND korisnicko_ime='$korisnicko_ime'";
                mysqli_query($conn, $sqlUpdateUlogaId);

                $znakovi = '0123456789abcdefghijklmnopqrstuvwxyz';
                $privremena_lozinka = substr(str_shuffle($znakovi), 0, 10);
                $privremena_lozinka_sha256 = hash("sha256", $privremena_lozinka);
                $sqlUpdateLozinka = "UPDATE korisnik set lozinka='{$privremena_lozinka}' where korisnicko_ime ='$korisnicko_ime' and broj_neuspjesnih_prijava = 3";
                $sqlUpdateLozinkaSha = "UPDATE korisnik set lozinka_sha256='{$privremena_lozinka_sha256}' where korisnicko_ime ='$korisnicko_ime' and broj_neuspjesnih_prijava = 3";
                $updateRezultatLozinka = mysqli_query($conn, $sqlUpdateLozinka);
                $updateRezultatLozinkaSha = mysqli_query($conn, $sqlUpdateLozinkaSha);


                //Dnevnik zakljucan račun + zapamti me
                $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
                $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
                $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
                $korisnik_id = $rowKorisnikId['korisnik_id'];

                $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 6";
                $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
                $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
                $nazivTip = $rowDnevnikId['naziv'];

                $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                    VALUES ('$korisnik_id', 6, '$nazivTip', NOW())";
                $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

                header("Location: racun_zakljucan.php");
            }
            header("Location: prijava.php?=Neispravna lozinka");
            if (mysqli_num_rows($broj_redaka) > 0) {
                header("Location: racun_zakljucan.php");
            }
        }
    } else {
        $sqlSelectKorisnik = "SELECT * FROM korisnik WHERE korisnicko_ime='$korisnicko_ime' AND lozinka='$lozinka'";
        $sqlPronadenKorisnik = mysqli_query($conn, $sqlSelectKorisnik);

        if (mysqli_num_rows($sqlPronadenKorisnik) === 1) {
            $row = mysqli_fetch_assoc($sqlPronadenKorisnik);

            if ($row['korisnicko_ime'] === $korisnicko_ime && $row['lozinka'] === $lozinka) {
                echo "Uspješno ste se logirali!";
                $rezultatReset = mysqli_query($conn, $sqlBrojacPokusajaReset);
                $_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
                $_SESSION['ime'] = $row['ime'];
                $_SESSION['korisnik_id'] = $row['korisnik_id'];
                $_SESSION['uloga_id'] = $row['uloga_id'];

                //Dnevnik uspjesna prijava bez zapamti me 
                $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
                $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
                $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
                $korisnik_id = $rowKorisnikId['korisnik_id'];

                $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 3";
                $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
                $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
                $nazivTip = $rowDnevnikId['naziv'];

                $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                    VALUES ('$korisnik_id', 3, 'Uspjesna prijava bez zapamti me', NOW())";
                $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

                header("Location: index.php");
                exit();
            }
        } else {
            $rezultatDodaj = mysqli_query($conn, $sqlBrojacPokusaja);

            //Dnevnik neuspjesna prijava bez zapamti me 
            $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
            $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
            $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
            $korisnik_id = $rowKorisnikId['korisnik_id'];

            $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 5";
            $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
            $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
            $nazivTip = $rowDnevnikId['naziv'];

            $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                VALUES ('$korisnik_id', 5, '$nazivTip', NOW())";
            $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);


            $sqlSelectIsBrojNeuspjesnihPrijavaVeci = "SELECT * FROM korisnik WHERE broj_neuspjesnih_prijava =3 AND korisnicko_ime='$korisnicko_ime' ";
            $broj_redaka = mysqli_query($conn, $sqlSelectIsBrojNeuspjesnihPrijavaVeci);
            if (mysqli_num_rows($broj_redaka) > 0) {
                $sqlUpdateUlogaId = "UPDATE korisnik SET uloga_id = 5 WHERE broj_neuspjesnih_prijava = 3 AND korisnicko_ime='$korisnicko_ime'";
                mysqli_query($conn, $sqlUpdateUlogaId);

                $znakovi = '0123456789abcdefghijklmnopqrstuvwxyz';
                $privremena_lozinka = substr(str_shuffle($znakovi), 0, 10);
                $privremena_lozinka_sha256 = hash("sha256", $privremena_lozinka);
                $sqlUpdateLozinka = "UPDATE korisnik set lozinka='{$privremena_lozinka}' where korisnicko_ime ='$korisnicko_ime' and broj_neuspjesnih_prijava = 3";
                $sqlUpdateLozinkaSha = "UPDATE korisnik set lozinka_sha256='{$privremena_lozinka_sha256}' where korisnicko_ime ='$korisnicko_ime' and broj_neuspjesnih_prijava = 3";
                $updateRezultatLozinka = mysqli_query($conn, $sqlUpdateLozinka);
                $updateRezultatLozinkaSha = mysqli_query($conn, $sqlUpdateLozinkaSha);


                //Dnevnik zakljucan račun bez zapamti me
                $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
                $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
                $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
                $korisnik_id = $rowKorisnikId['korisnik_id'];

                $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 7";
                $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
                $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
                $nazivTip = $rowDnevnikId['naziv'];

                $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                       VALUES ('$korisnik_id', 7, '$nazivTip', NOW())";
                $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

                header("Location: racun_zakljucan.php");
            }

            header("Location: prijava.php?=Neispravna lozinka");
            if (mysqli_num_rows($broj_redaka) > 0) {
                header("Location: racun_zakljucan.php");
            }
        }
    }
}
if ($_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
?>

<?php
$cookieKorisnik = isset($_COOKIE['korisnicko_ime']) ? $_COOKIE['korisnicko_ime'] : "";
?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Prijava</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Prijava">
    <meta name="keywords" content="prijava, korisničko ime, lozinka">
    <meta name="description" content="Stranica za prijavu korisnika, 31.03.2021.">


    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="javascript/iparac_jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />

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

        p {
            opacity: 1;
        }

        #pomoc {
            display: none;
        }
    
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
        <h1>Prijava</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <div class="pomoc" style="cursor:pointer;" onclick="pomoc();">
        <img src="multimedija/help.png" alt="instagram" height="30" width="30" />
        <div class="tekst" id="pomoc">
            <h4>Pomoć oko prijave</h4>
            <p>Klikom kućice zapamti me, Vaše korisničko ime će biti spremljeno u kolačić te će se korisničko ime automatski popuniti sljedeći puta kada se prijavljujete.</p>
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
    <div class="sredina">
        <form name="prijava" id="prijava" method="post" action="">
            <label for="korisnicko_ime">Korsiničko ime: </label>
            <input name="korisnicko_ime" id="korisnicko_ime" type="text" placeholder="Unesite korisničko ime" value="<?php print($cookieKorisnik); ?>" autofocus /><br>
            <label for="lozinka">Lozinka: </label>
            <input name="lozinka" id="lozinka" type="password" placeholder="Unesite lozinku" /><br>
            <label for="zapamtiMe">Zapamti me: </label>
            <input name="zapamtiMe" id="zapamtiMe" type="checkbox" value="1" /><br>
            <label for="submit"></label>
            <input name="submit" id="submit" class="submit" type="submit" value="Prijavi se" />
        </form>

        <form name="resetiraj_lozinku" id="resetiraj_lozinku" method="post" action="zaboravljena_lozinka.php">
            <label for="zaboravljena_lozinka"> Zaboravljena lozinka: </label>
            <input name="zaboravljena_lozinka" id="zaboravljena_lozinka" class="submit" type="submit" value="Resetirajte lozinku" />
        </form>
        <div id="poruka" style="color:green">
            <?php
            if (isset($poruka)) {
                echo "<p>$poruka</p>";
            }
            ?>
        </div>
    </div>
</section>


<footer class="footer">
    <address>&copy;2021. <a href="../autor.html">Ivan Jure Parać</a></address>


    <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
    </a>
    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57" />
    </a>
</footer>


</html>