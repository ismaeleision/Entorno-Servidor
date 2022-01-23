<?php
//Filtra los datos para evitar la intrusión de codigo en las peticiones
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}
function cargarDiccionario()
{
  $fichero = file("diccionario.txt");
  $palabra = array();
  foreach ($fichero as $linea) {
    $linea = explode(",", $linea);
    array_push($palabra, $linea);
  }
  return $palabra;
}
function añadirPalabra($palabraNueva, $significadoNuevo)
{
  $palabras = cargarDiccionario();
  $cont = 0;
  foreach ($palabras as $palabra) {
    if ($palabra[0] == $palabraNueva) {
      $cont += 1;
    }
  }
  if ($cont < 1) {
    $linea = $palabraNueva . "," . $significadoNuevo . "\n";
    file_put_contents("diccionario.txt", $linea, FILE_APPEND | LOCK_EX);
  }

  header("Location: index.php");
  exit;
}
function eliminarPalabra($palabraEliminar)
{
  $palabras = cargarDiccionario();
  file_put_contents("diccionario.txt", "", LOCK_EX);
  foreach ($palabras as $linea) {
    if ($linea[0] != $palabraEliminar) {
      $lineaTexto = $linea[0] . "," . $linea[1];
      file_put_contents("diccionario.txt", $lineaTexto, FILE_APPEND | LOCK_EX);
    }
  }
  header("Location: index.php");
  exit;
}
function mostrarDiccionario()
{
  $palabras = cargarDiccionario();
  sort($palabras);
  echo "<table class='table'>";
  echo "<thead><tr><td>ESPAÑOL</td><td>INGLES</td></tr></thead>";
  echo "<tbody>";
  foreach ($palabras as $palabra) {
    echo "<tr><td>" . $palabra[0] . "</td><td>" . $palabra[1] . "</td></tr>";
  }
  echo "</tbody>";
  echo "</table>";
}
function buscarPalabra($palabra)
{
  $diccionario = cargarDiccionario();
  foreach ($diccionario as $linea) {
    if ($linea[0] == $palabra) {
      return $linea[1];
    }
  }
  return "ERROR: Palabra no encontrada";
}
