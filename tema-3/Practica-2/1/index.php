<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Inicio - Bingo 3º Estafa</title>
</head>

<body>
  <!--
    En el bingo se extraen al azar un a una hasta 90 bolas numeradas del 1 al 90.
Entre 2 y 4 jugadores.
Cada cartón contiene 15 números de los 90 posibles.
Conforme se van extrayendo las bolas al azar, los jugadores deben tachar los números coincidentes de su cartón.
  -->
  <div class="container-fluid">
    <h2>Bienvenido al Bingo 3º Estafa</h2>
    <?php
    $_SESSION['bingo'] = array();
    $_SESSION['jugador'] = array();
    //Si recibe un get
    if ($_GET) {
      //si es de error lo filtra para imprimir el error especifico que esta dando
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "dinero") {
          echo "No puedes introducir menos de 10€ o más de 100€";
        }
        if ($_GET['error'] == "jugadores") {
          echo "No puede haber menos de 2 jugadores por mesa";
        }
      }
      if (isset($_GET['accion'])) {
        if ($_GET['accion'] == "noDinero") {
          echo "Te has quedado sin dinero";
        }
      }
    }
    ?>

    <!--Formulario que recibe el nombre y dinero del jugador-->
    <div class="container-md bg- primary">
      <div style="width:200px; ">
        <form action="controlador.php" method="post">

          <!--Recibe el nombre del ususario-->
          <div class="input-group flex-nowrap">
            <input required type="text" class="form-control" placeholder="Usuario" aria-describedby="addon-wrapping" name="usuario">
          </div>
          <!--Recibe la cantidad que queremos-->
          <div class="input-group flex-nowrap">
            <input required type="number" class="form-control" placeholder="Dinero" aria-describedby="addon-wrapping" name="dinero">
            <span class="input-group-text" id="addon-wrapping">€</span>
          </div>
          <!--Recibe la cantidad de oponentes que quieres tener-->
          <div class="input-group flex-nowrap">
            <input required type="number" class="form-control" placeholder="Jugadores" aria-describedby="addon-wrapping" name="jugadores">
          </div>
          <div class="input-group mb-3">
            <input type="submit" class="btn btn-outline-secondary bg-primary" id="button-addon1" value="Adelante">
          </div>
          <input type="hidden" value="inicio" name="origen">
        </form>
      </div>
    </div>
  </div>
</body>

</html>