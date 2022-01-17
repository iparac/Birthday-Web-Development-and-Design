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
                               SET uloga_id = 3, broj_neuspjesnih_prijava = 0
                               WHERE korisnik_id ='" . $razdvojiUpdateKod[1] . "'";
$sqlRezultatUpdateKorisnikUloga = mysqli_query($conn, $sqlUpdateKorisnikUloga);

$sqlSelectLozinka = "SELECT lozinka, email FROM korisnik WHERE korisnik_id = '" . $razdvojiUpdateKod[1] . "'";
$sqlRezultatSelectLozinka = mysqli_query($conn, $sqlSelectLozinka);
$rowLozinka = mysqli_fetch_assoc($sqlRezultatSelectLozinka);
$lozinka = $rowLozinka['lozinka'];
$email = $rowLozinka['email'];

//posalji email sa novom lozinkom
$to_email = $email;
$headers = 'From: rodendan.sreca@gmail.com';
$subject = 'Nova lozinka';
$body = "Račun Vam je otključan te Vam je dodjeljena nova lozinka. Lozinka je: $lozinka";

if (mail($to_email, $subject, $body, $headers)) {
    //Dnevnik otkljucavanje korisnika
    $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
    $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
    $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
    $korisnik_id = $rowKorisnikId['korisnik_id'];

    $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 22";
    $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
    $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
    $nazivTip = $rowDnevnikId['naziv'];

    $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 22, '$nazivTip', NOW())";
    $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

    header("Location: upravljaj_zakljucani_korisnik.php");
    echo 'Uspješno otključan korisnik,';
} else {
    echo 'Otključavanje nije uspjelo';
}
