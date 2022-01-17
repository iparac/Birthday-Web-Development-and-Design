<?php
session_start();
include 'spojibaza.php';
/*
if (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "1") {
    header("Location: obrasci/prijava.php");
    die();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "3") {
    header("Location: galerija.php");
    die();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] === "2") {
    header("Location: galerija.php");
    die();
} else {
    header("Location: obrasci/prijava.php");
} */
if (isset($_SESSION['korisnicko_ime'])) {
    $korisnicko_ime = $_SESSION['korisnicko_ime'];

    //Dnevnik dokumentacija
    $sqlSelectKorisnikId = "SELECT korisnik_id FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
    $sqlRezultatSelectKorisnikId = mysqli_query($conn, $sqlSelectKorisnikId);
    $rowKorisnikId = mysqli_fetch_assoc($sqlRezultatSelectKorisnikId);
    $korisnik_id = $rowKorisnikId['korisnik_id'];

    $sqlSelectTipDnevnikId = "SELECT naziv FROM tip_dnevnik WHERE tip_dnevnik_id = 19";
    $sqlRezultatSelectTipDnevnikId = mysqli_query($conn, $sqlSelectTipDnevnikId);
    $rowDnevnikId = mysqli_fetch_assoc($sqlRezultatSelectTipDnevnikId);
    $nazivTip = $rowDnevnikId['naziv'];

    $sqlDnevnikInsert = "INSERT into dnevnik (korisnik_id, tip_dnevnik_id, radnja, datum_vrijeme)
       VALUES ('$korisnik_id', 19, '$nazivTip', NOW())";
    $sqlRezultatDnevnikInsert = mysqli_query($conn, $sqlDnevnikInsert);
}


?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
    <title>Dokumentacija</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device.width, initial-scale=1.0">
    <meta name="author" content="Ivan Jure Parać">
    <meta name="naslov" content="Dokumentacija">
    <meta name="keywords" content="dokumentacija, skripte, era">
    <meta name="description" content="Stranica za dokumentaciju, 13.06.2021.">

    <link rel="stylesheet" href="css/iparac.css" type="text/css" />
    <script src="javascript/print.js"></script>


    <style>
        .stupac {
            float: left;
            width: 15%;
            padding: 80px;
            border: 3px solid #666;
        }

        .red::after {
            content: "";
            clear: both;
            display: table;
        }

        .stupac:hover {
            border-color: #6666ff;
            border-width: 7px;
        }
    </style>

    <script>
        function otvori_vecu_sliku() {
            lokacija = "multimedija/era.png";
            otvori = window.open(lokacija);
        }
    </script>

    <script>
        function otvori_vecu_sliku1() {
            lokacija = "multimedija/iparac_1920.jpg";

            otvori = window.open(lokacija);
        }
    </script>

    <script>
        function otvori_vecu_sliku2() {
            lokacija = "multimedija/test_1.png";

            otvori = window.open(lokacija);
        }
    </script>

    <script>
        function otvori_vecu_sliku3() {
            lokacija = "multimedija/test_2.png";

            otvori = window.open(lokacija);
        }
    </script>


</head>
<header>
    <a href="#sadrzaj">
        <h1>Dokumentacija</h1>
    </a>
    <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
    <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
    <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />

</header>

<?php
include 'meni.php';
?>

<section id="red" class="red">

    <h1>Opis projektnog zadatka</h1>
    <p>Projektni zadatak iz WebDiP-a na temu Rođendan je zadatak izrade web aplikacije koja će korisnicima omogućiti lakšu rezervaciju termina za rođendan te im olakšati
        to stresno razdoblje biranja lokacije za rođendan njihove djece.
    </p>

    <h1>Opis projektnog rješenja</h1>
    <p>Ovaj projekt je temeljen na bazi podataka, te samim time glavna stavka mu je interakcija sa korisnikom te zato imamo četiri različite uloge.
        Neregistrirani korisnik je najniža razina korisnika te samim time ima i najmanja prava. Neregistrirani korisnik može samo vidjeti informacije na nekim stranicama
        te prije kreiranja računa ne može ništa dodati ili imati veću interakciju sa stranicom. Tako prije registracije korisnik može samo vidjeti popis korisnika na rođendanu
        te pregledati galeriju za taj rođendan. Također može pristupiti još par stranica što je detaljno pokazano na navigacijskom dijagramu. Registriran korisnik je sljedeća razina
        korisnika, te se postane registriran jednom kada se obavi registracija i prođe aktivacija računa. Registrirani korisnik zadržava sva prava neregistriranog korisnika te
        dobiva mogućnost interakcije sa stranicom uz pomoć dodavanja materijala i kreiranja/ažuriranja rezervacija. Moderator je uloga kojoj jedino administrator daje prava. Moderator
        dobiva mogućnost upravljanja određenim registriranim korisnicima. Zadnja uloga je administrator i on ima sva prava nad web aplikacijom te time dobiva puno sistemskih opcija
        poput izrade sigurnosne kopije u obliku SQL skripte, pregled statistike, promjena virtualnog vremena i slično. Aplikacija korisnicima koji žele rezervirati termin za
        rođendan, olakšava stvari jer se može prijaviti i vidjeti sve informacije na jednom mjestu umjesto da fizički ili putem mobitela mora doći do informacija. </p>

</section>

<section id="red" class="red">

    <h1>ERA</h1>
    <figure class="stupac">
        <img src="multimedija/era.png" alt="era" width="200" height="200" onClick="otvori_vecu_sliku();">
        <figcaption>Slika 1 - ERA</figcaption>
    </figure>

    <p>Prvi dio aplikacije se okreće oko tablice korisnik za registraciju i onda za prijavu korisnika, te nam pomočna tablica uloga_korisnik omogućava dodjeljivanje uloga
        korisnicima. Drugi dio aplikacije je nakon što su registracija i prijava uspješno obavljeni te se započinje sa rezervacijom termina rođendana te za to koristimo
        tablice rezervacija_termin koja služi za rezervaciju termina, tablica status_rezervacija_termina koja moderatoru omogućava potvrđivanje ili odbijanje termina rezervacije,
        te tablica rođendan gdje se finalno pohrani rezervacija zajedno sa odabranom temom i datumom. Galerija sadržava materijale korisnika sa rođendana.
        Administrator koristi tablice poput sigurnosna_kopija ili dnevnik. </p>
</section>

<section id="red" class="red">

    <h1>Navigacijski dijagram</h1>
    <figure class="stupac">
        <img src="multimedija/iparac.jpg" alt="navigacijski" width="200" height="200" onClick="otvori_vecu_sliku1();">
        <figcaption>Slika 2 - Navigacijski dijagram</figcaption>
    </figure>
    <p>Navigacijski dijagram nam detaljno pokazuje prava i mogućnosti svakog od korisnika na našoj aplikaciji. Svaki korisnik veće razine zadržava prava svih prošlih
        razina tako da se dođe od neregistriranog korsnika prema registriranom, pa do moderatora te na kraju administratora koji ima sva prava nad aplikacijom. Na
        navigacijskom dijagramu možemo vidjeti ne samo prava tj. ćemu korisnik može pristupit već i "slijed" koji mora pratiti npr. neregistrirani korisnik prvo mora
        odraditi registraciju kako bi mogao odraditi aktivaciju računa.
    </p>
</section>

<h1>Popis i opis korištenih tehnologija i alata</h1>
<p>Tehnologije korištene za ovaj projekt su: HTML, CSS, PHP, JavaScript, JQuery, MySQL.
    Alati korišteni za ovaj projekt su: Visual Studio Code, MySQL Workbench, phpMyAdmin, XAMPP, Siege i draw.io za izradu navigacijskog dijagrama.
</p>

<h1>Popis i opis skripata</h1>

<div class="tablica">
    <table id="tablica">
        <thead>
            <tr>
                <th>Naziv skripte</th>
                <th>Opis skripte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>aktivacija.php</th>
                <th>Skripta koja služi za aktivaciju korisnika. Otvara se jedino preko aktivacijskog koda poslanog na email.
                </th>
            </tr>
            <tr>
                <th>autor.php</th>
                <th>Skripta sa par osnovnih informacija o autoru aplikacije poput email-a i slično.
                </th>
            </tr>
            <tr>
                <th>dnevnik.php</th>
                <th>Skripta koja služi za prikazivanje podataka u dnevniku i njegovo pretraživanje.
                </th>
            </tr>
            <tr>
                <th>dodaj_materijal.php</th>
                <th>Skripta koja se poziva pri kliku za upload materijala u galeriju, te služi da spremi te podatke u bazu.
                </th>
            </tr>
            <tr>
                <th>dodjeli_moderator.php</th>
                <th>Skripta koja služi administratoru za dodjeljivanje moderatora.
                </th>
            </tr>
            <tr>
                <th>dokumentacija.php</th>
                <th>Skripta koja sadrži infomacije za lakše shvačanje ovog programskog rješenja.
                </th>
            </tr>
            <tr>
                <th>index.php</th>
                <th>Skripta za početnu stranicu web aplikacije koja sadrži na sebi statistiku rođendana po grupi.
                </th>
            </tr>
            <tr>
                <th>materijali_u_galeriji.php</th>
                <th>Skripta koja služi za biranje tipa materijala koji se stavlja u galeriju i njegov upload.
                </th>
            </tr>
            <tr>
                <th>meni.php</th>
                <th>Skripta koja sadrži meni tj. navigaciju po ulozi te se poziva na početku svake skripte.
                </th>
            </tr>
            <tr>
                <th>odjava.php</th>
                <th>Skripta koja služi za odjavu korisnika te brisanje sesije ali ne i kolačića.
                </th>
            </tr>
            <tr>
                <th>otkljucaj_korisnik.php</th>
                <th>Skripta koja služi za otključavanje zaključanog korisnika.
                </th>
            </tr>
            <tr>
                <th>plan.php</th>
                <th>Skripta koja sadrži izvještaje testiranja u obliku slika.
                </th>
            </tr>
            <tr>
                <th>popis_korisnika_na_rodendanu.php</th>
                <th>Skripta koja sadrži popis korisnika na rođendanu te je grupirano po rođendanu.
                </th>
            </tr>
            <tr>
                <th>prijava.php</th>
                <th>Skripta koja služi za prijavu korisnika, te ukoliko prijava bude neuspješna 3 puta, račun se zakljuća.
                </th>
            </tr>
            <tr>
                <th>provjeraKorisnikaAjax.php.php</th>
                <th>Skripta koja provjerava je li korisničko ime dostupno tj. postoji li već u bazi.
                </th>
            </tr>
            <tr>
                <th>racun_zakljucan.php</th>
                <th>Skripta koju korisnik vidi ukoliko se zaključa neuspješnim prijavama.
                </th>
            </tr>
            <tr>
                <th>registracija_provjera.php</th>
                <th>Skripta koja radi provjeru registracije kad se pozove u skripti registracija.php.
                </th>
            </tr>
            <tr>
                <th>registracija.php</th>
                <th>Skripta koja služi za unos informacija korisnika za registraciju.
                </th>
            </tr>
            <tr>
                <th>rezervacija_insert.php</th>
                <th>Skripta koja služi za unos podataka rezervacije termina u bazu.
                </th>
            </tr>
            <tr>
                <th>rezervacija_obrisi_moderator.php</th>
                <th>Skripta koja omogućuje moderatoru brisanje rezervacija.
                </th>
            </tr>
            <tr>
                <th>rezervacija_obrisi.php</th>
                <th>Skripta koja služi za brisanje rezervacije korisnika iz baze.
                </th>
            </tr>
            <tr>
                <th>rezervacija_popis.php</th>
                <th>Skripta koja služi za upravljanje rezervacijama od strane moderatora.
                </th>
            </tr>
            <tr>
                <th>rezervacija_potvrdi.php</th>
                <th>Skripta do koje moderator dolazi kada klikne na upravljanje neke od rezervacija koje je korisnik kreirao, te služi za potvrđivanje ili odbijanje zahtjeva rezervacije.
                </th>
            </tr>
            <tr>
                <th>rezervacija_pregledaj.php</th>
                <th>Skripta u kojoj registrirani korisnik vidi svoje rezervacije te može kreirati nove.
                </th>
            </tr>
            <tr>
                <th>rezervacija_termina.php</th>
                <th>Skripta do koje se dođe iz skripte rezervacija_pregledaj.php klikom na gumb rezerviraj, te služi za rezervaciju termina.
                </th>
            </tr>
            <tr>
                <th>rezervacija_update.php</th>
                <th>Skripta do koje se dođe klikom na ažuriraj iz rezervacija_pregledaj.php i služi za ažuriranje rezervacije.
                </th>
            </tr>
            <tr>
                <th>spojibaza.php</th>
                <th>Skripta koja služi za spajanje na bazu podataka.
                </th>
            </tr>
            <tr>
                <th>upravljaj_moderatorom.php</th>
                <th>Skripta koja služi za upravljanje moderatorom od strane administratora.
                </th>
            </tr>
            <tr>
                <th>upravljaj_otkljucani_korisnik.php</th>
                <th>Skripta koja služi za pregled i zaključavanje otključanih korisnika.
                </th>
            </tr>
            <tr>
                <th>upravljaj_zakljucani_korisnik.php</th>
                <th>Skripta koja služi za pregled i otključavanje zaključanih korisnika.
                </th>
            </tr>
            <tr>
                <th>zaboravljena_lozinka.php</th>
                <th>Skripta koja služi za oporavak zaboravljene lozinke.
                </th>
            </tr>
            <tr>
                <th>zakljucaj_korisnik.php</th>
                <th>Zaštićena koja se poziva prilikom klika na zaključavanje kod upravljaj_otkljucani_korisnik.php i zaključava korisnički račun.
                </th>
            </tr>
            <tr>
                <th>popisKorisnika.php</th>
                <th>Zaštićena skripta .htaccess-om u mapi privatno koja ispisuje sve korisnike.
                </th>
            </tr>
            <tr>
                <th>iparac_jquery.js</th>
                <th>Skripta koja sadrži korišten jQuery kod u ovom projektu.
                </th>
            </tr>
            <tr>
                <th>iparac.js</th>
                <th>Skripta koja sadrži JavaScript kod.
                </th>
            </tr>
            <tr>
                <th>print.js</th>
                <th>Skripta koja služi za ispis statistike na index.php stranici.
                </th>
            </tr>
            <tr>
                <th>disleksija.css</th>
                <th>Skripta koja sadrži CSS kod za prilagođen pogled.
                </th>
            </tr>
            <tr>
                <th>iparac.css</th>
                <th>Skripta koja sadrži glavni CSS.
                </th>
            </tr>
        </tbody>
    </table>
</div>

<h1>Popis i opis vanjskih biblioteka</h1>

<div class="tablica">
    <table id="tablica">
        <thead>
            <tr>
                <th>Naziv skripte</th>
                <th>Opis skripte</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>baza.class.php</th>
                <th>Skripta za lakši rad sa upitima nad bazom.
                </th>
            </tr>
            <tr>
                <th>sesija.class.php</th>
                <th>Skripta za lakši rad sa sesijama.
                </th>
            </tr>
        </tbody>
    </table>
</div>

<h1>Mape</h1>
<div class="tablica">
    <table id="tablica">
        <thead>
            <tr>
                <th>Naziv mape</th>
                <th>Opis mape</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>izvorne datoteke</th>
                <th>Mapa koja sadrži izvorne datoteke poput izvještaja, sql skripti i slično.
                </th>
            </tr>
            <tr>
                <th>css</th>
                <th>Mapa koja sadrži sve CSS skripte u projeku.
                </th>
            </tr>
            <tr>
                <th>javascript</th>
                <th>Mapa koja sadrži JavaScript i jQuery skripte.
                </th>
            </tr>
            <tr>
                <th>multimedija</th>
                <th>Mapa koja sadrži svu multimediju poput slika, videa i slično.
                </th>
            </tr>
            <tr>
                <th>privatno</th>
                <th>Mapa zaštićena .htaccsess-om koja sadrži skriptu za ispis svih korisnika.
                </th>
            </tr>
        </tbody>
    </table>
</div>


<section id="red" class="red">

    <h1>Testiranje</h1>
    <figure class="stupac">
        <img src="multimedija/test_1.png" alt="testiranje" width="200" height="200" onClick="otvori_vecu_sliku2();">
        <figcaption>Slika 3 - Testiranje 1</figcaption>
    </figure>

</section>

<section id="red" class="red">


    <figure class="stupac">
        <img src="multimedija/test_2.png" alt="testiranje" width="200" height="200" onClick="otvori_vecu_sliku3();">
        <figcaption>Slika 4 - Testiranje 2</figcaption>
    </figure>

    <p>Screenshot provedenog testiranja web aplikacije alatom Siege. Može se vidjeti da je 100% što znaći da su sve stranice dostupne. Izvještaj testiranja se nalazi na lokaciji /izvorne_datoteke/izvjestaj.txt </p>
</section>

<footer class="footer">
    <address>&copy;2021. <a href="autor.html">Ivan Jure Parać</a></address>


    <a href="http://validator.w3.org/check?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="HTML5 logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/HTML5.png" width="50" height="50" />
    </a>
    <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2020/zadaca_01/iparac">
        <img alt="CSS logo" src="https://barka.foi.hr/WebDiP/2020/materijali/zadace/CSS3.png" width="57" height="57" />
    </a>
</footer>

</body>

</html>