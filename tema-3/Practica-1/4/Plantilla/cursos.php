<?php
include "cabecera.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cursos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="inicio.html">Inicio</a></li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Cursos Adjudicados
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Cursos
                    <div style="float:right;">
                        <a href="insertarCurso.php">
                            <button type="button" class="btn btn-danger">Insertar Curso</button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>

                                <?php
                                //pinta las claves que contiene la sesion[alumnos]
                                $claves = array_keys($_SESSION['cursos'][0]);
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
                                //pinta las claves que contiene la sesion[cursos]
                                $claves = array_keys($_SESSION['cursos'][0]);
                                foreach ($claves as $clave) {
                                    echo "<th>" . strtoupper($clave) . "</th>";
                                }
                                ?>
                                <th>ACCIONES</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            //pinta los valores de sesion[cursos] en el formato de la tabla
                            foreach ($_SESSION['cursos'] as $curso) {
                                echo "<tr>";
                                $valor = $curso['nombre'];
                                foreach ($curso as $key => $value) {
                                    echo "<td>" . $value . "</td>";
                                }
                                echo "<td><a href='controlador.php?accion=editarCurso&id=$valor'><i class='far fa-edit'></i></a>
                                <a href='controlador.php?accion=eliminarCurso&id=$valor'><i class='fas fa-dumpster'></i></a></td>";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>