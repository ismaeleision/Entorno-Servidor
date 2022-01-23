<?php
include "cabecera.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Alumnos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                <li class="breadcrumb-item active">Alumnos </li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Alumnos Registrados Durante Tu Estadía De Enseñante
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Alumnos
                </div>
                <div class="card-body">
                    <div style="float:right;">
                        <a href="insertarAlumno.php">
                            <button type="button" class="btn btn-danger">Insertar Alumno</button>
                        </a>
                    </div>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>

                                <?php
                                //pinta las claves que contiene la sesion[alumnos]
                                $claves = array_keys($_SESSION['alumnos'][0]);
                                foreach ($claves as $clave) {
                                    echo "<th>" . strtoupper($clave) . "</th>";
                                }
                                ?>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                                <?php
                                //pinta las claves que contiene la sesion[alumnos]
                                $claves = array_keys($_SESSION['alumnos'][0]);
                                foreach ($claves as $clave) {
                                    echo "<th>" . strtoupper($clave) . "</th>";
                                }
                                ?>
                                <th>ACCIONES</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            //pinta los valores de sesion[alumnos] en el formato de la tabla
                            foreach ($_SESSION['alumnos'] as $alumno) {
                                echo "<tr>";
                                $valor = $alumno['dni'];
                                foreach ($alumno as $key => $value) {
                                    echo "<td>" . $value . "</td>";
                                }
                                echo "<td><a href='controlador.php?accion=editarAlumno&id=$valor'><i class='far fa-edit'></i></a>
                                <a href='controlador.php?accion=eliminarAlumno&id=$valor'><i class='fas fa-dumpster'></i></a></td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    include "pie.php";
    ?>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>