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
        <img src="../img/etterem.png" alt="">
        <h1>Registracija kao vlasnik</h1>
        <form method="POST" action="../php/singuptulaj.inc.php"><br>
            <label>Korisničko ime</label><br>
            <input type="text" name="felhasznalonev" id="" placeholder="Korisničko ime" minlength="6" maxlength="25" required><br>
            <label>Email</label><br>
            <input type="email" name="email" id="" placeholder="Email" maxlength="49" minlength="8" required><br>
            <label>Lozinka</label><br>
            <input type="password" name="pwd" id="pwd" placeholder="Lozinka" minlength="8" maxlength="50" required><br>
            <label>Lozinka opet</label><br>
            <input type="password" name="pwds" id="pwds" class="nomarg" oninput="ellenorzes();" minlength="8" maxlength="50" placeholder="Lozinka opet" required><br>
            <a href="bejelentkezes">Imaš već nalog? Prijavi se!</a>
            <br>
            <p>Sa registraciom prihvatam <a href="aszf">Opšti uslove</a>.</p>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button id="gomb" name="sub">Registracija</button><br>
            <span id="err">*Dve lozinke se ne poklapaju</span>

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
