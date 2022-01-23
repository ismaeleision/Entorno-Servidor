<?php
require "vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

//Función para filtrar los campos del formulario
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

function leerUsuarios()
{
  $usuarios = array();
  $texto = file("usuarios.csv");
  foreach ($texto as $usuario) {
    $linea = explode(",", $usuario);
    array_push($usuarios, $linea);
  }
  return $usuarios;
}

function leerLibros()
{
  $libros = array();
  $texto = file("libros.csv");
  foreach ($texto as $linea) {
    $linea = explode(",", $linea);
    array_push($libros, $linea);
  }
  return $libros;
}

//Funcion para pintar en tablas los detalles de la factura
function PDFLibros($productos)
{
  try {
    //Estilo
    $content = '
    <style type="text/css">
  
    table,td,th {
        border: solid 1px #437ad3;
    table
    {
        padding: 0;
        font-size: 12pt;
        text-align: center;
        vertical-align: middle;
        border-collapse: collapse;
    }
    td
    {
        padding: 1mm;
        width: 150px;
    }
    td.right {
        text-align: right;
        padding-right: 30px;
    }
  
    </style>    
        ';
    //Tabla
    $content .= '
  <page backcolor="#FFFFFA" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
  
  <h1>Libreria IES JAROSO</h1>
  <table cellspacing="4">
  <thead>';

    $content .= '<tr>';
    foreach ($productos[0] as $key => $value) {
      $content .= "<td>" . strtoupper($key) . "</td>";
    }
    $content .= '</tr></thead><tbody>';

    foreach ($productos as $producto) {
      $content .= '<tr>';
      foreach ($producto as $key => $value) {
        if ($key != "portada") {
          $content .= "<td>" . $value . "</td>";
        } else {
          $content .= "<td>--</td>";
        }
      }
      $content .= '</tr>';
    }

    $content .= "
    </tbody>
    </table>
  </page>";

    $html2pdf = new Html2Pdf('P', 'A1', 'fr', true, 'UTF-8', 0);
    $html2pdf->writeHTML($content);
    $stringFile = $html2pdf->output('factura.pdf', 'S');
    file_put_contents("libros.pdf", $stringFile);

    file_put_contents("libros.pdf", $html2pdf->output('libros.pdf', 'S'));
  } catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
  }
}

//Funcion para pintar en tablas los detalles de la factura
function PDFUsuarios($productos)
{
  try {
    //Estilo
    $content = '
    <style type="text/css">
  
    table,td,th {
        border: solid 1px #437ad3;
    table
    {
        padding: 0;
        font-size: 12pt;
        text-align: center;
        vertical-align: middle;
        border-collapse: collapse;
    }
    td
    {
        padding: 1mm;
        width: 150px;
    }
    td.right {
        text-align: right;
        padding-right: 30px;
    }
  
    </style>    
        ';
    //Tabla
    $content .= '
  <page backcolor="#FFFFFA" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
  
  <h1>Libreria IES JAROSO</h1>
  <table cellspacing="4">
  ';

    $content .= '<tr>';
    foreach ($productos[0] as $key => $value) {
      $content .= "<td>" . strtoupper($key) . "</td>";
    }
    $content .= '</tr>';

    $total = 0;
    foreach ($productos as $producto) {
      $content .= '<tr>';
      foreach ($producto as $key => $value) {
        $content .= "<td>" . strtoupper($value) . "</td>";
      }
      $content .= '</tr>';
    }

    $content .= "
    </table>
  </page>";

    $html2pdf = new Html2Pdf('P', 'A2', 'fr', true, 'UTF-8', 0);
    $html2pdf->writeHTML($content);

    file_put_contents("usuarios.pdf", $html2pdf->output('usuarios.pdf', 'S'));
  } catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
  }
}
