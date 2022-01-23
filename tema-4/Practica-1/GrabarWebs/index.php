<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="container-sm">
      <a href='controlador.php?accion=facebook'>Cargar Facebook</a>
    </div>
    <div class="container-sm">
      <a href='controlador.php?accion=cnn'>Cargar CNN</a>
    </div>
    <div class="container-sm">
      <a href="myface.php">Ver Facebook</a>
    </div>
    <div class="container-sm">
      <a href="cnn.php">Ver CNN</a>
    </div>
    <div class="container-sm">
      <a href="controlador.php?accion=concurrencias">Veces que mencionan a Biden</a>
    </div>
    <?php
    if ($_GET) {
      if (isset($_GET['concurrencias'])) {
        echo "Han mencionado a Biden " . $_GET['concurrencias'] . " veces";
      }
    }
    ?>
  </div>
</body>

</html>