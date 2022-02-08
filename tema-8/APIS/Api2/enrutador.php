<?php
//AUTOLOAD
function autocarga($clase)
{
  $ruta = "./controlador/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }

  $ruta = "./modelo/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }

  $ruta = "./vistas/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }
}
spl_autoload_register("autocarga");

//Función para filtrar los campos del formulario
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

if ($_REQUEST) {
  if (isset($_REQUEST['accion'])) {

    //Según la acción llamaremos a un método u otro del Controlador
    if ($_REQUEST['accion'] == "inicio") {
      ControladorChiste::mostrarInicio();
    }
    if ($_REQUEST['accion'] == "genero") {
      ControladorChiste::mostrarRandomGenero(filtrado($_REQUEST['genero']));
    }
    if ($_REQUEST['accion'] == "random") {
      ControladorChiste::mostrarRandom();
    }
    if ($_REQUEST['accion'] == "buscador") {
      ControladorChiste::mostrarBuscador(filtrado($_REQUEST['buscador']));
    }
  }
}
