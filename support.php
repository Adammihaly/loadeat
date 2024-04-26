<!DOCTYPE html>
<html>
<head>
	    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/support.css">
    <title>Loadeat.com Support</title>

    <link rel="icon" type="image/x-icon" href="img/logo.jpg">


<meta name="description" content="A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket és a fogadókat a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel és fogadókkal való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára. Fogalaljon asztalt most!">


    <meta name="keywords" content="lakasetterem, lakásétterem, étterem, étkezés loadeat, loadeatcom, kaja, ennivaló, menü, etterem, soklakasetterem, lakáséttermek, éttermek, kereső, hírdető, hirdetes, etkeztetes, etteremtulaj, vendég, vendeg, ügyfél, ugyfel, asztalfoglalas, asztalfoglalás, fogadok, fogado etkezes, fogadó, fogadók">

    <meta name="author" content="Loadeat">
    <link rel="canonical" href="https://loadeat.com">


    <meta property="og:title" content="Loadeat" />
    <meta property="og:type" content="weboldal" />
    <meta property="og:description" content="A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket és a fogadókat a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel és fogadókkal való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára. Fogalaljon asztalt most!" />
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

	<main>
		<form method="POST" action="php/support.php">
			 <div class="input_wrapper">
                        <div class="mezo">
                            <label for="vezeteknev">Vezetéknév</label>
                            <input type="text" id="vezeteknev" placeholder="Vezetéknév..." name="vnev" required>
                        </div>
                        <div class="mezo">
                            <label for="keresztnev">Keresztnév</label>
                            <input type="text" id="keresztnev" placeholder="Keresztnév..." name="knev" required>
                        </div>
             </div>
                
                    <div class="mezo uzenet">
                        <label for="email">Email cím</label>
                        <input type="email" id="email" placeholder="Email cím..." name="email" required>
                        <input type="hidden" name="email2" placeholder="Email2..." value="a" required>
                    </div>

                    <div class="mezo uzenet">
                        <label for="uzenet">Üzenet</label>
                        <input type="text" id="uzenet" placeholder="Üzenet..." name="uzenet" required>
                    </div>

                    <button type="submit">Küldés</button>
		</form>
	</main>

</body>
</html>