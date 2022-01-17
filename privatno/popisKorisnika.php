<?php

include '../spojibaza.php';

$sqlSelect = "SELECT * FROM korisnik;";
$sqlSelectRezultat = mysqli_query($conn, $sqlSelect);

while ($row = $sqlSelectRezultat->fetch_assoc()) {
    echo "Ispis korisnika: {$row["korisnik_id"]}, {$row["uloga_id"]}, {$row["ime"]}, {$row["prezime"]}, {$row["korisnicko_ime"]}, 
    {$row["lozinka"]}, {$row["lozinka_sha256"]}, {$row["email"]}, {$row["broj_neuspjesnih_prijava"]},
    {$row["datum_registracije"]}<br>";
}

?>