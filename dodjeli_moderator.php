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



$sqlUpdateKorisnikUloga = "UPDATE korisnik 
                               SET uloga_id = 2
                               WHERE korisnik_id ='" . $razdvojiUpdateKod[1] . "'";
$sqlRezultatUpdateKorisnikUloga = mysqli_query($conn, $sqlUpdateKorisnikUloga);

if ($sqlRezultatUpdateKorisnikUloga) {

    //Dnevnik dodjela moderatora
    $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
    $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
    $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
    $korisnik_id = $rowKorisnikId['korisnik_id'];

    $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 21";
    $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
    $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
    $nazivTip = $rowDnevnikId['naziv'];

    $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 21, '$nazivTip', NOW())";
    $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);


    header("Location: upravljaj_moderatorom.php");
    echo 'Uspješno dodana uloga moderatora,';
} else {
    echo 'Moderator nije dodan.';
}


