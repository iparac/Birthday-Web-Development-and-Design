<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>

<head>
    <title>Račun zaključan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Registracija">
    <meta name="keywords" content="prijava, password, username">
    <meta name="description" content="Zaključan račun, 11.06.2021.">



    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="javascript/iparac_jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/iparac.js"></script>




</head>
<header>
    <a href="#form1">
        <h1>Račun Vam je zaključan.</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />


</header>
<?php
include 'meni.php';
?>

<h2>Račun zaključan, javite se administratoru na rodendan.sreca@gmail.com kako bi Vam se račun otključao.</h2>


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