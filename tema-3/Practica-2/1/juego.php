<?php
include "Scripts.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Bingo 3º Estafa.pof</title>
</head>

<!--
  Enseñar todos los cartones de cada jugador indicando cual es el tuyo
  Ir mostrando la progresion y tachando los que han salido
  Mostrar tambien los numeros que van saliendo, en cajitas
-->

<body>
  <header>
    <a href="controlador.php?accion=destruir"><img src="img/eliminar.png" width="50px" height="50px">Salir Juego</a>
  </header>
  <div class="container-fluid">
    <div class="container-sm">
      <div stlye="width:500px; height:fit-content; border:1px solid black; margin-bottom:15px;">
        <h3>Los numeros que han salido son:</h3>
        <?php
        foreach ($_SESSION['bingo'] as $bola) {
          echo  $bola . " ";
        }
        ?>
      </div>
    </div>
    <div class="container-md d-flex flex-row">
      <?php
      imprimirJuego();
      ?>
    </div>
    <?php
    if ($_SESSION['finRonda'] == true) {
    } else {
      echo "<div>";
      echo '<a class="btn btn-primary" href="controlador.php?accion=numero" role="button">Siguiente Numero</a>
    </div>';
    }
    ?>

    <div style="margin-top: 15px;">
      <a class="btn btn-primary" href="controlador.php?accion=terminarRonda" role="button">Terminar Carton</a>
    </div>
</body>

</html>