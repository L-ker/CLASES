<?php
if(isset($_POST['submit'])) {
    $clicks = $_POST['clicks'];
    $clicks++;
    $msj = "Has hecho $clicks clicks";
}
$clicks = $clicks??0;
$msj = $msj??"Empieza a hacer click";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>HAZ CLICK</legend>
        <span class="msj"><?=$msj?></span>
        <form action="cookieclicker.php" method="POST">
            <input type="hidden" value="<?=$clicks?>" name="clicks">
            <input type="submit" value="Haz click" name="submit">
        </form>
    </fieldset>
</body>
</html>