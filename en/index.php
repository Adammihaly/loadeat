<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loadeat • Home</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">


		<link rel="icon" type="image/x-icon" href="../img/logo.jpg">


<meta name="description" content="LOADEAT.com is an online platform that connects apartment restaurants with guests. The company's aim is to provide guests with an easy and convenient way to connect, make reservations, and pay at local apartment-style restaurants. Our website is user-friendly, secure, and offers the best deals for everyone.">


    <meta name="keywords" content="lakasetterem, lakásétterem, étterem, étkezés loadeat, loadeatcom, kaja, ennivaló, menü, etterem, soklakasetterem, lakáséttermek, éttermek, kereső, hírdető, hirdetes, etkeztetes, etteremtulaj, vendég, vendeg, ügyfél, ugyfel">

    <meta name="author" content="Loadeat">
    <link rel="canonical" href="https://loadeat.com">


    <meta property="og:title" content="Loadeat" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="LOADEAT.com is an online platform that connects apartment restaurants with guests. The company's aim is to provide guests with an easy and convenient way to connect, make reservations, and pay at local apartment-style restaurants. Our website is user-friendly, secure, and offers the best deals for everyone." />
    <meta property="og:url" content="https://loadeat.com" />
    <meta property="og:image" content="../img/img1.jpg" />




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
            if(confirm('The reservation has been successfully completed, if there are any problems, please contact customer service!')) document.location = '#';
            else(document.location = '#')
        </script> ";
        }
    }


?>

<div class="menu">
	<div class="flex_menu_conn">
		<div class="menu_img_conn">
		<a href="#"><img src="../img/logo.jpg" alt="logo" class="logo_menu"></a>
		</div>
		<div class="menu_data_conn">
			<a href="#"><img src="../img/eng.png" alt="en" class="flag" id="flag" onclick="zaszlok();"></a>
			<div class="alnyelvek" id="zaszlok">
			<a href="../"><img src="../img/hun.png" alt="hun" class="flag"></a><br>
			<a href="../rs/"><img src="../img/srb.png" alt="srb" class="flag"></a><br>
			</div>
			<a href="#" class="lang_menu">EUR</a>
			<a href="" class="menu_ugyfelszolgalat">Customer service</a>
			<a href="bejelentkezes" class="belebes_menu_button">Login</a>
			<a href="bejelentkezes" class="belebes_menu_button_mobile"><i class="bi bi-person"></i></a>
		</div>
	</div>
</div>



<div class="fejlec">
	<div class="fejlec_content">
		<h1><span class="red">Load</span><span class="black">eat</span></h1>
		<h2>- You're going to eat anyways!</h2>
		<div class="kereses">
		<label>Find your perfect apartment restaurant:</label><br>
			<form  method="POST" action="../php/kereses.php">			
				<select type="text" name="helyseg" required="required" placeholder="Add meg a helységet" class="helyseg_input">


					<option value='' selected='selected' disabled='disabled'>Choose a county / area</option>
  					<?php
  					require_once '../php/conn.php';
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
				<input type="text" name="datum" required="required" class="datum_input"  onfocus="(this.type='date')" placeholder="Choose a date" onblur="(this.type='text')">
				<select name="idopont" id="idopont" required>
  					<option value='' selected='selected' disabled='disabled'>Select time</option>
  									<option value="11:30 - 13:00">11:30 - 13:00</option>
                                    <option value="13:30 - 15:00">13:30 - 15:00</option>
                                    <option value="15:30 - 17:00">15:30 - 17:00</option>
                                    <option value="17:30 - 19:00">17:30 - 19:00</option>
                                    <option value="19:30 - 21:00">19:30 - 21:00</option>
				</select>	
				<?php echo "<input type='hidden' value='en' name='n'>"; ?>				
				<button class="submit-buton" name="sub"><i class="bi bi-search"></i>Search</button>
			</form>
		</div>
		<h3>🔑 Safe and trustworthy&nbsp;&nbsp;&nbsp;<br class="inv"> 📄 Easy to use&nbsp;&nbsp;&nbsp;<br class="inv"> 💲 Best prices guaranteed</h3>
	</div>	
</div>




<div class="m_sz">
	<p>Find the <b class="white">BEST</b> apartment restaurants on our website,<b class="white"> GUARANTEED</b>!</p>
</div>



<div class="r_buttons">
	<button id="button_rolunk" class="active" onclick="rolunk_lathato();">About us</button>
	<button id="button_hasznalat" class="" onclick="hasznalat_lathato();">Usage</button>
	<button id="reg" class="" onclick="reg();">Sign Up</button>
</div>



<div class="rolunk_conn" id="rolunk">
	<h4>About us</h4>
	<p>
LOADEAT.com is an online platform that connects apartment restaurants with guests. The company's aim is to provide guests with an easy and convenient way to connect, make reservations, and pay at local apartment-style restaurants. Our website is user-friendly, secure, and offers the best deals for everyone.</p>
</div>
<div class="hasznalat_conn" id="hasznalat">
	<h4>Usage</h4>
	<p>The LOADEAT.com website allows users to browse through available apartment restaurants, make reservations, provide ratings and feedback, as well as conduct online payments. On the platform, apartment restaurants can showcase their menu offerings, prices, contact details, and directly engage with guests.Users have the option to register as either an apartment restaurant owner or as a guest. Those who register as restaurant owners can create profiles for their own apartment restaurants. Through these profiles, guests can discover a specific restaurant, make reservations, and perform other related actions.</p>
</div>


<div class="ajanlas_conn">
	<h1>Recommended for you</h1>
	<div class="ajanlas_flex">
		<a href="" class="aitem">
			<div class="img_conn">
				<div class="atlatszo-div">
					<i class="bi bi-star-fill"></i>
					<h5>Nora Lakásétterem</h5><br>
			<p class="location">Magyarország, Zamárdi, Szent István út 3</p>

				</div>
			<img src="../img/img3.jpg" alt="">
			</div>
			
		</a>
		<a href="" class="aitem">
			<div class="img_conn">
				<div class="atlatszo-div">
					<i class="bi bi-star-fill"></i>
					<h5>Legyen itt a te éttermed neve</h5><br>
			<p class="location">Itt pedig az utca, település és házszám</p>

				</div>
			<img src="../img/img1.jpg" alt="">
			</div>
			
		</a>
		<a href="" class="aitem">
			<div class="img_conn">
				<div class="atlatszo-div">
					<i class="bi bi-star-fill"></i>
					<h5>Nora Lakásétterem</h5><br>
			<p class="location">Magyarország, Zamárdi, Szent István út 3</p>

				</div>
			<img src="../img/img2.jpg" alt="">
			</div>
			
		</a>
	</div>
</div>



<div class="fill_div">
	<div class="mrg_conn">
		<div class="conntent_felx_div">
			<div class="elem_gyujto_ic">
				<div class="korr_div"><i class="bi bi-trophy ikon"></i></div>
				<p>The best	apartment restaurants in the region</p>
			</div>
			<div class="elem_gyujto_ic">
				<div class="korr_div"><i class="bi bi-clock ikon"></i></div>
				<p>Quick and flexible booking, continuously</p>
			</div>
			<div class="elem_gyujto_ic">
				<div class="korr_div"><i class="bi bi-shield-lock ikon"></i></div>
				<p>Completely secure usage every time</p>
			</div>
		</div>
	</div>
</div>


<div class="patrners">
	<h1>Our partners</h1>
	<div class="partners_flex">
		<a href=""><img src="../img/p1.jpg" alt="Partner logo"></a>
		<a href=""><img src="../img/berg.jpg" alt="Partner logo"></a>
		<a href="https://nora-lakasettermek7.webnode.hu"><img src="../img/nl.png" alt="Partner logo"></a>
		<a href=""><img src="../img/nb.png" alt="Partner logo"></a>
	</div>
</div>




<div class="footer">
	<div class="footer_con">
		<div class="f_flex">
			<div>
				<h1>Contact information</h1>
				<a href="mailto:test@gmail.com">E-mail: loadeat@loadeat.com</a><br><br>
				<a href="">Tel: (+36) 064 18 62 795</a><br><br>
				<a href="">Company: Loadeat.com Kft</a><br><br>
				<a href="adat">Data privacy</a>
			</div>
			<div>
				<h1>Popular sites</h1>
				<a href="https://loadeat.com/">Home</a><br><br>
				<a href="bejelentkezes">Login</a><br><br>
				<a href="info">Sign Up</a>
			</div>
			<div>
				<h1>Our featured partners</h1>
				<a href="">Berg Electric</a><br><br>
				<a href="">Nora Lakásétterem</a><br><br>
				<a href="">Nora BIO Wellness</a><br><br>
				
			</div>
			<div>
				<h1>Troubleshooting</h1>
				<a href="">Customer service</a><br><br>
				<a href="">E-mail: support@loadeat.com</a>
			</div>
		</div>
		<br>
		<div class="logo_footer"><img src="../img/logo.jpg" alt="logo"></div>
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