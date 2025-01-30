<?php
$opcion = $_POST['submit']??"";
switch($opcion){
   case "Login":
      break;
   case "Registrar":
      $host = "mysql";
      $user = "alumno";
      $password = "alumno";
      $database = "tienda";

      try{
         $con = new mysqli($host, $user, $password, $database);
         var_dump($con);
      }catch(mysqli_sql_exception $e){
         die("Error al conectar a la base de datos".$e->getMessage());
      }
      $nombre = $_POST['nombre'];
      $password = $_POST['password'];
      $sentencia = "insert into usuarios values($nombre, $password)";
      try {
         $resultado=$con->query($sentencia);
      }catch (mysqli_sql_exception $e){
         $msj ="Error insertando ".$e->getMessage();
      }
      var_dump($resultado);
      if($resultado)
         $msj="Se ha insertado $nombre usuario";
      else
         $msj="Error insertando";

      $con->close();




      break;

}

?>
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

<form action="login" method="post" >

   usuario <input type="text" name="nombre" id=""><br />
   password <input type="text" name="password" id=""><br />
   <input type="submit" value="Login" name="submit">
   <input type="submit" value="Registrar" name="submit">

</form>

</body>
</html>