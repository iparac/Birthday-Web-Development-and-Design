/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    naslov = $(document).find("title").text();
    console.log(naslov);
    switch (naslov) {
        case "Registracija":
            $("#provjera").on("click", function (e) {
                e.preventDefault();
                var korisnicko_ime = $("#korisnicko_ime").val();
                if (korisnicko_ime !== "") {
                    $.ajax({
                        url: "provjeraKorisnikaAjax.php",
                        type: "POST",
                        cache: false,
                        data: {
                            korisnicko_ime: korisnicko_ime,
                        },
                        success: function (result) {
                            if (result == 1) {
                                document.getElementById("korisnicko_ime_provjera").style.color = 'red';
                                $("#korisnicko_ime_provjera").text('Zauzeto.');
                            } else {
                                document.getElementById("korisnicko_ime_provjera").style.color = 'green';
                                $("#korisnicko_ime_provjera").text('Korisničko ime je dostupno.');
                            }
                        }
                    });
                } else {
                    $("#korisnicko_ime_provjera").text('Unesite korisničko ime.');
                }
            });

            $("#lozinka1").keyup(function (event) {

                var lozinka = $("#lozinka1").val();
                var re = new RegExp((/^(?!.*(.)\1{3})((?=.*[\d])(?=.*[A-Za-z])|(?=.*[^\w\d\s])(?=.*[A-Za-z])).{8,20}$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#lozinka1").attr("style", "border-color:red");
                    $("#lozinka1_provjera").attr("style", "color:red");
                    $("#lozinka1_provjera").text("Lozinka treba sadržavati 8-20 znakova, barem jedno specijalni znak, jedan alfanumerički te se niti jedan znak ne smije ponavljati više od 3 puta za redom.");
                    greske = true;
                } else {
                    $("#lozinka1").attr("style", "border-color:green");
                    $("#lozinka1_provjera").attr("style", "color:green");
                    $("#lozinka1_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });
            $("#lozinka2").keyup(function (event) {

                var lozinka = $("#lozinka2").val();
                var re = new RegExp((/^(?!.*(.)\1{3})((?=.*[\d])(?=.*[A-Za-z])|(?=.*[^\w\d\s])(?=.*[A-Za-z])).{8,20}$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#lozinka2").attr("style", "border-color:red");
                    $("#lozinka2_provjera").attr("style", "color:red");
                    $("#lozinka2_provjera").text("Lozinka treba sadržavati 8-20 znakova, barem jedno specijalni znak, jedan alfanumerički te se niti jedan znak ne smije ponavljati više od 3 puta za redom.");
                    greske = true;
                } else {
                    $("#lozinka2").attr("style", "border-color:green");
                    $("#lozinka2_provjera").attr("style", "color:green");
                    $("#lozinka2_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });

            $("#ime").keyup(function (event) {

                var lozinka = $("#ime").val();
                var re = new RegExp((/^([A-Ža-ž]){3,30}$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#ime").attr("style", "border-color:red");
                    $("#ime_provjera").attr("style", "color:red");
                    $("#ime_provjera").text("Ime smije sadržavati samo slova u rasponu od 3-30");
                    greske = true;
                } else {
                    $("#ime").attr("style", "border-color:green");
                    $("#ime_provjera").attr("style", "color:green");
                    $("#ime_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });

            $("#prezime").keyup(function (event) {

                var lozinka = $("#prezime").val();
                var re = new RegExp((/^([A-Ža-ž]){3,50}$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#prezime").attr("style", "border-color:red");
                    $("#prezime_provjera").attr("style", "color:red");
                    $("#prezime_provjera").text("Prezime smije sadržavati samo slova u rasponu od 3-50");
                    greske = true;
                } else {
                    $("#prezime").attr("style", "border-color:green");
                    $("#prezime_provjera").attr("style", "color:green");
                    $("#prezime_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });

            $("#korisnicko_ime").keyup(function (event) {

                var lozinka = $("#korisnicko_ime").val();
                var re = new RegExp((/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#korisnicko_ime").attr("style", "border-color:red");
                    $("#korisnicko_ime_provjera").attr("style", "color:red");
                    $("#korisnicko_ime_provjera").text("Prezime smije sadržavati samo slova u rasponu od 3-50");
                    greske = true;
                } else {
                    $("#korisnicko_ime").attr("style", "border-color:green");
                    $("#korisnicko_ime_provjera").attr("style", "color:green");
                    $("#korisnicko_ime_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });

            $("#korisnicko_ime").keyup(function (event) {

                var lozinka = $("#korisnicko_ime").val();
                var re = new RegExp((/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#korisnicko_ime").attr("style", "border-color:red");
                    $("#korisnicko_ime_provjera").attr("style", "color:red");
                    $("#korisnicko_ime_provjera").text("Prezime smije sadržavati samo slova u rasponu od 3-50");
                    greske = true;
                } else {
                    $("#korisnicko_ime").attr("style", "border-color:green");
                    $("#korisnicko_ime_provjera").attr("style", "color:green");
                    $("#korisnicko_ime_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });

            $("#email").keyup(function (event) {

                var lozinka = $("#email").val();
                var re = new RegExp((/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/));
                var ok = re.test(lozinka);
                if (!ok) {
                    $("#email").attr("style", "border-color:red");
                    $("#email_provjera").attr("style", "color:red");
                    $("#email_provjera").text("Molimo unesite ispravan e-mail.");
                    greske = true;
                } else {
                    $("#email").attr("style", "border-color:green");
                    $("#email_provjera").attr("style", "color:green");
                    $("#email_provjera").text("Ispravno uneseno!");
                    greske = false;
                }
            });
            $("#lozinka2").keyup(function (event) {
                var lozinka1 = $("#lozinka1").val();
                var lozinka2 = $("#lozinka2").val();
                if (lozinka1 == lozinka2) {
                    $("#lozinka1").attr("style", "border-color:green");
                    $("#lozinka2").attr("style", "border-color:green");
                    $("#lozinka2_provjera").attr("style", "color:green");
                    $("#lozinka2_provjera").text("Lozinke se podudaraju!");
                } else {
                    $("#lozinka1").attr("style", "border-color:red");
                    $("#lozinka2").attr("style", "border-color:red");
                    $("#lozinka2_provjera").attr("style", "color:red");
                    $("#lozinka2_provjera").text("Lozinke se ne podudaraju!");
                }
            });
            break;


            //čitanje kolačiča
            trazi = "WebDiP=";
            //alert(document.cookie);
            kolacici = document.cookie;
            if (kolacici.length > 0) {
                pocetak = kolacici.indexOf(trazi);
                if (pocetak !== -1) {
                    kolacici = kolacici.substring(pocetak + trazi.length, kolacici.length);
                    kraj = kolacici.indexOf(";");
                    if (kraj === -1) {
                        kraj = kolacici.length;
                    }
                    mojKolacic = kolacici.substring(pocetak, kraj);
                    if (mojKolacic !== null || mojKolacic.length() > 0) {
                        alert("Vrijednost kolačića: " + mojKolacic);
                    }
                }
            }

            // brisanje kolačića iz druge stranice; znamo tko je kreirao kolačić
            // document.cookie = 'WebDiP=; Max-Age=0; path=/;';


            break;
        default:
            alert("Stranica ne postoji!");
            break;
    }


    function kreirajDogadaje() {

        //čitanje kolačiča
        trazi = "WebDiP=";
        //alert(document.cookie);
        kolacici = document.cookie;
        if (kolacici.length > 0) {
            pocetak = kolacici.indexOf(trazi);
            if (pocetak !== -1) {
                kolacici = kolacici.substring(pocetak + trazi.length, kolacici.length);
                kraj = kolacici.indexOf(";");
                if (kraj === -1) {
                    kraj = kolacici.length;
                }
                mojKolacic = kolacici.substring(pocetak, kraj);
                if (mojKolacic !== null || mojKolacic.length() > 0) {
                    alert("Vrijednost kolačića: " + mojKolacic);
                }
            }
        }

        // brisanje kolačića iz druge stranice; znamo tko je kreirao kolačić
        document.cookie = 'WebDiP=; Max-Age=0; path=/;';
    }

});