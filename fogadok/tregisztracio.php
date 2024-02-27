<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Regisztráció</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>
    

<?php


$lang = 'hu';


?>

<div class="conn">
    <div class="tartalom">
        <img src="../img/etterem.png" alt="">
        <h1>Regisztráció mint tulajdonos</h1>
        <form method="POST" action="./php/singuptulaj.inc.php"><br>
            <label>Felhasználónév</label><br>
            <input type="text" name="felhasznalonev" id="" placeholder="Felhasználónév" minlength="6" maxlength="25" required><br>
            <label>Email cím</label><br>
            <input type="email" name="email" id="" placeholder="Email" maxlength="49" minlength="8" required><br>
            <label>Jelszó</label><br>
            <input type="password" name="pwd" id="pwd" placeholder="Jelszó" minlength="8" maxlength="50" required><br>
            <label>Jelszó ismét</label><br>
            <input type="password" name="pwds" id="pwds" class="nomarg" oninput="ellenorzes();" minlength="8" maxlength="50" placeholder="Jelszó ismét" required><br>
            <a href="bejelentkezes">Van már fiókod? Jelentkezz be!</a>
            <br>
            <p>A regisztrációval elfogadom és megértettem az <a href="aszf">Általános szerződési Feltételeket</a> és az <a href="adat">Adatvédelmi nyilatkozatot</a>.</p>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button id="gomb" name="sub">Regisztráció</button><br>
            <span id="err">*Nem eggyezik a két jelszó</span>

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
