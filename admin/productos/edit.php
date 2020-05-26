<?php
include '../common/sesion.php';
require '../../common/conexion.php';
$section="edit_producto";
#edicion de articulo
if(isset($_GET['e'])){$edicion=$_GET['e'];}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Página administrativa de Servielectra">
  <meta name="author" content="Eutuxia Web">
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <title>ServiElectra - Administración</title>
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <link href="../../vendors/admin/style.min.css" rel="stylesheet">
  <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
      <?php include '../common/navbar.php';?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-auto align-self-center">
              <h4 class="page-title">Editar Producto</h4>
            </div>
          </div>
        </div>
        <?php
        if(isset($_GET['id']) && !empty($_GET['id'])){
          $id_producto=$_GET['id'];
          $sql="SELECT * FROM PRODUCTOS WHERE IDPRODUCTO=$id_producto";
          $result=$conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $id_producto=$row['IDPRODUCTO'];
              $titulo=ucwords($row['TITULO']);
              $id_categoria=$row['IDCATEGORIA'];
              $descripcion=$row['DESCRIPCION'];
              $caracteristicas=$row['CARACTERISTICAS'];
              $aplicaciones=$row['APLICACIONES'];
              $ventajas=$row['VENTAJAS'];
              $imagen=$row['IMAGEN'];
              ?>
              <div class="container-fluid">
                <form action="editProducto.php" method="post" enctype="multipart/form-data">
                  <div class="row mt-1">
                    <div class="input-group mb-3 col-12">
                      <div class="input-group-append">
                        <span class="input-group-text"><b>Titulo del producto</b></span>
                      </div>
                      <input type="text" name="title" class="form-control text-dark" value="<?php echo $titulo;?>" required maxlength="60" id="titulo">
                      <div class="col-12 mb-2">
                        <small class="text-muted">Quedan <span id="numero">60</span> caracteres.</small>
                      </div>
                      <script>
                        $(document).ready(function(){
                          var total_letras=60;
                          $('#titulo').keyup(function(){
                            var longitud=$(this).val().length;
                            var resto=total_letras - longitud;
                            $('#numero').html(resto);
                            if(resto <= 0){$('#titulo').attr("maxlength",60);}
                          });
                        });
                      </script>
                    </div>
                    <div class="input-group mb-3 col-12 col-md-6">
                      <div class="input-group-append">
                        <span class="input-group-text"><b>Categoria</b></span>
                      </div>
                      <select class="categoria" name="idcategoria">
                        <?php
                        $sql="SELECT * FROM CATEGORIAS";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()) {
                            if($id_categoria==$row['IDCATEGORIA']){ ?>
                              <option value="<?=$row['IDCATEGORIA']?>" selected><?=$row['CATEGORIA']?></option>
                            <?php }else{ ?>
                              <option value="<?=$row['IDCATEGORIA']?>"><?=$row['CATEGORIA']?></option>
                              <?php
                            }
                          }
                        } ?>
                      </select>
                    </div>
                    <!--div class="input-group mb-3 col-12 col-md-3 ml-auto">
                      <div class="input-group-append">
                        <span class="input-group-text"><b>Precio</b></span>
                      </div>
                      <input type="number" name="precio" class="form-control text-dark" required maxlength="25" value="<?php echo $precio;?>">
                    </div-->
                    <span class="col-12 ml-3 mb-2"><b>Descripción</b></span>
                    <div class="input-group mb-3 col-12">
                      <textarea class="form-control" name="descripcion" rows="12" type="text" required placeholder="La descripcion del producto..."><?php echo $descripcion;?></textarea>
                    </div>
                    <span class="col-12 ml-3 mb-2"><b>Caracteristicas técnicas</b></span>
                    <div class="input-group mb-3 col-12">
                      <textarea class="form-control" name="caracteristicas" rows="8" type="text" required ><?php echo $caracteristicas;?></textarea>
                    </div>
                    <span class="col-12 ml-3 mb-2"><b>Aplicaciones</b></span>
                    <div class="input-group mb-3 col-12">
                      <textarea class="form-control" name="aplicaciones" rows="8" type="text" required><?php echo $aplicaciones;?></textarea>
                    </div>
                    <span class="col-12 ml-3 mb-2"><b>Ventajas</b></span>
                    <div class="input-group mb-3 col-12">
                      <textarea class="form-control" name="ventajas" rows="8" type="text" required><?php echo $ventajas;?></textarea>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-6">
                          <h5>Imagen Principal Actual</h5>
                          <div class="row justify-content-center">
                            <img class="p-0 m-0" width="50%" src="img/<?php echo $imagen;?>"/>
                          </div>
                        </div>
                        <div class="col-6">
                          <label class="btn btn-link" for="file-upload">Seleccionar Nueva Imagen Principal</label>
                          <input type="file" accept="image/*" hidden="hidden" name="imagen" onchange="ValidarImagen(this);" id="file-upload"/>
                          <div class="row justify-content-center" id="file-preview-zone"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12"><hr></div>

                    <div class="col-12">
                      <h4 class="card-title mb-0 d-inline">Otras Imagenes del producto</h4>
                      <span class="card-subtitle d-block mt-1">Máx. 6 Fotos. <small title="Recomendado" data-toggle="tooltip">1080x1080 px</small></span>
                    </div>
                    <div class="col-12">
                      <label class="btn btn-link" for="imagenesOtras">Seleccionar Imagenes</label>
                      <input type="file" name="imagenesOtras[]" id="imagenesOtras" multiple hidden="hidden"/>
                    </div>
                    <div class="col-12 mt-2">
                      <div class="row" id="images-otras">
                        <?php
                        $result=$conn->query("SELECT IMAGEN FROM IMAGENESPRODUCTO WHERE `PRODUCTOID`=$id_producto");
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $otra_imagen=$row['IMAGEN'];
                            ?>
                            <div class='col-2 mb-3'>
                              <img width='80%' src='img/<?php echo $otra_imagen;?>'/>
                            </div>
                            <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center mb-3">
                    <a href="index.php" class="btn btn-outline-danger px-4 mr-5">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary">Aceptar</button>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $id_producto;?>">
                  </form>
              </div>
              <!-- Preview Imagen -->
              <script>
              var fileUpload=document.getElementById('file-upload');
              fileUpload.onchange=function(e){
                var limite_kb=2000*1024;
                var imgPath=$(this)[0].value;
                var peso=$(this)[0].files[0].size;
                var extn=imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                if (extn=="png" || extn=="jpg" || extn=="jpeg") {
                  if(peso>limite_kb){
                    const toast=swal.mixin({toast:true,position:'bottom',showConfirmButton:false,timer:4000});
                    toast({type:'error',title:"¡Desbes subir una imagen menor de 2 Megas!"})
                  }else{readFile(e.srcElement);}
                }else{
                  const toast=swal.mixin({toast:true,position:'bottom',showConfirmButton:false,timer:4000});
                  toast({type:'error',title:"¡Desbes subir imagenes tipo jpg, jpge o png"})
                }
              }
                function readFile(input){
                  $("#file-preview-zone").empty();
                  if(input.files && input.files[0]){
                    var reader=new FileReader();
                    reader.onload=function(e){
                      var filePreview=document.createElement('img');
                      filePreview.id='file-preview';
                      filePreview.setAttribute("width","60%");
                      filePreview.src=e.target.result;
                      var previewZone=document.getElementById('file-preview-zone');
                      previewZone.appendChild(filePreview);
                    }
                    reader.readAsDataURL(input.files[0]);
                  }
                }
              </script>
              <!-- Imagenes Instagram -->
              <script>
                $("#imagenesOtras").on('change',function(){
                  var countFiles=$(this)[0].files.length;
                  var imgPath=$(this)[0].value;
                  var extn=imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                  $("#images-otras").empty();
                  var image_holder=$("#images-otras");
                  image_holder.empty();
                  if (extn=="png" || extn=="jpg" || extn=="jpeg"){
                    if(typeof (FileReader)!='undefined'){
                      if(countFiles>6){countFiles=6;}
                      for(var i=0;i<countFiles;i++){
                        var reader=new FileReader();
                        reader.onload=function(e){
                          $("<div class='col-2 mb-3'><img width='80%' src='"+e.target.result+"'/></div>").appendTo(image_holder);
                        }
                        reader.readAsDataURL($(this)[0].files[i]);
                      }
                    }else{alert("This browser does not support FileReader.");}
                  }else{
                    const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
                    toast({type:'error',title:"¡Desbes subir imagenes tipo jpg, jpge o png"})
                  }
                });
              </script>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendors/admin/custom.min.js"></script>
</body>
</html>
