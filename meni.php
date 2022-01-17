<?php
if (!isset($_SESSION['uloga_id'])) {
    echo "<div style=\"display:inline;\" id=\"meni\" class=\"meni\">
                <a href=\"registracija.php\">Registracija</a> 
                <a href=\"prijava.php\">Prijava</a> 
                <a href=\"index.php\">Početna stranica</a> 
                <a href=\"popis_korisnika_na_rodendanu.php\">Popis korisnika na rođendanu</a> 
                <a href=\"dokumentacija.php\">Dokumentacija</a> 
                <a href=\"autor.php\">Autor</a>
            </div> ";
}
if (isset($_SESSION["uloga_id"]) && $_SESSION["uloga_id"] === "1") {
    echo "<div style=\"display:inline;\" id=\"meni\" class=\"meni\">
                <a href=\"index.php\">Početna stranica</a> 
                <a href=\"popis_korisnika_na_rodendanu.php\">Popis korisnika na rođendanu</a> 
                <a href=\"dokumentacija.php\">Dokumentacija</a> 
                <a href=\"autor.php\">Autor</a>
                <a href=\"rezervacija_pregledaj.php\">Rezervacije</a>
                <a href=\"materijali_u_galeriji.php\">Galerija</a>
                <a href=\"rezervacija_popis.php\">Upravljanje rezervacijama</a>
                <a href=\"dnevnik.php\">Dnevnik</a>
                <a href=\"upravljaj_moderatorom.php\">Dodjela moderatora</a>
                <a href=\"upravljaj_zakljucani_korisnik.php\">Otključavanje korisnika</a>
                <a href=\"upravljaj_otkljucani_korisnik.php\">Zaključavanje korisnika</a>
                <a href=\"rodendan_pregledaj.php\">Pregledaj rođendane</a>
                <a href=\"odjava.php\">Odjavite se</a>
            </div> ";
}
if (isset($_SESSION["uloga_id"]) && $_SESSION["uloga_id"] === "2") {
    echo "<div style=\"display:inline;\" id=\"meni\" class=\"meni\">
                <a href=\"index.php\">Početna stranica</a> 
                <a href=\"popis_korisnika_na_rodendanu.php\">Popis korisnika na rođendanu</a> 
                <a href=\"dokumentacija.php\">Dokumentacija</a> 
                <a href=\"autor.php\">Autor</a>
                <a href=\"rezervacija_pregledaj.php\">Rezervacije</a>
                <a href=\"materijali_u_galeriji.php\">Galerija</a>
                <a href=\"rezervacija_popis.php\">Upravljanje rezervacijama</a>
                <a href=\"rodendan_pregledaj.php\">Pregledaj rođendane</a>
                <a href=\"odjava.php\">Odjavite se</a>
            </div> ";
}
if (isset($_SESSION["uloga_id"]) && $_SESSION["uloga_id"] === "3") {
    echo "<div style=\"display:inline;\" id=\"meni\" class=\"meni\">
                <a href=\"index.php\">Početna stranica</a> 
                <a href=\"popis_korisnika_na_rodendanu.php\">Popis korisnika na rođendanu</a> 
                <a href=\"dokumentacija.php\">Dokumentacija</a> 
                <a href=\"autor.php\">Autor</a>
                <a href=\"rezervacija_pregledaj.php\">Rezervacije</a>
                <a href=\"materijali_u_galeriji.php\">Galerija</a>
                <a href=\"odjava.php\">Odjavite se</a>
            </div> 
            ";
}
