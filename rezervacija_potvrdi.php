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
    $status = $_POST['status'];
    $sqlSelectStatusId = "SELECT status_rezervacija_termina FROM status_rezervacija_termina
                         WHERE status = '$status'";
    $sqlRezultatSelectStatusId = mysqli_query($conn, $sqlSelectStatusId);
    if (mysqli_num_rows($sqlRezultatSelectStatusId) > 0) {
        while ($row = mysqli_fetch_assoc($sqlRezultatSelectStatusId)) {
            $status_id = $row['status_rezervacija_termina'];
        }
    }


    $sqlUpdate = "UPDATE rezervacija_termin 
    SET status_rezervacija_termina_id = '$status_id' 
    WHERE rezervacija_id ='" . $razdvojiUpdateKod[1] . "'";
    $sqlRezultatUpdate = mysqli_query($conn, $sqlUpdate);

    if ($sqlRezultatUpdate) {
        //Dnevnik rezervacija potvrdi/odbij od moderatora/admina
        $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
        $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
        $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
        $korisnik_id = $rowKorisnikId['korisnik_id'];

        $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 14";
        $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
        $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
        $nazivTip = $rowDnevnikId['naziv'];

        $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
            VALUES ('$korisnik_id', 14, '$nazivTip', NOW())";
        $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
        header("Location: rezervacija_popis.php?UspješnoUpravljanjeRezervacijom");
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
    <title>Potvrda termina</title>
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
        <h1>Potvrda termina</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>

<br>
<form action="" method="POST">

    <label for="status">Potvrdi</label>
    <select id="status" name="status">
        <?php $sqlSelect = "select * from status_rezervacija_termina";
        $sqlRezultatSelect = mysqli_query($conn, $sqlSelect);
        while ($row = mysqli_fetch_array($sqlRezultatSelect)) {
        ?>
            <option><?php echo $row['status']; ?></option><?php } ?>
    </select><br><br>

    <input type="submit" name="update" class="submit" value="Potvrdi">
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