<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  //array asociativo con significado español-ingles
  $diccionario = array(
    "perro" => "dog",
    "gato" => "cat",
    "coche" => "car",
    "helicoptero" => "helicopter",
    "tanque" => "tank",
    "combustible" => "fuel",
    "petroleo" => "oil",
    "tarta" => "cake",
    "magdalena" => "cupcake",
    "España" => "Spain",
    "pescado" => "fish",
    "tenera" => "beef",
    "cordero" => "lamb",
    "vaca" => "cow",
    "burro" => "donkey",
    "pollo" => "chick",
    "arbol" => "tree",
    "manzana" => "apple",
    "correo" => "mail",
    "tren" => "train"
  );
  if (0 == 0) {
    //el formulario va dentro de una comprobacion if para que lo reconozca como codigo php
    //el formulario es una caja de texto con un boton para enviar el formulario
  ?>

    <form action="ejercicio12.php" method="post">
      <input type="text" id="palabra" name="palabra" />
      <input type="submit" value="Enviar" />
    </form>

  <?php
  }
  //Para introducir datos por teclado se crea una variable con la funcion $_POST[]
  $texto = $_POST['palabra'];
  foreach ($diccionario as $key => $value) {
    if ($key == $texto) {
      echo "La traduccion de $key es $value";
    }
  }
  ?>
</body>

</html>