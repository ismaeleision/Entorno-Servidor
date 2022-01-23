<!-- DataTales Example -->
<?php
//añade el fragmento cabecera.php
include "./cabecera.php";

$alumnos = array(
  array("apellidos" => "Garcia Gomez", "nombre" => "Fulgencio", "edad" => "16", "dni" => "12345678Ñ", "email" => "", "localidad" => "Huercal-Overa", "telefono" => "600000001", "curso" => "2º DAW", "avatar" => ""),
  array("apellidos" => "Gomez Garcia", "nombre" => "Fulgencio", "edad" => "17", "dni" => "23456789P", "email" => "", "localidad" => "Lorca", "telefono" => "600000002", "curso" => "3º MECANICA", "avatar" => ""),
  array("apellidos" => "Gea Gomez", "nombre" => "Fulgencio", "edad" => "18", "dni" => "34567891O", "email" => "", "localidad" => "Vera", "telefono" => "600000003", "curso" => "2º TURISMO", "avatar" => ""),
  array("apellidos" => "Garcia Herrero", "nombre" => "Fulgencio", "edad" => "20", "dni" => "45678901M", "email" => "", "localidad" => "Cuevas del Almanzora", "telefono" => "600000004", "curso" => "1º TURISMO", "avatar" => ""),
  array("apellidos" => "Gomez Centurion", "nombre" => "Fulgencio", "edad" => "114", "dni" => "56789012J", "email" => "", "localidad" => "Urcal", "telefono" => "600000005", "curso" => "1º DAW", "avatar" => ""),
  array("apellidos" => "Garcia Fernandez", "nombre" => "Fulgencio", "edad" => "35", "dni" => "67890123K", "email" => "", "localidad" => "Granada", "telefono" => "600000006", "curso" => "2º DAW", "avatar" => ""),
  array("apellidos" => "Chueca Gomez", "nombre" => "Fulgencio", "edad" => "40", "dni" => "78901234B", "email" => "", "localidad" => "Almeria", "telefono" => "600000007", "curso" => "3º MECANICA", "avatar" => "")
);
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Alumnos Registrados</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>
          <tr>
            <th>Apellidos</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Localidad</th>
            <th>Teléfono</th>
            <th>Curso</th>
            <th>Avatar</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>Apellidos</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Localidad</th>
            <th>Teléfono</th>
            <th>Curso</th>
            <th>Avatar</th>
          </tr>
        </tfoot>

        <tbody>

          <?php
          foreach ($alumnos as $alumno) {
            echo "<tr>";
            foreach ($alumno as $key => $value) {
              echo "<td>";
              echo $value;
              echo "</td>";
            }
            echo "</tr>";
          }
          ?>

      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<?php
include "./pie.php";
?>