<?php
session_start();
//Si no estan iniciadas se inician a 0 para llevar en el menu una cuenta de las partidas jugadas
if (!isset($_SESSION['partidasJugadas'])) {
  $_SESSION['partidasJugadas'] = 0;
}
if (!isset($_SESSION['partidasGanadas'])) {
  $_SESSION['partidasGanadas'] = 0;
}

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

    //Menu Inicio
    if ($_REQUEST['accion'] == "inicio") {
      ControladorBlackjack::mostrarOpciones();
    }

    //MOSTRAR PARTIDA
    if ($_REQUEST['accion'] == "partida") {
      ControladorBlackjack::iniciarPartida();
      ControladorBlackjack::mostrarPartida();
    }

    //Añadir otra carta a la mano del jugador
    if ($_REQUEST['accion'] == "otraCarta") {
      ControladorBlackjack::otraCarta();
      ControladorBlackjack::mostrarPartida();
    }

    //El jugador le ha dado al boton de plantarse
    if ($_REQUEST['accion'] == "plantarse") {
      ControladorBlackjack::plantarse();
      ControladorBlackjack::mostrarResultado();
    }

    //Borra la sesion y te devuelve al index que te mete al enrutador que inicia otra vez la sesion
    if ($_REQUEST['accion'] == "salirJuego") {
      session_destroy();
      header("Location: index.php");
      exit;
    }
  }
}
