<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Registracija</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>

<?php


$lang = 'rs';


?>


<div class="conn">
    <div class="tartalom">
        <img src="../img/pipa.png" alt="">
        <h1>Uspešna registracija!</h1>
        <form method="POST" action="../php/loginform.php" style="text-align: center;"><br>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button name='login' id='sub'>Prijava</button><br>

        </form>
    </div>
</div>


</body>
</html>
