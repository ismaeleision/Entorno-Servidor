<?php
require "vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Función para filtrar los campos del formulario
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

//Destruye la sesion
function destruirSesion()
{
  session_destroy();
}

//Carga en memoria los datos de los productos de un fichero
function leerProductos()
{
  $productos = array();
  $texto = file("store.txt");
  foreach ($texto as $linea) {
    $linea = explode("|", $linea);
    array_push($productos, $linea);
  }
  return $productos;
}

//Añade una tarea al fichero, la id se calcula segun el id mas grande
function nuevoProducto($nombre, $descripcion, $precio, $imagen)
{
  $texto = leerProductos();
  $id = 0;
  foreach ($texto as $tarea) {
    if ($tarea[0] >= $id) {
      $id = intval($tarea[0]) + 1;
    }
  }
  $linea = $id . "|" . $nombre . "|" . $descripcion . "|" . $precio . "|" . $imagen .  "\n";
  file_put_contents("store.txt", $linea, FILE_APPEND | LOCK_EX);
}

//"Elimina"(no pinta) las tareas que no coinciden con la id pasada 
function eliminar($id)
{
  $texto = leerArchivos();
  file_put_contents("task.txt", "", LOCK_EX);
  foreach ($texto as $linea) {
    if ($linea[0] != $id) {
      $lineaTexto = $linea[0] . "|" . $linea[1] . "|" . $linea[2] . "|" . $linea[3];
      file_put_contents("task.txt", $lineaTexto, FILE_APPEND | LOCK_EX);
    }
  }
  header("Location: index.php");
  exit;
}

//Funcion para pintar en tablas los detalles de la factura
function facturaPDF($productos)
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
  
  <h1>Libreria Godofredo</h1>
  <h4>Factura xxxxxxxxx</h4>
  <table cellspacing="4">
  ';

    $content .= '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>';

    $total = 0;
    foreach ($productos as $producto) {
      $content .= "<tr><td>" . $producto['1'] . "</td>
                       <td>" . $producto['3'] . "€</td>
                       <td>" . $producto['cantidad'] . "</td>
                       <td>" . ($producto['3'] * $producto['cantidad']) . "€</td></tr>";
      $total += ($producto['3'] * $producto['cantidad']);
    }

    $content .= "<tr><td>TOTAL (con IVA)</td><td colspan='3' class='right'>" . $total * 1.21 . "€</td></tr>";

    $content .= "
  </table>
  </page>
  ";

    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);
    $html2pdf->writeHTML($content);

    file_put_contents("local.pdf", $html2pdf->output('factura.pdf', 'S'));
  } catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
  }
}

//envia el email al usuario que se le pasa
function enviarEmail()
{
  $mail = new PHPMailer(true);

  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ismaeleision@gmail.com';                     //SMTP username
    $mail->Password   = 'mqmsxtnclzgmpzxm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ismaeleision@gmail.com', 'Ismael');
    $mail->addAddress('ismaeleision@gmail.com', 'Isma');     //Add a recipient

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('local.pdf');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Correo de prueba con Gmail';
    $mail->Body    = 'Este el cuerpo del mensaje <b>ojo, viene con adjunto!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
