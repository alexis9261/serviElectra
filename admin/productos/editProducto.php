<?php
require '../../common/conexion.php';
//el valor respuesta sera el que se manejara en el archivo edit.php, en la llamada ajax
$respuesta=0;
//debo agregar la imagen
if(isset($_POST['id'])){
  $id_producto=$_POST['id'];
  $titulo=$_POST['title'];
  $descripcion=$_POST['descripcion'];
  $id_categoria=$_POST['idcategoria'];
  $caracteristicas=$_POST['caracteristicas'];
  $aplicaciones=$_POST['aplicaciones'];
  $ventajas=$_POST['ventajas'];
  $band1=0;
  $band2=0;
  if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0){
    $band1=1;
    $imagen=$_FILES['imagen'];
    //elimino la imagen anterior
    $result=$conn->query("SELECT * FROM PRODUCTOS WHERE IDPRODUCTO='$id_producto';");
    if($result->num_rows>0){
      $row=$result->fetch_assoc();
      $ruta_imagen=$row['IMAGEN'];
      unlink("img/$ruta_imagen");
    }
    $limite_kb=2000;
    if($imagen["size"]<= $limite_kb*1024){
      $valid_extensions=array("jpeg","jpg","png");
      $ruta='img/';
      $extension=substr(strrchr($imagen["name"], "."), 1);
      $name_archivo=$imagen["name"];
      $archivo=$ruta.$name_archivo;
      if((($imagen["type"]=="image/png") || ($imagen["type"]=="image/jpg") || ($imagen["type"]=="image/jpeg")) && in_array($extension,$valid_extensions)){
        $resultado=move_uploaded_file($imagen["tmp_name"],$archivo);
        if($resultado){$respuesta=1;}else{$respuesta=3;}}else{$respuesta=4;}
      }else{$respuesta=5;}
      if($respuesta==1){
        $sql="UPDATE `PRODUCTOS` SET `TITULO`='$titulo',`DESCRIPCION`='$descripcion',`IDCATEGORIA`='$id_categoria',`CARACTERISTICAS`='$caracteristicas',`APLICACIONES`='$aplicaciones',`VENTAJAS`='$ventajas',`IMAGEN`='$name_archivo' WHERE IDPRODUCTO='$id_producto';";
        if($conn->query($sql)===TRUE){$respuesta=1;}
      }
    }
    //agrego las otras imagenes
    if(isset($_FILES['imagenesOtras']) && $_FILES['imagenesOtras']['error'][0]==0){
      $otraImagenes=$_FILES['imagenesOtras'];
      //elimino las imagenes anteriores
      $result=$conn->query("SELECT * FROM IMAGENESPRODUCTO WHERE PRODUCTOID='$id_producto';");
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $otra_imagen=$row['IMAGEN'];
          $row=$result->fetch_assoc();
          $ruta_imagen=$row['IMAGEN'];
          unlink("img/$ruta_imagen");
          $sql="DELETE FROM IMAGENESPRODUCTO WHERE PRODUCTOID=$id_producto;";
          if($conn->query($sql)===TRUE){$respuesta=1;}else{$respuesta=15;}
        }
      }
      $cont=0;
      foreach ($otraImagenes['name'] as $imagen){
        if($otraImagenes['error'][$cont]==0){
          $band2=1;
          $prefijo=rand(0,100000);
          $ruta="img/";
          $name_archivo=basename($imagen);
          $name_archivo=$prefijo.$name_archivo;
          $archivo=$ruta.$name_archivo;
          $resultado=move_uploaded_file($otraImagenes["tmp_name"][$cont],$archivo);
          //Inserto las nuevas imagens a BD
          $sql="INSERT INTO `IMAGENESPRODUCTO` (`IMAGEN`,`PRODUCTOID`) VALUES ('$name_archivo','$id_producto');";
          if($conn->query($sql)===TRUE){$respuesta=1;}else{$respuesta=11;}
          if($cont==5){break;}else {++$cont;}
        }
      }
      if ($band2==1) {
        $sql="UPDATE `PRODUCTOS` SET `TITULO`='$titulo',`DESCRIPCION`='$descripcion',`IDCATEGORIA`='$id_categoria',`CARACTERISTICAS`='$caracteristicas',`APLICACIONES`='$aplicaciones',`VENTAJAS`='$ventajas' WHERE IDPRODUCTO='$id_producto';";
        if($conn->query($sql)===TRUE){$respuesta=1;}
      }
    }
    //actualizo solo los texto, ya q no se actualizaron imagenes
    if ($band1==0 && $band2==0){
      $sql="UPDATE `PRODUCTOS` SET `TITULO`='$titulo',`DESCRIPCION`='$descripcion',`IDCATEGORIA`='$id_categoria',`CARACTERISTICAS`='$caracteristicas',`APLICACIONES`='$aplicaciones',`VENTAJAS`='$ventajas' WHERE IDPRODUCTO='$id_producto';";
      if($conn->query($sql)===TRUE){$respuesta=1;}
    }
  }
  if($respuesta==1){header('Location: ver_productos.php?e=1');}else{header('Location: ver_productos.php?e=2');}
  $conn->close();
