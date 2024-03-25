<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Bejelentkezés</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>
    

<?php


$lang = 'hu';


?>

<div class="conn">
    <div class="tartalom">
        <img src="../img/login.png" alt="">
        <h1>Bejelentkezés</h1>
        <form method="POST" action="./php/login.inc.php"><br>
            <label>Felhasználónév vagy email cím</label><br>
            <input type="text" name="felhasznalonev" id="" placeholder="Felhasználónév vagy email cím" required><br>
            <label>Jelszó</label><br>
            <input type="password" name="pwd" id="pwd" placeholder="Jelszó" required><br>
            <label>Bejelentkezés mint:</label><br>
            <select class="input_t" name="tipus" id="tipus" required>
                    <option value='' selected='selected' disabled='disabled'>Válassz egyet</option>
                    <option value="vendeg">Vendég</option>
                    <option value="tulaj">Fogadó tulajdonos</option>
                </select><br>
            <a href="regfaj">Nincs még fiókod? Regisztrálj!</a>
            <br>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button name="sub">Bejelentkezés</button><br>

        </form>
    </div>
</div>


</body>
</html>
