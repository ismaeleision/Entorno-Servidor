<?php

/**Clase BarajaInglesa, hereda de la anterior.
o Atributo estático “palos” array con corazones, diamantes, picas y tréboles.
o Atributo estático “figuras” array con As, 2, 3, 4, 5, 6, 7, 8, 9, jota, reina y rey.
o Constructor, llama al constructor del padre. Después llama a un método 
privado llamado generarMazo().
o Método repartirCarta(), devolverá una carta del mazo, de la parte superior, y 
la elimina de la baraja.
o Método generarMazo(). Va a generar las 52 cartas.(48)
 Se recorre los palos, para cada palo se recorre las figuras,
  genera una carta nueva con ese palo y figura, y la mete en el array del mazo. */

class BarajaInglesa extends Baraja
{
  private static $palos;
  private static $figuras;

  public function __construct()
  {
    parent::__construct(); //Llamar al constructor de Baraja
    $this::$palos = array("C", "D", "P", "T");
    $this::$figuras = array("A", 2, 3, 4, 5, 6, 7, 8, 9, 10,  "J", "Q", "K");
    $this->crearMazo(); //llama a la funcion para rellenar el mazo de contenido
  }

  public function crearMazo()
  {
    //Por cada palo del array
    foreach ($this::$palos as $palo) {
      //Por cada figura del array
      foreach ($this::$figuras as $numero) {
        //crea un objeto carta y lo mete en el mazo
        $carta = new Carta($palo, $numero);
        array_push($this->mazo, $carta);
      }
    }
  }

  public function repartirCarta()
  {
    //retira la primera del array mazo
    return array_shift($this->mazo);
  }
}
