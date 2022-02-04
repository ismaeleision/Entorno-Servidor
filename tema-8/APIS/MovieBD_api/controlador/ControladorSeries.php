<?php
class ControladorSeries
{
  //Muestra las series que se haya en la api
  public static function mostrarInicio()
  {
    $vistaP = new VistaSeries();
    $vistaP->render();
  }

  public static function mostrarGenero($genero)
  {
    $series = SeriesBD::getSeries($genero);
    $vistaP = new VistaSerie();
    $vistaP->render($series);
  }

  public static function mostrarSerie($id)
  {
    $serie = SeriesBD::getSerie($id);
    $vistaP = new VistaAmpliada();
    $vistaP->render($serie);
  }
  public static function mostrarComentario($id)
  {
    $comentario = ComentarioBD::getComentario($id);
    $vistaP = new VistaComentario();
    $vistaP->render($comentario);
  }

  public static function escribirComentario()
  {
    $vista = new VistaEscribirComentario();
    $vista->render();
  }

  public static function subirComentario($id, $comentario)
  {
    $c = new Comentario($id, $comentario);
    ComentarioBD::escribir($c);
  }

  public static function verComentarios($id)
  {
    $c = ComentarioBD::getComentario($id);
    $vista = new VistaVerComentarios();
    $vista->render($c);
  }
}
