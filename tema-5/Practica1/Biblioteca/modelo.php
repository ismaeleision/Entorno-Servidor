<?php
include "lib.php";
//Abre la conexion con la base de datos
function abrirBBDD()
{
  try {
    $dsn = "mysql:host=localhost;dbname=tema5";
    $dbh = new PDO($dsn, "ismaeleision", "ismaeleision");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $dbh;
}

//----------------------------------------------------------USUARIOS-------------------------------------------------------------------------------

//Muestra los usuarios guardados
function selectUsuarios()
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM tema5.usuarios ");
  $stmt->execute();
  $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $usuarios;
}

//Funcion que dado los parametros del usuario los añade a la BBDD
function añadirUsuario($dni, $nombre, $apellidos, $edad, $direccion, $poblacion, $telefono, $email)
{
  $dbh = abrirBBDD();
  try {
    $stmt = $dbh->prepare("INSERT INTO `tema5`.`usuarios` (`dni`, `nombre`, `apellidos`, `edad`, `direccion`, `poblacion`, `telefono`, `email`) VALUES (?, ?, ?, ?, ?, ?, ?, ?); ");
    $stmt->bindValue(1, $dni);
    $stmt->bindValue(2, $nombre);
    $stmt->bindValue(3, $apellidos);
    $stmt->bindValue(4, $edad);
    $stmt->bindValue(5, $direccion);
    $stmt->bindValue(6, $poblacion);
    $stmt->bindValue(7, $telefono);
    $stmt->bindValue(8, $email);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}

//Funcion para eleminar un usuario de la base de datos por dni
function deleteUsuario($dni)
{
  $dbh = abrirBBDD();
  try {
    $stmt = $dbh->prepare("DELETE FROM `tema5`.`usuarios` WHERE `dni` = ?");
    $stmt->bindValue(1, $dni);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}

//--------------------------------------------------------------------------LIBROS---------------------------------------------------------------

//Muestra todos los datos guardados en la tabla libros
function selectLibros()
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM libros ");
  $stmt->execute();
  $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $libros;
}

function selectLibroISBN($isbn)
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM tema5.libros WHERE ISBN = ? ");
  $stmt->bindValue(1, $isbn);
  $stmt->execute();
  $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $libros;
}

//Muestras los datos que coincidan con lo introducido en el buscador
function selectLibroFiltrado($palabra)
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM tema5.libros WHERE titulo LIKE ? OR subtitulo LIKE ? OR autor LIKE ?");
  $stmt->bindValue(1, "%" . $palabra . "%");
  $stmt->bindValue(2,  "%" . $palabra . "%");
  $stmt->bindValue(3,  "%" . $palabra . "%");
  $stmt->execute();
  $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $libros;
}

//Funcion que dado los parametros del usuario los añade a la BBDD
function añadirLibro($titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $ejemplares_totales, $ejemplares_disponibles)
{
  $dbh = abrirBBDD();
  try {
    $stmt = $dbh->prepare("INSERT INTO `tema5`.`libros` (`titulo`, `subtitulo`, `descripcion`, `autor`, `editorial`, `categoria`, `portada`, `ejemplares_totales`, `ejemplares_disponibles`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?); ");
    $stmt->bindValue(1, $titulo);
    $stmt->bindValue(2, $subtitulo);
    $stmt->bindValue(3, $descripcion);
    $stmt->bindValue(4, $autor);
    $stmt->bindValue(5, $editorial);
    $stmt->bindValue(6, $categoria);
    $stmt->bindValue(7, $portada);
    $stmt->bindValue(8, $ejemplares_totales);
    $stmt->bindValue(9, $ejemplares_disponibles);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}

//Actualiza los datos en la BBDD segun los datos modificados en editarLibro
function editarLibro($isbn, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $ejemplares_totales, $ejemplares_disponibles)
{
  $dbh = abrirBBDD();
  try {
    //Avatar
    if ($portada == "-") {
      //Insertar
      $stmt = $dbh->prepare("UPDATE tema5.libros SET titulo=?, subtitulo=?, descripcion=?, autor=?, editorial=?, categoria=?, ejemplares_totales=?, ejemplares_disponibles=? WHERE ISBN=?");
      $stmt->bindValue(7, $ejemplares_totales);
      $stmt->bindValue(8, $ejemplares_disponibles);
      $stmt->bindValue(9, $isbn);
    } else {
      //Insertar
      $stmt = $dbh->prepare("UPDATE tema5.libros SET titulo=?, subtitulo=?, descripcion=?, autor=?, editorial=?, categoria=?, portada=?, ejemplares_totales=?, ejemplares_disponibles=? WHERE ISBN=?");
      $stmt->bindValue(7, $portada);
      $stmt->bindValue(8, $ejemplares_totales);
      $stmt->bindValue(9, $ejemplares_disponibles);
      $stmt->bindValue(10, $isbn);
    }
    $stmt->bindValue(1, $titulo);
    $stmt->bindValue(2, $subtitulo);
    $stmt->bindValue(3, $descripcion);
    $stmt->bindValue(4, $autor);
    $stmt->bindValue(5, $editorial);
    $stmt->bindValue(6, $categoria);

    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}

//Funcion para eleminar un libro de la base de datos por ISBN
function deleteLibro($ISBN)
{
  $dbh = abrirBBDD();
  try {
    $stmt = $dbh->prepare("DELETE FROM `tema5`.`libros` WHERE `ISBN` = ?");
    $stmt->bindValue(1, $ISBN);
    $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}

//-----------------------------------------------------------------------------------PRESTAMOS----------------------------------------------------------------------------------------------------------
//Muestra todos los datos guardados en la tabla prestamos
function selectPrestamos()
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM tema5.prestamos ");
  $stmt->execute();
  $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $prestamos;
}

//Muestra el prestamos que coincida con el id
function selectPrestamosId($id)
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM tema5.prestamos WHERE id = ?");
  $stmt->bindValue(1, $id);
  $stmt->execute();
  $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $prestamos;
}

//Muestras los datos que coincidan con lo introducido en el buscador
function selectPrestamoEstadoDni($estado, $dni)
{
  $dbh = abrirBBDD();
  $stmt = $dbh->prepare("SELECT * FROM tema5.prestamos WHERE dni LIKE ? OR estado LIKE ?");
  $stmt->bindValue(1, $dni);
  $stmt->bindValue(2, $estado);
  $stmt->execute();
  $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh = null;
  return $prestamos;
}

//Añade un prestamos a la tabla prestamo
function añadirPrestamo($ISBN, $dni, $fecha_ini, $fecha_fin, $estado)
{
  $dbh = abrirBBDD();
  try {
    $stmt = $dbh->prepare("INSERT INTO `tema5`.`prestamos` (`ISBN`, `dni`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES (?, ?, ?, ?, ?); ");
    $stmt->bindValue(1, $ISBN);
    $stmt->bindValue(2, $dni);
    $stmt->bindValue(3, $fecha_ini);
    $stmt->bindValue(4, $fecha_fin);
    $stmt->bindValue(5, $estado);
    $stmt->execute();

    //Si el estado es distinto de devuelto se restara 1 a los ejemplares_disponibles
    if ($estado != "devuelto") {
      $stmt = $dbh->prepare("UPDATE tema5.libros SET ejemplares_disponibles = ejemplares_disponibles-1 WHERE ISBN=?");
      $stmt->bindValue(1, $ISBN);
      $stmt->execute();
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}

//Edita el parametro estado y fecha_fin de la tabla
function editarPrestamo($id, $ISBN, $fecha_fin, $estado)
{
  $pretamoId = selectPrestamosId($id);
  $dbh = abrirBBDD();
  try {
    $stmt = $dbh->prepare("UPDATE tema5.prestamos SET fecha_fin=?, estado=? WHERE id=?");
    $stmt->bindValue(1, $fecha_fin);
    $stmt->bindValue(2, $estado);
    $stmt->bindValue(3, $id);
    $stmt->execute();

    //Si el estado es devuelto y el estado del prestamo que estamos cambiando no lo es suma a 1 los disponibles del libro al que refiere
    if ($estado != $pretamoId[0]['estado'] && $estado == "devuelto") {
      $stmt = $dbh->prepare("UPDATE tema5.libros SET ejemplares_disponibles = ejemplares_disponibles+1 WHERE ISBN=?");
      $stmt->bindValue(1, $ISBN);
      $stmt->execute();

      //Si el estado del prestamo es devuelto y cambia a otra cosa se restara 1 a los disponibles del libro referido
    } else if ($pretamoId[0]['estado'] == "devuelto" && $estado != "devuelto") {
      $stmt = $dbh->prepare("UPDATE tema5.libros SET ejemplares_disponibles = ejemplares_disponibles-1 WHERE ISBN=?");
      $stmt->bindValue(1, $ISBN);
      $stmt->execute();
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  $dbh = null;
}
