<?php /*
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
<html>

<head>
    <title>Testiranje</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="ERA">
    <meta name="keywords" content="plan, slika, testiranje">
    <meta name="description" content="Testiranje, 24.05.2021.">
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/iparac.js"></script>



    <style>
        .stupac {
            float: left;
            width: 15%;
            padding: 80px;
            border: 3px solid #666;
        }

        .red::after {
            content: "";
            clear: both;
            display: table;
        }

        .stupac:hover {
            border-color: #6666ff;
            border-width: 7px;
        }
    </style>

    <script>
        function otvori_vecu_sliku() {
            lokacija = "multimedija/testiranje_veliko.png";

            otvori = window.open(lokacija);
        }

        function otvori_vecu_sliku1() {
            lokacija = "multimedija/testiranje1.png";

            otvori = window.open(lokacija);
        }

        function otvori_vecu_sliku2() {
            lokacija = "multimedija/testiranje2.png";

            otvori = window.open(lokacija);
        }
    </script>


</head>
<header>
    <a href="#red">
        <h1>Testiranje</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />
</header>
<?php
include 'meni.php';
?>



<section id="red" class="red">

    <h1>Testiranje</h1>
    <figure class="stupac">
        <img src="multimedija/testiranje_veliko.png" alt="era" width="200" height="200" onClick="otvori_vecu_sliku();">
        <figcaption>Slika 1 - Prikaz izvještaja</figcaption>
    </figure>
    <figure class="stupac">
        <img src="multimedija/testiranje1.png" alt="era" width="200" height="200" onClick="otvori_vecu_sliku1();">
        <figcaption>Slika 2 - Prikaz testiranja u Command Line 1</figcaption>
    </figure>
    <figure class="stupac">
        <img src="multimedija/testiranje2.png" alt="era" width="200" height="200" onClick="otvori_vecu_sliku2();">
        <figcaption>Slika 3 - Prikaz testiranja u Command Line 2</figcaption>
    </figure>

</section>



<footer class="footer">
    <address>&copy;2021. <a href="autor.html">Ivan Jure Parać</a></address>


    <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_02/iparac">
        <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
    </a>
    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_02/iparac">
        <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57" />
    </a>
</footer>