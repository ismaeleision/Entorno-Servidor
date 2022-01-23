<?php
include "./cabecera.php";
$cursos = array(
  array("nombre" => "1º DAW", "etapa" => "Ciclo Superior", "curso" => "2020"),
  array("nombre" => "2º DAW", "etapa" => "Ciclo Superior", "curso" => "2021"),
  array("nombre" => "1º TURISMO", "etapa" => "Ciclo Superior", "curso" => "2022"),
  array("nombre" => "3º MECANICA", "etapa" => "Ciclo Medio", "curso" => "2018"),
  array("nombre" => "2º TURISMO", "etapa" => "Ciclo Superior", "curso" => "2019")
);
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Cursos Asignados</h4>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Etapa</th>
            <th>Curso</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nombre</th>
            <th>Etapa</th>
            <th>Curso</th>
          </tr>
        </tfoot>
        <tbody>
          <!--bucle para mostrar el contenido en tablas de arrays asociativos-->
          <?php
          foreach ($cursos as $curso) {
            echo "<tr>";
            foreach ($curso as $key => $value) {
              echo "<td>";
              echo $value;
              echo "</td>";
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <?php
      include "./pie.php";
      ?>