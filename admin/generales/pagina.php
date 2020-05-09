<?php
include '../common/sesion.php';
require '../../common/conexion.php';
$facebook="";
$twitter="";
$linkedin="";
$instagram="";
$sql="SELECT * FROM `CONFIGURACION`";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    if($row['ATRIBUTO']=="facebook"){
      $facebook=$row['VALOR'];
    }else if($row['ATRIBUTO']=="twitter"){
      $twitter=$row['VALOR'];
    }else if($row['ATRIBUTO']=="instagram"){
      $instagram=$row['VALOR'];
    }else if($row['ATRIBUTO']=="linkedin"){
      $linkedin=$row['VALOR'];
    }else if($row['ATRIBUTO']=="video"){
      $url_video=$row['VALOR'];
    }
  }
}
if (isset($_GET['b'])) {
  $actualizacion=$_GET['b'];
}else {
  $actualizacion="a";
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Eutuxia Web, C.A.">
  <link rel="icon" type="image/png" sizes="16x16" href="/imagen/logo.png">
  <title>ServiElectra - Administración</title>
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <link href="../../vendors/admin/style.min.css" rel="stylesheet">
  <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    <?php include '../common/navbar.php';?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-5 align-self-center">
            <h4 class="page-title">Página Web</h4>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <!-- Imagenes Banner ppal 1 -->
                <div class="container mb-3">
                  <form action="imagenesBanner.php" enctype="multipart/form-data" id="form1erBanner" method="post">
                  <div class="row">
                    <div class="col-auto">
                      <h4 class="card-title mb-0 d-inline">1er Banner </h4>
                    </div>
                    <div class="col-auto ml-auto">
                      <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                    <div class="col-12 mt-2">
                      <div class="row">
                        <?php
                        $sql="SELECT * FROM `IMAGENESBANNER` WHERE TIPO=1";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $imagenBanner1=$row['IMAGEN'];
                            $titulo=$row['TITULO'];
                            $resumen=$row['RESUMEN'];
                            $boton=$row['NOMBREBOTON'];
                            $urlBoton=$row['URLBOTON'];
                          }
                        }
                         ?>
                        <div class="col-6">
                          <div>
                            <?php if (isset($imagenBanner1)){ ?>
                              <img id="imgTempBanner1" width="100%" src="/img/banner/<?php echo $imagenBanner1;?>">
                              <img id="img1erbanner" width="100%">
                            <?php }else { ?>
                              <img id="img1erbanner" width="100%">
                            <?php } ?>
                          </div>
                          <div class="d-inline">
                            <label class="btn btn-link" for="file-upload-1er-banner">Seleccionar Imagen</label>
                            <input id="file-upload-1er-banner" type="file" accept="image/*" hidden="hidden" name='banner'/>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 25 caracteres"><b>Titulo</b></span>
                              </div>
                              <?php if (isset($titulo)){ ?>
                                <input type="text" name="tituloBanner" class="form-control text-secondary" placeholder="Coloca una frase" maxlength="25" required value="<?php echo $titulo;?>">
                              <?php }else { ?>
                                <input type="text" name="tituloBanner" class="form-control text-secondary" placeholder="Coloca una frase" maxlength="25" required>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 180 caracteres"><b>Pequeño Resumen</b></span>
                              </div>
                              <?php if (isset($resumen)){ ?>
                                <textarea class="form-control text-secondary" name="resumenBanner" rows="2" maxlength="180"><?php echo $resumen;?></textarea>
                              <?php }else { ?>
                                <textarea class="form-control text-secondary" name="resumenBanner" rows="2" maxlength="180"></textarea>
                              <?php } ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 25 caracteres"><b>Nombre del Boton</b></span>
                              </div>
                              <?php if (isset($boton)){ ?>
                                <input type="text" name="botonBanner" class="form-control text-secondary" placeholder="Nombre del boton" maxlength="25" value="<?php echo $boton;?>">
                              <?php }else { ?>
                                <input type="text" name="botonBanner" class="form-control text-secondary" placeholder="Nombre del boton" maxlength="25">
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="A donde se enviara al dar click en el boton"><b>Redireccion del Boton</b></span>
                              </div>
                              <?php if (isset($urlBoton)){ ?>
                                <input type="text" name="urlBoton" class="form-control text-secondary" placeholder="Url del boton" maxlength="255" value="<?php echo $urlBoton;?>">
                              <?php }else { ?>
                                <input type="text" name="urlBoton" class="form-control text-secondary" placeholder="Url del boton" maxlength="255">
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="tipo" value="1">
                  </form>
                </div>
                <hr>
                <!-- Preview 1er Banner -->
                <script>
                  const $seleccionArchivos1 = document.querySelector("#file-upload-1er-banner"),
                  $imagenPrevisualizacion1 = document.querySelector("#img1erbanner");
                  $seleccionArchivos1.addEventListener("change", () => {
                    const imagen1 = document.getElementById("imgTempBanner1");
                    if(imagen1){
                      const padre1 = imagen1.parentNode;
                      padre1.removeChild(imagen1);
                    }
                    const archivos1 = $seleccionArchivos1.files;
                    if (!archivos1 || !archivos1.length) {
                      $imagenPrevisualizacion1.src = "";
                      return;
                    }
                    const primerArchivo1 = archivos1[0];
                    const objectURL = URL.createObjectURL(primerArchivo1);
                    $imagenPrevisualizacion1.src = objectURL;
                  });
                </script>
                <!-- Imagenes Banner ppal 2 -->
                <div class="container mb-3">
                  <form action="imagenesBanner.php" enctype="multipart/form-data" id="form1erBanner" method="post">
                  <div class="row">
                    <div class="col-auto">
                      <h4 class="card-title mb-0 d-inline">2do Banner </h4>
                    </div>
                    <div class="col-auto ml-auto">
                      <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                    <div class="col-12 mt-2">
                      <div class="row">
                        <?php
                        $sql="SELECT * FROM `IMAGENESBANNER` WHERE TIPO=2";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $imagenBanner2=$row['IMAGEN'];
                            $titulo2=$row['TITULO'];
                            $resumen2=$row['RESUMEN'];
                            $boton2=$row['NOMBREBOTON'];
                            $urlBoton2=$row['URLBOTON'];
                          }
                        }
                         ?>
                        <div class="col-6">
                          <div>
                            <?php if (isset($imagenBanner2)){ ?>
                              <img id="imgTempBanner2" width="100%" src="/img/banner/<?php echo $imagenBanner2;?>">
                              <img id="img2dobanner" width="100%">
                            <?php }else { ?>
                              <img id="img2dobanner" width="100%">
                            <?php } ?>
                          </div>
                          <div class="d-inline">
                            <label class="btn btn-link" for="file-upload-2do-banner">Seleccionar Imagen</label>
                            <input id="file-upload-2do-banner" type="file" accept="image/*" hidden="hidden" name='banner'/>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 25 caracteres"><b>Titulo</b></span>
                              </div>
                              <?php if (isset($titulo2)){ ?>
                                <input type="text" name="tituloBanner" class="form-control text-secondary" placeholder="Coloca una frase" maxlength="25" required value="<?php echo $titulo2;?>">
                              <?php }else { ?>
                                <input type="text" name="tituloBanner" class="form-control text-secondary" placeholder="Coloca una frase" maxlength="25" required>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 180 caracteres"><b>Pequeño Resumen</b></span>
                              </div>
                              <?php if (isset($resumen2)){ ?>
                                <textarea class="form-control text-secondary" name="resumenBanner" rows="2" maxlength="180"><?php echo $resumen2;?></textarea>
                              <?php }else { ?>
                                <textarea class="form-control text-secondary" name="resumenBanner" rows="2" maxlength="180"></textarea>
                              <?php } ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 25 caracteres"><b>Nombre del Boton</b></span>
                              </div>
                              <?php if (isset($boton2)){ ?>
                                <input type="text" name="botonBanner" class="form-control text-secondary" placeholder="Nombre del boton" maxlength="25" value="<?php echo $boton2;?>">
                              <?php }else { ?>
                                <input type="text" name="botonBanner" class="form-control text-secondary" placeholder="Nombre del boton" maxlength="25">
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="A donde se enviara al dar click en el boton"><b>Redireccion del Boton</b></span>
                              </div>
                              <?php if (isset($urlBoton2)){ ?>
                                <input type="text" name="urlBoton" class="form-control text-secondary" placeholder="Url del boton" maxlength="255" value="<?php echo $urlBoton2;?>">
                              <?php }else { ?>
                                <input type="text" name="urlBoton" class="form-control text-secondary" placeholder="Url del boton" maxlength="255">
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="tipo" value="2">
                  </form>
                </div>
                <hr>
                <!-- Preview 2do Banner -->
                <script>
                  const $seleccionArchivos2 = document.querySelector("#file-upload-2do-banner"),
                  $imagenPrevisualizacion2 = document.querySelector("#img2dobanner");
                  $seleccionArchivos2.addEventListener("change", () => {
                    const imagen2 = document.getElementById("imgTempBanner2");
                    if(imagen2){
                      const padre2 = imagen2.parentNode;
                      padre2.removeChild(imagen2);
                    }
                    const archivos2 = $seleccionArchivos2.files;
                    if (!archivos2 || !archivos2.length) {
                      $imagenPrevisualizacion2.src = "";
                      return;
                    }
                    const primerArchivo2 = archivos2[0];
                    const objectURL = URL.createObjectURL(primerArchivo2);
                    $imagenPrevisualizacion2.src = objectURL;
                  });
                </script>
                <!-- Imagenes Banner ppal 3 -->
                <div class="container mb-3">
                  <form action="imagenesBanner.php" enctype="multipart/form-data" id="form1erBanner" method="post">
                  <div class="row">
                    <div class="col-auto">
                      <h4 class="card-title mb-0 d-inline">3er Banner </h4>
                    </div>
                    <div class="col-auto ml-auto">
                      <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                    <div class="col-12 mt-2">
                      <div class="row">
                        <?php
                        $sql="SELECT * FROM `IMAGENESBANNER` WHERE TIPO=3";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                          while($row=$result->fetch_assoc()){
                            $imagenBanner3=$row['IMAGEN'];
                            $titulo3=$row['TITULO'];
                            $resumen3=$row['RESUMEN'];
                            $boton3=$row['NOMBREBOTON'];
                            $urlBoton3=$row['URLBOTON'];
                          }
                        }
                         ?>
                        <div class="col-6">
                          <div>
                            <?php if (isset($imagenBanner3)){ ?>
                              <img id="imgTempBanner3" width="100%" src="/img/banner/<?php echo $imagenBanner3;?>">
                              <img id="img3erbanner" width="100%">
                            <?php }else { ?>
                              <img id="img3erbanner" width="100%">
                            <?php } ?>
                          </div>
                          <div class="d-inline">
                            <label class="btn btn-link" for="file-upload-3er-banner">Seleccionar Imagen</label>
                            <input id="file-upload-3er-banner" type="file" accept="image/*" hidden="hidden" name='banner'/>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 25 caracteres"><b>Titulo</b></span>
                              </div>
                              <?php if (isset($titulo3)){ ?>
                                <input type="text" name="tituloBanner" class="form-control text-secondary" placeholder="Coloca una frase" maxlength="25" required value="<?php echo $titulo3;?>">
                              <?php }else { ?>
                                <input type="text" name="tituloBanner" class="form-control text-secondary" placeholder="Coloca una frase" maxlength="25" required>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 180 caracteres"><b>Pequeño Resumen</b></span>
                              </div>
                              <?php if (isset($resumen3)){ ?>
                                <textarea class="form-control text-secondary" name="resumenBanner" rows="2" maxlength="180"><?php echo $resumen3;?></textarea>
                              <?php }else { ?>
                                <textarea class="form-control text-secondary" name="resumenBanner" rows="2" maxlength="180"></textarea>
                              <?php } ?>
                            </div>
                          </div>
                          <hr>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="Maximo 25 caracteres"><b>Nombre del Boton</b></span>
                              </div>
                              <?php if (isset($boton3)){ ?>
                                <input type="text" name="botonBanner" class="form-control text-secondary" placeholder="Nombre del boton" maxlength="25" value="<?php echo $boton3;?>">
                              <?php }else { ?>
                                <input type="text" name="botonBanner" class="form-control text-secondary" placeholder="Nombre del boton" maxlength="25">
                              <?php } ?>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="input-group">
                              <div class="input-group-append">
                                <span class="input-group-text" data-toggle="tooltip" title="A donde se enviara al dar click en el boton"><b>Redireccion del Boton</b></span>
                              </div>
                              <?php if (isset($urlBoton3)){ ?>
                                <input type="text" name="urlBoton" class="form-control text-secondary" placeholder="Url del boton" maxlength="255" value="<?php echo $urlBoton3;?>">
                              <?php }else { ?>
                                <input type="text" name="urlBoton" class="form-control text-secondary" placeholder="Url del boton" maxlength="255">
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="tipo" value="3">
                  </form>
                </div>
                <hr>
                <!-- Preview 3er Banner -->
                <script>
                  const $seleccionArchivos3 = document.querySelector("#file-upload-3er-banner"),
                  $imagenPrevisualizacion3 = document.querySelector("#img3erbanner");
                  $seleccionArchivos3.addEventListener("change", () => {
                    const imagen3 = document.getElementById("imgTempBanner3");
                    if(imagen3){
                      const imagen3 = imagen3.parentNode;
                      padre3.removeChild(imagen3);
                    }
                    const archivos3 = $seleccionArchivos3.files;
                    if (!archivos3 || !archivos3.length) {
                      $imagenPrevisualizacion3.src = "";
                      return;
                    }
                    const primerArchivo3 = archivos3[0];
                    const objectURL = URL.createObjectURL(primerArchivo3);
                    $imagenPrevisualizacion3.src = objectURL;
                  });
                </script>
                <!-- redes sociales -->
                <div class="container mb-3">
                  <div class="row mb-2">
                    <h4 class="card-title mb-0 ml-3">Redes sociales </h4>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Facebook</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Facebook" id="facebook" value="<?php echo $facebook?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip" title=""><b>Linkedin</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Linkedin" id="linkedin" value="<?php if (isset($linkedin)) echo $linkedin; else echo '';?>">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip"><b>Twitter</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de twitter" id="twitter" value="<?php if (isset($twitter)) echo $twitter; else echo '';?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <div class="input-group-append">
                          <span class="input-group-text" data-toggle="tooltip"><b>Instagram</b></span>
                        </div>
                        <input type="text" class="form-control text-secondary" placeholder="Link de Instagram" id="instagram" value="<?php if (isset($instagram)) echo $instagram; else echo '';?>">
                      </div>
                    </div>
                  </div>
                  <button type="button mr-auto" class="btn btn-outline-primary" id="submit_redes">Guardar Redes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  <input type="hidden" data-toggle="modal" data-target="#loader_modal" id="loader_now">
  <div class="modal fade" id="loader_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" id="loader_real">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-transparent no_border mt-5 pt-5">
        <button type="button" class="close bg-transparent" data-dismiss="modal" aria-label="Close" id="close_loader"></button>
        <div class="container mt-5">
          <div class="row justify-content-center"><div class="col-auto background_loader"><div class="loader algin-self-middle"></div></div></div>
          <b class="row justify-content-center text-white">¡¡Puede tardar unos segundos!!</b>
        </div>
      </div>
    </div>
  </div>
  <!-- Redes Sociales -->
  <script>
    $(document).on('click',"#submit_redes",function(){
      var facebook=$("#facebook").val();
      var twitter=$("#twitter").val();
      var linkedin=$("#linkedin").val();
      var instagram=$("#instagram").val();
      $.post('ajax_redes.php',{facebook:facebook,twitter:twitter,linkedin:linkedin,instagram:instagram},verificar,'text');
      function verificar(text){
        if(text=="1"){
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'success',title:"¡Se actualizarón exitosamentelas redes sociales!"})
        }else{
          const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
          toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
        }
      }
    });
  </script>
</div>
</div>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../vendors/admin/custom.min.js"></script>
</body>
</html>
