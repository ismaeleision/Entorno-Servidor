<?php
//inicializo la sesion
session_start();

//almaceno en sesion el array almacen con los libros
$_SESSION['almacen'] = array(
  array("id" => 1, "nombre" => "Attack On Titan", "descripcion" => "Se muerden un dedo y mutan", "precio" => 7.95, "imagen" => "img/attackontitan.jpg"),
  array("id" => 2, "nombre" => "Boku No Hero", "descripcion" => "Me comi el pelo de un extraño", "precio" => 12.68, "imagen" => "img/bokunohero.jpg"),
  array("id" => 3, "nombre" => "Death Note", "descripcion" => "Mira mama, mato con la libreta", "precio" => 6.39, "imagen" => "img/deathnote.jpg"),
  array("id" => 4, "nombre" => "Demon Slayer", "descripcion" => "Matar demonios", "precio" => 11.56, "imagen" => "img/demonslayer.jpg"),
  array("id" => 5, "nombre" => "One Piece", "descripcion" => "Buscando un tesoro", "precio" => 9.87, "imagen" => "img/onepiece.jpg"),
  array("id" => 6, "nombre" => "Rent A Girlfriend", "descripcion" => "Me alquilo una novia y la lio", "precio" => 4.32, "imagen" => "img/rent.jpg"),
);

//inicializo sesion carrito para guardar los libros que vaya comprando
if (isset($_SESSION['carrito']) == false) {
  $_SESSION['carrito'] = array();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <h2>Tu Tienda De Libros De Confianza</h2>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
              <use xlink:href="#bootstrap" />
            </svg>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#home" />
                </svg>
                Inicio
              </a>
            </li>
            <li>
              <a href="intermedio.php?carrito=true">
                <button type="button" class="btn btn-warning position-relative" style="margin:15px 0 0 10px;">
                  <img src="img/carrito-de-compras.png" width="25" height="25">
                  <span class="position-absolute top-0 start-100 translate-middle p-1 bg-info border border-light rounded-circle">
                    <?= count($_SESSION['carrito']) ?>
                  </span>
                </button>
              </a>
            </li>
            <li>
              <a href="intermedio.php?explosion=true">
                <img src="img/eliminar.png" width="25" height="25" style=" margin:10px 0 0 10px; background-color: red;">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </header>
  <div class="container-lg">

    <div style="text-align:right; margin-right: 10px;">

    </div>
    <!--Pinta en bucle los libros almacenados -->
    <div class="container-md">
      <?php
      foreach ($_SESSION['almacen'] as $libro) {
      ?>
        <div class="card" style="width: 20rem; display:inline-block; margin-top:30px;">
          <img src="<?= $libro['imagen'] ?>" class="card-img-top" width="200px" height="300px">
          <div class="card-body">
            <h5 class="card-title"><?= $libro['nombre'] ?></h5>
            <p class="card-text"><?= $libro['descripcion'] ?></p>
            <p class="card-text"><?= $libro['precio'] ?>€</p>

            <!--Formulario que recoge la cantidad de libros que hemos comprado y lo manda a intermedio-->
            <form action="intermedio.php" method="post">
              <input type="number" name="cantidad" class="form-control" min="0" value="1">

              <!--Me sirve para diferenciar de que libro viene el pedido al mandar su id-->
              <input type="hidden" name="compra" value="<?= $libro['id'] ?>">
              <input type="submit" value="Comprar">
            </form>
          </div>
        </div>
      <?php
      }
      ?>

    </div>

  </div>

</body>

</html>