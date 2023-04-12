<?php
// session_start();
// Change this to your connection info.
$DATABASE_HOST = getenv('DATABASE_HOST');
$DATABASE_USER = getenv('DATABASE_USER');
$DATABASE_PASS = getenv('DATABASE_PASS');
$DATABASE_NAME = getenv('DATABASE_NAME');
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Yhteyden muodostaminen tietokantaan epäonnistui: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['kayttajatunnus'], $_POST['salasana']) ) {
	// Could not get the data that should have been sent.
	exit('Anna käyttäjätunnus ja salasana.');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, salasana, etunimi FROM users WHERE kayttajatunnus = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['kayttajatunnus']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password_hash, $etunimi);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['salasana'], $password_hash)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_start();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['etunimi'] = $etunimi;
            if (isset($_SESSION['next_page'])){
                $next_page = $_SESSION['next_page'];
                unset($_SESSION['next_page']);
                header("location: $next_page");
                exit;
                }
            header('Location: profile.php');
        } else {
            // Incorrect password
            echo ('Virheellinen käyttäjätunnus ja/tai salasana!'); // tätä ilmoitusta ei saada, kentät vain tyhjenee, eli suoritetaan login.php-sivulle siirtyminen
            header('Location: login.php');
            exit;
        }
    } else {
        // Incorrect username
        echo ('Virheellinen käyttäjätunnus ja/tai salasana!'); // tätä ilmoitusta ei saada, kentät vain tyhjenee, eli suoritetaan login.php-sivulle siirtyminen
        header('Location: login.php');
        exit;
    }


	$stmt->close();
}
?>