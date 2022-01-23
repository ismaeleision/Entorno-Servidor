<?php
include "scripts.php";

//Si la sesion[palabra] no esta definida la define a romueldo
if (isset($_SESSION['palabra']) == false) {
  $_SESSION['palabra'] = "Romueldo";
}
//Si la sesion[intentos] no esta definida la define a 0
if (isset($_SESSION['intentos']) == false) {
  $_SESSION['intentos'] = "0";
}
//Si la sesion[letras_probadas] no esta definida la inicializa como un array vacio
if (isset($_SESSION['letras_probadas']) == false) {
  $_SESSION['letras_probadas'] = array();
}
//Si la sesion[palabraIntentada] no esta definida la inicializa como un string
if (isset($_SESSION['palabraIntentada']) == false) {
  $_SESSION['palabraIntentada'] = "-";
}
//Iniciacion de la sesion[diccionario]
$_SESSION['diccionario'] = array(
  "falso", "evadirse", "consulta", "nieve", "levantamiento", "divorciar", "salud", "filmar",
  "aluminio", "muralla", "irracional", "loto", "roma", "atleta", "noche", "hamacas", "vanidoso", "veredicto",
  "tomo", "costa", "fluor", "caricatura", "pescar", "leyenda", "cumpleaños", "peaje", "candelabro", "cabellera",
  "miope", "levadizo", "soda", "oido", "adentro", "lucha", "novela", "globo", "internar",
  "algarrobo", "corona", "bruja", "revolver", "detenerse", "semaforo", "trillizos", "cuchillo", "pronostico", "escoba",
  "graduar", "alpinista", "telesilla", "temeroso", "corbata", "diligencia", "igual", "contrato", "mueble",
  "pica", "film", "alianza", "amarillo", "juguete", "tarta", "murmurar", "destornillador", "cocina", "anotar",
  "pluma", "fotografiar", "hija", "tomar", "prima", "panorama", "arrullar", "plaza", "ayudar", "brazo",
  "telefonear", "antibioticos", "sobre", "pararrayos", "velorio", "preservativo", "camiseta", "espinacas", "tarde", "ensuciar",
  "privado", "doctor", "flautitas", "silbar", "casualidad", "segundos", "pararse", "cargo", "aspecto", "groenlandia"
);

//Si recibre un envio get
if ($_GET) {
  //si ese get contiene accion
  if (isset($_GET['accion'])) {
    //filtra su contenido 
    $_GET['accion'] = filtrado($_GET['accion']);
    //si la accion es jugar inicializa las sesiones que se van a necesitar
    if ($_GET['accion'] == "Jugar") {
      //baraja la sesion diccionario
      shuffle($_SESSION['diccionario']);
      //define la sesion[palabra] con el ultimo contenido de la sesion[diccionario] 
      $_SESSION['palabra'] = array_pop($_SESSION['diccionario']);
      $_SESSION['intentos'] = 0;
      $_SESSION['letras_probadas'] = array();
      //La palabra intentada tiene tantos - como la longitud de la palabra con la que vamos a jugar
      for ($i = 0; $i < strlen($_SESSION['palabra']); $i++) {
        $_SESSION['palabraIntentada'] .= "-";
      }
      //redirige a juego.php
      header("Location: juego.php");
      exit;
    }
    //Si la accion es destruir cierra sesion y te envia a index.php
    if ($_GET['accion'] == "destruir") {
      session_destroy();
      header("Location: index.php");
      exit;
    }
  }
}

//Si envia un formulario por post
if ($_POST) {
  //si tiene definida probar
  if (isset($_POST['probar'])) {
    //si tiene definida
    if (isset($_POST['letra'])) {
      //filtra el post[letra]
      $_POST['letra'] = filtrado($_POST['letra']);
      //registra el intento de letra
      intento($_POST['letra']);
      //Comprueba la letra y la añade a sesion[palabraIntentada] para poder hacer la accion ganar
      comprobarLetra(($_POST['letra']));

      //Comprobacion para ganar te redirige con ganar
      if ($_SESSION['palabraIntentada'] == $_SESSION['palabra']) {
        header("Location: index.php?accion=ganar");
        exit;
      }

      //Si los intentos superan a 7 te redirige a index con el get perder
      if ($_SESSION['intentos'] > 7) {
        session_destroy();
        header("Location: index.php?accion=perder");
        exit;
      }
      //Cualquier otra accion te mete en juego.php
      header("Location: juego.php");
      exit;
    }
  }
}
