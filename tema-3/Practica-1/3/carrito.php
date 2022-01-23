<?php
session_start();
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
        <h2>Bienvenido al carrito</h2>
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

    <?php
    //pinta en bucle los datos guardados en la sesion['carrito']
    foreach ($_SESSION['carrito'] as $objeto) {
    ?>
      <div class="card" style="width: 18rem; display:inline-block;">
        <img src="<?= $objeto['imagen'] ?>" class="card-img-top" width="200px" height="300px">
        <div class="card-body">
          <h5 class="card-title"><?= $objeto['nombre'] ?></h5>
          <p class="card_text">Vas a comprar <?= $objeto['cantidad'] ?> Unidades</p>
          <p class="card_text">SUBTOTAL <?= $objeto['cantidad'] * $objeto['precio'] ?>€</p>
          <a href="intermedio.php?eliminar=true&id=<?= $objeto['id'] ?>">
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
            $total += ($libro['cantidad'] * $libro['precio']);
          }
          echo $total;
          ?>
        </strong>
      </p>
    </div>
  </div>
</body>

</html>