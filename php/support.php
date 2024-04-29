<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../vendor/autoload.php';

		error_reporting(0);
		ini_set('display_errors', 0);


					$vezeteknev = $_POST['vnev'];
					$keresztnev = $_POST['knev'];
					$ugyfelemail = $_POST['email'];
					$ugyfelemail2 = $_POST['email2'];
					$uzenet = $_POST['uzenet'];

					if ($ugyfelemail2 != 'a') {
						header("Location: https://codeefyit.com");
						exit();
					}

    				$email = 'loadeat@loadeat.com';
    				$name = 'Loadeat';

    				

						if (!filter_var($ugyfelemail, FILTER_VALIDATE_EMAIL)) {
					        header("Location: https://loadeat.com");
							exit();
					    }


							$mail = new PHPMailer(true);
					 
					        try {
					            
					            $mail->SMTPDebug = 0;
					            $mail->isSMTP();
					            $mail->Host = 'mail.nethely.hu';
					            $mail->SMTPAuth = true;
					            $mail->Username = 'system@codeefyit.com';
					            $mail->Password = 'CodITfee0025';
					            $mail->SMTPSecure = "tls";
					            $mail->Port = 1025;
					            $mail->setFrom('system@codeefyit.com', 'Loadeat.com');
					            $mail->addAddress($email, $name);
					            $mail->isHTML(true);       

					            $mail->Subject = 'New mail from Loadeat';
					            $mail->Body    = '

					            <h1 style="text-align: center;">Új üzenet érkezett a Loadeat weboldalról</h1>
					            <p>
					            Ügyfél neve: ' . $vezeteknev . ' '. $keresztnev .' <br>
					            Ügyfél email címe: ' . $ugyfelemail . ' <br>
					            Üzenet:<br>
					            ' . $uzenet . '
					            </p><br>
					            <p style="font-size: 90%; text-align: center;">A rendszert készítette és üzemelteti a Codeefy | <a href="https://codeefyit.com">CodeefyIT.com</a> - 2024</p>

					            ';
					 
					            $mail->send();

					                header("Location: https://loadeat.com");
					                exit();

					}
					catch (Exception $e) {
					            echo "<script type='text/javascript'>alert('Hiba lépett fel: $e')</script>";
					}