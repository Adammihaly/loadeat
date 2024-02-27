<?php

$serverName = 'localhost';
$dBUsername = 'root';
$dBPassword = '';
$dBName = 'loadeat';

	$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

	if (!$conn) {
		die("Conection failed: " . mysqli_connect_error());
	}