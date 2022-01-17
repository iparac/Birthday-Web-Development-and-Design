<?php 
include "spojibaza.php";


$korisnicko_ime = $_POST['korisnicko_ime'];
$upit = "SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime' ";

$result = $conn->query($upit);

if ($result->num_rows > 0) {
   echo 1;
}else{
  echo 0;
}


?>