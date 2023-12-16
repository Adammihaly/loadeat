<?php

function uidLetezik($conn, $name, $email, $lang) {
$sql = "SELECT * FROM vendeg_prof WHERE Felhasznalonev = ? OR Email = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
if ($lang == 'hu') {
	header("location: ../vregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'en') {
	header("location: ../en/vregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/vregisztracio?error=stmtfailed") ;
exit();
}

}

mysqli_stmt_bind_param($stmt, "ss", $name, $email);
mysqli_stmt_execute($stmt);

$eredmeny = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($eredmeny)) {
		return $row;
	}
	else
	{
		$erd = false;
		return $erd;

	}

	mysqli_stmt_close($stmt);
}



function uidLetezikTulaj($conn, $name, $email, $lang) {
$sql = "SELECT * FROM tulaj_prof WHERE Felhasznalonev = ? OR Email = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

if ($lang == 'hu') {
	header("location: ../tregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'en') {
	header("location: ../en/tregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/tregisztracio?error=stmtfailed") ;
exit();
}
}

mysqli_stmt_bind_param($stmt, "ss", $name, $email);
mysqli_stmt_execute($stmt);

$eredmeny = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($eredmeny)) {
		return $row;
	}
	else
	{
		$erd = false;
		return $erd;

	}

	mysqli_stmt_close($stmt);
}


function createUser($conn,  $id, $name, $email, $pwd, $ip, $verification_code, $lang) {
$sql = "INSERT INTO vendeg_prof (ID,Felhasznalonev, Email, Jelszo, IP, Hitelesito ) VALUES (?,?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
if ($lang == 'hu') {
	header("location: ../vregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'en') {
	header("location: ../en/vregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/vregisztracio?error=stmtfailed") ;
exit();
}

}

$pwdsecound = password_hash($pwd, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $email, $pwdsecound, $ip, $verification_code);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);


if ($lang == 'hu') {
	header("location: ../hitelesites?un=$name");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/hitelesites?un=$name");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/hitelesites?un=$name");
		exit();
}
	
}



function createUserTulaj($conn,  $id, $name, $email, $pwd, $ip, $verification_code, $lang) {
$sql = "INSERT INTO tulaj_prof (ID,Felhasznalonev, Email, Jelszo, IP, Hitelesito ) VALUES (?,?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
if ($lang == 'hu') {
	header("location: ../vregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'en') {
	header("location: ../en/vregisztracio?error=stmtfailed") ;
exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/vregisztracio?error=stmtfailed") ;
exit();
}
}

$pwdsecound = password_hash($pwd, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "ssssss", $id, $name, $email, $pwdsecound, $ip, $verification_code);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

if ($lang == 'hu') {
	header("location: ../hitelesites?un=$name");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/hitelesites?un=$name");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/hitelesites?un=$name");
		exit();
}
	
}



function loginUser($conn, $name, $pwd, $lang)
{

	$uidLetezik = uidLetezik($conn, $name, $name, $lang);

	if ($uidLetezik === false) {
		if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=wronguser") ;
		exit();
}
	}

	$pwdHashed = $uidLetezik["Jelszo"];
	$check = password_verify($pwd, $pwdHashed);

	if ($check === false) {
				if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=wronguser") ;
		exit();
}
	}
	else if ($check === true)
	{

		session_start();
		$_SESSION['ID'] = $uidLetezik["ID"];
		$_SESSION['Felhasznalonev'] = $uidLetezik["Felhasznalonev"];


if ($lang == 'hu') {
	header("location: ../kezelopultv") ;
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/kezelopultv") ;
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/kezelopultv") ;
		exit();
}

	}

}



function loginUserTulaj($conn, $name, $pwd, $lang)
{

	$uidLetezik = uidLetezikTulaj($conn, $name, $name, $lang);

	if ($uidLetezik === false) {
		if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=wronguser") ;
		exit();
}
	}

	$pwdHashed = $uidLetezik["Jelszo"];
	$check = password_verify($pwd, $pwdHashed);

	if ($check === false) {
		if ($lang == 'hu') {
	header("location: ../bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes?error=wronguser") ;
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes?error=wronguser") ;
		exit();
}
	}
	else if ($check === true)
	{

		session_start();
		$_SESSION['ID'] = $uidLetezik["ID"];
		$_SESSION['Felhasznalonev'] = $uidLetezik["Felhasznalonev"];


if ($lang == 'hu') {
	header("location: ../kezelopultt") ;
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/kezelopultt") ;
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/kezelopultt") ;
		exit();
}
	}

}



function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  



function legalInput($ertek)
{
	$ertek = trim($ertek);
	$ertek = stripslashes($ertek);
	$ertek = htmlspecialchars($ertek);
	return $ertek;
}


function spec_del($string) {
   $string = preg_replace("/[^a-zA-Z0-9éáűúőóüöíÉÁŰÚŐÓÜÖÍ\s\.\_\n\!\?\:\#\@\+\,]/", " ", $string);
   return $string;
}


function szures($string) {
  $sql_szo_lista = array("SELECT", "INSERT", "UPDATE", "DELETE", "FROM", "WHERE", "DROP", "CREATE", "TABLE", "ALTER", "GRANT", "EXECUTE");

 
  foreach ($sql_szo_lista as $sql_szo) {
    if (stripos($string, $sql_szo) !== false) {
      
      header("Location: https://loadeat.com?error=fwd");
      exit();
    }
  }

  
  return $string;
}


function vedelem($string)
{

	$sql_szo_lista = array("SELECT", "INSERT", "UPDATE", "DELETE", "FROM", "WHERE", "DROP", "CREATE", "TABLE", "ALTER", "GRANT", "EXECUTE"); 
  foreach ($sql_szo_lista as $sql_szo) {
    if (stripos($string, $sql_szo) !== false) {
      
      header("Location: https://loadeat.com?error=fwd");
      exit();
    }
  }  

  $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  $string = strip_tags($string);


  return $string;
}