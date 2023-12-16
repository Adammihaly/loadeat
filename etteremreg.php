<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loadeat • Étterem hozzáadás</title>
	<link rel="stylesheet" type="text/css" href="css/profilmodositas.css">
	<link rel="stylesheet" type="text/css" href="css/etthoz.css">
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
	<h1>Étterem hozzáadása</h1>
	<br>
	<img src="img/tulaj.png" alt="icon" class="icon">
	<h2>Étterem tulajdonos adatai</h2>
	<form method="POST" action="php/addrestoran.php"  onsubmit="return validateForm()" enctype="multipart/form-data">
		
		<label>Teljes Név / Vállalkozás neve</label><br>
		<input type="text" name="nev" placeholder="Név" required><br>
		<label>Adószám</label><br>
		<input type="text" name="igazolvanyszam" placeholder="Adószám" required><br>
		<label>Körzet / Megye / Tartomány</label><br>
		<input type="text" name="szuldatum" id="szuldatum" required="required" placeholder="Körzet / Megye / Tartomány"><br>
		<label>Telefonszám</label><br>
		<input type="tel" name="tel" placeholder="Telefonszám" required><br>
		<label>Cím (Ország, Helység, Utca és házszám)</label><br>
		<input type="text" name="cim" placeholder="Ország, Helység, Utca és házszám" required><br>
		<label>IBAN számlaszám</label><br>
		<input type="text" name="szamla" placeholder="Pl: HU42 1177 3058 0568 9984 0000 0000" required><br>
		<p>Miért kell ezt nekem megadni?<br> Ha a vendég a foglalásnál az Online fizetés opciót válassza erre a számlaszámra fogja ön megkapni a pénzt a foglalást követő 24 órában. Harmadik fél nem jut hozzá az eféle bizalmas adatokhoz.</p><br>
		<img src="img/ett.png" alt="icon" class="icon fi">
	<h2>Lakásétterem adatai</h2>
		<label>Az étterem neve</label><br>
		<input type="text" name="etteremnev" placeholder="Név" required><br>
		<label>Az étterem országa</label><br>
		<input type="text" name="orszag" placeholder="Pl: Magyarország" required><br>
		<label>Az étterem településének a neve</label><br>
		<input type="text" name="telepules" placeholder="Pl: Eger" required><br>
		<label>Utca és házszám</label><br>
		<input type="text" name="utcahazszam" placeholder="Utca és házszám" required><br>
		<label>Fizetési lehetőségek az ön étterme esetében</label><br><br>
		<input type="checkbox" name="keszpenz" class="nomarg"> <span>Helyszini készpénzes fizetés</span><br>
		<input type="checkbox" name="kartya" class="nomarg"> <span>Helyszini kártyás fizetés</span><br><br><br>
		<p>Mi a helyzet az Online fizetéssel?<br> Az Online fizetést NEM lehet kikapcsolni, tehát ez a funkció autómatikusan be van aktiválva minden lakásétterem részére. Amennyiben ez önnek problémát okoz, kérjük keresse fel ügyfélszolgálatunk.</p><br><br>
		<label>Képek az étteremről (maximum 5 darab)</label><br>
		<input type="file" id="fileInput" name="kepek[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required><br>
		<label>Étkezési időpontok</label><br><br>
<p>Étkezési időpont oldalunkon nem választható. Alapértelmezett időponttok:<br>11:30 - 13:00<br>13:30 - 15:00<br>15:30 - 17:00<br>17:30 - 19:00<br>19:30 - 21:00<br>Amennyiben egy adott napon nem dolgozik az étterem, a későbbiekben majd lehet beállítani "zárva" jelölést. Ez a jelölés vonatkozhat egy egész napra, vagy akár csak egy ebéd vagy vacsora idejére.</p><br>
<label>Étterem leírása</label><br>
		<textarea type="text" class="tb" name="bemutatas" placeholder="Mutasd be a lakáséttermed" maxlength="1000" required></textarea><br>
	<img src="img/menu.png" alt="icon" class="icon fi">
	<h2>Menük hozzáadása</h2>
	<label>Első menü neve</label><br>
		<input type="text" name="elsomenunev" placeholder="Menü neve" required><br>
		<label>Első menü tartalma és leírása</label><br>
		<textarea type="text" class="tb" name="elsomenutartalom" placeholder="Menü tartalma és leírása" maxlength="2000" required></textarea><br>
		<label>Első menü ára Euróban (Globális)</label><br>
		<input type="number" name="elsomenuareur" placeholder="X EUR" required><br>
		<label>Első menü ára Forintban (Magyarország)</label><br>
		<input type="number" name="elsomenuarhuf" placeholder="X HUF" required><br>
		<label>Első menü ára Dinárban (Szerbia)</label><br>
		<input type="number" name="elsomenuarrsd" placeholder="X RSD" required><br>
		<p>FONTOS!<br>  Az étterem tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</p><br><br>
		<label>Képek az első menüről (maximum 5 darab)</label><br>
		<input type="file" id="fileInput" name="kepekMenu1[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  required>

		<div class="menuelvalaszto">•</div>

		<label>Második menü neve</label><br>
		<input type="text" name="masodikmenunev" placeholder="Menü neve" ><br>
		<label>Második menü tartalma és leírása</label><br>
		<textarea type="text" class="tb" name="masodikmenutartalom" placeholder="Menü tartalma és leírása" maxlength="2000" ></textarea><br>
		<label>Második menü ára Euróban (Globális)</label><br>
		<input type="number" name="masodikmenuareur" placeholder="X EUR" ><br>
		<label>Második menü ára Forintban (Magyarország)</label><br>
		<input type="number" name="masodikmenuarhuf" placeholder="X HUF" ><br>
		<label>Második menü ára Dinárban (Szerbia)</label><br>
		<input type="number" name="masodikmenuarrsd" placeholder="X RSD" ><br>
		<p>FONTOS!<br> Az étterem tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</p><br><br>
		<label>Képek a második menüről (maximum 5 darab)</label><br>
		<input type="file" id="fileInput" name="kepekMenu2[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  >

		<div class="menuelvalaszto">•</div>

		<label>Harmadik menü neve</label><br>
		<input type="text" name="harmadikmenunev" placeholder="Menü neve" ><br>
		<label>Harmadik menü tartalma és leírása</label><br>
		<textarea type="text" class="tb" name="harmadikmenutartalom" placeholder="Menü tartalma és leírása" maxlength="2000" ></textarea><br>
		<label>Harmadik menü ára Euróban (Globális)</label><br>
		<input type="number" name="harmadikmenuareur" placeholder="X EUR" ><br>
		<label>Harmadik menü ára Forintban (Magyarország)</label><br>
		<input type="number" name="harmadikmenuarhuf" placeholder="X HUF" ><br>
		<label>Harmadik menü ára Dinárban (Szerbia)</label><br>
		<input type="number" name="harmadikmenuarrsd" placeholder="X RSD" ><br>
		<p>FONTOS!<br>  Az étterem tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</p><br><br>
		<label>Képek a harmadik menüről (maximum 5 darab)</label><br>
		<input type="file" id="fileInput" name="kepekMenu3[]" accept=".jpg, .jpeg, .png, .webp" multiple="multiple"  ><br><br><br>
		<input type="hidden" name="lang" value="hu">

		<button name="submit">Hozzáadás</button>
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

    

</body>
</html>