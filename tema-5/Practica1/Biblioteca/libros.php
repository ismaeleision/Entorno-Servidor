<?php
include "cabecera.php";
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <div class="container-sm">
        <a href="libros.php?accion=mostrarLibros"><button type="button" class="btn btn-secondary">Mostrar Libros</button></a>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#añadirLibro">Añadir Libro</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#buscarLibro">Buscar Libro</button>
        <a href="controlador.php?accion=pdfLibros"><button type="button" class="btn btn-secondary">Imprimir Lista Libros</button></a>
      </div>
      <div class="container-md">
        <?php
        if ($_GET) {
          if (isset($_GET['accion'])) {
            $accion = filtrado($_GET['accion']);
            if ($accion == "mostrarLibros") {
              $libros = selectLibros();
            }
          }

          //Codigo para la busqueda del libro
          if (isset($_GET['buscarLibro'])) {
            $buscador = filtrado($_GET['buscador']);
            $libros = selectLibroFiltrado($buscador);
          }

          //Aqui se imprimen las salidas de los dos get
          echo "<table class='table table-hover'>";
          echo "<thead>";
          foreach ($libros[0] as $key => $value) {
            echo "<td>" . strtoupper($key) . "</td>";
          }
          echo "<td>ACCIONES</td>";
          echo "</thead><tbody>";
          foreach ($libros as $libro) {
            echo "<tr>";
            echo "<td>" . $libro['ISBN'] . "</td>";
            echo "<td>" . $libro['titulo'] . "</td>";
            echo "<td>" . $libro['subtitulo'] . "</td>";
            echo "<td>" . $libro['descripcion'] . "</td>";
            echo "<td>" . $libro['autor'] . "</td>";
            echo "<td>" . $libro['editorial'] . "</td>";
            echo "<td>" . $libro['categoria'] . "</td>";
            echo '<td><img width="50" src="data:image/jpeg;base64,' . base64_encode($libro['portada']) . '"/></td>';
            echo "<td>" . $libro['ejemplares_totales'] . "</td>";
            echo "<td>" . $libro['ejemplares_disponibles'] . "</td>";
            echo "<td><a href='controlador.php?accion=borrarLibro&ISBN={$libro['ISBN']}'>X</a>" . " "
              . "<a href='controlador.php?accion=editarLibro&ISBN={$libro['ISBN']}'>*-*</a></td>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
        }
        ?>
      </div>
    </div>
  </main>
  <?php
  include "pie.php";
  ?>
</div>

<!-- Modal AÑADIR LIBRO-->
<div class="modal fade" id="añadirLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Insertar Libro</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='controlador.php' method='post' enctype="multipart/form-data">
          <!--Importante el enctype o no hace nada-->
          <div class="form-group row">
            <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
          </div>
          <div class="form-group row">
            <label for="subtitulo" class="col-sm-2 col-form-label">Subtitulo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="subtitulo" name="subtitulo">
            </div>
          </div>
          <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
          </div>
          <div class="form-group row">
            <label for="autor" class="col-sm-2 col-form-label">Autor</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor">
            </div>
          </div>
          <div class="form-group row">
            <label for="editorial" class="col-sm-2 col-form-label">Editorial</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name='editorial' id="editorial" placeholder="Editorial">
            </div>
          </div>
          <div class="form-group row">
            <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
            <select class="form-select col-sm-8" id="categoria" name="categoria">
              <option selected value="novela">Novela</option>
              <option value="historica">Historica</option>
              <option value="scifi">Sci-Fi</option>
              <option value="romantica">Romantica</option>
              <option value="ensayo">Ensayo</option>
              <option value="misterio">Misterio</option>
              <option value="viajes">Viajes</option>
            </select>
          </div>
          <div class="form-group row">
            <label for="portada" class="col-sm-2 col-form-label">Portada</label>
            <div class="col-sm-8">
              <input type="file" name="portada" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="total" class="col-sm-2 col-form-label">Ejemplares Totales</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="total" name="total" placeholder="Ejemplares Totales">
            </div>
          </div>
          <div class="form-group row">
            <label for="disponible" class="col-sm-2 col-form-label">Ejemplares Disponibles</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="disponible" name="disponible" placeholder="Ejemplares Disponibles">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="añadirLibro" class="btn btn-primary">Guardar</button>
      </div>
      </form>
      <!--Cerrar form -->
    </div>
  </div>
</div>

<!--MODAL BUSCAR LIBRO-->
<div class="modal fade" id="buscarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Buscar Libro</h3>
      </div>
      <div class="modal-body">
        <form action='libros.php' method='get'>
          <div class="form-group row">
            <label for="titulo" class="col-sm-2 col-form-label">Buscador</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="buscador" name="buscador">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="buscarLibro" class="btn btn-primary">Buscar</button>
      </div>
      </form>
      <!--Cerrar form -->
    </div>
  </div>
</div>