<?php
namespace App\Crud;

use mysqli;
use mysqli_sql_exception;
use mysqli_stmt;

use Dotenv\Dotenv;

class DB
{

   private $con;

   public function __construct()
   {
      $host=$_ENV['HOST'];
      $user=$_ENV['DB_USER'];
      $pass=$_ENV['PASSWORD'];
      $db=$_ENV['DATABASE'];
      try {
         $this->con = new mysqli($host, $user, $pass, $db);
         if ($this->con->connect_error) {
             die("Error de conexión: " . $this->con->connect_error);
         }
     } catch (mysqli_sql_exception $e) {
         die("Error accediendo a la base de datos: " . $e->getMessage());
     }
   }

   //NOTA: las relaciones foraneas han sido cambiadas a on delete cascade

   /**
    * @param string $nombre
    * @param string $pass
    * @return bool
    * //Verifica si un usuario existe en la base de datos
    */
   public function validar_usuario(string $nombre, string  $pass):bool
   {
      if (!$this->con) {
         return false;
      }

      $stmt = $this->con->prepare("SELECT password FROM usuarios WHERE nombre = ?");
      $stmt->bind_param("s", $nombre);
      $stmt->execute();
      $stmt->bind_result($resultado);
      $stmt->fetch();
      $stmt->close();

      if ($resultado && password_verify($pass, $resultado)) {
             $_SESSION['usuario'] = $nombre;
             return true;
         } else {
             $msj = "Usuario o contraseña incorrectos";
         }
      return false;
   }
/*
 * Este método tendría que investigar en el diccionario de datos
 * Devolverá qué campos de esta tabla son claves foráneas
 * */
   public function get_foraneas(string $tabla): array
   {
   }

   public function getClavesPrimarias(): array
   {
      $tabla = strtolower($_SESSION["tabla"]);

      $keys = [];
      if (!$this->con) {
      return $keys;
      }

      $stmt = $this->con->prepare("SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'");
      $stmt->execute();
      $resultado = $stmt->get_result();

      while ($fila = $resultado->fetch_assoc()) {
      $keys[] = $fila['Column_name'];
      }

      $stmt->close();
      return $keys;
   }


   public function get_campos(string $table):array
   {
      $campos = [];
      if (!$this->con) {
         return false;
      }

         return $campos;

   }

   // Retorna un array con las filas de una tabla
   public function get_filas(string $nombreTabla):array
   {
      $filas=[];
      if (!$this->con) {
         return $filas;
      }

      try {
         $stmt = "SELECT * FROM $nombreTabla";
         $resultado = $this->con->query($stmt);
         if ($resultado) {
             while ($fila = $resultado->fetch_assoc()) {
                 $filas[] = $fila;
             }
             $resultado->free();
         }
      } catch (mysqli_sql_exception  $e) {
         error_log("Error en get_filas: " . $e->getMessage());
      }

      return $filas;
   }

   //Borra una fila de una tabla dada su código
   //Retorna un mensaje diciendo si lo ha podido borrar o no
   public function borrar_fila(array $cods):string
   {
      if (!$this->con) {
         return "Error en la conexión";
      }
      $table = strtolower($_SESSION["tabla"])  ;
      $clavesPrimarias = $this->getClavesPrimarias();

      $stmt = "DELETE FROM $table WHERE ";
      $stmt .= implode(" = ? AND ", $clavesPrimarias) . " = ?";

      $stmt = $this->con->prepare($stmt);
      if (!$stmt) {
      return "Error en la preparación de la consulta: " . $this->con->error;
      }

      $tipos = str_repeat("s", count($cods));

      $stmt->bind_param($tipos, ...$cods);

      $stmt->execute();
      return ($stmt->affected_rows > 0) ? "Fila eliminada correctamente" : "No se encontró la fila";
   }

   public function close()
   {
      $this->con->close();
   }

   // Añade una fila cuyos valores se pasan en un array.
   //Tengo el nombre de la tabla y el array ["nombre_Campo"=>"valor"]
   public function add_fila(string $tabla,array $campos){


      if (!$this->con) {
         return false;

      }

   }

   //Registra un usuario en la tabla usuarios y me pasan el nombre y el pass
   //El pass tiene que estar cifrado antes de insertar
   //Retorna un bool = true si ha ido bien o un mensaje si ha ocurrdio algún problema, como que el usuario ya existiese
   public function registrar_usuario($nombre, $pass): bool|string
   {
      if (!$this->con) {
         return "Error a la hora de establecer la conexion";
      }
      if (!$this->existe_usuario($nombre)) {
         $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
         $stmt = $this->con->prepare("INSERT INTO usuarios (nombre, password) VALUES (?, ?)");
         $stmt->bind_param("ss", $nombre, $passwordHash);
         $stmt->execute();
         $stmt->close();
         return true;
      } 
      return "Ya existe el usuario";
   }

   //Verifica si un usuario existe o no
   private function existe_usuario(string $nombre):bool
   {
      if (!$this->con) {
         return false;
      }
      $stmt = $this->con->prepare("SELECT nombre FROM usuarios WHERE nombre = ?");
      $stmt->bind_param("s", $nombre);
      $stmt->execute();
      $stmt->bind_result($stmt);
      $stmt->fetch();
      $stmt->close();
   
   
      if ($stmt) {
         return true;
      }
      return false;
   }
   

   //Ejecuta una sentencia y retorna un mysql_stmt
   //La sentencia hay que paraemtrizarla
   //Recibo la sentencia con parámetros y un array indexado con los valores
   private function ejecuta_sentencia(string $sql, array $datos): mysqli_stmt
   {
      $stmt=$this->con->stmt_init();





      return $stmt;
   }

}

?>
