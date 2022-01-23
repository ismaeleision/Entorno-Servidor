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
  //array con 40 palabras en ingles
  $word_list_en = array(
    "cat", "dog", "hello", "world", "coffe", "road", "house", "tree", "orange", "lemon",
    "apple", "car", "train", "chair", "table", "bed", "strawberry", "socks", "card", "rubber",
    "pen", "paper", "flower", "bus", "atenttion", "dice", "wallet", "mouse", "wheel", "wardrobe",
    "iron", "silver", "gold", "mechanic", "shirt", "game", "giraffe", "lion", "vulture", "tiger"
  );
  $word_list_es = array(
    "gato", "perro", "hola", "mundo", "cafe", "camino", "casa", "arbol", "naranja", "limon",
    "manzana", "coche", "tren", "silla", "mesa", "cama", "fresa", "calcetines", "carta", "goma",
    "boli", "papel", "flor", "autobus", "atencion", "dado", "cartera", "raton", "rueda", "armario",
    "hierro", "plata", "oro", "mecanico", "camiseta", "juego", "jirafa", "leon", "vuitre", "tigre"
  );

  $frase = "The cat in the train is eating a flower while standing over a silver wheel";

  echo "$frase";
  //transformar el string frase en un array
  $frase = explode(" ", $frase);

  //creo un array asociativo con los valores del array $word_list_en
  $neutral = array_values($word_list_en);

  //array temporal para añadir los valores traducidos
  $array_new = array();

  foreach ($frase as $palabra) {
    for ($i = 0; $i < count($neutral); $i++) {
      //Si la palabra neutral en la posicion i coincide con palabra
      //se le reasigna el valor con la posicion del array en español
      if ($neutral[$i] == $palabra) {
        $palabra = $word_list_es[$i];
      }
    }
    array_unshift($array_new, $palabra);
  }

  //Le da la vuelta al array reasignandolo en el array frase
  foreach ($array_new as $palabra) {
    //No superpone los valores asi que hay que quitar los antiguos
    array_pop($frase);
    array_unshift($frase, $palabra);
  }

  //Uno otra vez el array en una frase 
  $frase = implode(" ", $frase);
  echo "<br>$frase";

  ?>
</body>

</html>