<?php

//Función para filtrar los campos del formulario
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

//Destruye la sesion
function destruirSesion()
{
  session_destroy();
}

//Carga en memoria los datos de los productos de un fichero
function leerProductos()
{
  $productos = array();
  $texto = file("store.txt");
  foreach ($texto as $linea) {
    $linea = explode("|", $linea);
    array_push($productos, $linea);
  }
  return $productos;
}

//Añade una tarea al fichero, la id se calcula segun el id mas grande
function nuevoProducto($nombre, $descripcion, $precio, $imagen)
{
  $texto = leerProductos();
  $id = 0;
  foreach ($texto as $tarea) {
    if ($tarea[0] >= $id) {
      $id = intval($tarea[0]) + 1;
    }
  }
  $linea = $id . "|" . $nombre . "|" . $descripcion . "|" . $precio . "|" . $imagen .  "\n";
  file_put_contents("store.txt", $linea, FILE_APPEND | LOCK_EX);
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
