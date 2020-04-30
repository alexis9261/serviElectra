<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_POST['nombre'])){$nombre=$_POST['nombre'];}
$sql="INSERT INTO CATEGORIAS (CATEGORIA) VALUES ('$nombre');";
if ($conn->query($sql) === TRUE) {$response=1;}
echo $response;
