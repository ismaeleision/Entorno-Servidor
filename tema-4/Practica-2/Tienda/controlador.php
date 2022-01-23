<?php
session_start();
include "lib.php";

//dado un id y cantidad si coincide con uno en el array modifica su cantidad
function actualizarCantidad($id, $cantidad)
{
  for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
    if ($_SESSION['carrito'][$i]['0'] == $id) {
      $_SESSION['carrito'][$i]['cantidad'] += $cantidad;
    }
  }
}

//sirve para comprobar si un array esta definido en sesion[carrito]
function existe($id)
{
  foreach ($_SESSION['carrito'] as $libro) {
    if ($libro['0'] == $id) {
      return true;
    }
  }
  return false;
}

//si se ha mandado un get
if ($_GET) {
  //Al pulsar la x en el carrito elimina el libro del que has pulsado
  if (isset($_GET['eliminar'])) {
    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
      if ($_GET['id'] == $_SESSION['carrito'][$i]['0']) {
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

  if (isset($_GET['accion'])) {
    if ($_GET['accion'] = 'factura') {
      facturaPDF($_SESSION['carrito']);
      destruirSesion();
      enviarEmail();
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
        $libros = leerProductos();
        foreach ($libros as $libro) {
          if ($libro['0'] == $_POST['compra']) {
            $_POST['compra'] = $libro;
            //meto la cantidad que compro al array del libro
            $cantidad = array("cantidad" => $_POST['cantidad']);
            $_POST['compra'] = $_POST['compra'] + $cantidad;
            //lo introduzco a la sesion['carrito'] y devuelvo el buscador al index
            array_unshift($_SESSION['carrito'], $_POST['compra']);
          }
        }
      }
    }
  }

  //Al mandar el formulario del modal
  if (isset($_POST['nuevoProducto'])) {
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['imagen'])) {
      $nombre = filtrado($_POST['nombre']);
      $descripcion = filtrado($_POST['descripcion']);
      $imagen = filtrado($_POST['imagen']);
      nuevoProducto($nombre, $descripcion, $_POST['precio'], $imagen);
    }
  }
  header("Location: index.php");
  exit;
}
