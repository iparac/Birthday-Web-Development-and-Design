<?php
session_start();
include 'spojibaza.php';

$url = ($_SERVER["REQUEST_URI"]);
$razdvojiIdBrisanje = explode('=', $url);

$sqlDelete = "DELETE FROM rezervacija_termin WHERE rezervacija_id ='" . $razdvojiIdBrisanje[1] . "'";
$sqlRezultatDelete = mysqli_query($conn, $sqlDelete);

if ($sqlRezultatDelete) {

     //Dnevnik rezervacija obrisi
     $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
     $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
     $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
     $korisnik_id = $rowKorisnikId['korisnik_id'];

     $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 16";
     $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
     $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
     $nazivTip = $rowDnevnikId['naziv'];

     $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
            VALUES ('$korisnik_id', 16, '$nazivTip', NOW())";
     $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);

    header("Refresh:0; url=rezervacija_popis.php");
} else {
    echo 'Nije obrisano';
}
  //  }