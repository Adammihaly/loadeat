<?php

	session_start();
	if (!isset($_SESSION['ID'])) {
		header("Location: ../bejelentkezes");
	}
	else
	{
		$ProfilID = $_SESSION['ID'];
	}

	require_once 'conn.php';

	$sql = "SELECT * FROM etterem WHERE profID = $ProfilID";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
	
	$menuID = $row['menuID'];

	}

	if (isset($_POST['subnev'])) {
		
		$nev = $_POST['nev'];

		$sql = "UPDATE etterem SET tulajdonosNev = '$nev' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);


	}

	if (isset($_POST['subigaz'])) {
		
		$igazolvany = $_POST['igazolvanyszam'];

		$sql = "UPDATE etterem SET igazolvanyazonosito = '$igazolvany' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

	header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subszuldat'])) {
		
		$dat = $_POST['szuldatum'];

		$sql = "UPDATE etterem SET megye = '$dat' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subtel'])) {
		
		$tel = $_POST['tel'];

		$sql = "UPDATE etterem SET telefon = '$tel' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subcim'])) {
		
		$cim = $_POST['cim'];

		$sql = "UPDATE etterem SET tulajcim = '$cim' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subiban'])) {
		
		$iban = $_POST['iban'];

		$sql = "UPDATE etterem SET iban = '$iban' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subetteremnev'])) {
		
		$nev = $_POST['etteremnev'];

		$sql = "UPDATE etterem SET etteremnev = '$nev' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['suborszag'])) {
		
		$orszag = $_POST['orszag'];

		$sql = "UPDATE etterem SET orszag = '$orszag' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subtelep'])) {
		
		$telepules = $_POST['telepules'];

		$sql = "UPDATE etterem SET telepules = '$telepules' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subetcim'])) {
		
		$cim = $_POST['utcahazszam'];

		$sql = "UPDATE etterem SET cim = '$cim' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subfizetes'])) {
		
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

		$sql = "UPDATE etterem SET helykeszpenz = '$kezpenzFizetes', helykartya = '$kartyaFizetes' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['subetleiras'])) {
		
		$leiras = $_POST['bemutatas'];

		$sql = "UPDATE etterem SET etteremleiras = '$leiras' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu1nev'])) {
		
		$menunev = $_POST['elsomenunev'];

		$sql = "UPDATE menuk SET menu1_nev = '$menunev' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu1tart'])) {
		
		$tartalom = $_POST['elsomenutartalom'];

		$sql = "UPDATE menuk SET menu1_tartalom = '$tartalom' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu1areur'])) {
		
		$ar = $_POST['elsomenuareur'];

		$sql = "UPDATE menuk SET menu1_areur = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu1arhuf'])) {
		
		$ar = $_POST['elsomenuarhuf'];

		$sql = "UPDATE menuk SET menu1_arhuf = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu1arrsd'])) {
		
		$ar = $_POST['elsomenuarrsd'];

		$sql = "UPDATE menuk SET menu1_arrsd = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu2nev'])) {
		
		$menunev = $_POST['masodikmenunev'];

		$sql = "UPDATE menuk SET menu2_nev = '$menunev' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu2tart'])) {
		
		$tartalom = $_POST['masodikmenutartalom'];

		$sql = "UPDATE menuk SET menu2_tartalom = '$tartalom' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu2areur'])) {
		
		$ar = $_POST['masodikmenuareur'];

		$sql = "UPDATE menuk SET menu2_areur = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu2arhuf'])) {
		
		$ar = $_POST['masodikmenuarhuf'];

		$sql = "UPDATE menuk SET menu2_arhuf = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu2arrsd'])) {
		
		$ar = $_POST['masodikmenuarrsd'];

		$sql = "UPDATE menuk SET menu2_arrsd = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu3nev'])) {
		
		$menunev = $_POST['harmadikmenunev'];

		$sql = "UPDATE menuk SET menu3_nev = '$menunev' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu3tart'])) {
		
		$tartalom = $_POST['harmadikmenutartalom'];

		$sql = "UPDATE menuk SET menu3_tartalom = '$tartalom' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);

	}

	if (isset($_POST['submenu3areur'])) {
		
		$ar = $_POST['harmadikmenuareur'];

		$sql = "UPDATE menuk SET menu3_areur = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu3arhuf'])) {
		
		$ar = $_POST['harmadikmenuarhuf'];

		$sql = "UPDATE menuk SET menu3_arhuf = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

	if (isset($_POST['submenu3arrsd'])) {
		
		$ar = $_POST['harmadikmenuarrsd'];

		$sql = "UPDATE menuk SET menu3_arrsd = '$ar' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}





	if (isset($_POST['subetkepek'])) {
		
		
		$sqlSelectImages = "SELECT * FROM etterem WHERE profID = $ProfilID";
$result = $conn->query($sqlSelectImages);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageNames = $row['etteremkepek'];

    if ($imageNames) {
        // Képek neveinek szétválasztása vesszők alapján
        $imageNamesArray = explode(',', $imageNames);

        // Képek törlése a "files" mappából
        $filesDirectory = "../files/";
        foreach ($imageNamesArray as $imageName) {
            $filePath = $filesDirectory . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Az adatbázisból való törlés
        $sqlDeleteImages = "UPDATE etterem SET etteremkepek = NULL WHERE profID = $ProfilID";
        if ($conn->query($sqlDeleteImages) === TRUE) {
            
        } else {
            
        }
    } else {
        
    }
} else {
    
}

$kepekEtterem = '';

		if(isset($_FILES['kepek']['name']) && is_array($_FILES['kepek']['name'])) {
    $fileCount = count($_FILES['kepek']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
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
            				echo "Hibás fájlkiterjesztés: $imageName<br>";
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				echo "Túl nagy fájlméret: $imageName<br>";
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



		$sql = "UPDATE etterem SET etteremkepek = '$kepekEtterem' WHERE profID = $ProfilID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}


	if (isset($_POST['submenu3kepek'])) {
		
		
		$sqlSelectImages = "SELECT * FROM menuk WHERE menuID = $menuID";
$result = $conn->query($sqlSelectImages);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageNames = $row['menu3_kepek'];

    if ($imageNames) {
        // Képek neveinek szétválasztása vesszők alapján
        $imageNamesArray = explode(',', $imageNames);

        // Képek törlése a "files" mappából
        $filesDirectory = "../files/";
        foreach ($imageNamesArray as $imageName) {
            $filePath = $filesDirectory . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Az adatbázisból való törlés
        $sqlDeleteImages = "UPDATE menuk SET menu3_kepek = NULL WHERE menuID = $menuID";
        if ($conn->query($sqlDeleteImages) === TRUE) {
            
        } else {
            
        }
    } else {
        
    }
} else {
    
}

$kepekEtterem = '';

		if(isset($_FILES['kepek']['name']) && is_array($_FILES['kepek']['name'])) {
    $fileCount = count($_FILES['kepek']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
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
            				echo "Hibás fájlkiterjesztés: $imageName<br>";
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				echo "Túl nagy fájlméret: $imageName<br>";
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



		$sql = "UPDATE menuk SET menu3_kepek = '$kepekEtterem' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}


		if (isset($_POST['submenu2kepek'])) {
		
		
		$sqlSelectImages = "SELECT * FROM menuk WHERE menuID = $menuID";
$result = $conn->query($sqlSelectImages);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageNames = $row['menu2_kepek'];

    if ($imageNames) {
        // Képek neveinek szétválasztása vesszők alapján
        $imageNamesArray = explode(',', $imageNames);

        // Képek törlése a "files" mappából
        $filesDirectory = "../files/";
        foreach ($imageNamesArray as $imageName) {
            $filePath = $filesDirectory . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Az adatbázisból való törlés
        $sqlDeleteImages = "UPDATE menuk SET menu2_kepek = NULL WHERE menuID = $menuID";
        if ($conn->query($sqlDeleteImages) === TRUE) {
            
        } else {
            
        }
    } else {
        
    }
} else {
    
}

$kepekEtterem = '';

		if(isset($_FILES['kepek']['name']) && is_array($_FILES['kepek']['name'])) {
    $fileCount = count($_FILES['kepek']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
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
            				echo "Hibás fájlkiterjesztés: $imageName<br>";
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				echo "Túl nagy fájlméret: $imageName<br>";
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



		$sql = "UPDATE menuk SET menu2_kepek = '$kepekEtterem' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}

		if (isset($_POST['submenu1kepek'])) {
		
		
		$sqlSelectImages = "SELECT * FROM menuk WHERE menuID = $menuID";
$result = $conn->query($sqlSelectImages);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageNames = $row['menu1_kepek'];

    if ($imageNames) {
        // Képek neveinek szétválasztása vesszők alapján
        $imageNamesArray = explode(',', $imageNames);

        // Képek törlése a "files" mappából
        $filesDirectory = "../files/";
        foreach ($imageNamesArray as $imageName) {
            $filePath = $filesDirectory . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Az adatbázisból való törlés
        $sqlDeleteImages = "UPDATE menuk SET menu1_kepek = NULL WHERE menuID = $menuID";
        if ($conn->query($sqlDeleteImages) === TRUE) {
            
        } else {
            
        }
    } else {
        
    }
} else {
    
}

$kepekEtterem = '';

		if(isset($_FILES['kepek']['name']) && is_array($_FILES['kepek']['name'])) {
    $fileCount = count($_FILES['kepek']['name']);
    
    	if($fileCount > 5) {
    	header("Location: " . $_SERVER['HTTP_REFERER']);
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
            				echo "Hibás fájlkiterjesztés: $imageName<br>";
        				} 
        				elseif ($fileSize > $maxFileSize) {
            				echo "Túl nagy fájlméret: $imageName<br>";
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



		$sql = "UPDATE menuk SET menu1_kepek = '$kepekEtterem' WHERE menuID = $menuID";
		$result = $conn->query($sql);

		header("Location: " . $_SERVER['HTTP_REFERER']);
	}