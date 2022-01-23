<?php
session_start();
//Filtra los datos para evitar la intrusión de codigo en las peticiones
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

//Pinta en formato tabla las letras que has acertado y las que no con guiones dobles
function pintarjuego()
{
  echo "<table class='table'>";
  echo "<tr>";
  for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
    $letra = $_SESSION['palabra'][$i];
    if (in_array($letra, $_SESSION['letras_probadas'])) {
      echo "<td>" . $letra . "</td>";
    } else {
      echo "<td> -- </td>";
    }
  }
  echo "</tr>";
  echo "</table>";
}

//Pinta en formato tabla las letras
function pintarProbadas()
{
  echo "<table class='table'>";
  echo "<tr>";
  $_SESSION['letras_probadas'] = array_unique($_SESSION['letras_probadas']);
  foreach ($_SESSION['letras_probadas'] as $letra) {
    echo "<td>" . $letra . " </td>";
  }
  echo "</tr>";
  echo "</table>";
}

//Registra el intento de letras y retiene las letras repetidas
function intento($letra)
{
  array_push($_SESSION['letras_probadas'], $letra);
  $palabra = str_split($_SESSION['palabra'], 1);
  if (!in_array($letra, $palabra) && !in_array($letra, $_SESSION['letras_probadas'])) {
    $_SESSION['intentos'] += 1;
  }
}

//Actualiza las letras de sesion[palabraIntentada] para hacer la comprobacion de ganar
function comprobarLetra($letra)
{
  for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
    $letra = $_SESSION['palabra'][$i];
    if (in_array($letra, $_SESSION['letras_probadas'])) {
      $_SESSION['palabraIntentada'][$i] = $letra;
    }
  }
}
