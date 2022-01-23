<?php
//inicializo la sesion
session_start();

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
              <a href="index.php" class="nav-link text-secondary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#home" />
                </svg>
                Inicio
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-secondary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#home" />
                </svg>
                <button type="button" class="btn text-muted" data-bs-toggle="modal" data-bs-target="#nuevo">
                  Nuevo Producto
                </button>
            </li>
            <li>
              <a href="carrito.php">
                <button type="button" class="btn btn-warning position-relative" style="margin:15px 0 0 10px;">
                  <img src="img/carrito-de-compras.png" width="25" height="25">
                  <span class="position-absolute top-0 start-100 translate-middle p-1 bg-info border border-light rounded-circle">
                    <?= count($_SESSION['carrito']) ?>
                  </span>
                </button>
              </a>
            </li>
            <li>
              <a href="controlador.php?explosion=true">
                <img src="img/eliminar.png" width="25" height="25" style=" margin:10px 0 0 10px; background-color: red;">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="container-lg">

    <?php
    //pinta en bucle los datos guardados en la sesion['carrito']
    foreach ($_SESSION['carrito'] as $objeto) {
    ?>
      <div class="card" style="width: 18rem; display:inline-block;">
        <img src="<?= "img/" . $objeto['4'] ?>" class="card-img-top" width="200px" height="300px">
        <div class="card-body">
          <h5 class="card-title"><?= $objeto['1'] ?></h5>
          <p class="card_text">Vas a comprar <?= $objeto['cantidad'] ?> Unidades</p>
          <p class="card_text">SUBTOTAL <?= $objeto['cantidad'] * $objeto['3'] ?>€</p>
          <a href="controlador.php?eliminar=true&id=<?= $objeto['0'] ?>">
            <img src="img/eliminar.png" width="25px" height="25px">
          </a>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="card" style="width: 10rem; border:1px solid black; margin-top:20px; padding-left:5px">
      <p><strong>TOTAL=
          <?php
          $total = 0;
          foreach ($_SESSION['carrito'] as $libro) {
            $total += ($libro['cantidad'] * $libro['3']);
          }
          echo $total;
          ?>
        </strong>
      </p>
    </div>
  </div>
</body>

</html>