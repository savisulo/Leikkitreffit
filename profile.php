<?php
include('secure.php');

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'leikkitreffit';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT email, kayttajatunnus FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email, $kayttajatunnus); // ei toimi
$stmt->fetch();
$stmt->close();

$etunimi = $_SESSION['etunimi'];
$haku2sql = "SELECT kayttajatunnus, email FROM users WHERE etunimi = '$etunimi'";
$tulokset2 = $con->query($haku2sql);

if ($tulokset2->num_rows > 0) {
   while($rivi = $tulokset2->fetch_assoc()) {
      $ktunnus = $rivi["kayttajatunnus"];
	  $sposti = $rivi["email"];
   }
}

$hakusql = "SELECT * FROM tapahtumat WHERE kayttajatunnus = '$ktunnus'";
$tulokset = $con->query($hakusql);
if ($tulokset->num_rows > 0) {
   while($rivi = $tulokset->fetch_assoc()) {
      $tapahtuma = $rivi["nimi"]. " - " . $rivi["paikka"]. " - " . $rivi["pvm"]. " - " . $rivi["klo"]. " - " . $rivi["kuvaus"]. "<br>";
   }
} else {
   $msg = "Et ole lisännyt tapahtumia.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Käyttäjätili</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body>
	<header>
        <div class="topnav">
            <a href="index.php" class="active"><h1>LeikkiTreffit</h1></a>
            <div id="myLinks">
                <a href="index.php#about" id="firstItem">Mikä on LeikkiTreffit?</a>
                <a href="index.php#kalenteri">Tapahtumakalenteri</a>
                <a href="logout.php">Kirjaudu ulos</a>
                <a href="index.php#palautelomake" id="lastItem">Palautelomake</a>
            </div>
            <a href="logout.php" class="logoutIcon"><i class="fas fa-sign-out-alt"></i></a>
			<a href="profile.php" class="profileIcon"><i class="fas fa-user-circle"></i></a>
            <a href="javascript:void(0);" class="hamburgerIcon" onclick="myFunction()" onmouseover="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
	<main>
		<div>
			<p>Tervetuloa takaisin, <?=$_SESSION['etunimi']?>! Tässä on käyttäjätilisi tiedot:</p>
			<p>Käyttäjätunnus:</p>
			<p><?=$ktunnus?></p>
			<p>Email:</p>
			<p><?=$sposti?></p>
			<p>Lisäämäsi tapahtumat:</p>
			<p><?=$msg?></p>
			<p><?=$tapahtuma?></p>
			<a href="tapahtuma.php">Lisää tapahtuma</a><br>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kirjaudu ulos</a>
		</div>
	</main>
	<footer>
        <p class="copyright">Copyright 2022, LeikkiTreffit - <a href="#">Tietosuojaseloste</a></p>
        <ul id="socialmedia">
            <li><a href="#" target="_blank" class="social"><img src="https://img.icons8.com/color/40/000000/twitter-circled--v1.png" alt="twitter"></a></li>
            <li><a href="#" target="_blank" class="social"><img src="https://img.icons8.com/fluency/40/000000/instagram-new.png" alt="instagram"></a></li>
            <li><a href="#" target="_blank" class="social"><img src="https://img.icons8.com/color/40/000000/facebook-new.png" alt="facebook"></a></li>
        </ul>
    </footer>
	<script src="script.js"></script>
</body>
</html>