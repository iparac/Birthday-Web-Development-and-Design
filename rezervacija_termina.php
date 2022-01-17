<?php
session_start();
include 'spojibaza.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
    <title>Rezervacija termina</title>
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
        <h1>Rezervacija</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>


<form action="rezervacija_insert.php" method="POST">

    <label for="grupa">Odaberite željenu grupu</label>
    <select id="grupa" name="grupa">
        <option>Izaberi grupu</option>
        <?php $sqlSelect = "select * from grupa";
        $sqlRezultatSelect = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_array($sqlRezultatSelect)) {
        ?>
            <option><?php echo $row['ime']; ?></option><?php } ?>
    </select><br>

    <label for="datum">Unesite datum rezervacije</label>
    <input type="date" name="datum"><br>

    <label for="broj_djece">Unesite željeni broj djece</label>
    <input type="text" name="broj_djece"><br>

    <input type="submit"  class="submit" name="submit" value="Rezerviraj">
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