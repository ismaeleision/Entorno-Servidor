<?php
class ControladorBlackjack
{
  //Llama a la vistaOpciones que contiene el menu inicial del juego
  public static function mostrarOpciones()
  {
    $opciones = new VistaAjax();
    $opciones->render();
  }

  //crea la partida de cero y chapa a la anterior
  public static function iniciarPartida()
  {
    //Se crea el objeto partida
    $partida = new Partida();
    //da las cartas a los jugadores
    $partida->repartirMano();
    //transforma el objeto en string y lo introduce en la sesion, aumenta en 1 las partidas que se han jugado
    $_SESSION['partida'] = serialize($partida);
    $_SESSION['partidasJugadas'] = $_SESSION['partidasJugadas'] + 1;
  }

  //transforma la sesion partida en objeto y lo pinta el contenido
  public static function mostrarPartida()
  {
    $partida = unserialize($_SESSION['partida']);
    $mesa = new VistaPartida();
    $mesa->render($partida);
  }

  //Cuando la partida termina se llama a otra vista y se pintan las cartas de los jugadores
  public static function mostrarResultado()
  {
    $partida = unserialize($_SESSION['partida']);
    $mesa = new VistaResultado();
    $mesa->render($partida);
  }

  //Da una carta al jugador
  public static function otraCarta()
  {
    //unserializar la sesion
    $partida = unserialize($_SESSION['partida']);
    $partida->darCartaJugador();
    //Si la mano del jugador excede de 21 se llama la funcion plantarse para que pare el juego
    if ($partida->getJugador()->valorMano() > 21) {
      $_SESSION['partida'] = serialize($partida);
      header("Location: enrutador.php?accion=plantarse");
      exit;
    }
    //pase o no por el if los cambios se guardan en la sesion
    $_SESSION['partida'] = serialize($partida);
  }

  public static function plantarse()
  {
    $partida = unserialize($_SESSION['partida']);
    //Si el crupier tiene menos de 17 roba carta
    while ($partida->getCrupier()->valorMano() <= 16) {
      $partida->darCartaCrupier();
    }

    //Cuando gana el jugador se incrementa la sesion partidas ganadas
    if ($partida->getCrupier()->valorMano() > 21) {
      echo "Crupier se ha pasado";
    } else if ($partida->getJugador()->valorMano() > 21) {
      echo "Jugador se ha pasado";
    } else if ($partida->getCrupier()->valorMano() == 21 && $partida->getJugador()->valorMano() == 21) {
      echo "Empate Blackjack";
    } else if ($partida->getCrupier()->valorMano() == $partida->getJugador()->valorMano()) {
      echo "Empate Mismo Valor";
    } else if ($partida->getCrupier()->valorMano() < 21 && $partida->getJugador()->valorMano() == 21) {
      echo "Blackjack Jugador";
      $_SESSION['partidasGanadas'] = $_SESSION['partidasGanadas'] + 1;
    } else if ($partida->getCrupier()->valorMano() == 21 && $partida->getJugador()->valorMano() < 21) {
      echo "Blackjack Crupier";
    } else if ($partida->getCrupier()->valorMano() > $partida->getJugador()->valorMano()) {
      echo "Gana Crupier";
    } else if ($partida->getCrupier()->valorMano() < $partida->getJugador()->valorMano()) {
      echo "Gana Jugador";
      $_SESSION['partidasGanadas'] = $_SESSION['partidasGanadas'] + 1;
    }

    $_SESSION['partida'] = serialize($partida);
  }
}
