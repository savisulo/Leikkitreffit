<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirjaudu sisään</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css">
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
                <a href="index.php" id="firstItem">Etusivu</a>
                <a href="index.php#about">Mikä on LeikkiTreffit?</a>
                <a href="index.php#kalenteri">Tapahtumakalenteri</a>
                <a href="rekisterointi.php">Liity yhteisöön</a>
                <a href="index.php#palautelomake" id="lastItem">Palautelomake</a>
            </div>
            <a href="javascript:void(0);" class="hamburgerIcon" onclick="myFunction()" onmouseover="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
		<div>
		<?php
		if(isset($_GET['status']) && $_GET['status'] == 'success') {
    	echo '<p id="successmsg">Rekisteröinti onnistui, voit nyt kirjautua sisään!</p>';
        }
        if(isset($_GET['status']) && $_GET['status'] == 'logoutsuccess') {
            echo '<p id="successmsg">Olet nyt kirjautunut ulos</p>';
        }
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
		<p>Eikö sinulla ole tiliä? <a href="rekisterointi.php" id="linkki">Rekisteröidy käyttäjäksi tästä.</a></p>
		</div>
        <?php
        include('footer.html');
        ?>
    <script src="script.js"></script>
</body>
</html>