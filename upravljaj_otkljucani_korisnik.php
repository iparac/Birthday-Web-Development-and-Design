<?php
session_start();
include 'spojibaza.php';

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];

$sqlSelectKorisnik = "SELECT korisnik.korisnik_id, korisnik.korisnicko_ime, korisnik.email, uloga_korisnik.ime 
                      FROM korisnik, uloga_korisnik 
                      WHERE korisnik.uloga_id = uloga_korisnik.uloga_id AND korisnik.uloga_id NOT IN (5)";
$sqlRezultatSelectKorisnik = mysqli_query($conn, $sqlSelectKorisnik);


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
  <title>Upravljanje otključanim korisnicima</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device.width, initial-scale=1.0">
  <meta name="author" content="Ivan Jure Parać">
  <meta name="naslov" content="Upravljanje otključanim korisnicima">
  <meta name="keywords" content="otključani, korisnici, prava">
  <meta name="description" content="Upravljanje moderatorom, 12.06.2021.">
  <link rel="stylesheet" href="css/iparac.css" type="text/css" />
  <script src="javascript/print.js"></script>
  <script src="javascript/iparac.js"></script>

</head>
<header>
  <a href="#sadrzaj">
    <h1>Upravljanje otključanim korisnicima</h1>
  </a>
  <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
  <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
  <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
  <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>


<?php
include 'meni.php';
?>

<div class="sadrzaj1">
  <h2>Zaključavanje korisnika</h2>
  <table class="tablica">

    <head>
      <tr>
        <th>Korisničko ime</th>
        <th>Email</th>
        <th>Uloga</th>
      </tr>
    </head>
    <tbody>
      <?php
      if (mysqli_num_rows($sqlRezultatSelectKorisnik) > 0) {
        while ($row = mysqli_fetch_assoc($sqlRezultatSelectKorisnik)) {
      ?>
          <tr>
            <td><?php echo $row['korisnicko_ime']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['ime']; ?></td>
            <td><a href="zakljucaj_korisnik.php?id=<?php echo $row['korisnik_id']; ?>"> Zaključaj korisnika </a>
            </td>
          </tr>
      <?php }
      } ?>
    </tbody>
  </table>

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

</body>

</html>