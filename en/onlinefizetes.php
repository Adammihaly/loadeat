<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Payment</title>
	<link rel="stylesheet" type="text/css" href="../css/onlinefizetes.css">
</head>
<body>

	<?php


	require_once '../php/conn.php';

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
	<h1>Online Payment</h1>
	<p>Dear Client! Please pay the specified amount to the following account number:
       <br><br><b>Amount: <?php echo "$vegosszeg $penznemk"; ?></b>
       <br><br><b>Account number: HU73 1040 3923 5052 7070 8871 1005</b>
       <br><b>Address and bank: H-8617 Kőröshegy Dózsa utca 28 F</b>
       <br><br>
       <span class="fontos"><b>IMPORTANT!</b><br> The following booking ID must be attached during payment: <br><b><?php echo "$foglalasAzonosito"; ?><br></b> If no identifier is attached, we cannot identify the payment. <br>Thank You!</span>
	</p>
	<a href="https://loadeat.com">I payed!</a>
</div>



</body>
</html>