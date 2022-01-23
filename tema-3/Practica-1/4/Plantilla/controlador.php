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

//Destruye la sesion
function destruirSesion()
{
  session_destroy();
}

//funcion para cargar los datos en sesion, como un enlace a la BBDD
function cargarDatos()
{
  $_SESSION['alumnos'] = array(
    array("apellidos" => "Garcia Gomez", "nombre" => "Fulgencio", "edad" => "16", "dni" => "12345678Ñ", "email" => "GCF1@gmail.com", "localidad" => "Huercal-Overa", "telefono" => "600000001", "curso" => "2º DAW", "avatar" => ""),
    array("apellidos" => "Gomez Garcia", "nombre" => "Fulgencio", "edad" => "17", "dni" => "23456789P", "email" => "GGF1@gmail.com", "localidad" => "Lorca", "telefono" => "600000002", "curso" => "3º MECANICA", "avatar" => ""),
    array("apellidos" => "Gea Gomez", "nombre" => "Fulgencio", "edad" => "18", "dni" => "34567891O", "email" => "GGF2@gmail.com", "localidad" => "Vera", "telefono" => "600000003", "curso" => "2º TURISMO", "avatar" => ""),
    array("apellidos" => "Garcia Herrero", "nombre" => "Fulgencio", "edad" => "20", "dni" => "45678901M", "email" => "GHF1@gmail.com", "localidad" => "Cuevas del Almanzora", "telefono" => "600000004", "curso" => "1º TURISMO", "avatar" => ""),
    array("apellidos" => "Gomez Centurion", "nombre" => "Fulgencio", "edad" => "114", "dni" => "56789012J", "email" => "GCF1@gmail.com", "localidad" => "Urcal", "telefono" => "600000005", "curso" => "1º DAW", "avatar" => ""),
    array("apellidos" => "Garcia Fernandez", "nombre" => "Fulgencio", "edad" => "35", "dni" => "67890123K", "email" => "GFF1@gmail.com", "localidad" => "Granada", "telefono" => "600000006", "curso" => "2º DAW", "avatar" => ""),
    array("apellidos" => "Chueca Gomez", "nombre" => "Fulgencio", "edad" => "40", "dni" => "78901234B", "email" => "CGF1@gmail.com", "localidad" => "Almeria", "telefono" => "600000007", "curso" => "3º MECANICA", "avatar" => "")
  );

  $_SESSION['cursos'] = array(
    array("nombre" => "1ºDAW", "etapa" => "Ciclo Superior", "curso" => "2020"),
    array("nombre" => "2ºDAW", "etapa" => "Ciclo Superior", "curso" => "2021"),
    array("nombre" => "1ºTURISMO", "etapa" => "Ciclo Superior", "curso" => "2022"),
    array("nombre" => "3ºMECANICA", "etapa" => "Ciclo Medio", "curso" => "2018"),
    array("nombre" => "2ºTURISMO", "etapa" => "Ciclo Superior", "curso" => "2019")
  );
}

//si pasamos algo por url
if ($_GET) {

  //si accion esta definida
  if (isset($_GET['accion'])) {
    //filtra los datos de accion
    $_GET['accion'] = filtrado($_GET['accion']);
    //si es salir destruye la sesion y redirige a index
    if ($_GET['accion'] == "salir") {
      destruirSesion();
      header("Location: index.php");
      exit;
    }
  }

  //si accion es eliminarCurso que viene incrustado con un id
  if ($_GET['accion'] == "eliminarCurso") {
    //filtra el id
    $id = filtrado($_GET['id']);
    for ($i = 0; $i < count($_SESSION['cursos']); $i++) {
      //si coincide lo elimina y reajusta el array para quitar los espacios
      if (strcmp($id, $_SESSION['cursos'][$i]['nombre']) == 0) {
        unset($_SESSION['cursos'][$i]);
      }
    }
    $_SESSION['cursos'] = array_values($_SESSION['cursos']);
    header("Location: cursos.php");
    exit;
  }

  //si accion es eliminarAlumno que viene con un id
  if ($_GET['accion'] == "eliminarAlumno") {
    //filtra el id y busca en la sesion[alumnos] si coincide alguno
    $id = filtrado($_GET['id']);
    for ($i = 0; $i < count($_SESSION['alumnos']); $i++) {
      if (strcmp($id, $_SESSION['alumnos'][$i]['dni']) == 0) {
        unset($_SESSION['alumnos'][$i]);
      }
    }
    $_SESSION['alumnos'] = array_values($_SESSION['alumnos']);
    header("Location: alumnos.php");
    exit;
  }

  if ($_GET['accion'] == "editarAlumno") {
    $id = filtrado($_GET['id']);
    header("Location: editarAlumno.php?id=$id");
    exit;
  }

  if ($_GET['accion'] == "editarCurso") {
    $nombre = filtrado($_GET['id']);
    header("Location: editarCursos.php?id=$nombre");
    exit;
  }
}

//si se ha enviado por post
if ($_POST) {
  //si esta definida accion
  if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "login") {
      $_POST['email'] = filtrado($_POST['email']);
      $_SESSION['usuario'] = $_POST['email'];
      cargarDatos();
      header("Location: inicio.php");
      exit;
    }


    //REGISTRO ---------------------------------------------------------------------
    if ($_POST['accion'] == "registro") {
      //Leer valor del email
      if (isset($_POST['email'])) {
        $email = filtrado($_POST['email']);
      }
      //Leer valor de la contraseña
      if (isset($_POST['password']) && (strcmp($_POST['contraseña'], $_POST['confirmarContraseña']) == 0)) {
        $password = filtrado($_POST['password']);
      }
      //Leer valor del nombre
      if (isset($_POST['nombre'])) {
        $nombre = filtrado($_POST['nombre']);
      }

      //Si no existe ya ese email en BBDD, lo insertaríamos

      //Por ahora redirigimos a home.php (para que funcione quitar echos de antes)
      header("Location: inicio.php");
      exit;
    }
    //FIN REGISTRO ------------------------------------------------------------------


    //MODIFICAR ALUMNO --------------------------------------------------------------
    if ($_POST['accion'] == "modificarAlumno") {
      $dni = filtrado($_POST['dni']);
      for ($i = 0; $i < count($_SESSION['alumnos']); $i++) {
        if (strcmp($dni, $_SESSION['alumnos'][$i]['dni']) == 0) {
          //Modificar                       
          $_SESSION['alumnos'][$i]['nombre'] = filtrado($_POST['nombre']);
          $_SESSION['alumnos'][$i]['apellidos'] = filtrado($_POST['apellidos']);
          $_SESSION['alumnos'][$i]['edad'] = filtrado($_POST['edad']);
          $_SESSION['alumnos'][$i]['dni'] = filtrado($_POST['dni']);
          $_SESSION['alumnos'][$i]['localidad'] = filtrado($_POST['localidad']);
          $_SESSION['alumnos'][$i]['telefono'] = filtrado($_POST['telefono']);
          $_SESSION['alumnos'][$i]['curso'] = filtrado($_POST['curso']);

          break;
        }
      }
      header("Location: alumnos.php");
      exit;
    }
    //FIN MODIFICAR ALUMNO ----------------------------------------------------------

    //Modificar Curso
    if ($_POST['accion'] == "modificarCurso") {
      $nombre = filtrado($_POST['curso']);
      for ($i = 0; $i < count($_SESSION['cursos']); $i++) {
        if (strcmp($nombre, $_SESSION['cursos'][$i]['curso']) == 0) {
          //Modificar                       
          $_SESSION['cursos'][$i]['nombre'] = filtrado($_POST['nombre']);
          $_SESSION['cursos'][$i]['etapa'] = filtrado($_POST['etapa']);
          $_SESSION['cursos'][$i]['curso'] = filtrado($_POST['curso']);

          break;
        }
      }
      header("Location: cursos.php");
      exit;
    }

    //Fin Modificar Curso
  }

  //Insertar Alumno
  if ($_POST['accion'] == "insertarAlumno") {
    $alumno['nombre'] = filtrado($_POST['nombre']);
    $alumno['apellidos'] = filtrado($_POST['apellidos']);
    $alumno['edad'] = filtrado($_POST['edad']);
    $alumno['email'] = filtrado($_POST['email']);
    $alumno['dni'] = filtrado($_POST['dni']);
    $alumno['localidad'] = filtrado($_POST['localidad']);
    $alumno['telefono'] = filtrado($_POST['telefono']);
    $alumno['curso'] = filtrado($_POST['curso']);
    $alumno['avatar'] = "";

    //Metemos en la sesión
    array_push($_SESSION['alumnos'], $alumno);

    header("Location: alumnos.php");
    exit;
  }

  //Insertar Curso
  if ($_POST['accion'] == "insertarCurso") {

    $curso['nombre'] = filtrado($_POST['nombre']);
    $curso['etapa'] = filtrado($_POST['etapa']);
    $curso['anio'] = filtrado($_POST['curso']);

    //Metemos en la sesión
    array_push($_SESSION['cursos'], $curso);

    header("Location: cursos.php");
    exit;
  }
}
