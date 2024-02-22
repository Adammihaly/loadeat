<?php

if (isset($_POST['sub'])) {
	
	require_once 'functions.inc.php';

	$name = $_POST['felhasznalonev'];
	$pwd = $_POST['pwd'];
	$falyta = $_POST['tipus'];
	$lang = $_POST['lang'];
	

		require_once 'functions.inc.php';
		
		
		$name = szures($name);		// adatbázis parancsok szűrése
		$pwd = szures($pwd);		// adatbázis parancsok szűrése
		$name = spec_del($name);    // speciális karakterek átírása


	require_once 'conn.php';



	if($falyta == 'vendeg') {
		
$sql = "SELECT Hitelesitve FROM vendeg_prof WHERE Felhasznalonev = '$name' OR Email = '$name';";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {

		$adatbaziskod = $row['Hitelesitve'];
	}

	if ($adatbaziskod == 1) {
		loginUser($conn, $name, $pwd, $lang);
	}
	else
	{
		if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=nover");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=nover");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=nover");
		exit();
}
	}
	

}
else if($falyta == 'tulaj') {
		
$sql = "SELECT Hitelesitve FROM tulaj_prof WHERE Felhasznalonev = '$name' OR Email = '$name';";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {

		$adatbaziskod = $row['Hitelesitve'];
	}

	if ($adatbaziskod == 1) {
		loginUserTulaj($conn, $name, $pwd, $lang);
	}
	else
	{
		if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=nover");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=nover");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=nover");
		exit();
}
	}
	

}

}

else
{
	if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=problem");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=problem");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=problem");
		exit();
}
}