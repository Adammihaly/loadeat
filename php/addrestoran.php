<?php

error_reporting(0);
ini_set('display_errors', 0);

if (isset($_POST['submit'])) {
	
	session_start();
if(!isset($_SESSION['ID']))
{
    header("Location: ../bejelentkezes");
    exit();
}
else
{
    $ProfilID = $_SESSION['ID'];
    $Felhasznalonev = $_SESSION['Felhasznalonev'];
}

	require_once'conn.php';
	require_once'functions.inc.php';

	$lang = $_POST['lang'];
	$ID = rand(1000, 100000);
	$tulajNev = vedelem($_POST['nev']);	
	$igazolvanyAzon = vedelem($_POST['igazolvanyszam']);
	$szulDatum = vedelem($_POST['szuldatum']);
	$telefon = vedelem($_POST['tel']);
	$cim = vedelem($_POST['cim']);
	$iban = vedelem($_POST['szamla']);

	$etteremNev = vedelem($_POST['etteremnev']);
	$etteremOrszag = vedelem($_POST['orszag']);
	$etteremTelepules = vedelem($_POST['telepules']);
	$etteremHazszam = vedelem($_POST['utcahazszam']);
	$onlineFizetes = 1;
	$type = 'e';

	if (isset($_POST['keszpenz'])) {
		$kezpenzFizetes = 1;
	}
	else
	{
		$kezpenzFizetes = 0;
	}

	if (isset($_POST['kartya'])) {
		$kartyaFizetes = 1;
	}
	else
	{
		$kartyaFizetes = 0;
	}

	$kepekEtterem = '';

	if(isset($_FILES['kepek']['name']) && is_array($_FILES['kepek']['name'])) {
    $fileCount = count($_FILES['kepek']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filecount");
		exit();
    	}
    	else
    	{
    		$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    		$maxFileSize = 7 * 1024 * 1024; // 7 Megabyte
    
    			foreach ($_FILES['kepek']['name'] as $key => $imageName) {
       				$tempFileName = $_FILES['kepek']['tmp_name'][$key];
        			$fileSize = $_FILES['kepek']['size'][$key];
        			$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
        				if (!in_array($fileExtension, $allowedExtensions)) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=wrongfile");
							exit();
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filesize");
							exit();
        				} 
        				else {
            				// A kép megfelel a követelményeknek, itt feldolgozhatod vagy elmentheted a képet.
            				$fileError = $_FILES['kepek']['error'][$key];
            					if ($fileError == 0) {
                					$fileNewName = uniqid('', true) . ".webp";
                					$fileDestination = '../files/' . pathinfo($fileNewName, PATHINFO_FILENAME) . '.webp';

                						if ($fileExtension !== 'webp') {
                   							$image = imagecreatefromstring(file_get_contents($tempFileName));
                   							imagewebp($image, $fileDestination);
                    						imagedestroy($image);
                						}
                						move_uploaded_file($tempFileName, $fileDestination);               
               							$kepekEtterem = $kepekEtterem . $fileNewName . ',';
        						}
    						}
    			}
    	}
    }

    $etteremBemutatas = vedelem($_POST['bemutatas']);
    $menuID = rand(1000, 100000);


    $elsoMenuNev = vedelem($_POST['elsomenunev']);
    $elsoMenuTartalom = vedelem($_POST['elsomenutartalom']);
    $elsoMenuarEur = vedelem($_POST['elsomenuareur']);
    $elsoMenuarHuf = vedelem($_POST['elsomenuarhuf']);
    $elsoMenuarRsd = vedelem($_POST['elsomenuarrsd']);


    $kepekMenu1 = '';

    	if(isset($_FILES['kepekMenu1']['name']) && is_array($_FILES['kepekMenu1']['name'])) {
    $fileCount = count($_FILES['kepekMenu1']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
    	}
    	else
    	{
    		$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    		$maxFileSize = 7 * 1024 * 1024; // 7 Megabyte
    
    			foreach ($_FILES['kepekMenu1']['name'] as $key => $imageName) {
       				$tempFileName = $_FILES['kepekMenu1']['tmp_name'][$key];
        			$fileSize = $_FILES['kepekMenu1']['size'][$key];
        			$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
        				if (!in_array($fileExtension, $allowedExtensions)) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=wrongfile");
							exit();
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filesize");
							exit();
        				} 
        				else {
            				// A kép megfelel a követelményeknek, itt feldolgozhatod vagy elmentheted a képet.
            				$fileError = $_FILES['kepekMenu1']['error'][$key];
            					if ($fileError == 0) {
                					$fileNewName = uniqid('', true) . ".webp";
                					$fileDestination = '../files/' . pathinfo($fileNewName, PATHINFO_FILENAME) . '.webp';

                						if ($fileExtension !== 'webp') {
                   							$image = imagecreatefromstring(file_get_contents($tempFileName));
                   							imagewebp($image, $fileDestination);
                    						imagedestroy($image);
                						}
                						move_uploaded_file($tempFileName, $fileDestination);               
               							$kepekMenu1 = $kepekMenu1 . $fileNewName . ',';
        						}
    						}
    			}
    	}
    }



    $masodikMenuNev = vedelem($_POST['masodikmenunev']);
    $masodikMenuTartalom = vedelem($_POST['masodikmenutartalom']);
    $masodikMenuarEur = vedelem($_POST['masodikmenuareur']);
    $masodikMenuarHuf = vedelem($_POST['masodikmenuarhuf']);
    $masodikMenuarRsd = vedelem($_POST['masodikmenuarrsd']);


    $kepekMenu2 = '';

    if(isset($_FILES['kepekMenu2']['name']) && is_array($_FILES['kepekMenu2']['name'])) {
    $fileCount = count($_FILES['kepekMenu2']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
    	}
    	else
    	{
    		$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', ''];
    		$maxFileSize = 7 * 1024 * 1024; // 7 Megabyte
    
    			foreach ($_FILES['kepekMenu2']['name'] as $key => $imageName) {
       				$tempFileName = $_FILES['kepekMenu2']['tmp_name'][$key];
        			$fileSize = $_FILES['kepekMenu2']['size'][$key];
        			$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
        				if (!in_array($fileExtension, $allowedExtensions)) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=wrongfile");
							exit();
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filesize");
							exit();
        				} 
        				else {
            				// A kép megfelel a követelményeknek, itt feldolgozhatod vagy elmentheted a képet.
            				$fileError = $_FILES['kepekMenu2']['error'][$key];
            					if ($fileError == 0) {
                					$fileNewName = uniqid('', true) . ".webp";
                					$fileDestination = '../files/' . pathinfo($fileNewName, PATHINFO_FILENAME) . '.webp';

                						if ($fileExtension !== 'webp') {
                   							$image = imagecreatefromstring(file_get_contents($tempFileName));
                   							imagewebp($image, $fileDestination);
                    						imagedestroy($image);
                						}
                						move_uploaded_file($tempFileName, $fileDestination);               
               							$kepekMenu2 = $kepekMenu2 . $fileNewName . ',';
        						}
    						}
    			}
    	}
    }



    $harmadikMenuNev = vedelem($_POST['harmadikmenunev']);
    $harmadikMenuTartalom = vedelem($_POST['harmadikmenutartalom']);
    $harmadikMenuarEur = vedelem($_POST['harmadikmenuareur']);
    $harmadikMenuarHuf = vedelem($_POST['harmadikmenuarhuf']);
    $harmadikMenuarRsd = vedelem($_POST['harmadikmenuarrsd']);


    $kepekMenu3 = '';

    if(isset($_FILES['kepekMenu3']['name']) && is_array($_FILES['kepekMenu3']['name'])) {
    $fileCount = count($_FILES['kepekMenu3']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
    	}
    	else
    	{
    		$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', ''];
    		$maxFileSize = 7 * 1024 * 1024; // 7 Megabyte
    
    			foreach ($_FILES['kepekMenu3']['name'] as $key => $imageName) {
       				$tempFileName = $_FILES['kepekMenu3']['tmp_name'][$key];
        			$fileSize = $_FILES['kepekMenu3']['size'][$key];
        			$fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        
        				if (!in_array($fileExtension, $allowedExtensions)) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=wrongfile");
							exit();
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				header("Location: " . $_SERVER['HTTP_REFERER'] ."?error=filesize");
							exit();
        				} 
        				else {
            				// A kép megfelel a követelményeknek, itt feldolgozhatod vagy elmentheted a képet.
            				$fileError = $_FILES['kepekMenu3']['error'][$key];
            					if ($fileError == 0) {
                					$fileNewName = uniqid('', true) . ".webp";
                					$fileDestination = '../files/' . pathinfo($fileNewName, PATHINFO_FILENAME) . '.webp';

                						if ($fileExtension !== 'webp') {
                   							$image = imagecreatefromstring(file_get_contents($tempFileName));
                   							imagewebp($image, $fileDestination);
                    						imagedestroy($image);
                						}
                						move_uploaded_file($tempFileName, $fileDestination);               
               							$kepekMenu3 = $kepekMenu3 . $fileNewName . ',';
        						}
    						}
    			}
    	}
    }




mysqli_set_charset($conn, "utf8");
    $sql = "INSERT INTO etterem (profID, ID, tulajdonosNev, igazolvanyazonosito, megye, telefon, tulajcim, iban, etteremnev, orszag, telepules, cim, onlinefizetes, helykeszpenz, helykartya, etteremkepek, etteremleiras, menuID, type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
}


mysqli_stmt_bind_param($stmt, "sssssssssssssssssss",$ProfilID, $ID, $tulajNev, $igazolvanyAzon, $szulDatum, $telefon, $cim, $iban, $etteremNev, $etteremOrszag, $etteremTelepules, $etteremHazszam, $onlineFizetes, $kezpenzFizetes, $kartyaFizetes, $kepekEtterem, $etteremBemutatas, $menuID, $type);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_set_charset($conn, "utf8");
    $sqll = "INSERT INTO menuk (menuID, menu1_nev, menu1_tartalom, menu1_areur, menu1_arhuf, menu1_arrsd, menu1_kepek, menu2_nev, menu2_tartalom, menu2_areur, menu2_arhuf, menu2_arrsd, menu2_kepek, menu3_nev,  	menu3_tartalom, menu3_areur, menu3_arhuf, menu3_arrsd, menu3_kepek) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
$stmtt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmtt, $sqll)) {
header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
}


mysqli_stmt_bind_param($stmtt, "sssssssssssssssssss", $menuID, $elsoMenuNev, $elsoMenuTartalom, $elsoMenuarEur, $elsoMenuarHuf, $elsoMenuarRsd, $kepekMenu1, $masodikMenuNev, $masodikMenuTartalom, $masodikMenuarEur, $masodikMenuarHuf, $masodikMenuarRsd, $kepekMenu2, $harmadikMenuNev, $harmadikMenuTartalom, $harmadikMenuarEur, $harmadikMenuarHuf, $harmadikMenuarRsd, $kepekMenu3);
mysqli_stmt_execute($stmtt);
mysqli_stmt_close($stmtt);

session_start();

$ProfilID = $_SESSION['ID'];
$egy = 1;

$sqlll = "UPDATE tulaj_prof SET etterem = '$egy', etteremID = '$ID' WHERE ID = $ProfilID";
		mysqli_query($conn, $sqlll);



		if ($lang == 'hu') {
	header("Location: ../kezelopultt?error=none");
exit();
}
else if ($lang == 'en') {
	header("Location: ../en/kezelopultt?error=none");
exit();
}
else if ($lang == 'rs') {
	header("Location: ../rs/kezelopultt?error=none");
exit();
}
   

}
else
{
	echo "error";
}