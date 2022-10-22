<?php
include('secure.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
		<div>
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['etunimi']?>!</p>
			<a href="profile.php"><i class="fas fa-user-circle"></i>Tili</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kirjaudu ulos</a>
		</div>
	</main>
	<?php
    include('footer.html');
    ?>
	<script src="script.js"></script>
</body>
</html>