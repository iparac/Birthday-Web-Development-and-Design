<?php
session_start();
include 'spojibaza.php';


$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];

if (isset($_POST['submit'])) {
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

    $sqlInsert = "INSERT INTO rezervacija_termin (korisnik_id, status_rezervacija_termina_id, broj_djece, datum, grupa_grupa_id) 
              VALUES ('$korisnik_id', 3, '$broj_djece', '$datum', '$grupa_id')";
    $sqlRezultatInserta = mysqli_query($conn, $sqlInsert);
}
if ($sqlRezultatInserta) {

    //Dnevnik rezervacija insert
    $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
    $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
    $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
    $korisnik_id = $rowKorisnikId['korisnik_id'];

    $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 10";
    $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
    $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
    $nazivTip = $rowDnevnikId['naziv'];

    $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
            VALUES ('$korisnik_id', 10, '$nazivTip', NOW())";
    $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

    header("Location: rezervacija_pregledaj.php");
    echo 'Nova rezervacija uspješno kreirana';
} else {
    echo 'Rezervacija nije kreirana!';
}
mysqli_close($conn);
