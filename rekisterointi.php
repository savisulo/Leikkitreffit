<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liity yhteisöön</title>
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
                <a href="login.php">Kirjaudu sisään</a>
                <a href="index.php#palautelomake" id="lastItem">Palautelomake</a>
                </div>
            <a href="login.php" class="loginIcon">
                <i class="fas fa-sign-in-alt"></i>
            </a>
            <a href="javascript:void(0);" class="hamburgerIcon" onclick="myFunction()" onmouseover="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
	<div class="register">
		<h2>Rekisteröidy käyttäjäksi</h2>
		<form action="register.php" method="post" autocomplete="off">
            <div>
				<label for="etunimi">* Etunimi:</label>
				<input type="text" name="etunimi" placeholder="Matti" id="etunimi" required>
            </div>
            <div>
                <label for="sukunimi">* Sukunimi:</label>
				<input type="text" name="sukunimi" placeholder="Meikäläinen" id="sukunimi" required>
            </div>
            <div>
                <label for="email">* Sähköpostiosoite:</label>
				<input type="email" name="email" placeholder="Anna sähköpostiosoite" id="email" required>
            </div>
            <div>
                <label for="kayttajatunnus">* Luo käyttäjätunnus:</label>
				<input type="text" name="kayttajatunnus" id="kayttajatunnus" required>
            </div>
            <div>
                <label for="salasana">* Luo Salasana:</label>
				<input type="password" name="salasana" id="salasana" required>
            </div>
            <input type="submit" value="Rekisteröidy käyttäjäksi">
		</form><br>
	</div>
	<div class="linkki">
		<p>Onko sinulla jo tili? <a href="login.php" id="linkki">Kirjaudu sisään tästä.</a></p>
	</div>
    <?php
    include('footer.html');
    ?>
    <script src="script.js"></script>
</body>
</html>