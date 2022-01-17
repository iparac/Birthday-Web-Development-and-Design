<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>

<head>
    <title>Registracija</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Registracija">
    <meta name="keywords" content="registracija, password, username">
    <meta name="description" content="Stranica za registraciju korisnika, 31.03.2021.">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="javascript/iparac_jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/iparac.js"></script>

    <style>

		.pomoc {
			position: relative;
		}

		.tekst {
			position: absolute;
			width: 800px;
			height: 150px;
			top: 20px;
			left: 20px;
			background-color: black;
			color: white;
			padding-left: 20px;
			padding-right: 20px;
			opacity: 0.7;
		}

		p {opacity: 1;}

		#pomoc{display:none;} 
	</style>

	<script>
		
		function pomoc() {
			var div = document.getElementById("pomoc");
    		div.style.display = div.style.display == "block" ? "none" : "block";
		}
	</script>


</head>
<header>
    <a href="#form1">
        <h1>Registracija</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
    <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />
    <div class="pomoc" style="cursor:pointer;" onclick="pomoc();">
        <img src="multimedija/help.png" alt="instagram" height="30" width="30" />
        <div class="tekst" id="pomoc">
            <h4>Pomoć oko registracije</h4>
            <p>Klikom na provjeri korisničko ime se provjerava postoji li korisničko ime. Također potrebno je točno unijeti sve podatke i točnu captcha kako bi se registrirali.</p>
        </div>
    </div>

</header>
<?php
include 'meni.php';
?>

<br><br><br>
<div class="sredina">
    <section id="sadrzaj">
        <form id="form1" method="post" name="form1" action="registracija_provjera.php">
            <div class="col">
     
   
                <label for="ime">Ime: </label>
                <input type="text" id="ime" name="ime" size="15" maxlength="15" placeholder="Ime"><br>
                <span id="ime_provjera"></span><br>
                </div>    
                <label for="prezime">Prezime: </label>
                <input type="text" id="prezime" name="prezime" size="25" maxlength="25" placeholder="Prezime"><br>
                <span id="prezime_provjera"></span><br>

                <label for="korisnicko_ime">Korisničko ime: </label>
                <input type="text" id="korisnicko_ime" name="korisnicko_ime" size="15" maxlength="15" placeholder="korisničko ime" autofocus="autofocus">
                <label for="provjera"></label>
                <input id="provjera" name="provjera" type="submit" class="submit" value=" Provjerite dostupnost "><br>
                <span id="korisnicko_ime_provjera"></span><br>
                <br>

                <label for="email">Email adresa: </label>
                <input type="email" id="email" name="email" size="35" maxlength="35" placeholder="ime.prezime@posluzitelj.xxx"><br>
                <span id="email_provjera"></span><br>

                <label for="lozinka1">Lozinka: </label>
                <input type="password" id="lozinka1" name="lozinka1" size="15" maxlength="15" placeholder="lozinka"><br>
                <span id="lozinka1_provjera"></span><br>

                <label for="lozinka2">Ponovi pozinku: </label>
                <input type="password" id="lozinka2" name="lozinka2" size="15" maxlength="15" placeholder="lozinka"><br>
                <span id="lozinka2_provjera"></span><br>

                <label for="registracija"></label>
                <input id="registracija" name="registracija" class="submit" type="submit" value=" Registriraj se ">

            <div class="g-recaptcha" data-sitekey="6LeMASIbAAAAANFcoh2OGwMooemBrmRQpwjrVG0i"></div>
            <span id="captcha_provjera"></span><br>

        </form>
    </section>
</div>


<footer class="footer">
    <address>&copy;2021. <a href="autor.html">Ivan Jure Parać</a></address>



    <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
    </a>
    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57" />
    </a>
</footer>

</html>