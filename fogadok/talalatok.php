<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat - Éttermeink</title>
    <link rel="stylesheet" href="../css/ettermek.css">
</head>
<body>
    <!--Kereső-->
    <header class="header">
        <h1 class="header-title"><span class="color-red">Load</span>eat</h1>
        <p class="header-p">- Fogadóink</p>
        <div class="header-form">
            <p class="header-form-p">Keresd meg a számodra legtökéletesebb lakáséttermet:</p>
            <form  method="POST" action="php/kereses.php">          
                <select type="text" name="helyseg" required="required" placeholder="Add meg a helységet" class="form-text">


                    <option value='' selected='selected' disabled='disabled'>Válassz megyét / körzetet</option>
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
                <input type="text" name="datum" required="required" class="form-date"  onfocus="(this.type='date')" placeholder="Válassz dátumot" onblur="(this.type='text')">
                <select name="idopont" id="idopont" class="form-select" required>
                    <option value='' selected='selected' disabled='disabled'>Válassz időpontot</option>
                                    <option value="11:30 - 13:00">11:30 - 13:00</option>
                                    <option value="13:30 - 15:00">13:30 - 15:00</option>
                                    <option value="15:30 - 17:00">15:30 - 17:00</option>
                                    <option value="17:30 - 19:00">17:30 - 19:00</option>
                                    <option value="19:30 - 21:00">19:30 - 21:00</option>
                </select>               
                <button class="form-button" name="sub"><img src="../img/icons8-search-50.png" class="form-img-search"> Keresés</button>
            </form>
            
        </div>
    </header>
    <!--Étterem Kilistázás-->
    <section class="main">



        <?php

        function removeAccents($str) {
                        $accents = array(
                            'á' => 'a',
                            'é' => 'e',
                            'í' => 'i',
                            'ó' => 'o',
                            'ö' => 'o',
                            'ő' => 'o',
                            'ú' => 'u',
                            'ü' => 'u',
                            'ű' => 'u',
                            'Á' => 'A',
                            'É' => 'E',
                            'Í' => 'I',
                            'Ó' => 'O',
                            'Ö' => 'O',
                            'Ő' => 'O',
                            'Ú' => 'U',
                            'Ü' => 'U',
                            'Ű' => 'U',
                        );
                        return strtr($str, $accents);
                    }

        if (isset($_GET['telepules']) && isset($_GET['telepules'])!= null) {

            $helyseg = $_GET['telepules'];
            $datum = (isset($_GET['datum'])) ? $_GET['datum'] : header("Location: https://loadeat.comm");
            $idopont = (isset($_GET['idopont'])) ? $_GET['idopont'] : header("Location: https://loadeat.comm");

            require_once 'php/conn.php';

mysqli_set_charset($conn, "utf8");
            $sql = "SELECT * FROM etterem";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) 
            {
                $foglat = 0;
                $jo = 0;
                $EtteremID = $row['ID'];

                    $sql2 = "SELECT * FROM foglalasok WHERE etteremID = $EtteremID";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                      while ($row2 = $result2->fetch_assoc())
                    {
                        $fog_datum = $row2['datum'];
                        if ($fog_datum == $datum) {
                            $fog_idopont = $row2['idopont'];
                            if ($fog_idopont == $idopont) {
                                $foglat = 1;
                            }
                        }
                    }  
                    }
                  
                    if (strtolower(removeAccents($helyseg)) != strtolower(removeAccents($row['megye']))) {
                         $jo = 0;
                    }
                    else
                    {
                        $jo = 1; 
                    }

                if ($jo == 1) {

                    $etteremnev = $row['etteremnev'];
                    $orszag = $row['orszag'];
                    $telepules = $row['telepules'];
                    $cim = $row['cim'];
                    $kepek = $row['etteremkepek'];

                    $kepektomb = explode(",", $kepek);
                    if ($kepektomb[0] != null) {
                        $kep = $kepektomb[0];
                    }

                    echo 
                    "
                      <!--Étterem Blokk-->
        <div class='etterem'>";

        if($foglat == 1)
        {
            echo "<div class='etterem-block'>
            <a href='fogado?eid=$EtteremID'><img src='../files/$kep' class='etterem-image'>
            <span class='foglalt'>Foglalt</span>
            </a>
        </div>";
        }
        else
        {
            echo "<a href='fogado?eid=$EtteremID'><img src='../files/$kep' class='etterem-image'></a>";
        }

            echo "
                <div class='etterem-adatok'>
                    <div>
                        <span class='etterem-data'><img src='../img/icons8-sign-50.png' alt=''></span>
                        <span class='etterem-data opacity'>$etteremnev</span>
                    </div>
                    <div>
                        <span class='etterem-data'><img src='../img/icons8-location-50.png' alt=''></span>
                        <span class='etterem-data opacity'>$orszag </span>
                    </div>
                    <div>
                        <span class='etterem-data'><img src='../img/icons8-country-50.png' alt=''></span>
                        <span class='etterem-data opacity'>$telepules</span>
                    </div> 
                    
                    <div>
                        <span class='etterem-data'><img src='../img/icons8-house-50.png' alt=''></span>
                        <span class='etterem-data opacity'>$cim<span>
                    </div>
            </div>
        </div>  
                    ";
                }       
            }
        }
        else
        {
            header("Location: https://loadeat.com");
            exit();
        }

        ?>


    </section>



</body>
</html>
