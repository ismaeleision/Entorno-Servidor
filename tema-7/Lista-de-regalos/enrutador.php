<?php
session_start();
//AUTOLOAD
function autocarga($clase)
{
  $ruta = "./controladores/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }

  $ruta = "./modelos/$clase.php";
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
    if ($_REQUEST['accion'] == "index") {
      ControladorRegalos::mostrarIndex();
    }

    if ($_REQUEST['accion'] == "salir") {
      //destruye la session porque al salir pasa por aqui
      session_destroy();
      ControladorRegalos::mostrarIndex();
    }

    //Según la acción llamaremos a un método u otro del Controlador
    if ($_REQUEST['accion'] == "login") {
      $nombreUsuario = filtrado($_REQUEST['nombre']);
      $contraseñaUsuario = filtrado($_REQUEST['contraseña']);
      ControladorRegalos::comprobarUsuario($nombreUsuario, $contraseñaUsuario);
    }
    //Según la acción llamaremos a un método u otro del Controlador
    if ($_REQUEST['accion'] == "inicio") {
      ControladorRegalos::mostrarRegalos();
    }

    //Insertar producto
    if ($_REQUEST['accion'] == "nuevoRegalo") {
      ControladorRegalos::insertarRegalo();
    }

    //Quitar del carro
    if ($_REQUEST['accion'] == "quitarRegalo") {
      ControladorRegalos::quitarRegalo();
    }
  }
}
