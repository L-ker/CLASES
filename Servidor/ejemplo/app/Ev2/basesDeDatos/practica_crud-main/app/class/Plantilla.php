<?php

namespace App\Crud;
use App\Crud\DB;


class Plantilla
{
   
   const EDIT=<<<FIN
<svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-700">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>

FIN;

   const BORRAR=<<<FIN
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20" class="h-6 w-6 text-red-700">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
FIN;

   public static function generar_header():void {
      echo "<div>";
      echo "<h1>Admin Panel</h1>";
      echo "<form action='index.php' method='post'>";
      echo "<div>";
      echo "Conectado como ".$_SESSION["usuario"]."<input class='btn btn - logout' type='submit' value='Logout' name='submit'>";
      echo "</div>";
      echo "</form>";
      echo "</div>";
      echo "<hr>";
   }

   public static function generar_formulario($columnas, $foraneas) {
      $tabla = $_SESSION["tabla"];
      $db = new DB();
      echo "<h1>Añadir fila a la tabla: $tabla</h1>";
      echo "<hr>";
      echo "<form action='add.php' method='POST'>";
      if (in_array("cod", $columnas)) {
         unset($columnas[0]);
      }
      foreach ($columnas as $columna) {
         echo "<label for='$columna'>$columna</label>";
         echo "<input type='text' name='datos[$columna]'><br>";
      }
      foreach ($foraneas as $foranea) {
         echo "<label>cod $foranea</label>";
         echo "<select name='datos[$foranea]'>";
         $valorForanea = $db->getValoresColumna($foranea);
         var_dump($valorForanea);
         foreach ($valorForanea as $valor) {
            echo "<option>$valor</option>";
         }
      echo "</select><br>";
      }
      echo "<input type='submit' name='submit' value='Enviar'>";
      echo "<input type='submit' name='submit' value='Volver'>";
      echo "</form>";
   }

   public static function crear_tabla($columnas, $filas): void {

   //    foreach ($array as $clave => $valor) {
   //       // Código a ejecutar
   //   }

      echo "<table>";
      
      echo "<thead>";
      foreach ($columnas as $columna) {
         echo "<th>$columna</th>";
      }
      echo "<th></th><th></th>";
      echo "</thead>";

      echo "<tbody>";
      foreach ($filas as $fila) {
         echo "<tr>";

         foreach ($fila as $valor) {
            echo "<td>$valor</td>";
         }
         $db = new DB();
         $clavesPrimarias = $db->getClavesPrimarias();
         // echo "<td>
         // <form action='listado.php' method='POST'>";
         // for ($i = 0 ; $i < count($clavesPrimarias); $i++) {
         //    $codigo = $fila[$columnas[$i]];
         //    echo "<input type='hidden' name='codigo[]' value='$codigo'>";
         // }
         // echo"<button type='submit' name='accion' value='editar'>".self::EDIT."</button>
         // </form>
         // </td>";

         echo "<td>
         <form action='listado.php' method='POST'>";
         for ($i = 0 ; $i < count($clavesPrimarias); $i++) {
            $codigo = $fila[$columnas[$i]];
            echo "<input type='hidden' name='codigo[]' value='$codigo'>";
         }
         echo "<button type='submit' name='accion' value='borrar'>".self::BORRAR."</button>
         </form>
         </td>";

         echo "</tr>";
      }
      echo "</tbody>";

      echo "</table>";
   }
}

?>
