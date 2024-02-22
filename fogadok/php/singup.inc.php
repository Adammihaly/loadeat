<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/autoload.php';


if(isset($_POST["sub"])) {
	
	require_once 'functions.inc.php';


	$name = $_POST['felhasznalonev'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
    $pwds = $_POST['pwds'];
    $id = rand(10000,100000);
    $ip = getIPAddress(); 
    $verification_code = rand(10000,100000);
    $lang = $_POST['lang'];


    if ($pwd != $pwds) {
        if ($lang == 'hu') {
    header("location: ../vregisztracio") ;
        exit();
}
else if ($lang == 'en') {
    header("location: ../en/vregisztracio") ;
        exit();
}
else if ($lang == 'rs') {
    header("location: ../rs/vregisztracio") ;
        exit();
}
    }


    $name = legalInput($name);

    $name = szures($name);      // adatbázis parancsok szűrés
    $pwd = szures($pwd);      // adatbázis parancsok szűrés
    $email = szures($email);      // adatbázis parancsok szűrés
        
        $name = spec_del($name);    // speciális karakterek átírása
	  

		require_once 'conn.php';
		
		
        
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
            if ($lang == 'hu') {
    header("location: ../vregisztracio?error=emailerror") ;
        exit();
}
else if ($lang == 'en') {
    header("location: ../en/vregisztracio?error=emailerror") ;
        exit();
}
else if ($lang == 'rs') {
    header("location: ../rs/vregisztracio?error=emailerror") ;
        exit();
}
  }


		if (uidLetezik($conn, $name, $email, $lang) !== false) {

if ($lang == 'hu') {
    header("location: ../vregisztracio?error=uidExists") ;
        exit();
}
else if ($lang == 'en') {
    header("location: ../en/vregisztracio?error=uidExists") ;
        exit();
}
else if ($lang == 'rs') {
    header("location: ../rs/vregisztracio?error=uidExists") ;
        exit();
}
		}

		$mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
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
 
            
if ($lang == 'hu') {
               

            $mail->Subject = 'Email cim hitelesitese';
            $mail->Body    = '<p style="font-size: 26px;">Kedves regisztrálni kívánó ' . $name . '!</p><br><br> <p style="font-size: 20px;"> Ahhoz, hogy a továbbiakban folytatni tudd a regisztrációt a Loadeat.com oldalán, meg kell erősítened az email címed.<br>Kérlek írd be a következő megerősítő kódot a megnyílt hitelesítő ablakba:</p><br><br><br><br>
 <b style="font-size: 40px;">' . $verification_code . '</b> <br><br><br><br><br><br> 

<i style="font-size: 18px;">Amennyiben nem nyílt meg a hitelesítő ablak kérlek próbáld újra, vagy keresd fel  ügyfél szolgálatunk web oldalunkon, illetve a loadeat.support@gmail.com vagy a loadeat@gmail.com címen! Amennyiben nem hitelesíted egy megadott időn belül fiókodat az adat bázisból ki fogja rendszerünk törölni. Kellemes időtöltést kívánunk.</i>
 ';

}
else if($lang == 'en')
{

    $mail->Subject = 'Email confirmation';
            $mail->Body    = '<p style="font-size: 26px;">Dear ' . $name . '!</p><br><br> <p style="font-size: 20px;"> In order to continue registering on Loadeat.com, you must confirm your email address.<br>Please enter the following confirmation code in the authentication window that opens:</p><br><br><br><br>
 <b style="font-size: 40px;">' . $verification_code . '</b> <br><br><br><br><br><br> 

<i style="font-size: 18px;">If the authentication window did not open, please try again or contact our customer service on our website or at loadeat.support@gmail.com or loadeat@gmail.com! If you do not authenticate within a specified time, our system will delete your account from the database. We wish you a pleasant time.</i>
 ';

}
else if($lang == 'rs')
{

    $mail->Subject = 'Imejl potvrda';
            $mail->Body    = '<p style="font-size: 26px;">Draga ' . $name . '!</p><br><br> <p style="font-size: 20px;"> Da biste nastavili da se registrujete na Loadeat.com, morate potvrditi svoju adresu e-pošte.<br>U prozor za potvrdu identiteta koji se otvori unesite sledeći kod za potvrdu:</p><br><br><br><br>
 <b style="font-size: 40px;">' . $verification_code . '</b> <br><br><br><br><br><br> 

<i style="font-size: 18px;">Ako se prozor za potvrdu identiteta ne otvori, pokušajte ponovo ili kontaktirajte našu korisničku podršku na našoj veb stranici ili na loadeat.support@gmail.com ili loadeat@gmail.com! Ako ne izvršite autentifikaciju u određenom roku, naš sistem će izbrisati vaš nalog iz baze podataka. Želimo vam prijatno vreme.</i>
 ';

}
 
            $mail->send();



		createUser($conn, $id, $name, $email, $pwd, $ip, $verification_code, $lang);

}
catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Hiba lépett fel: $e')</script>";
        }
}

else
{
     header("location: ../vregisztracio?error=problem") ;
        exit();

}