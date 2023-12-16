<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Fizetés</title>
	<link rel="stylesheet" type="text/css" href="css/onlinefizetes.css">
</head>
<body>

	<?php


	require_once 'php/conn.php';

if (isset($_GET['fa'])) {
        $foglalasAzonosito = $_GET['fa'];
    }


$sql = "SELECT * FROM foglalasok WHERE foglalasID = $foglalasAzonosito";
      $result = $conn->query($sql);
   while ($row = $result->fetch_assoc()) {

      $etteremID = $row['etteremID'];
      $elsomenu = $row['elsomenu'];
      $masodikmenu = $row['masodikmenu'];
      $harmadikmenu = $row['harmadikmenu'];
      $penznem = $row['penznem'];
      
   }

   $sql = "SELECT * FROM etterem WHERE ID = $etteremID";
		$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {

		$menuID = $row['menuID'];

	}

	$sql = "SELECT * FROM menuk WHERE menuID = $menuID";
		$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {

		$menu1nev = $row['menu1_nev'];
		$menu2nev = $row['menu2_nev']; 
		$menu3nev = $row['menu3_nev']; 

		$menu1arhuf = $row['menu1_arhuf']; 
		$menu2arhuf = $row['menu2_arhuf']; 
		$menu3arhuf = $row['menu3_arhuf']; 

		$menu1areur = $row['menu1_areur']; 
		$menu2areur = $row['menu2_areur']; 
		$menu3areur = $row['menu3_areur'];

		$menu1arrsd = $row['menu1_arrsd'];
		$menu2arrsd = $row['menu2_arrsd']; 
		$menu3arrsd = $row['menu3_arrsd'];  
 
	}

	$vegosszeg = 0;
	$penznemk = '';


		if ($penznem == 'huf') { 
			$vegosszeg = ($elsomenu*$menu1arhuf) + ($masodikmenu*$menu2arhuf) + ($harmadikmenu*$menu3arhuf);
			$penznemk = 'Ft';
		}
		else if ($penznem == 'eur') {
			$vegosszeg = ($elsomenu*$menu1areur) + ($masodikmenu*$menu2areur) + ($harmadikmenu*$menu3areur);
			$penznemk = 'EUR';
		}
		else if ($penznem == 'rsd') {
			$vegosszeg = ($elsomenu*$menu1arrsd) + ($masodikmenu*$menu2arrsd) + ($harmadikmenu*$menu3arrsd);
			$penznemk = 'RSD';
		}


?>


<div class="conn">
	<h1>Online Fizetés</h1>
	<p>Kedves ügyfelünk! Kérünk, hogy a következő számlaszámra fizesd ki a megadott összeget:
       <br><br><b>Összeg: <?php echo "$vegosszeg $penznemk"; ?></b>
       <br><br><b>Számlaszám: HU73 1040 3923 5052 7070 8871 1005</b>
       <br><b>Cím és bank: H-8617 Kőröshegy Dózsa utca 28 F</b>
       <br><br>
       <span class="fontos"><b>FONTOS!</b><br> A kifizetés folyamán csatolni kell a következő foglalási azonosítót: <br><b><?php echo "$foglalasAzonosito"; ?><br></b> Ha nincs csatolt azonosító, abban az esetben nem tudjuk azonosítani a fizetésed. <br>Köszönjük!</span>
	</p>
	<a href="https://loadeat.com">Fizettem!</a>
</div>



</body>
</html>