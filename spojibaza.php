<?php
/*
$sname= "localhost";
$unmae= "root";
$password = "";
*/
$db_name = "WebDiP2020x066";

$sname= "localhost";
$unmae= "WebDiP2020x066";
$password = "admin_DgUn";


$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}