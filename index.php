<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loadeat • Kezdőlap</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">

	<link rel="icon" type="image/x-icon" href="img/logo.jpg">


<meta name="description" content="A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára.">


    <meta name="keywords" content="lakasetterem, lakásétterem, étterem, étkezés loadeat, loadeatcom, kaja, ennivaló, menü, etterem, soklakasetterem, lakáséttermek, éttermek, kereső, hírdető, hirdetes, etkeztetes, etteremtulaj, vendég, vendeg, ügyfél, ugyfel">

    <meta name="author" content="Loadeat">
    <link rel="canonical" href="https://loadeat.com">


    <meta property="og:title" content="Loadeat" />
    <meta property="og:type" content="weboldal" />
    <meta property="og:description" content="A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára." />
    <meta property="og:url" content="https://loadeat.com" />
    <meta property="og:image" content="img/img1.jpg" />




<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9VPB42BQJQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9VPB42BQJQ');
</script>


</head>
<body>

<?php


if (isset($_GET['fo'])) {
        if ($_GET['fo'] == "true") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('A foglalás sikeresen végbement, ha bármi probléma akadna keresd fel az ügyfélszolgálatot!')) document.location = '#';
            else(document.location = '#')
        </script> ";
        }
    }


?>

<div class="menu">
	<div class="flex_menu_conn">
		<div class="menu_img_conn">
		<a href="#"><img src="img/logo.jpg" alt="logo" class="logo_menu"></a>
		</div>
		<div class="menu_data_conn">
			<a href="#"><img src="img/hun.png" alt="hun" class="flag" id="flag" onclick="zaszlok();"></a>
			<div class="alnyelvek" id="zaszlok">
		    <a href="rs/"><img src="img/srb.png" alt="srb" class="flag"></a><br>
			<a href="en/"><img src="img/eng.png" alt="eng" class="flag"></a><br>
			</div>
			<a href="#" class="lang_menu">HUF</a>
			<a href="" class="menu_ugyfelszolgalat">Ügyfélszolgálat</a>
			<a href="bejelentkezes" class="belebes_menu_button">Belépés</a>
			<a href="bejelentkezes" class="belebes_menu_button_mobile"><i class="bi bi-person"></i></a>
		</div>
	</div>
</div>



<div class="fejlec">
	<div class="fejlec_content">
		<h1><span class="red">Load</span><span class="black">eat</span></h1>
		<h2>- You're going to eat anyways!</h2>
		<div class="kereses">
		<label>Keresd meg a számodra legtökéletesebb lakáséttermet:</label><br>
			<form  method="POST" action="php/kereses.php">			
				<select type="text" name="helyseg" required="required" placeholder="Add meg a helységet" class="helyseg_input">


					<option value='' selected='selected' disabled='disabled'>Válassz megyét / körzetet</option>
  					<?php
  					require_once 'php/conn.php';
$telepules = '';
$ismetlodoMegyek = array(); // Segédtömb az ismétlődő megyék nyilvántartására

$sql = "SELECT * FROM etterem";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $megye = $row['megye'];
        
        // Ellenőrzés, hogy az adott megye már szerepel-e a listában
        if (!in_array($megye, $ismetlodoMegyek)) {
            $telepules .= '<option value="' . $megye . '">' . $megye . '</option>';
            $ismetlodoMegyek[] = $megye;
        }
    }
    $result->free(); 
} 

echo $telepules;
?>




				</select>
				<input type="text" name="datum" required="required" class="datum_input"  onfocus="(this.type='date')" placeholder="Válassz dátumot" onblur="(this.type='text')">
				<select name="idopont" id="idopont" required>
  					<option value='' selected='selected' disabled='disabled'>Válassz időpontot</option>
  					<option value="11:30 - 13:00">11:30 - 13:00</option>
                    <option value="13:30 - 15:00">13:30 - 15:00</option>
                    <option value="15:30 - 17:00">15:30 - 17:00</option>
                    <option value="17:30 - 19:00">17:30 - 19:00</option>
                    <option value="19:30 - 21:00">19:30 - 21:00</option>
				</select>
							
				<button class="submit-buton" name="sub"><i class="bi bi-search"></i>Keresés</button>
			</form>
		</div>
		<h3>🔑 Biztonságos és megbízható&nbsp;&nbsp;&nbsp;<br class="inv"> 📄 Egyszerű&nbsp;&nbsp;&nbsp;<br class="inv"> 💲 Garantált legjobb árak</h3>
	</div>	
</div>




<div class="m_sz">
	<p>Találd meg oldalunkon <b class="white">GARANTÁLTAN</b> a legjobb lakáséttermeket!</p>
</div>



<div class="r_buttons">
	<button id="button_rolunk" class="active" onclick="rolunk_lathato();">Rólunk</button>
	<button id="button_hasznalat" class="" onclick="hasznalat_lathato();">Használat</button>
	<button id="reg" class="" onclick="reg();">Regisztráció</button>
</div>



<div class="rolunk_conn" id="rolunk">
	<h4>Rólunk</h4>
	<p>
A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára.</p>
</div>
<div class="hasznalat_conn" id="hasznalat">
	<h4>Használat</h4>
	<p>A LOADEAT.com weboldala lehetővé teszi a felhasználók számára, hogy böngésszenek a rendelkezésre álló lakáséttermek között, foglalásokat végezzenek, értékeléseket és visszajelzéseket adjanak, valamint online fizetéseket hajtsanak végre. A platformon a lakáséttermek bemutathatják ételkínálatukat, áraikat, elérhetőségüket, és közvetlenül kapcsolatba léphetnek a vendégekkel.
A felhasználóknak lehetőségük nyílik regisztrálni mint lakásétterem tulajdonos, vagy mint vendég. Aki étterem tulajdonosként regisztrál, az létre tudja hozni saját lakáséttermének a profilját. Ezen keresztül találnak rá a vendégek egy adott éttermére, és itt történik a foglalás és az egyéb műveletek.</p>
</div>


<div class="ajanlas_conn">
	<h1>Neked ajánlott</h1>
	<div class="ajanlas_flex">
		<a href="https://loadeat.com/etterem?eid=69351" class="aitem">
			<div class="img_conn">
				<div class="atlatszo-div">
					<i class="bi bi-star-fill"></i>
					<h5>Palkonyha</h5><br>
			<p class="location">Palkonya, Fő u.76. (Magyarország)</p>

				</div>
			<img src="img/palkonyha.jpg" alt="etterem kep">
			</div>
			
		</a>
		<a href="https://loadeat.com/etterem?eid=56390" class="aitem">
			<div class="img_conn">
				<div class="atlatszo-div">
					<i class="bi bi-star-fill"></i>
					<h5>A Pajta Lakásétterem</h5><br>
			<p class="location">Bakonykoppány, Petőfi utca 46/A (Magyarország)</p>

				</div>
			<img src="img/pajta.jpg" alt="eterem kep">
			</div>
			
		</a>
		<a href="https://loadeat.com/etterem?eid=98558" class="aitem">
			<div class="img_conn">
				<div class="atlatszo-div">
					<i class="bi bi-star-fill"></i>
					<h5>Columban’s lakásétterem</h5><br>
			<p class="location">Siklós, Felszabadulás 21 (Magyarország)</p>

				</div>
			<img src="img/col.jpg" alt="etterem kep">
			</div>
			
		</a>
	</div>
</div>



<div class="fill_div">
	<div class="mrg_conn">
		<div class="conntent_felx_div">
			<div class="elem_gyujto_ic">
				<div class="korr_div"><i class="bi bi-trophy ikon"></i></div>
				<p>A legjobb lakáséttermek a régióban</p>
			</div>
			<div class="elem_gyujto_ic">
				<div class="korr_div"><i class="bi bi-clock ikon"></i></div>
				<p>Gyors és rugalmas foglalás folyamatosan</p>
			</div>
			<div class="elem_gyujto_ic">
				<div class="korr_div"><i class="bi bi-shield-lock ikon"></i></div>
				<p>Teljesen biztonságos használat</p>
			</div>
		</div>
	</div>
</div>


<div class="patrners">
	<h1>Partnereink</h1>
	<div class="partners_flex">
		<a href=""><img src="./img/p1.jpg" alt="Partner logo"></a>
		<a href=""><img src="./img/berg.jpg" alt="Partner logo"></a>
		<a href="https://nora-lakasettermek7.webnode.hu"><img src="./img/nl.png" alt="Partner logo"></a>
		<a href=""><img src="./img/nb.png" alt="Partner logo"></a>
	</div>
</div>




<div class="footer">
	<div class="footer_con">
		<div class="f_flex">
			<div>
				<h1>Névjegy</h1>
				<a href="mailto:test@gmail.com">E-mail: loadeat@loadeat.com</a><br><br>
				<a href="">Tel: +36 702 53 33 34</a><br><br>
				<a href="">Tel: +36 304 96 29 16</a><br><br>
				<a href="">Cég: Loadeat.com Kft</a><br><br>
				<a href="adat">Adatvédelem</a>
			</div>
			<div>
				<h1>Népszerű oldalak</h1>
				<a href="https://loadeat.com/">Kezdőlap</a><br><br>
				<a href="bejelentkezes">Bejelentkezés</a><br><br>
				<a href="info">Regisztráció</a>
			</div>
			<div>
				<h1>Kiemelt partnereink</h1>
				<a href="">Berg Electric</a><br><br>
				<a href="">Nora Lakásétterem</a><br><br>
				<a href="">Nora BIO Wellness</a><br><br>
				
			</div>
			<div>
				<h1>Hibaelhárítás</h1>
				<a href="">Ügyfélszolgálat</a><br><br>
				<a href="">E-mail: loadeat.support@gmail.com</a>
			</div>
		</div>
		<br>
		<div class="logo_footer"><img src="img/logo.jpg" alt="logo"></div>
		<div class="cop">Copyright 2023. | LOADEAT.com</div>
	</div>
</div>






<script type="text/javascript">
	
function reg() {
    var ujUrl = "regfaj";
    window.location.href = ujUrl;
}

function hasznalat_lathato() {
	var rolunk = document.getElementById('rolunk');
	var hasznalat = document.getElementById('hasznalat');

	var rolunk_bt = document.getElementById('button_rolunk');
	var hasznalat_bt = document.getElementById('button_hasznalat');

	rolunk.style.display = 'none';
	hasznalat.style.display = 'inline-block';


	rolunk_bt.classList.remove('active');
	hasznalat_bt.classList.add('active');

}


function rolunk_lathato() {
	var rolunk = document.getElementById('rolunk');
	var hasznalat = document.getElementById('hasznalat');

	var rolunk_bt = document.getElementById('button_rolunk');
	var hasznalat_bt = document.getElementById('button_hasznalat');

	rolunk.style.display = 'inline-block';
	hasznalat.style.display = 'none';


	rolunk_bt.classList.add('active');
	hasznalat_bt.classList.remove('active');

}



function zaszlok() {
	var zaszlok = document.getElementById("zaszlok");

	if(zaszlok.style.display == "none")
	{
		zaszlok.style.display = "block";
	}
	else
	{
		zaszlok.style.display = "none";
	}

}

</script>

</body>
</html>