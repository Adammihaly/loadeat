<?php

require_once '../php/conn.php';

    if(!isset($_GET['eid']))
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    else
    {
        $ID = $_GET['eid'];
    }


        $sql = "SELECT * FROM etterem WHERE ID = $ID";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) 
            {
                $etteremnev = $row['etteremnev'];
                $orszag = $row['orszag'];
                $telepules = $row['telepules'];
                $cim = $row['cim'];
                $onlinefizetes = $row['onlinefizetes'];
                $helykeszpenz = $row['helykeszpenz'];
                $helykartya = $row['helykartya'];
                $etteremkepek = $row['etteremkepek'];
                $etteremkepek = explode(",", $etteremkepek);
                $etteremleiras = $row['etteremleiras'];
                $menuID = $row['menuID'];
                $etteremID = $row['ID'];
            }

            $sql = "SELECT * FROM menuk WHERE menuID = $menuID";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) 
            {
                $menu_1_nev = $row['menu1_nev'];
                $menu_2_nev = $row['menu2_nev'];
                $menu_3_nev = $row['menu3_nev'];
                $menu_1_tartalom = $row['menu1_tartalom'];
                $menu_2_tartalom = $row['menu2_tartalom'];
                $menu_3_tartalom = $row['menu3_tartalom'];
                $menu_1_areur = $row['menu1_areur'];
                $menu_2_areur = $row['menu2_areur'];
                $menu_3_areur = $row['menu3_areur'];
                $menu_1_arhuf = $row['menu1_arhuf'];
                $menu_2_arhuf = $row['menu2_arhuf'];
                $menu_3_arhuf = $row['menu3_arhuf'];
                $menu_1_arrsd = $row['menu1_arrsd'];
                $menu_2_arrsd = $row['menu2_arrsd'];
                $menu_3_arrsd = $row['menu3_arrsd'];
                $menu_1_kepek = $row['menu1_kepek'];
                $menu_2_kepek = $row['menu2_kepek'];
                $menu_3_kepek = $row['menu3_kepek'];
                $menu_1_kepek = explode(",", $menu_1_kepek);
                $menu_2_kepek = explode(",", $menu_2_kepek);
                $menu_3_kepek = explode(",", $menu_3_kepek);
            }


$currencyPrices1 = array(
    'huf' => $menu_1_arhuf,
    'eur' => $menu_1_areur,
    'rsd' => $menu_1_arrsd
);

$currencyPrices2 = array(
    'huf' => $menu_2_arhuf,
    'eur' => $menu_2_areur,
    'rsd' => $menu_2_arrsd
);

$currencyPrices3 = array(
    'huf' => $menu_3_arhuf,
    'eur' => $menu_3_areur,
    'rsd' => $menu_3_arrsd
);



session_start();
$bejelentkezve = 1;
if(!isset($_SESSION['ID']))
{
    $bejelentkezve = 0;
}
else
{
    $ProfilID = $_SESSION['ID'];
    $Felhasznalonev = $_SESSION['Felhasznalonev'];
}



if (isset($_GET['f'])) {
        if ($_GET['f'] == 1) {
            echo "  
                
            <script type='text/javascript'>
            if(confirm('Your reservation was unsuccessful! The restaurant was already booked at the given time. Please choose another date!')) document.location = 'etterem?eid=$etteremID';
            else(document.location = 'etterem?eid=$etteremID')
        </script> ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FLATICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css"
        integrity="sha512-W/zrbCncQnky/EzL+/AYwTtosvrM+YG/V6piQLSe2HuKS6cmbw89kjYkp3tWFn1dkWV7L1ruvJyKbLz73Vlgfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../css/reszletek.css">

    <title>Loadeat • Restaurant</title>
</head>

<body>
    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
                <div class="home-data-container-fullscreen container">

                    <div class="home-data">
                        <h1 class="home-title" id="etteremNev"><?php echo "$etteremnev";?></h1>
                        <div class="home-description">
                            <div class="home-box">
                                <img src="../img/location.svg" alt="location" class="home-data-icon">
                                <p class="home-data-p" id="etteremCime"><?php echo "$telepules, $cim ($orszag)";?></p>
                            </div>

                            <div class="home-box">
                                <img src="../img/mail.svg" alt="mail" class="home-data-icon">
                                <p class="home-data-p" id="etteremEmail">Contact is possible through the Loadeat website
                                </p>
                            </div>
                        </div>
                        <div class="home-section-container-hr"></div>
                    </div>

                    
                    <div class="fullscreen-container grid">
                        <div class="wrapper">
                            <div class="swiper swiper-fullscreen">
                                <div class="swiper-wrapper">
                                     <?php

                                    $index = 0;
                                    while ($index < count($etteremkepek)) {
                                       if ($etteremkepek[$index] != null) {
                                           
                                       
                                        echo "
                                        <div class='swiper-slide'>
                                        <div class='card-contents'>
                                            <img src='../files/$etteremkepek[$index]' />
                                            <div class='card-description'>
                                            </div>
                                        </div>
                                    </div>";
                                }

                                    $index++;

                                    }

                                    ?>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
    
                        <div class="home-section-container-fullscreen container">
                            <h2 class="home-section-container-title">Information about the restaurant:</h2>
                            <p class="home-section-container-description" id="etteremLeiras"><?php echo "$etteremleiras";?></p>
                            <h2 class="home-section-container-title">Payment options:</h1>
                                <ul class="home-section-container-ul">
                                    <?php

                                    if ($helykeszpenz == 1) {
                                        echo "<li class='home-section-container-list'><img src='../img/wallet.svg' alt='wallet'
                                            class='home-section-container-icon'> Cash payment on the spot</li>";
                                    }
                                    if ($helykartya == 1) {
                                        echo "<li class='home-section-container-list'><img src='../img/pay.svg' alt='pay'
                                            class='home-section-container-icon'> Card payment on the spot</li>";
                                    }

                                    ?>
                                    <li class="home-section-container-list"><img src="../img/online-pay.svg"
                                            alt="online payment" class="home-section-container-icon"> Online payment</li>
                                </ul>

                                <?php

                                
                                    echo "<button class='button foglalasBtn' id='foglalasBtn' onclick='showPopup()'>Reservation</button>";
                                
                                

                                ?>

                                
                                <a href="#menu"><button class="button">View menus</button></a>
                        </div>
                    </div>
                </div>
        
            <div class="home-container grid">
                <?php 
                echo "<img src='../files/$etteremkepek[0]' alt='etterem' class='home-img etteremKepek'>";
                 ?>
                
                <div class="home-data-container container">
                    <div class="home-data">
                        <h1 class="home-title" id="etteremNev"><?php echo "$etteremnev";?></h1>
                        <div class="home-description">
                            <div class="home-box">
                                <img src="../img/location.svg" alt="location" class="home-data-icon">
                                <p class="home-data-p" id="etteremCime"><?php echo "$telepules, $cim ($orszag)";?></p>
                            </div>

                            <div class="home-box">
                                <img src="../img/mail.svg" alt="mail" class="home-data-icon">
                                <p class="home-data-p" id="etteremEmail">Contact is possible through the Loadeat website
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="home-section-container container">
                    <!-- <div class="home-section-container-hr"></div> -->
                    <h2 class="home-section-container-title">Information about the restaurant:</h2>
                    <p class="home-section-container-description" id="etteremLeiras"><?php echo "$etteremleiras";?></p>
                    <h2 class="home-section-container-title">Payment options:</h1>
                        <ul class="home-section-container-ul">
                            <?php

                                    if ($helykeszpenz == 1) {
                                        echo "<li class='home-section-container-list'><img src='../img/wallet.svg' alt='wallet'
                                            class='home-section-container-icon'> Cash payment on the spot</li>";
                                    }
                                    if ($helykartya == 1) {
                                        echo "<li class='home-section-container-list'><img src='../img/pay.svg' alt='pay'
                                            class='home-section-container-icon'> Card payment on the spot</li>";
                                    }

                                    ?>
                            <li class="home-section-container-list"><img src="../img/online-pay.svg"
                                    alt="online payment" class="home-section-container-icon"> Online payment</li>
                        </ul>
                        <button class="button foglalasBtn" id="foglalasBtn" onclick="showPopup()">Reservation</button>
                        <a href="#menu"><button class="button">View menus</button></a>
                </div>
            </div>
        </section>

        <!--==================== MENU ====================-->
        <section class="menu section container" id="menu">
            <div class="menu-side-container">
                <h1 class="menu-container-title">Menus</h1>
                <button class="button menu-button">HUF</button>
                <button class="button menu-button">EUR</button>
                <button class="button menu-button">RSD</button>
                <div class="menu-hr"></div>
            </div>

            <div class="menu-hr-container">

                <div class="menu-section-container">
                    <div class="menu-container grid">
    
                        <div class="wrapper">
                            <div class="swiper menu-swiper">
                               <div class="swiper-wrapper">
                                    <?php

                                    $index = 0;
                                    while ($index < count($menu_1_kepek)) {
                                       if ($menu_1_kepek[$index] != null) {
                                           
                                       
                                        echo "
                                        <div class='swiper-slide'>
                                        <div class='card-contents'>
                                            <img src='../files/$menu_1_kepek[$index]'  class='swiper-image'/>
                                            <div class='card-description'>
                                            </div>
                                        </div>
                                    </div>";
                                }

                                    $index++;

                                    }

                                    ?>
                                </div> 
                                                            
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
        
                        <div class="menu-data">
                            <h2 class="menu-title" id="menuNev">
                                <?php echo "$menu_1_nev";?>
                            </h2>
                            <p class="menu-description" id="menuLeiras">
                                <?php echo "$menu_1_tartalom";?>
                            </p>
                            <p class="menu-price">The price of the menu in different <br> currencies:
                                <span id="price-huf"></span>
                                <span id="price-eur" style="display: none;"></span>
                                <span id="price-rsd" style="display: none;"></span>
                            </p>
                            <?php

                                
                                    echo "<button class='button foglalasBtn' id='foglalasBtn' onclick='showPopup()'>Reservation</button>";
                                
                                

                                ?>
                            
                        </div>
                        
                    </div>

                   <?php
                   if ($menu_2_areur != 0) {
                       
                   echo "
                    <div class='menu-container grid'>
    
                        <div class='wrapper'>
                            <div class='swiper menu-swiper'>
                                <div class='swiper-wrapper'>
                                    
                                ";
                                    $index = 0;
                                    while ($index < count($menu_2_kepek)) {
                                       if ($menu_2_kepek[$index] != null) {
                                           
                                       
                                        echo "
                                        <div class='swiper-slide'>
                                        <div class='card-contents'>
                                            <img src='../files/$menu_2_kepek[$index]' class='swiper-image'/>
                                            <div class='card-description'>
                                            </div>
                                        </div>
                                    </div>";
                                }

                                    $index++;

                                    }

                                    echo "
                                    
                                </div>
                                <div class='swiper-button-next'></div>
                                <div class='swiper-button-prev'></div>
                                <div class='swiper-pagination'></div>
                            </div>
                        </div>
        
                        <div class='menu-data'>
                            <h2 class='menu-title' id='menuNev'>
                                 $menu_2_nev
                            </h2>
                            <p class='menu-description' id='menuLeiras'>
                                $menu_2_tartalom
                            </p>
                            <p class='menu-price'>The price of the menu in different <br> currencies:
                                <span id='price-huf2'></span>
                                <span id='price-eur2' style='display: none;'></span>
                                <span id='price-rsd2' style='display: none;'></span>
                            </p>
                          ";

                                
                                    echo "<button class='button foglalasBtn' id='foglalasBtn' onclick='showPopup()'>Reservation</button>";
                                
                                

                               
                            echo "
                        </div>
                        
                    </div>
                    ";
                }
                    ?>

                    <?php
                   if ($menu_3_areur != 0) {
                       
                   echo "
                    <div class='menu-container grid'>
    
                        <div class='wrapper'>
                            <div class='swiper menu-swiper'>
                                <div class='swiper-wrapper'>
                                    
                                ";
                                    $index = 0;
                                    while ($index < count($menu_3_kepek)) {
                                       if ($menu_3_kepek[$index] != null) {
                                           
                                       
                                        echo "
                                        <div class='swiper-slide'>
                                        <div class='card-contents'>
                                            <img src='../files/$menu_3_kepek[$index]' class='swiper-image'/>
                                            <div class='card-description'>
                                            </div>
                                        </div>
                                    </div>";
                                }

                                    $index++;

                                    }

                                    echo "
                                    
                                </div>
                                <div class='swiper-button-next'></div>
                                <div class='swiper-button-prev'></div>
                                <div class='swiper-pagination'></div>
                            </div>
                        </div>
        
                        <div class='menu-data'>
                            <h2 class='menu-title' id='menuNev'>
                                 $menu_3_nev
                            </h2>
                            <p class='menu-description' id='menuLeiras'>
                                $menu_3_tartalom
                            </p>
                            <p class='menu-price'>The price of the menu in different <br> currencies:
                                <span id='price-huf3'></span>
                                <span id='price-eur3' style='display: none;'></span>
                                <span id='price-rsd3' style='display: none;'></span>
                            </p>
                          ";

                                
                                    echo "<button class='button foglalasBtn' id='foglalasBtn' onclick='showPopup()'>Reservation</button>";
                                
                                

                               
                            echo "
                        </div>
                        
                    </div>
                    ";
                }
                    ?>
                    
                </div>
                <div class="menu-hr"></div>    
            </div>
        </section>

       <!--==================== POPUP ====================-->
        <div class="overlay" id="overlay">
            <div class="booking-popup" id="bookingPopup">
                <div class="booking-content">
                    <div id="popup" class="popup">
                        <span class="close-btn" id="close-btn" style="cursor: pointer; float: right;">&times;</span>
                        <div class="container">
                            <form action="../php/foglalas.php" method="POST" id="foglaloFelForm">
                                <?php
                                echo "<input type='hidden' value='$ID' name='id'>";
                                ?>
                                <h3 class="form-title">Reservation</h3>
                                <label for="">ATTENTION! If you have a guest profile registered on our site, log in to it and then make a reservation. If you want to make a reservation without a profile, you can do so, in case of cancellation you can just contact the customer service.</label><br><br>
                                <label for="">The customer's name</label>
                                <input type="text" id="fname" name="fname" placeholder="Name" required maxlength="100" minlength="5">
                                <label for="">The customer's phone number</label>
                                <input type="text" id="telnumber" name="telnumber" placeholder="06 30 123 4567" required maxlength="100">                             
                                <label for="">Customer's date of birth</label>
                                <input type="date" id="szulDatum" name="szulDatum" required>
                                <label for="">Number of clients</label>
                                <input type="number" id="foglalasFo" name="foglalasFo" required min="1" max="6">
                            
                                <h3 class="form-title">Booking details</h3>
                                <label>Date</label>
                                <input type="date" id="foglalasDatum" name="dat" required>
                                <label>Date of reservation</label>
                                <select name="idopont" id="foglalasIdo" required>
                                    <option value="11:30 - 13:00">11:30 - 13:00</option>
                                    <option value="13:30 - 15:00">13:30 - 15:00</option>
                                    <option value="15:30 - 17:00">15:30 - 17:00</option>
                                    <option value="17:30 - 19:00">17:30 - 19:00</option>
                                    <option value="19:30 - 21:00">19:30 - 21:00</option>
                                </select>

                                <label>Currency</label>
                                <select id="currency" name="penznem">
                                    <option value="huf">HUF</option>
                                    <option value="eur">EUR</option>
                                    <option value="rsd">RSD</option>
                                </select>
                                <label>First menu number</label><input type="number" name="menu1" id="elsomenu" min="0" onchange="updateTotal()">
                                <label>Second menu number</label><input type="number" name="menu2" id="masodikmenu" min="0" onchange="updateTotal()">
                                <label>Third menu number</label><input type="number" name="menu3" id="harmadikmenu" min="0" onchange="updateTotal()">
                            
                                <div class="checkboxInput">
                                    <input type="radio" id="bankCardPayment" name="fizetes" value="BankCard">
                                    <label for="bankCardPayment">Cash payment on the spot</label>
                                </div>

                                <div class="checkboxInput">
                                    <input type="radio" id="cashPayment" name="fizetes" value="Cash">
                                    <label for="cashPayment">Card payment on the spot</label>
                                </div>

                                <div class="checkboxInput">
                                    <input type="radio" id="onlinePayment" name="fizetes" value="Online">
                                    <label for="onlinePayment">Online</label>
                                </div>
                                <p class="total">Final amount: <span id="totalPrice"></span></p>
                            <div style="text-align: center;">

                                <?php echo "<input type='hidden' name='lang' value='en'>"; ?>
                                <button type="submit" name="sub" class="button">Reservation</button>
                            </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


    </main>

    <!--=============== PHP ===============-->
    <script type="text/javascript">
        var currencyPrices1 = <?php echo json_encode($currencyPrices1); ?>;
        var currencyPrices2 = <?php echo json_encode($currencyPrices2); ?>;
        var currencyPrices3 = <?php echo json_encode($currencyPrices3); ?>;
    </script>
    <!--=============== AJAX KIT ===============-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--=============== JQUERY ===============-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--=============== MAIN JS ===============-->
    <script src="../js/main.js"></script>
</body>

</html>