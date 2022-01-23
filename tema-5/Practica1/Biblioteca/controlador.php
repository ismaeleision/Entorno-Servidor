<?php
include "modelo.php";

//Para informacion por url
if ($_GET) {
  if (isset($_GET['accion'])) {
    //accion para eliminar Usuario por dni
    if ($_GET['accion'] == 'borrarUsuario') {
      $dni = filtrado($_GET['dni']);
      deleteUsuario($dni);
      header("Location: usuarios.php");
      exit;
    }
    //accion para eliminar Libro por ISBN
    if ($_GET['accion'] == 'borrarLibro') {
      $ISBN = filtrado($_GET['ISBN']);
      deleteLibro($ISBN);
      header("Location: libros.php");
      exit;
    }
    //accion para editar Libro por ISBN
    if ($_GET['accion'] == 'editarLibro') {
      $ISBN = filtrado($_GET['ISBN']);
      header("Location: editarLibro.php?accion=mostrar&ISBN=$ISBN");
      exit;
    }
    //Genera los pdf de la categoria correspondiente
    if ($_GET['accion'] == 'pdfLibros') {
      $libros = selectLibros();
      PDFLibros($libros);
      header("Location: libros.php");
      exit;
    }
    if ($_GET['accion'] == 'pdfUsuarios') {
      $usuarios = selectUsuarios();
      PDFUsuarios($usuarios);
      header("Location: usuarios.php");
      exit;
    }
    //accion para editar Prestamo por ISBN
    if ($_GET['accion'] == 'editarPrestamo') {
      $id = filtrado($_GET['id']);
      header("Location: editarPrestamo.php?accion=mostrar&id=$id");
      exit;
    }
  }
}

//Para informacion por formularios
if ($_POST) {
  //Recoge la informacion del formulario modal de Añadir Usuario y lo introduce a la base de datos
  if (isset($_POST['añadirUsuario'])) {
    $dni = filtrado($_POST['dni']);
    $nombre = filtrado($_POST['nombre']);
    $apellidos = filtrado($_POST['apellidos']);
    $edad = filtrado($_POST['edad']);
    $direccion = filtrado($_POST['direccion']);
    $poblacion = filtrado($_POST['poblacion']);
    $telefono = filtrado($_POST['telefono']);
    $email = filtrado($_POST['email']);
    añadirUsuario($dni, $nombre, $apellidos, $edad, $direccion, $poblacion, $telefono, $email);
    header("Location: usuarios.php");
    exit;
  }

  //Introduce la informacion del modal Añadir Libro en la tabla de la  base de datos Libro
  if (isset($_POST['añadirLibro'])) {
    $titulo = filtrado($_POST['titulo']);
    $subtitulo = filtrado($_POST['subtitulo']);
    $descripcion = filtrado($_POST['descripcion']);
    $autor = filtrado($_POST['autor']);
    $editorial = filtrado($_POST['editorial']);
    $categoria = filtrado($_POST['categoria']);
    $ejemplares_totales = filtrado($_POST['total']);
    $ejemplares_disponibles = filtrado($_POST['disponible']);

    //Portada
    $image = file_get_contents($_FILES['portada']['tmp_name']);
    $portada = $image;
    añadirLibro($titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $ejemplares_totales, $ejemplares_disponibles);
    header("Location: libros.php");
    exit;
  }

  if (isset($_POST['añadirPrestamo'])) {
    $ISBN = filtrado($_POST['isbn']);
    $dni = filtrado($_POST['dni']);
    $fecha_ini = $_POST['fecha_ini'];
    $fecha_fin = $_POST['fecha_fin'];
    $estado = $_POST['estado'];
    añadirPrestamo($ISBN, $dni, $fecha_ini, $fecha_fin, $estado);
    header("Location: prestamos.php");
    exit;
  }

  //Recoge los datos actualizados del libro que hayas modificado
  if (isset($_POST['editarLibro'])) {
    $isbn = filtrado($_POST['isbn']);
    $titulo = filtrado($_POST['titulo']);
    $subtitulo = filtrado($_POST['subtitulo']);
    $descripcion = filtrado($_POST['descripcion']);
    $autor = filtrado($_POST['autor']);
    $editorial = filtrado($_POST['editorial']);
    $categoria = filtrado($_POST['categoria']);
    $ejemplares_totales = filtrado($_POST['total']);
    $ejemplares_disponibles = filtrado($_POST['disponible']);

    //Portada
    if (!empty($_FILES['portada']['tmp_name'])) {
      $image = file_get_contents($_FILES['portada']['tmp_name']);
      $portada = $image;
    } else
      $portada = "-";

    editarLibro($isbn, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $ejemplares_totales, $ejemplares_disponibles);
    header("Location: libros.php");
    exit;
  }

  //Recoge los datos actualizados del libro que hayas modificado
  if (isset($_POST['editarPrestamo'])) {
    $id = filtrado($_POST['id']);
    $isbn = filtrado($_POST['isbn']);
    $fecha_fin = $_POST['fecha_fin'];
    $estado = $_POST['estado'];
    editarPrestamo($id, $isbn, $fecha_fin, $estado);
    header("Location: prestamos.php");
    exit;
  }
}
