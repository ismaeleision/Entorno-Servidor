<?php
session_start();
//Función para filtrar los campos del formulario
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

function destruirSesion()
{
  session_destroy();
}

//dado un id y cantidad si coincide con uno en el array modifica su cantidad
function actualizarCantidad($id, $cantidad)
{
  for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
    if ($_SESSION['carrito'][$i]['id'] == $id) {
      $_SESSION['carrito'][$i]['cantidad'] += $cantidad;
      return $_SESSION['carrito'][$i]['cantidad'];
    }
  }
}

//sirve para comprobar si un array esta definido en sesion[carrito]
function existe($id)
{
  foreach ($_SESSION['carrito'] as $libro) {
    if ($libro['id'] == $id) {
      return true;
    }
  }
  return false;
}

//si se ha mandado un get
if ($_GET) {
  //si el get[carrito] esta definido
  if (isset($_GET['carrito'])) {
    //pasa por la funcion filtrado los datos recogidos del get
    $_GET['carrito'] = filtrado($_GET['carrito']);
    //si es true lo redirecciona a la pagina carrito
    if ($_GET['carrito'] == true) {
      header("Location: carrito.php");
      exit;
    }
  }

  //Al pulsar la x en el carrito elimina el libro del que has pulsado
  if (isset($_GET['eliminar'])) {
    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
      if ($_GET['id'] == $_SESSION['carrito'][$i]['id']) {
        unset($_SESSION['carrito'][$i]);
      }
    }
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    header("Location: carrito.php");
    exit;
  }

  //al pulsar la x de index cierra la sesion
  if (isset($_GET['explosion'])) {
    if ($_GET['explosion'] == true) {
      destruirSesion();
      header("Location: index.php");
      exit;
    }
  }
}

//si se ha mandado un formulario por el metodo post
if ($_POST) {

  //si esta definida post['cantidad]
  if (isset($_POST['cantidad'])) {
    //si esta definida post[id_libro]
    if (isset($_POST['compra'])) {
      if (existe($_POST['compra'])) {
        actualizarCantidad($_POST['compra'], $_POST['cantidad']);
      } else {
        //buscame el libro que coincide con el id que obtengo
        foreach ($_SESSION['almacen'] as $libro) {
          if ($libro['id'] == $_POST['compra']) {
            $_POST['compra'] = $libro;
            //meto la cantidad que compro al array del libro
            $cantidad = array("cantidad" => $_POST['cantidad']);
            $_POST['compra'] = $_POST['compra'] + $cantidad;
            //lo introduzco a la sesion['carrito'] y devuelvo el buscador al index
            array_unshift($_SESSION['carrito'], $_POST['compra']);
          }
        }
      }
      header("Location: index.php");
      exit;
    }
  }
}
