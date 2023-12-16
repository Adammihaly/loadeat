<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>
    

<?php


$lang = 'en';


?>


<div class="conn">
    <div class="tartalom">
        <img src="../img/etterem.png" alt="">
        <h1>Register as an owner</h1>
        <form method="POST" action="../php/singuptulaj.inc.php"><br>
            <label>Username</label><br>
            <input type="text" name="felhasznalonev" id="" placeholder="Username" minlength="6" maxlength="25" required><br>
            <label>Email address</label><br>
            <input type="email" name="email" id="" placeholder="Email" maxlength="49" minlength="8" required><br>
            <label>Password</label><br>
            <input type="password" name="pwd" id="pwd" placeholder="Password" minlength="8" maxlength="50" required><br>
            <label>Password again</label><br>
            <input type="password" name="pwds" id="pwds" class="nomarg" oninput="ellenorzes();" minlength="8" maxlength="50" placeholder="Password again" required><br>
            <a href="bejelentkezes">Already have an account? Log in!</a>
            <br>
            <p>By registering, I accept and understand the <a href="aszf">General Terms and Conditions</a>.</p>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button id="gomb" name="sub">Registration</button><br>
            <span id="err">*The passwords are not the same</span>

        </form>
    </div>
</div>



<script type="text/javascript">
    
function ellenorzes() {

    var pwd = document.getElementById("pwd").value;
var pwds = document.getElementById("pwds").value;
var szoveg = document.getElementById("err");
var gomb = document.getElementById("gomb");

    if(pwd != pwds) 
    {
        szoveg.style.display = "block";
        gomb.disabled = true;
    }
    else
    {
        szoveg.style.display = "none";
        gomb.disabled = false;
    }
}


</script>


</body>
</html>
