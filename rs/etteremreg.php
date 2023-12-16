<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loadeat • Dodaj restoran</title>
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
			echo "<script type='text/javascript'>alert('Hibás adatok. A megengedettnél több fájlt töltöttél fel. Kérünk ez útn is, hogy a feltöltött képek száma mezőnként ne haladja meg az 5 darabot.')</script>";
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
	<h1>Dodaj restoran</h1>
	<br>
	<img src="../img/tulaj.png" alt="icon" class="icon">
	<h2>Podaci vlasnika restorana</h2>
	<form method="POST" action="../php/addrestoran.php"  onsubmit="return validateForm()" enctype="multipart/form-data">
		
		<label>Puno ime/Poslovno ime</label><br>
		<input type="text" name="nev" placeholder="Ime" required><br>
		<label>Poreski broj</label><br>
		<input type="text" name="igazolvanyszam" placeholder="Poreski broj" required><br>
		<label>Okrug </label><br>
<input type="text" placeholder="Okrug" name="szuldatum" id="szuldatum" required="required"><br>
		<label>Telefonski broj</label><br>
		<input type="tel" name="tel" placeholder="Telefonski broj" required><br>
		<label>Adresa stanovanja (Država, mesto, ulica i broj)</label><br>
		<input type="text" name="cim" placeholder="Država, mesto, ulica i broj" required><br>
		<label>IBAN broj</label><br>
		<input type="text" name="szamla" placeholder="Npr.: RS35105008123123123173" required><br>
		<p>Zašto trebam ovaj podatak uneti?<br> Ako gost kod rezervacije izabere opciju online plaćanja, Vama će novac stići na ovaj račun u roku od 24
sata nakon rezervacije. Treće lice ne može pristupiti ovakvim poverljivim podacima.</p><br>
		<img src="../img/ett.png" alt="icon" class="icon fi">
	<h2>Podaci apartman restorana</h2>
		<label>Naziv restorana</label><br>
		<input type="text" name="etteremnev" placeholder="Naziv" required><br>
		<label>Država restorana</label><br>
		<input type="text" name="orszag" placeholder="Npr.: Srbija" required><br>
		<label>Naziv naselja restorana</label><br>
		<input type="text" name="telepules" placeholder="Npr.: Subotica" required><br>
		<label>Ulica i broj</label><br>
		<input type="text" name="utcahazszam" placeholder="Ulica i broj" required><br>
		<label>Opcije plaćanja u vašem restoranu</label><br><br>
		<input type="checkbox" name="keszpenz" class="nomarg"> <span>Plaćanje gotovinom na licu mesta</span><br>
		<input type="checkbox" name="kartya" class="nomarg"> <span>Plaćanje debitnim karticama na licu mesta</span><br><br><br>
		<p>Šta je slučaj sa online plaćanjem?<br> Online plaćanje se ne može isključiti, znači da ova funkcija je automatski aktivirana za svaki apartman
restoran. Ukoliko Vam ovo stvara problem, molimo Vas da potražite naš korisnički servis.</p><br><br>
		<label>Slike o restoranu (maximum 5 komada)</label><br>
		<input type="file" id="fileInput" name="kepek[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required><br>
		<label>Vreme služenja obroka</label><br><br>
<p>Vreme služenja obroka na našem sajtu se ne može birati. Podrazumevana vremena su:<br>11:30 - 13:00<br>13:30 - 15:00<br>15:30 - 17:00<br>17:30 - 19:00<br>19:30 - 21:00<br>U slučaju da restoran određenog dana ne bude radio, kasnije će se moći podesiti oznaka „zatvoreno“.

Ova oznaka može da važi za ceo dan, ili samo za vreme ručka ili večere.</p><br>
<label>Opis restorana</label><br>
		<textarea type="text" class="tb" name="bemutatas" placeholder="Predstavi svoj restoran" maxlength="1000" required></textarea><br>
	<img src="../img/menu.png" alt="icon" class="icon fi">
	<h2>Dodavanje menija</h2>
	<label>Naziv prvog menija</label><br>
		<input type="text" name="elsomenunev" placeholder="Naziv menija" required><br>
		<label>Sadržaj i opis prvog menija</label><br>
		<textarea type="text" class="tb" name="elsomenutartalom" placeholder="Sadržaj menija i opis" maxlength="2000" required></textarea><br>
		<label>Cena prvog menija u evrima (globalno)</label><br>
		<input type="number" name="elsomenuareur" placeholder="X EUR" required><br>
		<label>Cena prvog menija u forintama (Mađarska)</label><br>
		<input type="number" name="elsomenuarhuf" placeholder="X HUF" required><br>
		<label>Cena prvog menija u dinarima (Srbija)</label><br>
		<input type="number" name="elsomenuarrsd" placeholder="X RSD" required><br>
		<p>VAŽNO!<br>  Uračunati u cenu iznos od 12 % je obaveza vlasnika, što sajt naplaćuje za svaku rezervaciju, odnosno
obrok. Kod online plaćanja se to automatski odbija, dok kod gotovinskog plaćanja šaljemo naknadnu

fakturu za ovaj iznos.</p><br><br>
		<label>Slike prvog menija (maximum 5 komada)</label><br>
		<input type="file" id="fileInput" name="kepekMenu1[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required>

		<div class="menuelvalaszto">•</div>

		<label>Naziv drugog menija</label><br>
		<input type="text" name="masodikmenunev" placeholder="Naziv menija" ><br>
		<label>Sadržaj i opis drugog menija</label><br>
		<textarea type="text" class="tb" name="masodikmenutartalom" placeholder="Sadržaj menija i opis" maxlength="2000" ></textarea><br>
		<label>Cena drugog menija u evrima (globalno)</label><br>
		<input type="number" name="masodikmenuareur" placeholder="X EUR" ><br>
		<label>Cena drugog menija u forintama (Mađarska)</label><br>
		<input type="number" name="masodikmenuarhuf" placeholder="X HUF" ><br>
		<label>Cena drugog menija u dinarima (Srbija)</label><br>
		<input type="number" name="masodikmenuarrsd" placeholder="X RSD" ><br>
		<p>VAŽNO!<br> Uračunati u cenu iznos od 12 % je obaveza vlasnika, što sajt naplaćuje za svaku rezervaciju, odnosno
obrok. Kod online plaćanja se to automatski odbija, dok kod gotovinskog plaćanja šaljemo naknadnu

fakturu za ovaj iznos.</p><br><br>
		<label>Slike drugog menija (maximum 5 komada)</label><br>
		<input type="file" id="fileInput" name="kepekMenu2[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  >

		<div class="menuelvalaszto">•</div>

		<label>Naziv trećeg menija</label><br>
		<input type="text" name="harmadikmenunev" placeholder="Naziv menija" ><br>
		<label>Sadržaj i opis trećeg menija</label><br>
		<textarea type="text" class="tb" name="harmadikmenutartalom" placeholder="Sadržaj menija i opis" maxlength="2000" ></textarea><br>
		<label>Cena trećeg menija u evrima (globalno)</label><br>
		<input type="number" name="harmadikmenuareur" placeholder="X EUR" ><br>
		<label>Cena trećeg menija u forintama (Mađarska)</label><br>
		<input type="number" name="harmadikmenuarhuf" placeholder="X HUF" ><br>
		<label>Cena trećeg menija u dinarima (Srbija)</label><br>
		<input type="number" name="harmadikmenuarrsd" placeholder="X RSD" ><br>
		<p>VAŽNO!<br>  Uračunati u cenu iznos od 12 % je obaveza vlasnika, što sajt naplaćuje za svaku rezervaciju, odnosno
obrok. Kod online plaćanja se to automatski odbija, dok kod gotovinskog plaćanja šaljemo naknadnu

fakturu za ovaj iznos.</p><br><br>
		<label>Slike trećeg menija (maximum 5 komada)</label><br>
		<input type="file" id="fileInput" name="kepekMenu3[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  ><br><br><br>
		<input type="hidden" name="lang" value="rs">

		<button name="submit">Dodaj</button>
	</form>
</div>

<script>
        function validateForm() {
            var fileInput = document.getElementById('fileInput');
            var files = fileInput.files;
            
            if (files.length > 5) {
                alert('Legfeljebb 5 képet választhatsz ki az étteremről. Kérlek használd az utasítások szerint oldalunkat.');
                return false;
            }
            
            return true;
        }
    </script>

    <script>
  document.getElementById('szuldatum').addEventListener('input', function() {
    var year = this.value.split('-')[0];
    if (year.length !== 4) {
      this.setCustomValidity('Az év mezőnek pontosan négy számjegyet kell tartalmaznia.');
    } else {
      this.setCustomValidity('');
    }
  });
</script>

</body>
</html>