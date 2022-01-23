<?php
//Filtra los datos para evitar la intrusión de codigo en las peticiones
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}
//Carga todos los datos del fichero y los devuelve en el return
function leerArchivos()
{
  $tareas = array();
  $texto = file("task.txt");
  foreach ($texto as $linea) {
    $linea = explode("|", $linea);
    array_push($tareas, $linea);
  }
  return $tareas;
}
//Añade una tarea al fichero, la id se calcula segun el id mas grande
function nuevaTarea($nombre, $fecha, $prioridad)
{
  $texto = leerArchivos();
  $id = 0;
  foreach ($texto as $tarea) {
    if ($tarea[0] >= $id) {
      $id = intval($tarea[0]) + 1;
    }
  }
  $linea = $id . "|" . $nombre . "|" . $fecha . "|" . $prioridad . "\n";
  file_put_contents("task.txt", $linea, FILE_APPEND | LOCK_EX);
  header("Location: index.php");
  exit;
}
//"Elimina"(no pinta) las tareas que no coinciden con la id pasada 
function eliminar($id)
{
  $texto = leerArchivos();
  file_put_contents("task.txt", "", LOCK_EX);
  foreach ($texto as $linea) {
    if ($linea[0] != $id) {
      $lineaTexto = $linea[0] . "|" . $linea[1] . "|" . $linea[2] . "|" . $linea[3];
      file_put_contents("task.txt", $lineaTexto, FILE_APPEND | LOCK_EX);
    }
  }
  header("Location: index.php");
  exit;
}
//Muestra las tareas anteriores a la fecha dada
function tareasFechas($fecha)
{
  $texto = leerArchivos();
  $saco = array();
  foreach ($texto as $linea) {
    if ($linea[2] < $fecha) {
      array_push($saco, $linea);
    }
  }
  return $saco;
}
