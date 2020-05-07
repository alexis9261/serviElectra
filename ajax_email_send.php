<?php
$to="info@servielectra.com.ve";
if ($_GET['subject']=="") {
  $subject = "Solicitud de contacto - Servielectra";
}else {
  $subject = $_GET['subject'];
}
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$text=$_GET['message'];
$name=$_GET['name'];
$email=$_GET['email'];
$message = "
<html>
<head>
<title>Solicitud de contacto - Servielectra</title>
</head>
<body>
<h1>Solicitud de Contacto de la pagina web - Servielectra.com.ve</h1>
<hr>
<h3>Nombre: <strong>$name</strong></h6>
<h3>Correo de contacto: <strong>$email</strong></h6>
<br>
<h3>Mensaje enviado por el cliente</h5>
<p>$text</p>
</body>
</html>";
mail($to,$subject,$message,$headers);
$respuesta=1;
echo "$respuesta";
 ?>
