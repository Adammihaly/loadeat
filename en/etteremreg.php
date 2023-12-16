<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loadeat • Add restaurant</title>
	<link rel="stylesheet" type="text/css" href="../css/profilmodositas.css">
	<link rel="stylesheet" type="text/css" href="../css/etthoz.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>


<?php

session_start();
if (!isset($_SESSION['ID'])) {
	header("Location: bejelentkezes");
	exit();
}


if (isset($_GET['error'])) {
	$error = $_GET['error'];
		if ($error == 'filecount') {
			echo "<script type='text/javascript'>alert('Incorrect data. You have uploaded more files than allowed. We also ask that the number of uploaded images does not exceed 5 per field.')</script>";
		}
		else if ($error == 'wrongfile') {
			echo "<script type='text/javascript'>alert('Hibás adatok. A feltöltött képek között rendszerünk talált olyanokat, melyek formátuma nem engedélyezett az oldalon. Kérjük ragaszkodj a következő formátumokhoz: jpg, jpeg, png, webp')</script>";
		}
		else if ($error == 'filesize') {
			echo "<script type='text/javascript'>alert('Hibás adatok. A feltöltött képek között rendszerünk talált olyanokat, melyek mérete meghaladja az általunk megadott maximumot, mely 7 Megabyte.')</script>";
		}
}


?>


<a href="kezelopultt" class="vissza" title="Vissza"><i class="bi bi-caret-left"></i></a>


<div class="conntent">
	<h1>Add restaurant</h1>
	<br>
	<img src="../img/tulaj.png" alt="icon" class="icon">
	<h2>Restaurant owner's details</h2>
	<form method="POST" action="../php/addrestoran.php"  onsubmit="return validateForm()" enctype="multipart/form-data">
		
		<label>Full Name/Business Name</label><br>
		<input type="text" name="nev" placeholder="Name" required><br>
		<label>Tax number</label><br>
		<input type="text" name="igazolvanyszam" placeholder="Tax number" required><br>
		<label>Birth Date</label><br>
<input type="date" name="szuldatum" id="szuldatum" required="required"><br>
		<label>TPhone number</label><br>
		<input type="tel" name="tel" placeholder="Phone number" required><br>
		<label>Address (Country, Location, Street and House number)</label><br>
		<input type="text" name="cim" placeholder="Country, Location, Street and House number" required><br>
		<label>IBAN account number</label><br>
		<input type="text" name="szamla" placeholder="Ex: HU42 1177 3058 9984 0000 0000" required><br>
		<p>Why do I need to provide this?<br> If you choose the Online payment option for guest reservations, you will get 
the money on this account number in the 24 hours following the reservation.
Third parties cannot access this confidential data.</p><br>
		<img src="../img/ett.png" alt="icon" class="icon fi">
	<h2>Apartment restaurant details</h2>
		<label>The restaurant's name</label><br>
		<input type="text" name="etteremnev" placeholder="Name" required><br>
		<label>The restaurant's country</label><br>
		<input type="text" name="orszag" placeholder="Ex: Hungary" required><br>
		<label>Name of the restaurant's settlement</label><br>
		<input type="text" name="telepules" placeholder="Ex: Eger" required><br>
		<label>Street and House number</label><br>
		<input type="text" name="utcahazszam" placeholder="Street and House number" required><br>
		<label>Payment options in your restaurant</label><br><br>
		<input type="checkbox" name="keszpenz" class="nomarg"> <span>Cash payment on the spot</span><br>
		<input type="checkbox" name="kartya" class="nomarg"> <span>Card payment on the spot</span><br><br><br>
		<p>What about Online payment?<br> Online payment CAN NOT be turned off, so this function is automatically activated for every apartment restaurant. 
In case this causes problems for you, please contact our customer service.</p><br><br>
		<label>Photos of restaurant (maximum 5)</label><br>
		<input type="file" id="fileInput" name="kepek[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required><br>
		<label>Meal Times</label><br><br>
<p>Meal times can not be chosen on our site. Default times:<br>11:30 - 13:00<br>13:30 - 15:00<br>15:30 - 17:00<br>17:30 - 19:00<br>19:30 - 21:00<br>If the restaurant doesn't operate on a given day, a "closed" status can be set later on. This status may apply for a whole day, or even just for the time of a lunch or supper.</p><br>
<label>Restaurant description</label><br>
		<textarea type="text" class="tb" name="bemutatas" placeholder="Introduce your apartment restaurant" maxlength="1000" required></textarea><br>
	<img src="../img/menu.png" alt="icon" class="icon fi">
	<h2>Add Menus</h2>
	<label>Name of first menu</label><br>
		<input type="text" name="elsomenunev" placeholder="Name of menu" required><br>
		<label>Contents and description of first menu</label><br>
		<textarea type="text" class="tb" name="elsomenutartalom" placeholder="Contents and description of menu" maxlength="2000" required></textarea><br>
		<label>Price of first menu in Euros (Global)</label><br>
		<input type="number" name="elsomenuareur" placeholder="X EUR" required><br>
		<label>Price of first menu in Forints (Hungary)</label><br>
		<input type="number" name="elsomenuarhuf" placeholder="X HUF" required><br>
		<label>Price of first menu in Dinars (Serbia)</label><br>
		<input type="number" name="elsomenuarrsd" placeholder="X RSD" required><br>
		<p>IMPORTANT!<br>  It is the duty of the restaurant owner to count in the 12% fee that the site charges after each reservation i.e. meal.
Upon Online payment, this is automatically subtracted, however we spend subsequent bills from this sum in the case of on the spot paying.</p><br><br>
		<label>Pictures of first menu (maximum 5)</label><br>
		<input type="file" id="fileInput" name="kepekMenu1[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required>

		<div class="menuelvalaszto">•</div>

		<label>Name of second menu</label><br>
		<input type="text" name="masodikmenunev" placeholder="Name of menu" required><br>
		<label>Contents and description of second menu</label><br>
		<textarea type="text" class="tb" name="masodikmenutartalom" placeholder="Contents and description of menu" maxlength="2000" required></textarea><br>
		<label>Price of second menu in Euros (Global)</label><br>
		<input type="number" name="masodikmenuareur" placeholder="X EUR" required><br>
		<label>Price of second menu in Forints (Hungary)</label><br>
		<input type="number" name="masodikmenuarhuf" placeholder="X HUF" required><br>
		<label>Price of second menu in Dinars (Serbia)</label><br>
		<input type="number" name="masodikmenuarrsd" placeholder="X RSD" required><br>
		<p>IMPORTANT!<br> It is the duty of the restaurant owner to count in the 12% fee that the site charges after each reservation i.e. meal.
Upon Online payment, this is automatically subtracted, however we spend subsequent bills from this sum in the case of on the spot paying.</p><br><br>
		<label>Pictures of third menu (maximum 5)</label><br>
		<input type="file" id="fileInput" name="kepekMenu2[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required>

		<div class="menuelvalaszto">•</div>

		<label>Name of third menu</label><br>
		<input type="text" name="harmadikmenunev" placeholder="Name of menu" required><br>
		<label>Contents and description of third menu</label><br>
		<textarea type="text" class="tb" name="harmadikmenutartalom" placeholder="Contents and description of menu" maxlength="2000" required></textarea><br>
		<label>Price of third menu in Euros (Global)</label><br>
		<input type="number" name="harmadikmenuareur" placeholder="X EUR" required><br>
		<label>Price of third menu in Forints (Hungary)</label><br>
		<input type="number" name="harmadikmenuarhuf" placeholder="X HUF" required><br>
		<label>Price of third menu in Dinars (Serbia)</label><br>
		<input type="number" name="harmadikmenuarrsd" placeholder="X RSD" required><br>
		<p>IMPORTANT!<br>It is the duty of the restaurant owner to count in the 12% fee that the site charges after each reservation i.e. meal.
Upon Online payment, this is automatically subtracted, however we spend subsequent bills from this sum in the case of on the spot paying.</p><br><br>
		<label>Pictures of third menu (maximum 5)</label><br>
		<input type="file" id="fileInput" name="kepekMenu3[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required><br><br><br>
		<input type="hidden" name="lang" value="en">

		<button name="submit">Add</button>
	</form>
</div>

<script>
        function validateForm() {
            var fileInput = document.getElementById('fileInput');
            var files = fileInput.files;
            
            if (files.length > 5) {
                alert('You can choose up to 5 pictures of the restaurant. Please use our site according to the instructions.');
                return false;
            }
            
            return true;
        }
    </script>

    <script>
  document.getElementById('szuldatum').addEventListener('input', function() {
    var year = this.value.split('-')[0];
    if (year.length !== 4) {
      this.setCustomValidity('The year field must contain exactly four digits.');
    } else {
      this.setCustomValidity('');
    }
  });
</script>

</body>
</html>