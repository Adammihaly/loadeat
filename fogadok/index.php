<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fogadok.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Nunito:wght@300&family=Oxygen:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <title>Loadeat • Kezdőlap</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">

    <link rel="icon" type="image/x-icon" href="../img/logo.jpg">


<meta name="description" content="A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára. Fogalaljon asztalt most!">


    <meta name="keywords" content="lakasetterem, lakásétterem, étterem, étkezés loadeat, loadeatcom, kaja, ennivaló, menü, etterem, soklakasetterem, lakáséttermek, éttermek, kereső, hírdető, hirdetes, etkeztetes, etteremtulaj, vendég, vendeg, ügyfél, ugyfel, asztalfoglalas, asztalfoglalás">

    <meta name="author" content="Loadeat">
    <link rel="canonical" href="https://loadeat.com">


    <meta property="og:title" content="Loadeat" />
    <meta property="og:type" content="weboldal" />
    <meta property="og:description" content="A LOADEAT.com egy online platform, amely összeköti a lakáséttermeket a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi lakáséttermekkel való kapcsolatfelvételre, foglalásra és fizetésre. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára." />
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

    <nav>
        <img src="../img/logo.jpg">
        <div class="linkek">

            <div class="zaszlok">
                <p><img src="../img/Flag-Hungary.webp" alt=""> <a href="">HUF</a></p>
                <p><img src="../img/america.webp" alt=""> <a href="">USD</a></p>
                <p><img src="../img/srb.webp" alt=""> <a href="">RSD</a></p>
            </div> 
            <a href="">Ügyfélszolgálat</a>
            <a href="regfaj">Regisztráció</a>
            <a href="https://loadeat.com">Lakáséttermek</a>
            <a href="bejelentkezes">Belépés</a>
        </div>

        <!-- TELOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
            <i class="fa-solid fa-bars" id="hamburger"></i>
            <aside id="menu">
                <p><img src="../img/srb.webp" alt=""> <a href="">RSD</a></p>
                <p><img src="../img/america.webp" alt=""> <a href="">USD</a></p>
                <p><img src="../img/Flag-Hungary.webp" alt=""> <a href="">HUF</a></p>
                <a href="">Ügyfélszolgálat</a>
                <a href="regfaj">Regisztráció</a>
                <a href="bejelentkezes">Belépés</a>
                <a href="https://loadeat.com">Lakáséttermek</a>
            </aside>
        <!-- TELOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
    </nav>
    <header>
        <div class="blur">
            <h1><span>Load</span>eat</h1>
            <strong>Fogadók</strong>
            <form method="POST" action="php/kereses.php">
                <select name="helyseg" id="megye" required>
                    <option value="placeholder" disabled selected>Válassz megyét / körzetet</option>
                    <?php
                    require_once 'php/conn.php';
$telepules = '';
$ismetlodoMegyek = array(); // Segédtömb az ismétlődő megyék nyilvántartására
mysqli_set_charset($conn, "utf8");
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
                <input type="date" id="datum" name="datum" placeholder="Válassz dátumot" required>

                <select name="idopont" id="ido" required>
                    <option value='' selected='selected' disabled='disabled'>Válassz időpontot</option>
                    <option value="11:30 - 13:00">11:30 - 13:00</option>
                    <option value="13:30 - 15:00">13:30 - 15:00</option>
                    <option value="15:30 - 17:00">15:30 - 17:00</option>
                    <option value="17:30 - 19:00">17:30 - 19:00</option>
                    <option value="19:30 - 21:00">19:30 - 21:00</option>
                </select>
                <button name="sub">Keresés</button>
            </form>
        </div>
    </header>
    <main>
        <section>
            <img src="../img/rolunk.jpg" alt="">
            <div>
                <h2>Rólunk</h2>
                <p>A LOADEAT.com egy online platform, amely összeköti a fogadókat a vendégekkel. A cég célja, hogy a vendégek számára egyszerű és kényelmes módot biztosítson a helyi fogadókkal való kapcsolatfelvételre, foglalásra és fizetésre. Asztalfoglalás pár kattintás segítségével lehetséges. Oldalunk használata egyszerű, biztonságos és a legjobb árajánlatokat kínálja mindenki számára. Fogalaljon asztalt most!</p>
            </div>
        </section>
        <section>
            <div>
                <h2>Használat</h2>
                <p>A LOADEAT.com weboldala lehetővé teszi a felhasználók számára, hogy böngésszenek a rendelkezésre álló fogadók között, foglalásokat végezzenek, értékeléseket és visszajelzéseket adjanak, valamint online fizetéseket hajtsanak végre. A platformon a fogadók bemutathatják ételkínálatukat, áraikat, elérhetőségüket, és közvetlenül kapcsolatba léphetnek a vendégekkel. A felhasználóknak lehetőségük nyílik regisztrálni mint fogadó tulajdonos, vagy mint vendég. Aki fogadó tulajdonosként regisztrál, az létre tudja hozni saját fogadójának a profilját. Ezen keresztül találnak rá a vendégek egy adott fogadóra, és itt történik a foglalás és az egyéb műveletek. Fogalaljon asztalt most!</p>
                <a href="">Regisztráció</a>
            </div>
            <img src="../img/hasznalat.jpg" alt="">
        </section>
        <div class="cim"><h1>Neked ajánlott</h1></div>
        <section class="kartyak">
            
            <a href="" class="container">
                <img src="../img/fogado1.jpg">
                <div>
                    <h2>Pálkonyha</h2>
                    <p>Pálkonyha, Fő u.76</p>
                </div>
            </a>

            <a href="" class="container">
                <img src="../img/fogado2.jpg">
                <div>
                    <h2>Pajta</h2>
                    <p>Bakonykoppány, Petőfi utca 46/A</p>
                </div>
            </a>

            <a href="" class="container">
                <img src="../img/fogado3.jpg">
                <div>
                    <h2>Columban's</h2>
                    <p>Siklós, Felszabadulás 21</p>
                </div>
            </a>

        </section>
    </main>
    <footer>
        <div class="nav_items">
            <ul>
                <a href=""><b>Névjegy</b></a>
                <a href=""><i class="fa-solid fa-envelope"></i> loadeat@loadeat.com</a>
                <a href=""><i class="fa-solid fa-phone"></i> +36 702 53 33 34</a>
                <a href=""><i class="fa-solid fa-phone"></i> + 36 304 96 29 16</a>
                <a href="">Cég: Loadeat.com Kft</a>
                <a href="">Adatvédelem</a>
            </ul>
            <ul>
                <a href=""><b>Népszerű oldalak</b></a>
                <a href="">Kezdőlap</a>
                <a href="">Bejelentkezés</a>
                <a href="">Regisztráció</a>
            </ul>
            <ul>
                <a href=""><b>Kiemelt partnereink</b></a>
                <a href="">Berg Electric</a>
                <a href="">Nora Lakásétterem</a>
                <a href="">Nora BIO Wellness</a>
            </ul>
            <ul>
                <a href=""><b>Hibaelhárítás</b></a>
                <a href="">Ügyfélszolgálat</a>
                <a href=""><i class="fa-solid fa-envelope"></i> loadeat@loadeat.com</a>
            </ul>
        </div>
        <div class="Codeefy">
            <div><i class="fa-brands fa-facebook"></i> <i class="fa-brands fa-instagram"></i></div>
            <p>Copyright ©2024 LOADEAT.com</p>
            <a href="https://codeefyit.com">Az oldalt készítette és forgalmazza a Codeefy</a>
        </div>
    </footer>
    
    <script src="../js/fogadok.js"></script>
</body>
</html>