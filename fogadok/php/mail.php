<?php

if (isset($_POST['submit'])) {
	

	$name = $_POST['fnev'];
	$kod = $_POST['kod'];
	$lang = $_POST['lang'];
	
	require_once 'conn.php';
	require_once 'functions.inc.php';


    $kod = szures($kod);		// adatbázis parancsok szűrése
	$kod = spec_del($kod);    // speciális karakterek átírása


	$sql = "SELECT Hitelesito FROM vendeg_prof WHERE Felhasznalonev = '$name';";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {

		$adatbaziskod = $row['Hitelesito'];
	}

	$sql = "SELECT Hitelesito FROM tulaj_prof WHERE Felhasznalonev = '$name';";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {

		$adatbaziskodketto = $row['Hitelesito'];
	}

	$szam = 1;

	if ($adatbaziskod == $kod) {
		$sql2 = "UPDATE vendeg_prof SET Hitelesitve = '$szam' WHERE Felhasznalonev = '$name';";
		mysqli_query($conn, $sql2);

		if ($lang == 'hu') {
	header("location: ../sikeresregisztracio");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/sikeresregisztracio");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/sikeresregisztracio");
		exit();
}

	}
	else if($adatbaziskodketto == $kod)
	{
		$sql2 = "UPDATE tulaj_prof SET Hitelesitve = '$szam' WHERE Felhasznalonev = '$name';";
		mysqli_query($conn, $sql2);
		
				if ($lang == 'hu') {
	header("location: ../sikeresregisztracio");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/sikeresregisztracio");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/sikeresregisztracio");
		exit();
}
	}
	else
	{

				if ($lang == 'hu') {
	header("location: ../hitelesites?un=$name&error=error");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/hitelesites?un=$name&error=error");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/hitelesites?un=$name&error=error");
		exit();
}
	}
}