<?php
session_start();
include 'spojibaza.php';

//Dnevnik odjava
$korisnicko_ime = $_SESSION['korisnicko_ime'];
$sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
$sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
$rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
$korisnik_id = $rowKorisnikId['korisnik_id'];

$sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 8";
$sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
$rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
$nazivTip = $rowDnevnikId['naziv'];

$sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
        VALUES ('$korisnik_id', 8, '$nazivTip', NOW())";
$sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
session_destroy();
header("Location:prijava.php");
