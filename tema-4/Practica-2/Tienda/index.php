<?php
include "cabecera.php";
?>
</header>
<div class="container-lg">

  <div style="text-align:right; margin-right: 10px;">

  </div>
  <!--Pinta en bucle los libros almacenados -->
  <div class="container-md">
    <?php
    foreach (leerProductos() as $libro) {
    ?>
      <div class="card" style="width: 20rem; display:inline-block; margin-top:30px;">
        <img src="<?= 'img/' . $libro['4'] ?>" class="card-img-top" width="200px" height="300px">
        <div class="card-body">
          <h5 class="card-title"><?= $libro['1'] ?></h5>
          <p class="card-text"><?= $libro['2'] ?></p>
          <p class="card-text"><?= $libro['3'] ?>€</p>

          <!--Formulario que recoge la cantidad de libros que hemos comprado y lo manda a controlador-->
          <form action="controlador.php" method="post">
            <input type="number" name="cantidad" class="form-control" min="0" value="1">

            <!--Me sirve para diferenciar de que libro viene el pedido al mandar su id-->
            <input type="hidden" name="compra" value="<?= $libro['0'] ?>">
            <input type="submit" value="Comprar">
          </form>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controlador.php" method="post">
          <div>
            <p>Nombre</p>
            <input type="text" name="nombre">
          </div>
          <br>
          <div>
            <p>Descripcion</p>
            <input type="text" name="descripcion">
          </div>
          <br>
          <div>
            <p>Precio</p>
            <input type="number" name="precio">
          </div>
          <br>
          <div>
            <p>Imagen (*solo admite jpg)</p>
            <input type="text" name="imagen">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name=nuevoProducto>Nuevo</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>

</html>