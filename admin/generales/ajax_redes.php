<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_POST['facebook'])){$facebook=$_POST['facebook'];}
if(isset($_POST['twitter'])){$twitter=$_POST['twitter'];}
if(isset($_POST['youtube'])){$youtube=$_POST['youtube'];}
if(isset($_POST['instagram'])){$instagram=$_POST['instagram'];}
$result=$conn->query("SELECT * FROM CONFIGURACION WHERE (ATRIBUTO='facebook') OR (ATRIBUTO='twitter') OR (ATRIBUTO='youtube') OR (ATRIBUTO='instagram');");
if($result->num_rows>0){
  $result=$conn->query("DELETE FROM CONFIGURACION WHERE (ATRIBUTO='facebook') OR (ATRIBUTO='twitter') OR (ATRIBUTO='youtube') OR (ATRIBUTO='instagram');");
  if($conn->query($sql) === TRUE){
    $sql="INSERT INTO CONFIGURACION (ATRIBUTO, VALOR) VALUES ('facebook','$facebook'),('twitter','$twitter'),('youtube','$youtube'),('instagram','$instagram');";
    if($conn->query($sql) === TRUE){$response=1;}
  }
}else{
  $sql="INSERT INTO CONFIGURACION (ATRIBUTO, VALOR) VALUES ('facebook','$facebook'),('twitter','$twitter'),('youtube','$youtube'),('instagram','$instagram');";
  if($conn->query($sql)===TRUE){$response=1;}
}
echo $response;
