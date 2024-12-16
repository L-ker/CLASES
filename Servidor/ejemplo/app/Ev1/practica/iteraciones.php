<?php
header("Refresh:2;url=index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
$cont = 0;
for ($i = 0; $i <= 100; $i++) {

$cont = ($i % 2 == 0) ? $cont+=$i : $cont;
}
echo $cont;
?>
</body>
</html>
