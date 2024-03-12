<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/kezelopult.css">
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
            if(confirm('Az étterem sikeresen közzé lett téve!')) document.location = 'kezelopultt';
            else(document.location = 'kezelopultt')
        </script> ";
        }
    }


    if (isset($_GET['error'])) {
        if ($_GET['error'] == "noneed") {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Az étterem sikeresen módosítva lett!')) document.location = 'kezelopultt';
            else(document.location = 'kezelopultt')
        </script> ";
        }
    }

    require_once 'php/conn.php';

?>


    <aside>
        <img src="img/logo.webp" alt="logo">
        <h2>Hello, <label id="nev"><?php echo $Felhasznalonev; ?></label></h2>
        <ol>
            <p id="kezelopult_gomb"><i class="fa-solid fa-wrench"></i>Kezelőpult</p>
            <p id="foglalasok_gomb"><i class="fa-solid fa-calendar-check"></i>Aktív foglalások</p>
            <p id="elozmenyek_gomb"><i class="fa-solid fa-hourglass-half"></i>Foglalási előzmények</p>
            <?php

    
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM tulaj_prof WHERE ID = $ProfilID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $vaneetterem = $row['etterem'];
        $etteremID = $row['etteremID'];

    if ($vaneetterem != 1) {
        echo "<p id='etterem_hozzaadasa_gomb'><i class='fa-solid fa-plus'></i>Étterem hozzáadása</p>";
    }
    else
    {
        echo "<p id='etterem_szerkesztese'><i class='fa-solid fa-gear'></i>Étterem szerkesztése</p>";
    }



}

    ?>
        </ol>
        <a href="php/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kilép</a>
    </aside>
    <aside class="telefonos_menu">
      <h2>Hello, <label id="nev"><?php echo $Felhasznalonev; ?></label></h2>
      <ol>
          <p id="kezelopult_gomb1"><i class="fa-solid fa-wrench"></i>Kezelőpult</p>
          <p id="foglalasok_gomb2"><i class="fa-solid fa-calendar-check"></i>Aktív foglalások</p>
          <p id="elozmenyek_gomb3"><i class="fa-solid fa-hourglass-half"></i>Foglalási előzmények</p>

<?php

    
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM tulaj_prof WHERE ID = $ProfilID";
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

        $vaneetterem = $row['etterem'];
        $etteremID = $row['etteremID'];

    if ($vaneetterem != 1) {
        echo "<p id='etterem_hozzaadasa_gomb4'><i class='fa-solid fa-plus'></i>Étterem hozzáadása</p>";
    }
    else
    {
        echo "<p id='etterem_szerkesztese5'><i class='fa-solid fa-gear'></i>Étterem szerkesztése</p>";
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
          <i class="fa-solid fa-bars" id="hamburger"></i>
        </nav>
        <section class="kezelopult">
            <div class="szoveg_wrapper">
                <h1>Üdv a kezelőpultban <label id="nev"><?php echo $Felhasznalonev; ?></label></h1>
                <h2>"Fedezzd fel rendszerünk által kínált széleskörű lehetőségeket, hogy még több vendéget vonzz az étteremedbe! Az oldalunkon keresztül könnyedén népszerűsítheted szolgáltatásod és vonzó ajánlatokat kínálhatsz, így növelve az érdeklődést és az ügyfélbázist. Ne hagyd ki ezt a remek lehetőséget, és tedd éttermed a helyi gasztronómiai élet egyik kiemelkedő résztvevőjévé!</h2>    
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
            <div class="nincs_foglalas">
                <i class="fa-solid fa-store-slash"></i>
                <h2>Nincsennek aktív foglalások... még</h2>
            </div>
            <div class="foglalas_wrapper">
                <div class="details">
                    <div class="iconwrap">
                        <i class="fa-solid fa-thumbtack"></i>
                        <p>A Pajta Lakásétterem</p>
                    </div>
                    <div class="iconwrap">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Szeged</p>
                    </div>
                    <div class="iconwrap">
                        <i class="fa-solid fa-clock"></i>
                        <p>2024.03.09</p>
                        <p>15:30 - 17:00</p>
                    </div>
                </div>
                <i class="fa-solid fa-angles-down" id="see_more"></i>
                <table>
                    <tr>
                      <th colspan="2">Rendelés</th>
                    </tr>
                    <tr>
                      <td>Egyén</td>
                      <td>
                        <p>Menü 1: <span >2x</span></p>
                        <p>Menü 2: <span >1x</span></p>
                        <p>Menü 3: <span >3x</span></p>
                      </td>
                    </tr>
                    <tr>
                      <td>Fizetési mód:</td>
                      <td>Helyszíni kézpénzes fizetés</td>
                    </tr>
                    <tr>
                      <td>Végösszeg:</td>
                      <td>1500 rsd</td>
                    </tr>
                    <tr>
                      <td>Foglalás azonosító:</td>
                      <td>800642</td>
                    </tr>
                    <tr>
                      <th colspan="2">Ügyfél adatok</th>
                    </tr>
                    <tr>
                      <td>Név:</td>
                      <td>Egyip Tomi</td>
                    </tr>
                    <tr>
                      <td>Dátum:</td>
                      <td>2024-03-02</td> </tr>
                    <tr>
                      <td>Tel:</td>
                      <td>+3654123</td>
                    </tr>
                    <tr>
                      <td>Vendégek:</td>
                      <td>3</td>
                    </tr>
                </table>
            </div>

            <div class="foglalas_wrapper">
                <div class="details">
                    <div class="iconwrap">
                        <i class="fa-solid fa-thumbtack"></i>
                        <p>A Pajta Lakásétterem</p>
                    </div>
                    <div class="iconwrap">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Szeged</p>
                    </div>
                    <div class="iconwrap">
                        <i class="fa-solid fa-clock"></i>
                        <p>2024.03.09</p>
                        <p>15:30 - 17:00</p>
                    </div>
                </div>
                <i class="fa-solid fa-angles-down" id="see_more"></i>
                <table>
                    <tr>
                      <th colspan="2">Rendelés</th>
                    </tr>
                    <tr>
                      <td>Egyén</td>
                      <td>
                        <p>Menü 1: <span >2x</span></p>
                        <p>Menü 2: <span >1x</span></p>
                        <p>Menü 3: <span >3x</span></p>
                      </td>
                    </tr>
                    <tr>
                      <td>Fizetési mód:</td>
                      <td>Helyszíni kézpénzes fizetés</td>
                    </tr>
                    <tr>
                      <td>Végösszeg:</td>
                      <td>1500 rsd</td>
                    </tr>
                    <tr>
                      <td>Foglalás azonosító:</td>
                      <td>800642</td>
                    </tr>
                    <tr>
                      <th colspan="2">Ügyfél adatok</th>
                    </tr>
                    <tr>
                      <td>Név:</td>
                      <td>Egyip Tomi</td>
                    </tr>
                    <tr>
                      <td>Dátum:</td>
                      <td>2024-03-02</td> </tr>
                    <tr>
                      <td>Tel:</td>
                      <td>+3654123</td>
                    </tr>
                    <tr>
                      <td>Vendégek:</td>
                      <td>3</td>
                    </tr>
                </table>
            </div>

        </section>
        <section class="elozmenyek">
            <div class="szoveg_wrapper">
                <h1>Foglalási előzmények <i class="fa-solid fa-hourglass-half"></i></h1>
                <h2>A lentiekben találhatók a múltban történt foglalások, melyek esetében az étkezés már megtörtént. Ha már vannak előzmények, akkor a kis nyilra kattintva lehet részleteket olvasni.</h2>    
            </div>
            <div class="nincs_foglalas">
                <i class="fa-solid fa-store-slash"></i>
                <h2>Nincsennek előzmények... még</h2>
            </div>
            <!-- <div class="foglalas_wrapper">
                <div class="details">
                    <div class="iconwrap">
                        <i class="fa-solid fa-thumbtack"></i>
                        <p>A Pajta Lakásétterem</p>
                    </div>
                    <div class="iconwrap">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Szeged</p>
                    </div>
                    <div class="iconwrap">
                        <i class="fa-solid fa-clock"></i>
                        <p>2024.03.09</p>
                        <p>15:30 - 17:00</p>
                    </div>
                </div>
                <i class="fa-solid fa-angles-down" id="see_more"></i>
                <table>
                    <tr>
                      <th colspan="2">Rendelés</th>
                    </tr>
                    <tr>
                      <td>Egyén</td>
                      <td>
                        <p>Menü 1: <span >2x</span></p>
                        <p>Menü 2: <span >1x</span></p>
                        <p>Menü 3: <span >3x</span></p>
                      </td>
                    </tr>
                    <tr>
                      <td>Fizetési mód:</td>
                      <td>Helyszíni kézpénzes fizetés</td>
                    </tr>
                    <tr>
                      <td>Végösszeg:</td>
                      <td>1500 rsd</td>
                    </tr>
                    <tr>
                      <td>Foglalás azonosító:</td>
                      <td>800642</td>
                    </tr>
                    <tr>
                      <th colspan="2">Ügyfél adatok</th>
                    </tr>
                    <tr>
                      <td>Név:</td>
                      <td>Egyip Tomi</td>
                    </tr>
                    <tr>
                      <td>Dátum:</td>
                      <td>2024-03-02</td> </tr>
                    <tr>
                      <td>Tel:</td>
                      <td>+3654123</td>
                    </tr>
                    <tr>
                      <td>Vendégek:</td>
                      <td>3</td>
                    </tr>
                </table>
            </div> -->
        </section>
    </main>
    
<script src="js/kezelopult.js"></script>
    
</body>
</html>