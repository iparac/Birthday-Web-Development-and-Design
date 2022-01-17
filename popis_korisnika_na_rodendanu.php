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
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
    <title>Popis korisnika na rođendanu</title>
    <meta charset="utf-8">
    <meta name="viewport" content ="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Rođendani">
    <meta name="keywords" content="rođendani, korisnik, popis">
    <meta name="description" content="Stranica za popis korisnika na rođendanu, 31.05.2021.">
    <link rel="stylesheet" href="css/iparac.css" type="text/css"/>
    <script src="javascript/iparac.js"></script>

</head>
<header>
    <a href="#sadrzaj"><h1>Popis korisnika na rodendanu</h1></a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>


<div class="sadrzaj">
            <h1>Popis korisnika na rodendanu</h1><br>
        </div>
        <div class="tablica">
            <table id="tablica">
                <thead>
                    <tr>
                        <th>Rođendan id</th>
                        <th>Datum</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlSelectKorisnike = "SELECT rodendan.ime, rodendan.datum_odrzavanja, korisnik.ime, korisnik.prezime FROM rodendan, korisnik WHERE korisnik.korisnik_id = rodendan.korisnik_id ORDER BY korisnik.ime";
                    $sqlRezultatSelectKorisnike = mysqli_query($conn, $sqlSelectKorisnike);
                    $dataRow = "";
                    while ($row = mysqli_fetch_array($sqlRezultatSelectKorisnike)) {
                        $dataRow = $dataRow . "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                    }
                    echo $dataRow;
                    ?>
                </tbody>

            </table>
        </div>


<footer class="footer">
    <address>&copy;2021. <a href="autor.html">Ivan Jure Parać</a></address>


    <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
    </a>
    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57"/>
    </a>
</footer>

</body>
</html>



