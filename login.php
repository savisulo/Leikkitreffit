<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef5cad2b65.js" crossorigin="anonymous"></script>
    <title>Kirjaudu sisään</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body>
    <header>
        <div class="topnav"> <!-- Top Navigation Menu -->
            <a href="index.php" class="active"><h1>LeikkiTreffit</h1></a>
            <div id="myLinks"> <!-- Navigation links (hidden by default) -->
                <a href="index.php" id="firstItem">Etusivu</a>
                <a href="index.php#about">Mikä on LeikkiTreffit?</a>
                <a href="index.php#kalenteri">Tapahtumakalenteri</a>
                <a href="rekisterointi.html">Liity yhteisöön</a>
                <a href="index.php#palautelomake" id="lastItem">Palautelomake</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
		<div>
		<?php
		if( $_GET['status'] == 'success'):
    	echo '<p id="successmsg">Rekisteröinti onnistui, voit nyt kirjautua sisään!</p>';
		endif;
		?>
		</div>
		<div class="login">
			<h2>Kirjaudu sisään</h2>
			<form action="authenticate.php" method="post">
				<label for="kayttajatunnus">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="kayttajatunnus" placeholder="Käyttäjätunnus" id="kayttajatunnus" required>
				<label for="salasana">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="salasana" placeholder="Salasana" id="salasana" required>
                <p><a href="#" id="linkki">Unohtuiko salasana?</a></p>
				<input type="submit" value="Kirjaudu sisään">
			</form>
		</div>
		<div class="linkki">
		<p>Eikö sinulla ole tiliä? <a href="rekisterointi.html" id="linkki">Rekisteröidy käyttäjäksi tästä.</a></p>
		</div>
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