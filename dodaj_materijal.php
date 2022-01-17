<?php
session_start();
include 'spojibaza.php';

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];


if (isset($_POST['upload'])) {

    $ime = $_POST['ime'];
    $vrsta_materijala = $_POST['vrsta_materijala'];
    $slika = ($_FILES['photo']['name']);

    
    $target = "multimedija/";
    $target = $target . basename($_FILES['photo']['name']);

    $sqlSelectMaterijalId = "SELECT materijal_id FROM materijal
                         WHERE vrsta_materijala = '$vrsta_materijala'";
    $sqlRezultatSelectMaterijalId = mysqli_query($conn, $sqlSelectMaterijalId);
    if (mysqli_num_rows($sqlRezultatSelectMaterijalId) > 0) {
        while ($row = mysqli_fetch_assoc($sqlRezultatSelectMaterijalId)) {
            $materijal_id = $row['materijal_id'];
        }
    } 
    
    $sqlInsertMaterijal = "INSERT INTO galerija (korisnik_id, materijal_id, ime, materijal_dir, suglasnost) VALUES ('$korisnik_id', '$materijal_id', '$ime', '$slika', 1)";
    $sqlRezultatInsertMaterijal = mysqli_query($conn, $sqlInsertMaterijal);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)){
        echo "The file " . basename($_FILES['uploadedfile']['name']) . " je uspješno uploadan";
    }    
} else {

    echo "Error, nije uploadano.";
} 
