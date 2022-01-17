<?php
session_start();
include 'spojibaza.php';

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
    <title>Dodavanje materijala u Galeriju</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Rođendani">
    <meta name="keywords" content="rođendani, zabava, teme">
    <meta name="description" content="Stranica za rezervaciju termina za rođendan, 12.06.2021.">
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/print.js"></script>
    <script src="javascript/iparac.js"></script>

</head>
<header>
    <a href="#sadrzaj">
        <h1>Pregled rezervacija </h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>


<form enctype="multipart/form-data" action="dodaj_materijal.php" method="POST">
    <label for="vrsta_materijala">Odaberite vrstu materijala</label>
    <select id="vrsta_materijala" name="vrsta_materijala">
        <?php $sqlSelect = "select * from materijal";
        $sqlRezultatSelect = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_array($sqlRezultatSelect)) {
        ?>
            <option><?php echo $row['vrsta_materijala']; ?></option><?php } ?>
    </select><br>
    <label for="ime">Ime</label><br>
    <input type="text" id="ime" name="image[]"><br>

    <label for="materijal"></label><br>
    <input type="file" id="materijal" name="materijal"><br><br>

    <input type="submit" id="upload" class="submit" value="Dodaj materijal">
</form>


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