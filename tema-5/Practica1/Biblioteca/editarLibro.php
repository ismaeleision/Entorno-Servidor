<?php
include "cabecera.php";
//Coge el ISBN del libro y le hace el select para coger los datos del mismo libro
if ($_GET) {
  if (isset($_GET['accion'])) {
    if ($_GET['accion'] == "mostrar") {
      if (isset($_GET['ISBN'])) {
        $id = filtrado($_GET['ISBN']);
        $libro = selectLibroISBN($id);
?>
        <div id="layoutSidenav_content">
          <main>
            <div class="container-fluid">
              <div class="container-md">
                <form action='controlador.php' method='post' enctype="multipart/form-data">
                  <!--Importante el enctype o no hace nada-->
                  <div class="form-group row">
                    <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $libro[0]["titulo"] ?>">
                  </div>
                  <div class="form-group row">
                    <label for="subtitulo" class="col-sm-2 col-form-label">Subtitulo</label>
                    <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?= $libro[0]['subtitulo'] ?>">
                  </div>
                  <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $libro[0]['descripcion'] ?>">
                    <div class="form-group row">
                      <label for="autor" class="col-sm-2 col-form-label">Autor</label>
                      <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor" value="<?= $libro[0]['autor'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="editorial" class="col-sm-2 col-form-label">Editorial</label>
                    <input type="text" class="form-control" name='editorial' id="editorial" value="<?= $libro[0]['editorial'] ?>">
                  </div>
                  <div class="form-group row">
                    <label for="categoria" class="col-sm-2 col-form-label">Categoria</label>
                    <select class="form-select" id="categoria" name="categoria">
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
                    <input type="file" name="portada" class="form-control" value="<?= $libro[0]['portada'] ?>">
                  </div>
                  <div class="form-group row">
                    <label for="total" class="col-sm-2 col-form-label">Ejemplares Totales</label>
                    <input type="number" class="form-control" id="total" name="total" value="<?= $libro[0]['ejemplares_totales'] ?>">
                  </div>
                  <div class="form-group row">
                    <label for="disponible" class="col col-form-label">Ejemplares Disponibles</label>
                    <input type="number" class="form-control" id="disponible" name="disponible" value="<?= $libro[0]['ejemplares_disponibles'] ?>">
                  </div>
              </div>

              <!--Para saber que libro estamos modificando-->
              <input type="hidden" name="isbn" value="<?= $libro[0]['ISBN'] ?>">

              <div class="form-group row">
                <button type="submit" name="editarLibro" class="btn btn-primary">Guardar Cambios</button>
              </div>
              </form>
            </div>
        </div>
        </main>
        </div>
<?php
      }
    }
  }
}
?>

<?php
include "pie.php";
?>