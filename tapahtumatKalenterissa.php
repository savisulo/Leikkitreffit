<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'leikkitreffit';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$eventSearch = "SELECT * FROM tapahtumat WHERE pvm = '2022-10-28'";
$result = $con->query($eventSearch);
if ($results->num_rows > 0) {
    while($rivi = $results->fetch_assoc()) {
        $numOfEvents = $rivi["paikka"];
    }
}