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
$stmt = $con->prepare('SELECT kayttajatunnus FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($kayttajatunnus); // ei toimi
$stmt->fetch();
$stmt->close();

$etunimi = $_SESSION['etunimi'];
$haku2sql = "SELECT kayttajatunnus FROM users WHERE etunimi = '$etunimi'";
$tulokset2 = $con->query($haku2sql);

if ($tulokset2->num_rows > 0) {
   while($rivi = $tulokset2->fetch_assoc()) {
      $ktunnus = $rivi["kayttajatunnus"];
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Luo tapahtuma</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body>
<?php
include('tapahtumalomake.php');
if(isset($_GET['status']) && $_GET['status'] == 'eventSuccess') {
    echo '<p id="successmsg">Tapahtuma lisätty!</p>';
    }
?>
	<header>
        <div class="topnav">
            <a href="index.php" class="active"><h1>LeikkiTreffit</h1></a>
            <div id="myLinks">
                <a href="index.php#about" id="firstItem">Mikä on LeikkiTreffit?</a>
                <a href="index.php#kalenteri">Tapahtumakalenteri</a>
                <a href="profile.php">Käyttäjätili</a>
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
		<div id="tapahtumalomake">
            <h2>Luo tapahtuma</h2><br>
            <form action="tapahtuma.php" method="post">
                <div id="readOnly">
                <label for="ktunnus">Tapahtuman lisääjä:</label>
                <input type="text" id="ktunnus" name="ktunnus" value="<?=$ktunnus?>" readonly>
                </div>
                <div>
                <label for="nimi">* Tapahtuman nimi:</label>
                <input type="text" id="nimi" name="nimi" placeholder="esim. leikkipuistoilu" size="37" minlength="2" maxlength="30" required>
                </div>
                <div>
                <label for="paikka">* Tapahtuman sijainti:</label>
                <input type="text" id="paikka" name="paikka" placeholder="Leikkipuiston nimi / osoite" size="37" minlength="2" maxlength="40" required>
                </div>
                <div>
                <label for="pvm">* Tapahtuman pvm:</label>
                <input type="date" id="pvm" name="pvm" size="37" required>
                </div>
                <div>
                <label for="klo">* Tapahtuman klo:</label>
                <input type="time" id="klo" name="klo" size="37" required>
                </div>
                <div>
                <label for="kuvaus">Tapahtuman kuvaus:</label>
                <textarea name="kuvaus" id="kuvaus" rows="10" cols="40" placeholder="Lisää halutessasi tapahtuman kuvaus" maxlength="300"></textarea>
                </div>        
                <input type="submit" name="submitbutton2" value="Lähetä">
            </form><br>
            <p>*Tähdellä merkityt kohdat ovat pakollisia.</p><br>
            <p><a href="#" id="ylos">Takaisin ylös</a></p><br>
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