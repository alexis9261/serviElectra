<?php
session_start();
require '../../common/conexion.php';
$response=0;
if(isset($_POST['tipo'],$_POST['tituloBanner'])){
  $tipo=$_POST['tipo'];
  $titulo=$_POST['tituloBanner'];
  if($_POST['resumenBanner']){
    $resumen=$_POST['resumenBanner'];
  }else{$resumen="";}
  if($_POST['botonBanner']){
    $nomreBoton=$_POST['botonBanner'];
  }else{$nomreBoton="";}
  if($_POST['urlBoton']){
    $urlBoton=$_POST['urlBoton'];
  }else{$urlBoton="";}
  //verifico q se envio imagen en el formulario
  if(isset($_FILES['banner'])){
    $img=$_FILES['banner'];
    //elimino las imagenes anteriores
    $sql="SELECT IMAGENESBANNER FROM IMAGENES WHERE `TIPO`=$tipo";
    if($conn->query($sql)){
      $result=$conn->query($sql);
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $ruta_imagen=$row['IMAGENESBANNER'];
          //elimino la imagen del directorio
          unlink("../../img/banner/$ruta_imagen");
        }
      }
    }
    if(!empty($img)){
        $picture_ids='';
        $tmp_name=$img["tmp_name"];
        $name=basename($img["name"]);
        $info=new SplFileInfo($name);
        $extension=$info->getExtension();
        if($extension=='jpg' || $extension=='jpge' || $extension=='png'){
          $name_aux='imageBanner'.$tipo;
          $nombre_new=$name_aux.'.'.$extension;
          $mover=move_uploaded_file($tmp_name,"../../img/banner/$nombre_new");
          if($mover){
            $response=1;
            //Confirmo que haya habido en BBDD cargada la imagen del banner
            $sql="SELECT * FROM IMAGENESBANNER WHERE `TIPO`=$tipo";
            if($conn->query($sql)){
              $result = $conn->query($sql);
              if($result->num_rows>0){
                $sql="UPDATE IMAGENESBANNER SET `IMAGEN`='$nombre_new',`TITULO`='$titulo',`RESUMEN`='$resumen',`NOMBREBOTON`='$nomreBoton',`URLBOTON`='$urlBoton'
                 WHERE `TIPO`='$tipo'";
              }else{
                $sql="INSERT INTO IMAGENESBANNER (IMAGEN,TITULO,RESUMEN,NOMBREBOTON,URLBOTON,TIPO)
                VALUES ('$nombre_new','$titulo','$resumen','$nomreBoton','$urlBoton','$tipo')";
              }
            }else{
              $sql="INSERT INTO IMAGENESBANNER (IMAGEN,TITULO,RESUMEN,NOMBREBOTON,URLBOTON,TIPO)
              VALUES ('$nombre_new','$titulo','$resumen','$nomreBoton','$urlBoton','$tipo')";
            }
            if($conn->query($sql)===TRUE){$response=1;}else{$response=2;}
          }else{$response=3;}
        }else{  //Confirmo que haya habido en BBDD cargada la imagen del banner
          $sql="SELECT * FROM IMAGENESBANNER WHERE `TIPO`=$tipo";
          if($conn->query($sql)){
            $result=$conn->query($sql);
            if($result->num_rows>0){
              $sql="UPDATE IMAGENESBANNER SET `TITULO`='$titulo',`RESUMEN`='$resumen',`NOMBREBOTON`='$nomreBoton',`URLBOTON`='$urlBoton'
              WHERE `TIPO`='$tipo'";
            }else{
              $sql="INSERT INTO IMAGENESBANNER (TITULO,RESUMEN,NOMBREBOTON,URLBOTON,TIPO)
              VALUES ('$titulo','$resumen','$nomreBoton','$urlBoton','$tipo')";
            }
            if($conn->query($sql)===TRUE){$response=1;}else {$response=7;}
          }else{$response=8;}
        }
    }else{$response=6;}
  }else{
    //Confirmo que haya habido en BBDD cargada la imagen del banner
    $sql="SELECT * FROM IMAGENESBANNER WHERE `TIPO`=$tipo";
    if($conn->query($sql)){
      $result=$conn->query($sql);
      if($result->num_rows>0){
        $sql="UPDATE IMAGENESBANNER SET `TITULO`='$titulo',`RESUMEN`='$resumen',`NOMBREBOTON`='$nomreBoton',`URLBOTON`='$urlBoton'
        WHERE `TIPO`='$tipo'";
      }else{
        $sql="INSERT INTO IMAGENESBANNER (TITULO,RESUMEN,NOMBREBOTON,URLBOTON,TIPO)
        VALUES ('$titulo','$resumen','$nomreBoton','$urlBoton','$tipo')";
      }
      if($conn->query($sql)===TRUE){$response=1;}else {$response=7;}
    }else{$response=8;}
  }
}else{$response=9;}
header("Location: pagina.php?b=$response");
