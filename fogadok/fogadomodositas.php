<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/etterem_hozzaadas.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <title>Loadeat • Étterem módosítása</title>
</head>
<body>


<?php

session_start();
if(!isset($_SESSION['ID']))
{
    header("Location: bejelentkezes");
    exit();
}
else
{
    $ProfilID = $_SESSION['ID'];
    $Felhasznalonev = $_SESSION['Felhasznalonev'];
}

require_once 'php/conn.php';


mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM etterem WHERE profID = $ProfilID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $tulajdonosNev = $row['tulajdonosNev'];
        $igazolvanyAzonosito = $row['igazolvanyazonosito'];
        $szuletesiDatum = $row['megye'];
        $tel = $row['telefon'];
        $tulajCim = $row['tulajcim'];
        $iban = $row['iban'];
        $etteremID = $row['ID'];

        $etteremneve = $row['etteremnev'];
        $orszag = $row['orszag'];
        $telepules = $row['telepules'];
        $cim = $row['cim'];
        $fizetes = '';
        $onlineFizetes = $row['onlinefizetes'];
        if ($onlineFizetes == 1) {
            $fizetes .= 'Online, ';
        }
        $helykeszpenz = $row['helykeszpenz'];
        if ($helykeszpenz == 1) {
            $fizetes .= 'Helyszíni készpénzes,';
        }
         $helykartya = $row['helykartya'];
        if ($helykartya == 1) {
            $fizetes .= 'Helyszíni kártyás';
        }
        $etteremleiras = $row['etteremleiras'];
        $menuID = $row['menuID'];

    }


    $sql = "SELECT * FROM menuk WHERE menuID = $menuID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $menunev1 = $row['menu1_nev'];
        $menutartalom1 = $row['menu1_tartalom'];
        $menuareur1 = $row['menu1_areur'];
        $menuarhuf1 = $row['menu1_arhuf'];
        $menuarrsd1 = $row['menu1_arrsd'];

         $menunev2 = $row['menu2_nev'];
        $menutartalom2 = $row['menu2_tartalom'];
        $menuareur2 = $row['menu2_areur'];
        $menuarhuf2 = $row['menu2_arhuf'];
        $menuarrsd2 = $row['menu2_arrsd'];


         $menunev3 = $row['menu3_nev'];
        $menutartalom3 = $row['menu3_tartalom'];
        $menuareur3 = $row['menu3_areur'];
        $menuarhuf3 = $row['menu3_arhuf'];
        $menuarrsd3 = $row['menu3_arrsd'];
        

    }

?>


    <h1>Fogadó módosítása  (<span id="oldal_szam">1</span>/5)</h1>

    <form id="form" method="POST" action="php/editrestoran.php"  onsubmit="return validateForm()" enctype="multipart/form-data">
        <section id="1">
            <h2>A tulajdonos adatai</h2>
            <div class="input_field">
                <p>Teljes név / Vállalkozás neve <span style="color: red;">*</span></p>
                <input type="text" name="nev" value="<?php echo $tulajdonosNev; ?>" id="nev" placeholder="Név" required>
            </div>
            <div class="input_field">
                <p>Körzet / Megye / Tartomány <span style="color: red;">*</span></p>
                <input type="text" id="korzet" name="szuldatum" value="<?php echo $szuletesiDatum; ?>" placeholder="Körzet / Megye / Tartomány" required>
            </div>
            <div class="input_field">
                <p>Telefonszám <span style="color: red;">*</span></p>
                <input type="number" id="telszam" name="tel" value="<?php echo $tel; ?>" placeholder="Telefonszám" required>
            </div>
            <div class="input_field">
                <p>Cím (Ország, Helység, Utca és házszám)<span style="color: red;"> *</span></p>
                <input type="text" id="cim" name="cim" value="<?php echo $tulajCim; ?>" placeholder="Ország, Helység, Utca és házszám" required>
            </div>
            <div class="input_field">
                <p>Adószám <span style="color: red;">*</span></p>
                <input type="text" id="adoszam" name="igazolvanyszam" value="<?php echo $igazolvanyAzonosito; ?>" placeholder="Adószám" required>
            </div>
            <div class="input_field">
                <p>IBAN számlaszám<span style="color: red;"> *</span></p>
                <input type="text" id="IBAN" value="<?php echo $iban; ?>" name="szamla" placeholder="Pl: HU 42 1192 2838 2938 2819 0000 0000" required>
                <i>Ha a vendég a foglalásnál az Online fizetés opciót válassza erre a számlaszámra fogja ön megkapni a pénzt a foglalást követő 24 órában. Harmadik fél nem jut hozzá az eféle bizalmas adatokhoz.</i>
            </div>
        </section>
        <section id="2">
            <h2>A Fogadó adatai</h2>
            <div class="input_field">
                <p>A fogadó neve <span style="color: red;"> *</span></p>
                <input type="text" value="<?php echo $etteremneve; ?>" id="etterem_nev" name="etteremnev" placeholder="Név" required>
            </div>
            <div class="input_field">
                <p>A fogadó országa <span style="color: red;"> *</span></p>
                <input type="text" value="<?php echo $orszag; ?>" id="etterem_orszag" name="orszag" placeholder="Pl: Magyarország" required>
            </div>
            <div class="input_field">
                <p>A fogadó településének a neve <span style="color: red;"> *</span></p>
                <input type="text" value="<?php echo $telepules; ?>" id="etterem_telepules" name="telepules" placeholder="Pl: Eger" required>
            </div>
            <div class="input_field">
                <p>Utca és házszám <span style="color: red;"> *</span></p>
                <input type="text" value="<?php echo $cim; ?>" id="etterem_utca" name="utcahazszam" placeholder="Pl: Petőfi Sándor 12." required>
            </div>
            <div class="checkbox_field">
                <p>Fizetési lehetőségek az ön fogadója esetében <span style="color: red;"> *</span></p>
                <div class="container">
                <input type="checkbox" id="fizetes_készpénz" name="keszpenz">
                <label for="fizetes_készpénz">Helyszini készpénzes fizetés<br></label>
                <input type="checkbox" id="fizetes_kartya" name="kartya">
                <label for="fizetes_kartya">Helyszini kártyás fizetés</label>
                <i><strong>Mi a helyzet az Online fizetéssel?</strong><br>Az Online fizetést NEM lehet kikapcsolni, tehát ez a funkció autómatikusan be van aktiválva minden fogadó részére. Amennyiben ez önnek problémát okoz, kérjük keresse fel ügyfélszolgálatunk.</i>
                </div>
            </div>
            <div class="kep_field">
                <p>Képek a fogadóról (maximum 5 darab) <span style="color: red;"> *</span></p>
                <input type="file"  name="kepek[]" id="etterem_kepek" accept=".jpg, .jpeg, .png, .webp" multiple="multiple" required>
            </div>
            <div class="input_field">
                <p>Fogadó leírása <span style="color: red;"> *</span></p>
                <textarea id="etterem_leiras" name="bemutatas" rows="5" cols="50" placeholder="Fogadó leírasa..." required><?php echo $etteremleiras; ?></textarea>
            </div>
        </section>
        <section id="3">
            <h2>Első menü adatai</h2>
            <div class="input_field">
                <p>Menü neve <span style="color: red;"> *</span></p>
                <input type="text" value="<?php echo $menunev1; ?>" id="elsomenu_neve" name="elsomenunev" placeholder="Név" required>
            </div>      
            <div class="input_field">
                <p>Menü tartalma és leírása<span style="color: red;"> *</span></p>
                <textarea id="elsomenu_leirasa" name="elsomenutartalom" placeholder="A menü tartalma..." rows="5" cols="50" required><?php echo $menutartalom1; ?></textarea>
            </div> 
            <div class="input_field">
                <p>Menü ára euróban (€) <span style="color: red;"> *</span></p>
                <input type="number" id="elsomenu_euro" value="<?php echo $menuareur1; ?>" name="elsomenuareur" placeholder="X EUR" required>
                <p>Menü ára forintban (Ft.) <span style="color: red;"> *</span></p>
                <input type="number" id="elsomenu_forint" value="<?php echo $menuarhuf1; ?>" name="elsomenuarhuf" placeholder="X Ft." required>
                <p>Menü ára dinárban (RSD) <span style="color: red;"> *</span></p>
                <input type="number" id="elsomenu_dinar" value="<?php echo $menuarrsd1; ?>" name="elsomenuarrsd" placeholder="X RSD" required>
                <i><strong>FONTOS!</strong><br>A fogadó tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</i>
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
                <input type="text" value="<?php echo $menunev2; ?>" id="masodikmenu_neve" name="masodikmenunev" placeholder="Név">
            </div>      
            <div class="input_field">
                <p>Menü tartalma és leírása</p>
                <textarea id="masodikmenu_leirasa" name="masodikmenutartalom" placeholder="A menü tartalma..." rows="5" cols="50"><?php echo $menutartalom2; ?></textarea>
            </div> 
            <div class="input_field">
                <p>Menü ára euróban (€)</p>
                <input type="number" id="masodikmenu_euro" value="<?php echo $menuareur2; ?>" name="masodikmenuareur" placeholder="X EUR">
                <p>Menü ára forintban (Ft.)</p>
                <input type="number" id="masodikmenu_forint" value="<?php echo $menuarhuf2; ?>" name="masodikmenuarhuf" placeholder="X Ft.">
                <p>Menü ára dinárban (RSD)</p>
                <input type="number" id="masodikmenu_dinar" value="<?php echo $menuarrsd2; ?>" name="masodikmenuarrsd" placeholder="X RSD">
                <i><strong>FONTOS!</strong><br>A fogadó tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</i>
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
                <input type="text" id="harmadikmenu_neve" value="<?php echo $menunev3; ?>" name="harmadikmenunev" placeholder="Név">
            </div>      
            <div class="input_field">
                <p>Menü tartalma és leírása</p>
                <textarea id="harmadikmenu_leirasa" name="harmadikmenutartalom" placeholder="A menü tartalma..." rows="5" cols="50"><?php echo $menutartalom3; ?></textarea>
            </div> 
            <div class="input_field">
                <p>Menü ára euróban (€)</p>
                <input type="number" id=" harmadikmenu_euro" value="<?php echo $menuareur3; ?>" name="harmadikmenuareur" placeholder="X EUR">
                <p>Menü ára forintban (Ft.)</p>
                <input type="number" id=" harmadikmenu_forint" value="<?php echo $menuarhuf3; ?>" name="harmadikmenuarhuf" placeholder="X Ft.">
                <p>Menü ára dinárban (RSD)</p>
                <input type="number" id=" harmadikmenu_dinar" value="<?php echo $menuarrsd3; ?>" name= "harmadikmenuarrsd" placeholder="X RSD">
                <i><strong>FONTOS!</strong><br>A fogadó tulajdonos dolga beleszámolni az árakba azt a 12%-os díjat, amit az oldal minden foglalás azaz étkezés után felszámít. Online fizetés esetében ez automatikusan levónodik, míg helyszini fizetés esetén utólagos számlát küldünk ki erről az összegről.</i>
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
 
    <a href="kezelopultt">Kilépés</a>
    <script src="../js/fogadok_hozzaadasa.js"></script>
</body>
</html>