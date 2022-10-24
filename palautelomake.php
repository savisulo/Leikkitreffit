<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'leikkitreffit';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// aseta merkistökoodaus (muuten ääkköset sekoavat)
$con->set_charset("utf8");
    
if(isset($_POST['submitbutton']) && $_POST['etunimi'] != null && $_POST['sukunimi'] != null && $_POST['sposti'] != null && $_POST['viesti'] != null) {
    submitbuttonLomake();
}
    
function submitButtonLomake() {
    global $con;
    $yhteydenotto = "INSERT INTO palautteet (etunimi, sukunimi, sposti, viesti) VALUES ('".$_POST['etunimi']."', '".$_POST['sukunimi']."', '".$_POST['sposti']."', '".$_POST['viesti']."')";
    $lisays = $con->query($yhteydenotto);
    if ($lisays === TRUE) {
        header('location: index.php?status=success');
		exit;
    } else {
        echo "Virhe: " . $yhteydenotto . "<br>" . $con->error;
    }
}