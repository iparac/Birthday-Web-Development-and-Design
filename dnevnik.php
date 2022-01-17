<?php
session_start();
include 'spojibaza.php';

$korisnicko_ime = $_SESSION["korisnicko_ime"];
$sqlSelectId = "select * from korisnik where korisnicko_ime='{$korisnicko_ime}'";
$sqlRezultatId = mysqli_query($conn, $sqlSelectId);
$row = mysqli_fetch_assoc($sqlRezultatId);
$korisnik_id = $row['korisnik_id'];


$sqlSelectDnevnik = "SELECT * FROM dnevnik";
$sqlRezultatSelectDnevnik = mysqli_query($conn, $sqlSelectDnevnik);
$row = mysqli_fetch_assoc($sqlRezultatSelectDnevnik);

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<head>
  <title>Dnevnik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device.width, initial-scale=1.0">
  <meta name="author" content="Ivan Jure Parać">
  <meta name="naslov" content="Dnevnik">
  <meta name="keywords" content="dnevnik, podaci, informacije">
  <meta name="description" content="Dnevnik sa raznim informacijiama, 12.06.2021.">
  <link rel="stylesheet" href="css/iparac.css" type="text/css" />
  <script src="javascript/print.js"></script>
  <script src="javascript/iparac.js"></script>

</head>
<header>
  <a href="#sadrzaj">
    <h1>Dnevnik </h1>
  </a>
  <img src="multimedija/rss.png" alt="rss" height="30" width="30" />
  <img src="multimedija/twitter.png" alt="twitter" height="30" width="30" />
  <img src="multimedija/instagram.jpg" alt="instagram" height="30" width="30" />
  <img src="multimedija/access.png" onclick="zamjeniCSS()" alt="access" height="30" width="30" />

</header>


<?php
include 'meni.php';
?>


<form method="post" action="">
  <h1>Pretraži dnevnik po korisniku</h1>

  <label for="trazi_korisnika">Unesite korisničko ime</label>
  <input type="text" name="trazi_korisnika" /><br>

  <input type="submit" name="submit_kor" class="submit" value="Pretraži" />
</form>

<form method="post" action="">
  <h1>Pretraži dnevnik po datumu</h1>

  <label for="datum_vrijeme_od">Unesite datum od</label>
  <input type="date" name="datum_vrijeme_od" /><br>

  <label for="datum_vrijeme_od">Unesite datum do</label>
  <input type="date" name="datum_vrijeme_do" /><br>
  <input type="submit" name="submit" class="submit" value="Pretraži" />
</form>



<div class="sredina">
  <table id="tablica">
    <thead>
      <tr>
        <th>Korisničko ime</th>
        <th>Radnja</th>
        <th>Vrijeme radnje</th>
      </tr>
    </thead>
    <tbody id="tablica">
      <?php
      if (isset($_POST['submit'])) {
        $datum_vrijeme_od = $_POST['datum_vrijeme_od'];
        $datum_vrijeme_do = $_POST['datum_vrijeme_do'];

        $sqlSelectDnevnikPoDatumu = "SELECT korisnik.korisnicko_ime, dnevnik.radnja, dnevnik.datum_vrijeme 
                                     FROM korisnik, dnevnik 
                                     WHERE korisnik.korisnik_id = dnevnik.korisnik_id AND dnevnik.datum_vrijeme >= '$datum_vrijeme_od' 
                                     AND dnevnik.datum_vrijeme <= '$datum_vrijeme_do'";
        $sqlRezultatSelectDnevnikPoDatumu = mysqli_query($conn, $sqlSelectDnevnikPoDatumu);
        $dataRow = "";
        while ($row = mysqli_fetch_array($sqlRezultatSelectDnevnikPoDatumu)) {
          $dataRow = $dataRow . "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        echo $dataRow;
      }
      ?>
      <?php
      if (isset($_POST['submit_kor'])) {
        $trazi_korisnika = $_POST['trazi_korisnika'];

        $sqlSelectDnevnikPoKorisniku = "SELECT korisnik.korisnicko_ime, dnevnik.radnja, dnevnik.datum_vrijeme 
                                        FROM korisnik, dnevnik 
                                        WHERE korisnik.korisnik_id = dnevnik.korisnik_id AND korisnik.korisnicko_ime LIKE '$trazi_korisnika'";
        $sqlRezultatSelectDnevnikPoKorisniku = mysqli_query($conn, $sqlSelectDnevnikPoKorisniku);
        $dataRow = "";
        while ($row = mysqli_fetch_array($sqlRezultatSelectDnevnikPoKorisniku)) {
          $dataRow = $dataRow . "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        echo $dataRow;
      }
      ?>
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