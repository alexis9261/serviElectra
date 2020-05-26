<?php
require '../../common/conexion.php';
$respuesta=0;
$iscreated=false;
if(isset($_FILES['imagen'])){
  if($_FILES["imagen"]["error"]>0){
    $respuesta=2;
  }else{
    $limite_kb=500;
    if($_FILES["imagen"]["size"]<=$limite_kb*1024){
      $prefijo=rand(0,100000);
      $ruta="img/";
      $name_archivo=basename($_FILES["imagen"]["name"]);
      $name_archivo=$prefijo.$name_archivo;
      $archivo=$ruta.$name_archivo;
      $resultado=move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
      if($resultado){
        $iscreated=true;
      }else{
        $respuesta=3;
      }
    }else{
      $respuesta=5;
    }
  }
}
if($iscreated && isset($_POST['title'])){
  $titulo=$_POST['title'];
  $descripcion=$_POST['descripcion'];
  $idcategoria=$_POST['categoria'];
  $caracteristicas=$_POST['caracteristicas'];
  $aplicaciones=$_POST['aplicaciones'];
  $ventajas=$_POST['ventajas'];
  $sql="INSERT INTO `PRODUCTOS` (`TITULO`,`DESCRIPCION`,`IDCATEGORIA`,`CARACTERISTICAS`,`APLICACIONES`,`VENTAJAS`,`IMAGEN`) VALUES ('$titulo','$descripcion','$idcategoria','$caracteristicas','$aplicaciones','$ventajas','$name_archivo');";
  if($conn->query($sql)===TRUE){
    $respuesta=1;
    $idproducto=mysqli_insert_id($conn);
  }else{
    $respuesta=6;
  }
}
//agrego las otras imagenes
if(isset($_FILES['imagenesOtras'])){
$otraImagenes=$_FILES['imagenesOtras'];
$cont=0;
foreach ($otraImagenes['name'] as $imagen){
$prefijo=rand(0,100000);
$ruta="img/";
$name_archivo=basename($imagen);
$name_archivo=$prefijo.$name_archivo;
$archivo=$ruta.$name_archivo;
$resultado=move_uploaded_file($otraImagenes["tmp_name"][$cont],$archivo);
//agrego a BD
$sql="INSERT INTO `IMAGENESPRODUCTO` (`IMAGEN`,`PRODUCTOID`) VALUES ('$name_archivo','$idproducto');";
if($conn->query($sql)===TRUE){$respuesta=1;}else{$respuesta=11;}
if($cont==5){break;}else {++$cont;}
}
}
$conn->close();
header("Location: index.php?r=$respuesta");
