<?php
include "cabecera.php";

?>
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
  <div>
    <a href="controlador.php?accion=factura">Imprimir Factura</a>
  </div>
</div>
</body>

</html>