<?php
session_start();
include "spojibaza.php";

if (
	isset($_POST['korisnicko_ime']) && isset($_POST['email'])
	&& isset($_POST['lozinka1']) && isset($_POST['lozinka2'])
) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$ime = validate($_POST['ime']);
	$prezime = validate($_POST['prezime']);
	$korisnicko_ime = validate($_POST['korisnicko_ime']);
	$email = validate($_POST['email']);
	$lozinka1 = validate($_POST['lozinka1']);
	$lozinka2 = validate($_POST['lozinka2']);
	$captcha;
	$user_data = '&korisnicko_ime=' . $korisnicko_ime . '&ime=' . $ime . '&prezime=' . $prezime;
	$provjera_unosa = "";
	$sol = "sa21sda4b21s";
	$aktivacijski_kod = md5(rand());

	if (empty($korisnicko_ime) || empty($ime) || empty($prezime) || empty($email) || empty($lozinka1) || empty($lozinka2)) {
		$provjera_unosa = "Molimo unesite sve podatke.";
	}

	if (!preg_match("/^([A-Ža-ž]){3,30}$/", $ime)) {
		$provjera_unosa = "Ime smije sadržavati samo slova u rasponu od 3-30";
	}

	if (!preg_match("/^([A-Ža-ž]){3,50}$/", $prezime)) {
		$provjera_unosa = "Prezime smije sadržavati samo slova u rasponu od 3-50";
	}

	if (!preg_match("/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/", $korisnicko_ime)) {
		$provjera_unosa = "Koriničko ime smije sadržavati velika i mala slova, brojeve i znakove . , - , _ te mora biti između 5 i 20 znakova.";
	}

	if (!preg_match("/^(?!.*(.)\1{3})((?=.*[\d])(?=.*[A-Za-z])|(?=.*[^\w\d\s])(?=.*[A-Za-z])).{8,20}$/", $lozinka1)) {
		$provjera_unosa = "Lozinka treba sadržavati 8-20 znakova, barem jedno specijalni znak, jedan alfanumerički te se niti jedan znak ne smije ponavljati više od 3 puta za redom.";
	}

	if (!preg_match("/^(?!.*(.)\1{3})((?=.*[\d])(?=.*[A-Za-z])|(?=.*[^\w\d\s])(?=.*[A-Za-z])).{8,20}$/", $lozinka2)) {
		$provjera_unosa = "Lozinka treba sadržavati 8-20 znakova, barem jedno specijalni znak, jedan alfanumerički te se niti jedan znak ne smije ponavljati više od 3 puta za redom.";
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$provjera_unosa = "Neispravan email je unesen.";
	}
	if ($lozinka1 !== $lozinka2) {
		$provjera_unosa = "Lozinke se ne podudaraju.";
	}

	if (isset($_POST['g-recaptcha-response'])) {
		$captcha = $_POST['g-recaptcha-response'];
	}
	if (!$captcha) {
		$provjera_unosa = "Ispunite captcha.";
	}

	// registracija
	if ($provjera_unosa === "") {

		$lozinka2 = $lozinka1 . $sol;
		$lozinka2 = hash("sha256", $lozinka2);


		$sql = "SELECT * FROM korisnik WHERE korisnicko_ime='$korisnicko_ime' ";
		$selectRezultat = mysqli_query($conn, $sql);

		$sql1 = "SELECT * FROM korisnik;";
		$broj_redaka = mysqli_query($conn, $sql1);
		$brojac_id = mysqli_num_rows($broj_redaka);


		if (mysqli_num_rows($selectRezultat) > 0) {

			header("Location: prijava.php?error=Korisnik vec postoji&$user_data");
			exit();
		} else {

			$sqlInsertKorisnika = "INSERT INTO korisnik (korisnik_id,uloga_id, ime, prezime, korisnicko_ime, lozinka, lozinka_sha256, email, uvjeti, status_kor,  
			broj_neuspjesnih_prijava, datum_registracije, aktivacijski_kod)
			VALUES ('$brojac_id',3, '$ime', '$prezime','$korisnicko_ime','$lozinka1', '$lozinka2','$email', NULL, 0, 0, NOW(), '$aktivacijski_kod')";
			$insertRezultat = mysqli_query($conn, $sqlInsertKorisnika);


			if ($insertRezultat) {


				$to_email = $email;
				$url = "http://barka.foi.hr/WebDiP/2020_projekti/WebDiP2020x066/";
				$url2 = "http://localhost/webdip_projekt/";
				$headers = 'From: rodendan.sreca@gmail.com';
				$subject = 'Aktivacija računa';
				$body = "Poštovani/na" . " " . $ime . " " . $prezime .  " na vaš email " . $email . " poslan je aktivacijski link te molimo otvorite ga kako bi potvrdili svoj račun. "
					. $url . "aktivacija.php?aktivacijski_kod=" . $aktivacijski_kod .
					" Nadamo se da će Vam se svidjeti naši rođendani!";
				if (mail($to_email, $subject, $body, $headers)) {
					$message = "Uspješno izrađen račun, provjerite mail za aktivaciju.";
					echo "{$message} -> {$to_email}";

					//zapis registracije u dnevnik
					$sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
					$sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
					$rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
					$korisnik_id = $rowKorisnikId['korisnik_id'];
	
					$sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 1";
					$sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
					$rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
					$nazivTip = $rowDnevnikId['naziv'];
	
					$sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
					VALUES ('$korisnik_id', 1, 'registracija', NOW())";
					$sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
					header("Location: prijava.php?success=Racun je uspjesno napravljen");
					exit();
				} else {
					$message = "Error email nije poslan!";
					echo "{$message}";
					header("Location: registracija.php?success=Racun nije napravljen. Pokusajte ponovno.");
					exit();
				}




				//captcha
				$secretKey = "6LeMASIbAAAAAF8h76PbvnbQomX9gA7zvjxBOL4R";
				$ip = $_SERVER['REMOTE_ADDR'];
				// post request to server
				$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
				$response = file_get_contents($url);
				$responseKeys = json_decode($response, true);
				// should return JSON with success as true
				if ($responseKeys["success"]) {
					echo '<h2>Uspješno.</h2>';
				} else {
					echo '<h2>Neuspješno.</h2>';
				}
			}



			if ($insertRezultat) {
				
				$sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
				$sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
				$rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
				$korisnik_id = $rowKorisnikId['korisnik_id'];

				$sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 1";
				$sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
				$rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
				$nazivTip = $rowDnevnikId['naziv'];

				$sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
				VALUES ('$korisnik_id', 1, 'registracija', NOW())";
				$sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
				header("Location: prijava.php?success=Racun je uspjesno napravljen");
				exit();
			} else {
				header("Location: index.php?error=nepoznati error se dogodio&$user_data");
				exit();
			}
		}
	}
	if ($provjera_unosa == "Ispunite captcha.") {
		echo "<script type='text/javascript'>alert('$provjera_unosa');</script>";
		echo "<script type='text/javascript'> window.location = 'registracija.php'; </script>";
	} else {
		header("Location: registracija.php?error=podaci nisu korektno uneseni ili captcha nije ispunjena");
	}
} else {
	header("Location: prijava.php");
	exit();
}
