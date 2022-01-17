<?php
session_start();
include 'spojibaza.php';
/*
if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "1") {
    header("Location: obrasci/prijava.php");
    die();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "3") {
    header("Location: galerija.php");
    die();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "2") {
    header("Location: galerija.php");
    die();
} else {
    header("Location: obrasci/prijava.php");
} */
if (isset($_SESSION['korisnicko_ime'])) {

    $korisnicko_ime = $_SESSION['korisnicko_ime'];
    //Dnevnik pocetna stranica
    $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
    $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
    $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
    $korisnik_id = $rowKorisnikId['korisnik_id'];

    $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 20";
    $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
    $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
    $nazivTip = $rowDnevnikId['naziv'];

    $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 20, '$nazivTip', NOW())";
    $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
    <title>Rođendan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Rođendani">
    <meta name="keywords" content="rođendani, zabava, teme">
    <meta name="description" content="Stranica za proslavu rođendana, 31.03.2021.">

    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/print.js"></script>
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
<header>
    <a href="#sadrzaj">
        <h1>Početna stranica</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />
    <div class="pomoc" style="cursor:pointer;" onclick="pomoc();">
        <img src="multimedija/help.png" alt="instagram" height="30" width="30" />
        <div class="tekst" id="pomoc">
            <h4>Pomoć oko ispisa</h4>
            <p>Klikom na Pregled ispisa pojaviti će se prozor sa pretpregledom ispisa statističkih podataka sa stranice. Zatim klikom na ispis se isprinta stranica
                preko pisača kojeg ste odabrali.</p>
        </div>
    </div>
</header>

<?php
include 'meni.php';
?>


<section id="tablica">
    <h1>Statistika</h1><br><br><br>
    <div id="print">
        <table id="tablica">
            <caption>Statistika</caption>
            <thead>
                <tr>
                    <th>Grupa</th>
                    <th>Broj rođendana</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlStatistika = "SELECT grupa.ime, COUNT(*) FROM grupa, rodendan WHERE grupa.grupa_id = rodendan.grupa_id GROUP BY grupa.ime ";
                $sqlRezultat = mysqli_query($conn, $sqlStatistika);
                $dataRow = "";
                while ($row = mysqli_fetch_array($sqlRezultat)) {
                    $dataRow = $dataRow . "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
                }
                echo $dataRow;
                ?>
            </tbody>
        </table>
    </div>
    </div>
    <input type="button" id="centar" class="submit" onclick="ispisDiv('print')" value="Pregled ispisa" />

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

</body>

</html>