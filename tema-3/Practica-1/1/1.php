<?php
include "intermedio.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <form action="1.php" method="post">
    <table class="table">
      <tr>
        <td><label for="servidor">Servidor</label></td>
        <td><progress id="servidor" max="100" value=<?= $_SESSION['servidor'] ?>> 0% </progress></td>
        <td> <input type="submit" name="servidor" value="Voto"></td>
      </tr>

      <tr>
        <td><label for="cliente">Cliente</label></td>
        <td><progress id="cliente" max="100" value=<?= $_SESSION['cliente'] ?>> 0% </progress></td>
        <td><input type="submit" name="cliente" value="Voto"></td>
      </tr>

      <tr>
        <td><label for="despliegue">Despliegue</label></td>
        <td><progress id="despliegue" max="100" value=<?= $_SESSION['despliegue'] ?>> 0% </progress></td>
        <td><input type="submit" name="despliegue" value="Voto"></td>
      </tr>

      <tr>
        <td><label for="interfaces">Interfaces</label></td>
        <td><progress id="interfaces" max="100" value=<?= $_SESSION['interfaces'] ?>> 0% </progress></td>
        <td><input type="submit" name="interfaces" value="Voto"></td>
      </tr>

      <tr>
        <td><label for="empresas">Empresas</label></td>
        <td><progress id="empresas" max="100" value=<?= $_SESSION['empresas'] ?>> 0% </progress></td>
        <td><input type="submit" name="empresas" value="Voto"></td>
      </tr>
    </table>
  </form>

</body>

</html>