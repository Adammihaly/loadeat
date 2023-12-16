<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Login</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>
    
<?php


$lang = 'en';


?>


<div class="conn">
    <div class="tartalom">
        <img src="../img/login.png" alt="">
        <h1>Login</h1>
        <form method="POST" action="../php/login.inc.php"><br>
            <label>Username or email address</label><br>
            <input type="text" name="felhasznalonev" id="" placeholder="Username or email address" required><br>
            <label>Password</label><br>
            <input type="password" name="pwd" id="pwd" placeholder="Password" required><br>
            <label>Login as:</label><br>
            <select class="input_t" name="tipus" id="tipus" required>
                    <option value='' selected='selected' disabled='disabled'>Choose one</option>
                    <option value="vendeg">Guest</option>
                    <option value="tulaj">Restaurant owner</option>
                </select><br>
            <a href="regfaj">Don't have an account yet? Sign up!</a>
            <br>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button name="sub">Login</button><br>

        </form>
    </div>
</div>


</body>
</html>
