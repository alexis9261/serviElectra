<?php
include 'common/conexion.php';
$response=0;
if(isset($_GET['email'])){
  $email=$_GET['email'];
  $sql="INSERT INTO SUSCRIPTORES (CORREO) VALUES ('$email');";
  if ($conn->query($sql) === TRUE) {$response=1;}
}
echo $response;
