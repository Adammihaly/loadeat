<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/kezelopult.css">
    <title>Loadeat • Kezelőpult</title>
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



if (isset($_GET['error'])) {
        if ($_GET['error'] == "none") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Az étterem sikeresen közzé lett téve!')) document.location = 'kezelopult';
            else(document.location = 'kezelopult')
        </script> ";
        }
    }


    if (isset($_GET['error'])) {
        if ($_GET['error'] == "noneed") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Az étterem sikeresen módosítva lett!')) document.location = 'kezelopult';
            else(document.location = 'kezelopult')
        </script> ";
        }
    }

    require_once 'php/conn.php';

?>


    <aside>
        <img src="../img/logo.webp" alt="logo">
        <h2>Hello, <label id="nev"><?php echo $Felhasznalonev; ?></label></h2>
        <ol>
            <p id="kezelopult_gomb" onclick="kezelopultgomb()"><i class="fa-solid fa-wrench"></i>Kezelőpult</p>
            <p id="foglalasok_gomb" onclick="foglalasokgomb()" ><i class="fa-solid fa-calendar-check"></i>Aktív foglalások</p>
            <p id="elozmenyek_gomb" onclick="elozmenyekgomb()" ><i class="fa-solid fa-hourglass-half"></i>Foglalási előzmények</p>
            <?php

    
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM tulaj_prof WHERE ID = $ProfilID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $vaneetterem = $row['etterem'];
        $etteremID = $row['etteremID'];

    if ($vaneetterem != 1) {
        echo "<p id='etterem_hozzaadasa_gomb onclick='linketteremreg()''><i class='fa-solid fa-plus'></i>Étterem hozzáadása</p>";
    }
    else
    {
        echo "<p id='etterem_szerkesztese' onclick='linketteremmodositas()''><i class='fa-solid fa-gear'></i>Étterem szerkesztése</p>";
    }



}

    ?>
        </ol>
        <a href="../php/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kilép</a>
    </aside>
    <aside class="telefonos_menu">
      <h2>Hello, <label id="nev"><?php echo $Felhasznalonev; ?></label></h2>
      <ol>
            <p id="kezelopult_gomb" onclick="kezelopultgomb()"><i class="fa-solid fa-wrench"></i>Kezelőpult</p>
            <p id="foglalasok_gomb" onclick="foglalasokgomb()"><i class="fa-solid fa-calendar-check"></i>Aktív foglalások</p>
            <p id="elozmenyek_gomb" onclick="elozmenyekgomb()"><i class="fa-solid fa-hourglass-half"></i>Foglalási előzmények</p>

<?php

    
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM tulaj_prof WHERE ID = $ProfilID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $vaneetterem = $row['etterem'];
        $etteremID = $row['etteremID'];

    if ($vaneetterem != 1) {
        echo "<p id='etterem_hozzaadasa_gomb onclick='linketteremreg()''><i class='fa-solid fa-plus'></i>Étterem hozzáadása</p>";
    }
    else
    {
        echo "<p id='etterem_szerkesztese' onclick='linketteremmodositas()''><i class='fa-solid fa-gear'></i>Étterem szerkesztése</p>";    
    }



}

    ?>
          
          
      </ol>
      <a href="php/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kilép</a>
    </aside>
    <main>
        <nav>
            <a href="lakasetterem"><i class="fa-solid fa-house"></i>Kezdőlap</a>
            <form class="search_wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Keresés">
            </form>
        </nav>
        <nav class="telefonos">
          <img src="img/logo.webp" alt="">
          <i class="fa-solid fa-bars" id="hamburger" onclick="hamburger()"></i>
        </nav>
        <section class="kezelopult">
            <div class="szoveg_wrapper">
                <h1>Üdv a kezelőpultban <label id="nev"><?php echo $Felhasznalonev; ?></label></h1>
                <h2>Fedezd fel rendszerünk által kínált széleskörű lehetőségeket, hogy még több vendéget vonzz az étteremedbe! Az oldalunkon keresztül könnyedén népszerűsítheted szolgáltatásod és vonzó ajánlatokat kínálhatsz, így növelve az érdeklődést és az ügyfélbázist. Ne hagyd ki ezt a remek lehetőséget, és tedd éttermed a helyi gasztronómiai élet egyik kiemelkedő résztvevőjévé!</h2>    
            </div>
            <div class="gomb_wrap">
                    <?php

    
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM tulaj_prof WHERE ID = $ProfilID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $vaneetterem = $row['etterem'];
        $etteremID = $row['etteremID'];

    if ($vaneetterem != 1) {
        echo "<a href='etteremreg'>Étterem regisztrálása</a>";
    }
    else
    {
        echo "<a href='etterem?eid=$etteremID'>Étterem előnézete</a>";
    }



}

    ?>
                
                <p>Köszönjük a regisztrációt </p>
            </div>
        </section>
        <section class="foglalasok">
            <div class="szoveg_wrapper">
                <h1>Aktív foglalások <i class="fa-solid fa-calendar-check"></i></h1>
                <h2>A lentiekben találhatók a jelenleg is aktív foglalások. Egy adott foglalás a helyszini étkezést követően átmegy a foglalási Előzmények részre. Foglalások esetén a lefelé mutató nyilra kattintva lehet látni a foglalás részleteit.</h2>    
            </div>

            <?php

            $nincsetterem = 0;
            $etteremID = '';

            $sql = "SELECT * FROM etterem WHERE profID = $ProfilID";
        $result = $conn->query($sql);
        if ($result->num_rows <= 0) {
            $nincsetterem = 1;
        }

    while ($row = $result->fetch_assoc()) {

        $etteremID = $row['ID'];
        if ($etteremID == null) {
            $nincsetterem = 1;
        }
        $etteremNev = $row['etteremnev']; 
        $etteremTelepules = $row['telepules'];
        $menuID = $row['menuID'];

    }

$szamlalo1 = 0;

if ($nincsetterem != 1) {
    

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

    

    if ($etteremID != null) {
        
            $sql = "SELECT * FROM foglalasok WHERE etteremID = $etteremID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $datum = $row['datum'];
        $idopont = $row['idopont'];
        $nev = $row['nev'];
        $tel = $row['tel'];
        $szuldat = $row['szulDatum'];
        $letszam = $row['letszam'];
        $penznem = $row['penznem'];
        $elsomenu = $row['elsomenu'];
        $masodikmenu = $row['masodikmenu'];
        $harmadikmenu = $row['harmadikmenu'];
        $idopont = $row['idopont'];
        $fizetes = $row['fizetes'];
        $foglalasazon = $row['foglalasID'];
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

        $mainap = new DateTime();
        $datum2 = new DateTime($datum);
        $datum2->add(new DateInterval('P1D'));
        

        if ($datum != null && $mainap < $datum2) {
            

            echo "<div class='foglalas_wrapper'>
                <div class='details'>
                    <div class='iconwrap'>
                        <i class='fa-solid fa-thumbtack'></i>
                        <p>$etteremNev</p>
                    </div>
                    <div class='iconwrap'>
                        <i class='fa-solid fa-location-dot'></i>
                        <p>$etteremTelepules</p>
                    </div>
                    <div class='iconwrap'>
                        <i class='fa-solid fa-clock'></i>
                        <p>$datum</p>
                        <p>$idopont</p>
                    </div>
                </div>
                <i class='fa-solid fa-angles-down' id='see_more' onclick='tablamegjelenit($szamlalo1)'></i>
                <table >
                    <tr>
                      <th colspan='2'>Rendelés</th>
                    </tr>
                    <tr>
                      <td>Menü</td>
                      <td>";

                            if ($elsomenu > 0) {
                                echo "<p>$menu1nev: <span >$elsomenu x</span></p>";
                            }
                            if ($masodikmenu > 0) {
                                echo "<p>$menu2nev: <span >$masodikmenu x</span></p>";
                            }
                            if ($harmadikmenu > 0) {
                                echo "<p>$menu3nev: <span >$harmadikmenu x</span></p>";
                            }

                            echo "
                      </td>
                    </tr>
                    <tr>
                      <td>Fizetési mód:</td>
                      <td>$fizetes</td>
                    </tr>
                    <tr>
                      <td>Végösszeg:</td>
                      <td>$vegosszeg $penznemk</td>
                    </tr>
                    <tr>
                      <td>Foglalás azonosító:</td>
                      <td>$foglalasazon</td>
                    </tr>
                    <tr>
                      <th colspan='2'>Ügyfél adatok</th>
                    </tr>
                    <tr>
                      <td>Név:</td>
                      <td>$nev</td>
                    </tr>
                    <tr>
                      <td>Dátum:</td>
                      <td>$szuldat</td> </tr>
                    <tr>
                      <td>Tel:</td>
                      <td>$tel</td>
                    </tr>
                    <tr>
                      <td>Vendégek:</td>
                      <td>$letszam</td>
                    </tr>
                </table>
            </div>";

            $szamlalo1++;


        }
        
    }
    }}

    if ($szamlalo1 == 0) {
        echo "<div class='nincs_foglalas'>
                <i class='fa-solid fa-store-slash'></i>
                <h2>Nincsennek aktív foglalások... még</h2>
            </div>";
    }

            ?>

            




        </section>
        <section class="elozmenyek">
            <div class="szoveg_wrapper">
                <h1>Foglalási előzmények <i class="fa-solid fa-hourglass-half"></i></h1>
                <h2>A lentiekben találhatók a múltban történt foglalások, melyek esetében az étkezés már megtörtént. Ha már vannak előzmények, akkor a kis nyilra kattintva lehet részleteket olvasni.</h2>    
            </div>
            
             <?php

            $nincsetterem = 0;
            $etteremID = '';

            $sql = "SELECT * FROM etterem WHERE profID = $ProfilID";
        $result = $conn->query($sql);
        if ($result->num_rows <= 0) {
            $nincsetterem = 1;
        }

    while ($row = $result->fetch_assoc()) {

        $etteremID = $row['ID'];
        if ($etteremID == null) {
            $nincsetterem = 1;
        }
        $etteremNev = $row['etteremnev']; 
        $etteremTelepules = $row['telepules'];
        $menuID = $row['menuID'];

    }

$szamlalo2 = $szamlalo1;

if ($nincsetterem != 1) {
    

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

    

    if ($etteremID != null) {
        
            $sql = "SELECT * FROM foglalasok WHERE etteremID = $etteremID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $datum = $row['datum'];
        $idopont = $row['idopont'];
        $nev = $row['nev'];
        $tel = $row['tel'];
        $szuldat = $row['szulDatum'];
        $letszam = $row['letszam'];
        $penznem = $row['penznem'];
        $elsomenu = $row['elsomenu'];
        $masodikmenu = $row['masodikmenu'];
        $harmadikmenu = $row['harmadikmenu'];
        $idopont = $row['idopont'];
        $fizetes = $row['fizetes'];
        $foglalasazon = $row['foglalasID'];
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

        $mainap = new DateTime();
        $datum2 = new DateTime($datum);
        $datum2->add(new DateInterval('P1D'));
        

        if ($datum != null && $mainap > $datum2) {
            

            echo "<div class='foglalas_wrapper'>
                <div class='details'>
                    <div class='iconwrap'>
                        <i class='fa-solid fa-thumbtack'></i>
                        <p>$etteremNev</p>
                    </div>
                    <div class='iconwrap'>
                        <i class='fa-solid fa-location-dot'></i>
                        <p>$etteremTelepules</p>
                    </div>
                    <div class='iconwrap'>
                        <i class='fa-solid fa-clock'></i>
                        <p>$datum</p>
                        <p>$idopont</p>
                    </div>
                </div>
                <i class='fa-solid fa-angles-down' id='see_more' onclick='tablamegjelenit($szamlalo2)'></i>
                <table >
                    <tr>
                      <th colspan='2'>Rendelés</th>
                    </tr>
                    <tr>
                      <td>Menü</td>
                      <td>";

                            if ($elsomenu > 0) {
                                echo "<p>$menu1nev: <span >$elsomenu x</span></p>";
                            }
                            if ($masodikmenu > 0) {
                                echo "<p>$menu2nev: <span >$masodikmenu x</span></p>";
                            }
                            if ($harmadikmenu > 0) {
                                echo "<p>$menu3nev: <span >$harmadikmenu x</span></p>";
                            }

                            echo "
                      </td>
                    </tr>
                    <tr>
                      <td>Fizetési mód:</td>
                      <td>$fizetes</td>
                    </tr>
                    <tr>
                      <td>Végösszeg:</td>
                      <td>$vegosszeg $penznemk</td>
                    </tr>
                    <tr>
                      <td>Foglalás azonosító:</td>
                      <td>$foglalasazon</td>
                    </tr>
                    <tr>
                      <th colspan='2'>Ügyfél adatok</th>
                    </tr>
                    <tr>
                      <td>Név:</td>
                      <td>$nev</td>
                    </tr>
                    <tr>
                      <td>Dátum:</td>
                      <td>$szuldat</td> </tr>
                    <tr>
                      <td>Tel:</td>
                      <td>$tel</td>
                    </tr>
                    <tr>
                      <td>Vendégek:</td>
                      <td>$letszam</td>
                    </tr>
                </table>
            </div>";

            $szamlalo2++;


        }
        
    }
    }}

    if ($szamlalo1 == 0) {
        echo "<div class='nincs_foglalas'>
                <i class='fa-solid fa-store-slash'></i>
                <h2>Nincsennek aktív foglalások... még</h2>
            </div>";
    }

            ?>


        </section>
    </main>
    
<script src="./js/kezelopult.js"></script>
    
</body>
</html>