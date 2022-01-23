<?php
include "lib.php";


if ($_POST) {
  if (isset($_POST['formulario'])) {
    if (isset($_POST['nombre']) && isset($_POST['fecha']) && isset($_POST['prioridad'])) {
      $_POST['nombre'] = filtrado($_POST['nombre']);
      $_POST['fecha'] = filtrado($_POST['fecha']);
      $_POST['prioridad'] = filtrado($_POST['prioridad']);
      nuevaTarea($_POST['nombre'], $_POST['fecha'], $_POST['prioridad']);
    }
  }
  if (isset($_POST['calendario'])) {
    if (isset($_POST['fecha'])) {
      $fecha = filtrado($_POST['fecha']);
      header("Location: mostrarPorFecha.php?fecha=$fecha");
      exit;
    }
  }
}

if ($_GET) {
  if (isset($_GET['accion'])) {
    $_GET['accion'] = filtrado($_GET['accion']);
    if ($_GET['accion'] == 'eliminar') {
      if (isset($_GET['id'])) {
        $_GET['id'] = filtrado($_GET['id']);
        eliminar($_GET['id']);
      }
    }
  }
}
