<?php
include "Scripts.php";

//para alojar los numeros que vayan saliendo
if ((!isset($_SESSION['bingo'])) && (!isset($_SESSION['jugador']))) {
  $_SESSION['bingo'] = array();
  $_SESSION['jugador'] = array();
}

if (!isset($_SESSION['finRonda'])) {
  $_SESSION['finRonda'] = false;
}


if ($_GET) {
  if ($_GET['accion']) {
    $_GET['accion'] = filtrado($_GET['accion']);
    if ($_GET['accion'] == "destruir") {
      session_destroy();
      header("Location: index.php");
      exit;
    }

    if ($_GET['accion'] == "numero") {
      //Saca un random entre 1 y 99 que no haya salido antes y lo mete en Sesion[bingo]
      sacarNumero();
      //Comprobamos si hay ganadores
      ganadorLinea();
      ganadorBingo();
      header("Location: juego.php");
      exit;
    }

    if ($_GET['accion'] == "terminarRonda") {
      //Reinicia los cartones y resta 5 al dinero total
      empezarJuego();
      header("Location: juego.php");
      exit;
    }
  }
}

//Si se ha enviado un formulario post
if ($_POST) {
  if (isset($_POST['origen'])) {
    //Si es por post[usuario] filtralo y lo asignas a usuario
    if (isset($_POST['usuario'])) {
      $_POST['usuario'] = filtrado($_POST['usuario']);
      $_SESSION['usuario'] = $_POST['usuario'];
    }
    //Si es por post[dinero] hace la comprobacion de que no sea menor a 10 y superior a 100
    if (isset($_POST['dinero'])) {
      //Si no cumple las condiciones te devuelve al inicio con el get[error]
      if (($_POST['dinero'] < 10) || ($_POST['dinero'] > 100)) {
        header("Location: index.php?error=dinero");
        exit;
      }
    }
    if (isset($_POST['jugadores'])) {
      if ($_POST['jugadores'] < 2) {
        header("Location: index.php?error=jugadores");
        exit;
      }
    }
    array_push($_SESSION['jugador'], array("nombre" => $_POST['usuario'], "dinero" => $_POST['dinero'], "numeros" => rellenarCartones(), "linea" => false, "bingo" => false));
    rellenarMesa($_POST['jugadores']);
  }
  header("Location: juego.php");
  exit;
}
