<?php
session_start();
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

<?php
include 'meni.php';
?>

<html>

<head>
    <title>Autor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Autor">
    <meta name="keywords" content="autor, osobne informacije, video">
    <meta name="description" content="Stranica sa informacijama o autoru, 31.03.2021.">
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/iparac.js"></script>

</head>
<header class="spojiSveStupceZaglavlje">
    <a href="#sadrzaj" style="color:white">
        <h1>Autor</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />
</header>

<section id="sadrzaj" class="sadrzaj">
    <div class="disl">
        <h1>Kontakt informacije</h1>
        <ul>
            <li>Ivan Jure Parać</li>
            <li><img src="multimedija/slika.jpg" alt="ja" /></li>
            <li>
                <address>E-mail: <a href="mailto:iparac@foi.hr" style="color:white">Ivan Jure Parać</a></address>
            </li>
            <li>+385 99 1320 321</li>
            <li>JMBAG: 0016131913</li>
        </ul>
    </div>



    <q style="width:100%;">Be kind whenever possible. It is always possible. - Dalai Lama</q><br><br>

    <iframe style="width:100%; height:500px" src="https://www.youtube.com/embed/myuRAnSkcUo?autoplay=1" title="Birthday Party" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>





    <footer class="footer">
        <address>&copy;2021. <a href="autor.html" style="color:white">Ivan Jure Parać</a></address>


        <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
            <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
        </a>
        <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
            <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57" />
        </a>
    </footer>
</section>

</html>