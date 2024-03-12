<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/etterem_hozzaadas.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <title>Loadeat • Étterem hozzáadás</title>
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


    <h1>Étterem hozzáadása  (<span id="oldal_szam">1</span>/5)</h1>

    <form id="form" method="POST" action="php/addrestoran.php"  onsubmit="return validateForm()" enctype="multipart/form-data">
        <section id="1">
            <h2>A tulajdonos adatai</h2>
            <div class="input_field">
                <p>Teljes név / Vállalkozás neve <span style="color: red;">*</span></p>
                <input type="text" name="nev" id="nev" placeholder="Név" required>
            </div>
            <div class="input_field">
                <p>Körzet / Megye / Tartomány <span style="color: red;">*</span></p>
                <input type="text" id="korzet" name="szuldatum" placeholder="Körzet / Megye / Tartomány" required>
            </div>
            <div class="input_field">
                <p>Telefonszám <span style="color: red;">*</span></p>
                <input type="number" id="telszam" name="tel" placeholder="Telefonszám" required>
            </div>
            <div class="input_field">
                <p>Cím (Ország, Helység, Utca és házszám)<span style="color: red;"> *</span></p>
                <input type="text" id="cim" name="cim" placeholder="Ország, Helység, Utca és házszám" required>
            </div>
            <div class="input_field">
                <p>Adószám <span style="color: red;">*</span></p>
                <input type="text" id="adoszam" name="igazolvanyszam" placeholder="Adószám" required>
            </div>
            <div class="input_field">
                <p>IBAN számlaszám<span style="color: red;"> *</span></p>
                <input type="text" id="IBAN" name="szamla" placeholder="Pl: HU 42 1192 2838 2938 2819 0000 0000" required>
                <i>Ha a vendég a foglalásnál az Online fizetés opciót válassza erre a számlaszámra fogja ön megkapni a pénzt a foglalást követő 24 órában. Harmadik fél nem jut hozzá az eféle bizalmas adatokhoz.</i>
            </div>
        </section>
        <section id="2">
            <h2>A lakásétterem adatai</h2>
            <div class="input_field">
                <p>Az étterem neve <span style="color: red;"> *</span></p>
                <input type="text" id="etterem_nev" name="etteremnev" placeholder="Név" required>
            </div>
            <div class="input_field">
                <p>Az étterem országa <span style="color: red;"> *</span></p>
                <input type="text" id="etterem_orszag" name="orszag" placeholder="Pl: Magyarország" required>
            </div>
            <div class="input_field">
                <p>Az étterem településének a neve <span style="color: red;"> *</span></p>
                <input type="text" id="etterem_telepules" name="telepules" placeholder="Pl: Eger" required>
            </div>
            <div class="input_field">
                <p>Utca és házszám <span style="color: red;"> *</span></p>
                <input type="text" id="etterem_utca" name="utcahazszam" placeholder="Pl: Petőfi Sándor 12." required>
            </div>
            <div class="checkbox_field">
                <p>Fizetési lehetőségek az ön étterme esetében <span style="color: red;"> *</span></p>
                <div class="container">
                <input type="checkbox" id="fizetes_készpénz" name="keszpenz">
                <label for="fizetes_készpénz">Helyszini készpénzes fizetés<br></label>
                <input type="checkbox" id="fizetes_kartya" name="kartya">
                <label for="fizetes_kartya">Helyszini kártyás fizetés</label>
                <i><strong>Mi a helyzet az Online fizetéssel?</strong><br>Az Online fizetést NEM lehet kikapcsolni, tehát ez a funkció autómatikusan be van aktiválva minden lakásétterem részére. Amennyiben ez önnek problémát okoz, kérjük keresse fel ügyfélszolgálatunk.</i>
                </div>
            </div>
            <div class="kep_field">
                <p>Képek az étteremről (maximum 5 darab) <span style="color: red;"> *</span></p>
                <input type="file"  name="kepek[]" id="etterem_kepek" accept=".jpg, .jpeg, .png, .webp" multiple="multiple" required>
            </div>
            <div class="input_field">
                <p>Étterem leírása <span style="color: red;"> *</span></p>
                <textarea id="etterem_leiras" name="bemutatas" rows="5" cols="50" placeholder="Étterem leírasa..." required></textarea>
            </div>
        </section>
        <section id="3">
            <h2>Első menü adatai</h2>
            <div class="input_field">
                <p>Menü neve <span style="color: red;"> *</span></p>
                <input type="text" id="elsomenu_neve" name="elsomenunev" placeholder="Név" required>
            </div>      
            <div class="input_field">
                <p>Menü tartalma és leírása<span style="color: red;"> *</span></p>
                <textarea id="elsomenu_leirasa" name="elsomenutartalom" placeholder="A menü tartalma..." rows="5" cols="50" required></textarea>
            </div> 
            <div class="input_field">
                <p>Menü ára euróban (€) <span style="color: red;"> *</span></p>
                <input type="number" id="elsomenu_euro" name="elsomenuareur" placeholder="X EUR" required>
                <p>Menü ára forintban (Ft.) <span style="color: red;"> *</span></p>
                <input type="number" id="elsomenu_forint" name="elsomenuarhuf" placeholder="X Ft." required>
                <p>Menü ára dinárban (RSD) <span style="color: red;"> *</span></p>
                <input type="number" id="elsomenu_dinar" name="elsomenuarrsd" placeholder="X RSD" required>
                <i><strong>FONTOS!</strong><br>Az étterem tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</i>
            </div>   
            <div class="kep_field">
                <p>Képek a menüről (maximum 5 darab) <span style="color: red;"> *</span></p>
                <input type="file"  name="kepekMenu1[]" id="elsomenu_kepek" accept=".jpg, .jpeg, .png, .webp" multiple="multiple" required>
            </div>
        </section>
        <section id="4">
            <h2>Második menü adatai</h2>
            <div class="input_field">
                <p>Menü neve</p>
                <input type="text" id="masodikmenu_neve" name="masodikmenunev" placeholder="Név">
            </div>      
            <div class="input_field">
                <p>Menü tartalma és leírása</p>
                <textarea id="masodikmenu_leirasa" name="masodikmenutartalom" placeholder="A menü tartalma..." rows="5" cols="50"></textarea>
            </div> 
            <div class="input_field">
                <p>Menü ára euróban (€)</p>
                <input type="number" id="masodikmenu_euro" name="masodikmenuareur" placeholder="X EUR">
                <p>Menü ára forintban (Ft.)</p>
                <input type="number" id="masodikmenu_forint" name="masodikmenuarhuf" placeholder="X Ft.">
                <p>Menü ára dinárban (RSD)</p>
                <input type="number" id="masodikmenu_dinar" name="masodikmenuarrsd" placeholder="X RSD">
                <i><strong>FONTOS!</strong><br>Az étterem tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</i>
            </div>   
            <div class="kep_field">
                <p>Képek a menüről (maximum 5 darab)</p>
                <input type="file"  name="kepekMenu2[]" id="masodikmenu_kepek" accept=".jpg, .jpeg, .png, .webp" multiple="multiple">
            </div>
        </section>
        <section id="5">
            <h2>Harmadik menü adatai</h2>
            <div class="input_field">
                <p>Menü neve</span></p>
                <input type="text" id="harmadikmenu_neve" name="harmadikmenunev" placeholder="Név">
            </div>      
            <div class="input_field">
                <p>Menü tartalma és leírása</p>
                <textarea id=" harmadikmenu_leirasa" name="harmadikmenutartalom" placeholder="A menü tartalma..." rows="5" cols="50"></textarea>
            </div> 
            <div class="input_field">
                <p>Menü ára euróban (€)</p>
                <input type="number" id=" harmadikmenu_euro" name="harmadikmenuareur" placeholder="X EUR">
                <p>Menü ára forintban (Ft.)</p>
                <input type="number" id=" harmadikmenu_forint" name="harmadikmenuarhuf" placeholder="X Ft.">
                <p>Menü ára dinárban (RSD)</p>
                <input type="number" id=" harmadikmenu_dinar" name= "harmadikmenuarrsd" placeholder="X RSD">
                <i><strong>FONTOS!</strong><br>Az étterem tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</i>
            </div>   
            <div class="kep_field">
                <p>Képek a menüről (maximum 5 darab) </p>
                <input type="file"  name="kepekMenu3[]" id="harmadikmenu_kepek" accept=".jpg, .jpeg, .png, .webp" multiple="multiple">
                <input type="hidden" name="lang" value="hu">
            </div>
        </section>

        <div class="buttons">    
            <button type="button" id="hatra">Vissza</button>
            <button type="button" id="elore">Tovább</button>
            <button type="submit" name="submit" id="submit" onclick="validateForm()">Befejez</button>
        </div>

    </form>
 
    <a href="kezelopult">Kilépés</a>
    <script src="js/fogadok_hozzaadasa.js"></script>
</body>
</html>