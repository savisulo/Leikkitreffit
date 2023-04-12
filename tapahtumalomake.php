<?php
include('secure.php');

$DATABASE_HOST = getenv('DATABASE_HOST');
$DATABASE_USER = getenv('DATABASE_USER');
$DATABASE_PASS = getenv('DATABASE_PASS');
$DATABASE_NAME = getenv('DATABASE_NAME');
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$con->set_charset("utf8");

if(isset($_POST['submitbutton2']) && $_POST['nimi'] != null && $_POST['paikka'] != null && $_POST['pvm'] != null && $_POST['klo'] != null) {
    tapahtumaLomake();
}
    
function tapahtumaLomake() {
    global $con;
    $yhteydenotto = "INSERT INTO tapahtumat (nimi, paikka, pvm, klo, kuvaus, kayttajatunnus) VALUES ('".$_POST['nimi']."', '".$_POST['paikka']."', '".$_POST['pvm']."', '".$_POST['klo']."', '".$_POST['kuvaus']."', '".$_POST['ktunnus']."')";
    $lisays = $con->query($yhteydenotto);
    if ($lisays === TRUE) {
        header('location: tapahtuma.php?status=eventSuccess');
		exit;
    } else {
        echo "Virhe: " . $yhteydenotto . "<br>" . $con->error;
    }
}
?>