<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loadeat • Prijava</title>
    <link rel="stylesheet" type="text/css" href="../css/regisztracio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css ">
</head>
<body>
    

<?php


$lang = 'rs';


?>

<div class="conn">
    <div class="tartalom">
        <img src="../img/login.png" alt="">
        <h1>Prijava</h1>
        <form method="POST" action="../php/login.inc.php"><br>
            <label>Korisničko ime ili email</label><br>
            <input type="text" name="felhasznalonev" id="" placeholder="Korisničko ime ili email" required><br>
            <label>Lozinka</label><br>
            <input type="password" name="pwd" id="pwd" placeholder="Lozinka" required><br>
            <label>Prijava kao:</label><br>
            <select class="input_t" name="tipus" id="tipus" required>
                    <option value='' selected='selected' disabled='disabled'>Izaberi</option>
                    <option value="vendeg">Gost</option>
                    <option value="tulaj">Vlasnik restorana</option>
                </select><br>
            <a href="regfaj">Nemaš još nalog? Registruj se!</a>
            <br>
            <?php echo "<input type='hidden' name='lang' value='$lang'>"; ?>
            <button name="sub">Prijava</button><br>

        </form>
    </div>
</div>


</body>
</html>
