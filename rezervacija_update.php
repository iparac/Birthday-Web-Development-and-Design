<?php
session_start();
include 'spojibaza.php';

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];
$url = ($_SERVER["REQUEST_URI"]);
$razdvojiUpdateKod = explode('=', $url);


if (isset($_POST['update'])) {
    $grupa = $_POST['grupa'];
    $datum = $_POST['datum'];
    $broj_djece = $_POST['broj_djece'];

    $sqlSelectIdGrupe = "SELECT grupa_id FROM grupa WHERE ime = '$grupa'";
    $sqlRezultatSelectIdGrupe = mysqli_query($conn, $sqlSelectIdGrupe);
    if (mysqli_num_rows($sqlRezultatSelectIdGrupe) > 0) {
        while ($row = mysqli_fetch_assoc($sqlRezultatSelectIdGrupe)) {
            $grupa_id = $row['grupa_id'];
        }
    }

    $sqlUpdate = "UPDATE rezervacija_termin 
    SET korisnik_id = '$korisnik_id', status_rezervacija_termina_id = 3, broj_djece = '$broj_djece', datum = '$datum', grupa_grupa_id = '$grupa_id' 
    WHERE rezervacija_id ='" . $razdvojiUpdateKod[1] . "'";
    $sqlRezultatUpdate = mysqli_query($conn, $sqlUpdate);

    if ($sqlRezultatUpdate) {

        //Dnevnik rezervacija update
        $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
        $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
        $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
        $korisnik_id = $rowKorisnikId['korisnik_id'];

        $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 11";
        $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
        $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
        $nazivTip = $rowDnevnikId['naziv'];

        $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
                VALUES ('$korisnik_id', 11, '$nazivTip', NOW())";
        $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);


        header("Location: rezervacija_pregledaj.php");
        echo 'Uspješno updatana rezervacija,';
    } else {
        echo 'Update nije uspio';
    }
}
if (isset($_GET['rezervacija_id'])) {
    $rezervacija_id = $_GET['rezervacija_id'];
    $sqlSelectGrupaId = "
        SELECT * 
        FROM rezervacija_termin
        WHERE id = $rezervacija_id";
    $sqlRezultatSelectGrupaId = mysqli_query($conn, $sqlSelectGrupaId);
    if (mysqli_num_rows($sqlRezultatSelect) > 0) {
        while ($row = mysqli_fetch_assoc($sqlRezultatSelect)) {
            $grupa = $row['grupa'];
            $datum = $row['datum'];
            $broj_djece = $row['broj_djece'];
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



<head>
    <title>Ažuriranje termina</title>
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
        <h1>Ažuriraj</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>


<form action="" method="POST">

    <label for="grupa">Odaberite željenu grupu</label>
    <select id="grupa" name="grupa">
        <option>Izaberi grupu</option>
        <?php $sqlSelect = "select * from grupa";
        $sqlRezultatSelect = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_array($sqlRezultatSelect)) {
        ?>
            <option><?php echo $row['ime']; ?></option><?php } ?>
    </select><br>

    <label for="datum">Update datum rezervacije</label>
    <input type="date" name="datum"><br>

    <label for="broj_djece">Update željeni broj djece</label>
    <input type="text" name="broj_djece"><br>

    <input type="submit" class="submit" name="update" value="Update">
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