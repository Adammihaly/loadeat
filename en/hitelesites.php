<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Authentication</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>
    
<?php
error_reporting(0);
ini_set('display_errors', 0);

if (isset($_GET['un'])) {
    $felhasznalonev = $_GET['un'];
}

?>


<?php


$lang = 'en';


?>


<div class="conn">
    <div class="tartalom">
        <img src="../img/hit.png" alt="">
        <h1>Authentication</h1>
        <form method="POST" action="../php/mail.php"><br>
            <label>Authentication code received by email</label><br>
            <input type="text" name="kod" id="" placeholder="Authentication code" minlength="5" maxlength="6" required><br>      
            <?php echo "<input type='hidden' name='fnev' value='$felhasznalonev'>"; ?>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button name='submit' id='sub'>Confirm</button><br>

        </form>
    </div>
</div>


</body>
</html>
