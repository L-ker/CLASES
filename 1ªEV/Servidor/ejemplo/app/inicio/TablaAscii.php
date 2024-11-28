<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
<?php

for ($cont=0; $cont < 127; $cont++) {
    printf("<tr><td>%c</td><td>%d</td></tr>", $cont, $cont);
}

?>
</table>


    <tr>
        <th>Columna 1</th>
        <th>Columna 2</th>
        <th>Columna 3</th>
    </tr>
</table>
</body>
</html>