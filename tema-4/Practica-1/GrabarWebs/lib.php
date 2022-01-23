<?php
//Filtra los datos para evitar la intrusión de codigo en las peticiones
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

function DatosFace()
{
  $opciones = array(
    'http' => array(
      'method' => "GET",
      'header' => "Accept-language: en\r\n" .
        "Cookie: foo=bar\r\n"
    )
  );
  $contexto = stream_context_create($opciones);
  // Abre el fichero usando las cabeceras HTTP establecidas arriba
  $fichero = file_get_contents('https://www.facebook.com/', false, $contexto);
  file_put_contents("myface.php", $fichero);
}

function datosCNN()
{
  $opciones = array(
    'http' => array(
      'method' => "GET",
      'header' => "Accept-language: en\r\n" .
        "Cookie: foo=bar\r\n"
    )
  );
  $contexto = stream_context_create($opciones);
  // Abre el fichero usando las cabeceras HTTP establecidas arriba
  $fichero = file_get_contents('https://www.cnn.com/', false, $contexto);
  file_put_contents("cnn.php", $fichero);
}

function concurrenciasBiden()
{
  $archivo = file("cnn.php");
  $archivo = implode(" ", $archivo);
  $contador = 0;
  for ($i = 0; $i < strlen($archivo); $i++) {
    if (strcmp($archivo[$i], "Biden") == 0) {
      $contador += 1;
    }
  }
  return $contador;
}
