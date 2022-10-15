<?php
$palvelin = "localhost";
$kayttaja = "root";
$salasana = "";
$tietokanta = "leikkitreffit";
    
// luo yhteys
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
// jos yhteyden muodostaminen ei onnistunut, keskeytä
if ($yhteys->connect_error) {
    die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}
// aseta merkistökoodaus (muuten ääkköset sekoavat)
$yhteys->set_charset("utf8");
    
if(isset($_POST['submitbutton']) && $_POST['etunimi'] != null && $_POST['sukunimi'] != null && $_POST['sposti'] != null && $_POST['viesti'] != null) {
    submitbuttonLomake();
}
    
function submitButtonLomake() {
    global $yhteys;
    $yhteydenotto = "INSERT INTO palautteet (etunimi, sukunimi, sposti, viesti) VALUES ('".$_POST['etunimi']."', '".$_POST['sukunimi']."', '".$_POST['sposti']."', '".$_POST['viesti']."')";
    $lisays = $yhteys->query($yhteydenotto);
    if ($lisays === TRUE) {
        header('location: index.php?status=success');
		exit;
    } else {
        echo "Virhe: " . $yhteydenotto . "<br>" . $yhteys->error;
    }
}