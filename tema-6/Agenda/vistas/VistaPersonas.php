<?php

class VistaPersonas extends Vista
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render($personas)
  {

    $this->html .= '
    <!DOCTYPE html>
<html lang="en">

<head>
  <title>AGENDA con ficheros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imgs/contacto.png" sizes="256x256" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body style="height:1500px">
 
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Agenda</a>
        </div>
        <ul class="list-inline">
          <li class="active list-inline-item"><a class="btn btn-secondary" href="#">Home</a></li>
          <li class="list-inline-item"><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#insertar">Insertar</button></li>
          <li class="list-inline-item"><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#borrarTodo">Borrar Todo</button></li>
        </ul>
      </div>
    </nav>

  <div class="container">
    <table class="table table-hover table-stripped">
      <thead class="bg-black text-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Email</th>
          <th scope="col">Móvil</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>';
    foreach ($personas as $persona) {
      $this->html .= '
        <tr>
          <td>' . $persona->getId() . '</td>
          <td>' . $persona->getNombre() . '</td>
          <td>' . $persona->getApellidos() . '</td>
          <td>' . $persona->getEmail() . '</td>
          <td>' . $persona->getMovil() . '</td>
          <td><a href=enrutador.php?accion=quitarPersona&id=' . $persona->getId() . '>X</a></td>
        S</tr>';
    }

    $this->html .=
      '</tbody>
    </table>

  </div>

  <!------------ MODAL ----->
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Insertar Contacto</h3>
        </div>
        <div class="modal-body">
          <form action="enrutador.php" method="get">
            <div class="form-group row">
              <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre">
              </div>
            </div>

            <div class="form-group row">
              <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="apellidos" name="apellidos">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="movil" class="col-sm-2 col-form-label">Móvil</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="movil" name="movil">
              </div>
            </div>
        <input type="hidden" name="accion" value="nuevaPersona">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="insertar" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Borrar Todo-->
  <div class="modal fade" id="borrarTodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Borrar Contactos</h3>
        </div>
        <div class="modal-body">
          <form action="enrutador.php" method="get">

            <div class="form-group row">
              <label for="movil" class="col-sm-10 col-form-label">¿Está seguro de esta acción?</label>
            </div>
        <input type="hidden" name="accion" value="borrarTodo">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="borrarTodo" class="btn btn-primary">Sí</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>
    ';

    echo $this->html;
  }
}
