<?php
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
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['etunimi'], $_POST['sukunimi'], $_POST['email'], $_POST['kayttajatunnus'], $_POST['salasana'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['etunimi']) || empty($_POST['sukunimi']) || empty($_POST['email']) || empty($_POST['kayttajatunnus']) || empty($_POST['salasana'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}
/* tästä alkaa validointi
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
} */

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, salasana FROM users WHERE kayttajatunnus = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['kayttajatunnus']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new account
        if ($stmt = $con->prepare("INSERT INTO users (etunimi, sukunimi, email, kayttajatunnus, salasana) VALUES (?, ?, ?, ?, ?)")) {
	    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	    $password = password_hash($_POST['salasana'], PASSWORD_DEFAULT);
	    $stmt->bind_param('sssss', $_POST['etunimi'], $_POST['sukunimi'], $_POST['email'], $_POST['kayttajatunnus'], $password);
	    $stmt->execute();
		header('location: login.php?status=success');
		exit;
        } else {
	    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	    echo 'Could not prepare statement!';
        }
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>