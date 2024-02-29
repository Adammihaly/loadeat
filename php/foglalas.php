<?php


require_once 'conn.php';
mysqli_set_charset($conn, "utf8");

 use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

session_start();
if(!isset($_SESSION['ID']))
{
   $ProfilID = null;
}
else
{
    $ProfilID = $_SESSION['ID'];
    $Felhasznalonev = $_SESSION['Felhasznalonev'];
}


if (isset($_POST['sub'])) {
   
   $foglalo_nev = $_POST['fname'];
   $tel = $_POST['telnumber'];
   $szuldat = $_POST['szulDatum'];
   $letszam = $_POST['foglalasFo'];
   $etteremID = $_POST['id'];

   $datum = $_POST['dat'];
   $idopont = $_POST['idopont'];
   $penznem = $_POST['penznem'];
   $menu1 = $_POST['menu1'];
   $menu2 = $_POST['menu2'];
   $menu3 = $_POST['menu3'];
   $foglalasID = rand(100000, 1000000);
   $lang = '';

   if (isset($_POST['lang'])) {
      $lang = $_POST['lang'];
      if ($lang == 'en') {
         $lang = 'en';
      }
   }
   if (isset($_POST['lang'])) {
      $lang = $_POST['lang'];
      if ($lang == 'rs') {
         $lang = 'rs';
      }
   }



   if ($_POST['fizetes'] == 'Cash') {
      $fizetes = 'Helyszíni készpénzes fizetés';
   }
   if($_POST['fizetes']  == 'BankCard')
   {
      $fizetes = 'Helyszíni bankkártyás fizetés';
   }
   if($_POST['fizetes'] == 'Online')
   {
      $fizetes = 'Online fizetés';
   }



$holnap = new DateTime();
$holnap->add(new DateInterval('P1D'));
$datum2 = new DateTime($datum);

if ($datum2 < $holnap AND $lang == '') {
    header("Location: ../etterem?eid=$etteremID");
    exit();
}
else if ($datum2 < $holnap AND $lang == 'en') {
   header("Location: ../en/etterem?eid=$etteremID");
    exit();
}
else if ($datum2 < $holnap AND $lang == 'rs') {
   header("Location: ../rs/etterem?eid=$etteremID");
    exit();
}

$foglalt = 0;

$sql = "SELECT * FROM foglalasok WHERE etteremID = $etteremID";
      $result = $conn->query($sql);
   while ($row = $result->fetch_assoc()) {

      $datumfoglalt = $row['datum'];
      $idopontfoglalt = $row['idopont'];

      if ($datumfoglalt == $datum) {
         if ($idopontfoglalt == $idopont) {
            $foglalt = 1;
         }
      }

   }

if ($foglalt != 1) {
   


$sql = "INSERT INTO foglalasok (foglalasID, etteremID, vendegID, datum, idopont, nev, tel, szulDatum, letszam, penznem, elsomenu, masodikmenu, harmadikmenu, fizetes) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
header("Location: " . $_SERVER['HTTP_REFERER']);
      exit();
}


mysqli_stmt_bind_param($stmt, "ssssssssssssss",$foglalasID, $etteremID, $ProfilID, $datum, $idopont, $foglalo_nev, $tel, $szuldat, $letszam, $penznem, $menu1, $menu2, $menu3, $fizetes);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


$sql = "SELECT * FROM tulaj_prof WHERE etteremID = $etteremID";
      $result = $conn->query($sql);
   while ($row = $result->fetch_assoc()) {

      $email = $row['Email'];
      $name = $row['Felhasznalonev'];

   }





$mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 2;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'loadeat.com@gmail.com';
 
            //SMTP password
            $mail->Password = 'uhwjggvnwnegyihm';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = "tls";
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('loadeat.com@gmail.com', 'loadeat.com');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            

            $mail->Subject = 'Loadeat uj foglalas';
            $mail->Body    = '<p style="font-size: 26px;">Kedves étterem tulajdonos!</p><br><br> <p style="font-size: 20px;">Egy új foglalás ment végbe a te éttermedben. A kezelőpultban már meg is tudod tekinteni a részleteket! https://loadeat.com</p><br>
 ';
 
            $mail->send();

}
catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Hiba lépett fel: $e')</script>";
        }


if ($fizetes == 'Online fizetés' AND $lang == '') {
 header("Location: ../onlinefizetes?fa=$foglalasID");
 exit();
}
else if ($fizetes == 'Online fizetés' AND $lang == 'en') {
   header("Location: ../en/onlinefizetes?fa=$foglalasID");
    exit();
}
else if ($fizetes == 'Online fizetés' AND $lang == 'rs') {
   header("Location: ../rs/onlinefizetes?fa=$foglalasID");
    exit();
}


}
else
{
   if ($lang == '') {    
   header("Location: ../etterem?eid=$etteremID&f=1");
    exit();
   }
   else if($lang == 'en')
   {
      header("Location: ../en/etterem?eid=$etteremID&f=1");
    exit();
   }
   else if($lang == 'rs')
   {
      header("Location: ../rs/etterem?eid=$etteremID&f=1");
    exit();
   }
}



if ($lang == '') {    
   header("Location: https://loadeat.com?fo=true");
   exit();
   }
   else if($lang == 'en')
   {
      header("Location: https://loadeat.com/en?fo=true");
      exit();
   }
   else if($lang == 'rs')
   {
      header("Location: https://loadeat.com/rs?fo=true");
      exit();
   }


}