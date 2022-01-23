<?php
session_start();

$_SESSION['servidor'];
$_SESSION['cliente'];
$_SESSION['despliegue'];
$_SESSION['interfaces'];
$_SESSION['empresas'];

if ($_POST) {

  if (isset($_POST['servidor'])) {
    $_SESSION['servidor'] += 10;
  } else if (isset($_POST['cliente'])) {
    $_SESSION['cliente'] += 10;
  } else if (isset($_POST['despliegue'])) {
    $_SESSION['despliegue'] += 10;
  } else if (isset($_POST['interfaces'])) {
    $_SESSION['interfaces'] += 10;
  } else if (isset($_POST['empresas'])) {
    $_SESSION['empresas'] += 10;
  }
}
