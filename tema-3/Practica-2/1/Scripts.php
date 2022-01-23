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

/*
La funcion genera un array bidimensional con 3 lineas de 5 numeros cada uno
*/
function rellenarCartones()
{
  $carton = array();
  for ($i = 0; $i < 3; $i++) {
    $linea = array();
    for ($j = 0; $j < 5; $j++) {
      $numero = random_int(0, 99);
      array_push($linea, $numero);
    }
    array_push($carton, $linea);
  }
  return $carton;
}

//dado el numero de jugadores rellena los espacios en blanco con jugadores genericos
function rellenarMesa($numJugadores)
{
  //empieza con el valor de jugadores ya registrados hasta los que hay en total
  for ($i = count($_SESSION['jugador']); $i < $numJugadores; $i++) {
    array_push($_SESSION['jugador'], array("nombre" => "Fulgencio" . $i, "dinero" => 100, "numeros" => rellenarCartones(), "linea" => false, "bingo" => false));
  }
}

//Imprimir jugadores y los resultados de sus cartones
function imprimirJuego()
{
  foreach ($_SESSION['jugador'] as $jugador) {
    echo "<div class='card border-dark mb-3 ' style='max-width: 18rem; margin-right:25px'>";
    echo '<div class="card-header">' . $jugador['nombre'] . '</div>';
    echo '<div class="card-body text-dark">';
    echo '<h5 class="card-title"> ' . $jugador["dinero"] . '€</h5>';
    if ($jugador['linea'] == true) {
      echo '<h5 class="card-title">Linea</h5>';
    }
    if ($jugador['bingo'] == true) {
      echo '<h5 class="card-title">Bingo</h5>';
    }
    echo '<table class="table">';
    foreach ($jugador['numeros'] as $linea) {
      echo '<tr>';
      foreach ($linea as $numero) {
        $contador = 0;
        foreach ($_SESSION['bingo'] as $bola) {
          if ($bola == $numero) {
            $contador++;
          }
        }
        if ($contador >= 1) {
          echo "<td><del>" . $numero . "</del></td>";
        } else {
          echo "<td>" . $numero . "</td>";
        }
      }
      echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    echo '</div>';
  }
}

//Saca un random entre 1 y 99 que no haya salido antes y lo mete en Sesion[bingo]
function sacarNumero()
{
  $bola = random_int(1, 99);
  while (in_array($bola, $_SESSION['bingo']) == true) {
    $bola = random_int(1, 99);
  }
  array_push($_SESSION['bingo'], $bola);
}

//Reinicia los cartones, los numeros que han salido y resta 5 al dinero de los jugadores
function empezarJuego()
{
  foreach ($_SESSION['jugador'] as &$jugador) {
    if (($jugador['dinero'] <= 0) || (($jugador['dinero'] - 5) <= 0)) {
      session_destroy();
      header("Location: index.php?accion=noDinero");
      exit;
    }
    $jugador['dinero'] -= 5;
    $jugador['numeros'] = rellenarCartones();
    $jugador['bingo'] = false;
    $jugador['linea'] = false;
  }
  $_SESSION['bingo'] = array();
  $_SESSION['finRonda']=false;
}

//Comprueba si algun jugador a sacado linea y al primero le da 5
function ganadorLinea()
{
  //contador si alguno tiene linea
  $cont_Linea = 0;

  //compruebo que ninguno tenga linea=true
  foreach ($_SESSION['jugador'] as $player) {
    if ($player['linea'] == true) {
      $cont_Linea++;
    }
  }
  //Si no ha salido linea me recorro los jugadores a ver si lo tienen
  if ($cont_Linea == 0) {
    //recorro cada jugador 
    foreach ($_SESSION['jugador'] as &$jugador) {
      //Saco el array de numeros en lineas

      foreach ($jugador['numeros'] as $lineacarton) {
        $con_num = 0;
        //Si los numeros de la linea estan en la sesion[bingo] ha ganado linea
        foreach ($lineacarton as $numero) {
          if (in_array($numero, $_SESSION['bingo'])) {
            $con_num += 1;
          }
          if ($con_num == 5) {
            $jugador['linea'] = true;
            $jugador['dinero'] += 5;
          }
        }
      }
    }
  }
}

//Comprueba si algun jugador a hecho bingo, le otroga premio al ganador 
//oculta el boton de siguiente para forzar el empezar otra ronda
function ganadorBingo()
{
  //contador si alguno tiene bingo
  $cont_Bingo = 0;
  //compruebo que ninguno tenga bingo=true
  foreach ($_SESSION['jugador'] as $player) {
    if ($player['bingo'] == true) {
      $cont_Bingo += 1;
      $_SESSION['finRonda'] == true;
    }
  }
  if ($cont_Bingo == 0) {
    foreach ($_SESSION['jugador'] as &$jugador) {
      $cont_Linea = 0;

      foreach ($jugador['numeros'] as $lineacarton) {
        $con_num = 0;
        //Si los numeros de la linea estan en la sesion[bingo] ha ganado linea
        foreach ($lineacarton as $numero) {
          if (in_array($numero, $_SESSION['bingo'])) {
            $con_num += 1;
          }
          if ($con_num == 5) {
            $cont_Linea += 1;
          }
        }
      }
      if ($cont_Linea == 3) {
        $jugador['bingo'] = true;
        $jugador['dinero'] += (5 * count($_SESSION['jugador']));
        $_SESSION['finRonda'] = true;
      }
    }
  }
}
