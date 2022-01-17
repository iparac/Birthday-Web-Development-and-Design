<?php
session_start();
include 'spojibaza.php';

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];



$sqlSelect = "
    SELECT rezervacija_termin.korisnik_id, korisnik.korisnicko_ime, grupa.ime, rezervacija_termin.datum, rezervacija_termin.broj_djece, rezervacija_termin.rezervacija_id, rezervacija_termin.status_rezervacija_termina_id 
    FROM grupa, rezervacija_termin, korisnik 
    WHERE grupa.grupa_id = rezervacija_termin.grupa_grupa_id AND rezervacija_termin.korisnik_id = korisnik.korisnik_id";
$sqlRezultatSelect = mysqli_query($conn, $sqlSelect);


//Dnevnik rezervacija pregledaj moderator/administartor
$sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
$sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
$rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
$korisnik_id = $rowKorisnikId['korisnik_id'];

$sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 13";
$sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
$rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
$nazivTip = $rowDnevnikId['naziv'];

$sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 13, '$nazivTip', NOW())";
$sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
    <title>Odobravanje rezervacija</title>
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
        <h1>Odobravanje rezervacija </h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>


<div class="sadrzaj1">
    <h2>Rezervacije</h2>
    <table class="tablica">

        <head>
            <tr>
                <th>Korisnik ID</th>
                <th>Korisničko ime</th>
                <th>Grupa</th>
                <th>Datum</th>
                <th>Broj Djece</th>
                <th>Status rezervacije</th>
            </tr>
        </head>
        <tbody>
            <?php
            if (mysqli_num_rows($sqlRezultatSelect) > 0) {
                while ($row = mysqli_fetch_assoc($sqlRezultatSelect)) {
            ?>
                    <tr>
                        <td><?php echo $row['korisnik_id']; ?></td>
                        <td><?php echo $row['korisnicko_ime']; ?></td>
                        <td><?php echo $row['ime']; ?></td>
                        <td><?php echo $row['datum']; ?></td>
                        <td><?php echo $row['broj_djece']; ?></td>
                        <td><?php echo $row['status_rezervacija_termina_id']; ?></td>
                        <td><a href="rezervacija_potvrdi.php?id=<?php echo $row['rezervacija_id']; ?>"> Upravljaj </a>&nbsp;
                            <a href="rezervacija_obrisi_moderator.php?id=<?php echo $row['rezervacija_id']; ?>">Obriši</a>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

</div>


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