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
      ControladorPersonas::mostrarPersonas();
    }

    //Insertar producto
    if ($_REQUEST['accion'] == "nuevaPersona") {
      ControladorPersonas::insertarPersona();
    }

    //Quitar del carro
    if ($_REQUEST['accion'] == "quitarPersona") {
      ControladorPersonas::quitarPersona();
    }

    //Vacia la Bd
    if ($_REQUEST['accion'] == "borrarTodo") {
      ControladorPersonas::resetPersonas();
    }
  }
}
