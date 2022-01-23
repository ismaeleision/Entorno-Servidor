<?php
class VistaCabecera
{

  public function __construct()
  {
    $this->html = "";
  }

  public function render()
  {
    $this->html = '
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Inicio - IES JAROSO</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
    
<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="inicio.php">TIENDA DE REGALOS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>

    <!-- Navbar-->
    <ul class="list-unstyled ps-0">
          <li class="mb-1">
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#menuUsuario" aria-expanded="false">
          <img src="img/usuario.png" width="30px" height="30px">
        </button>
      </li>
      <div class="collapse bg-secondary" id="menuUsuario">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a class="dropdown-item" href="enrutador.php?accion=salir">Logout</a></li>
        </ul>
      </div>
    </ul>

  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">MENU</div>
              <a class="nav-link" href="enrutador.php?accion=inicio">
                <div class="sb-nav-link-icon"><i class="fas fa-house-user"></i></div>
                Inicio
              </a>
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#añadirRegalo">Añadir Regalo</button>
              <a class="nav-link" href="enrutador.php?generarPDF">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Generar PDF
              </a>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Usuario:</div>
              ' . unserialize($_SESSION["usuario"])[0]->getNombre() . '
          </div>
        </div>
      </nav>
    </div>
  </div>';
    echo $this->html;
  }
}
