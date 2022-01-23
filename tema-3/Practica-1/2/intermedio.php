<?php
function crearCookie($valor)
{
  $nombre = 'miCookie';
  // El tiempo de expiración es en 30 minutos. PHP traduce la fecha al formato adecuado
  $expiracion = time() + (60 * 5);
  // Ruta y dominio
  $ruta = 'cookies/';
  $dominio = "localhost";
  // Sólo envía la cookie con conexión HTTPs
  $seguridad = false;
  // Cookie disponible sólo para el protocolo HTTP
  $solohttp = true;
  setcookie($nombre, $valor, $expiracion, $ruta, $dominio, $seguridad, $solohttp);
}

$gustos = "";

if ($_POST) {
  if (isset($_POST['musica'])) {
    $gustos = $gustos . "musica,";
  }
  if (isset($_POST['deportes'])) {
    $gustos = $gustos . "deportes,";
  }
  if (isset($_POST['anime'])) {
    $gustos = $gustos . "anime,";
  }
  if (isset($_POST['animales'])) {
    $gustos = $gustos . "animales";
  }
}

crearCookie($gustos);
header("Location: redireccion.php");
