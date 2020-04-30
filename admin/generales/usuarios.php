<?php
include('../common/sesion.php');
if($_SESSION['nivel']!=1){header('Location: ../principal.php');}
require '../../common/conexion.php';
#cambio de Password
if(isset($_POST['nuevaPassw'],$_POST['nuevaPasswConfirm'],$_POST['user']) & !empty($_POST['nuevaPassw'])){
  $nuevaPassw=$_POST['nuevaPassw'];
  $nuevaPasswConf=$_POST['nuevaPasswConfirm'];
  $user=$_POST['user'];
  if($nuevaPassw==$nuevaPasswConf){
    $nuevaPassw=md5($nuevaPassw);
    $sql ="UPDATE USUARIOS SET CLAVE='$nuevaPassw' WHERE CORREO='$user'";
    if($conn->query($sql)===TRUE){$passw=1;}
  }else{
    $passw=2;
  }
}
#paginacion y eliinacion de productos
if(isset($_GET['delete']) & !empty($_GET['delete'])){
  $idusuario=$_GET['delete'];
  #eliminar USURIO
  $sql ="DELETE FROM USUARIOS WHERE IDUSUARIO='$idusuario'";
  if($conn->query($sql)===TRUE){}
}
$perpage=10;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage=$_GET['page'];
}else{ $curpage = 1;}
$start = ($curpage * $perpage) - $perpage;
#necesito el total de elementos
$PageSql = "SELECT * FROM USUARIOS";
$pageres = mysqli_query($conn, $PageSql);
$totalres = mysqli_num_rows($pageres);
$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
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
  <title>EuroChem - Administración</title>
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
                <h4 class="page-title">Usuarios</h4>
              </div>
            </div>
          </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Crear o Eliminar usuarios para la Administración.</h4>
                      <h6 class="card-subtitle">Acá se registrarán todos los usarios que tendrán permisos para accerder al la parte administrativa.</h6>
                    </div>
                      <div class="row px-3">
                        <div class="input-group mb-3 col-sm-6">
                          <div class="input-group-append">
                            <span class="input-group-text"><b>Nombre</b></span>
                          </div>
                          <input type="text" id="nombre" class="form-control text-secondary" placeholder="Ingrese el nombre" required>
                        </div>
                        <div class="input-group mb-3 col-sm-6">
                          <div class="input-group-prepend">
                            <label class="input-group-text"><b>Perfil</b></label>
                          </div>
                          <select id="nivel" class="custom-select text-secondary">
                            <option value="1">Administrador</option>
                            <option value="2">Blogger</option>
                          </select>
                        </div>
                        <div class="input-group mb-3 col-sm-5">
                          <div class="input-group-append">
                            <span class="input-group-text"><b>Correo</b></span>
                          </div>
                          <input type="email" id="email" class="form-control text-secondary" required>
                        </div>
                        <div class="input-group mb-3 col-sm-5">
                          <div class="input-group-append">
                            <span class="input-group-text"><b>Password</b></span>
                          </div>
                          <input type="password" id="clave" class="form-control text-secondary" required>
                        </div>
                        <div class="col-2">
                          <button type="button" class="btn btn-outline-primary" id="submit_users">Agregar</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <?php
                $sql = "SELECT * FROM USUARIOS LIMIT $start,$perpage";
                $result = $conn->query($sql);
                if($result->num_rows>0){
              ?>
              <div class="row mt-1">
                <div class="col-12">
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Permisos</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while($row = $result->fetch_assoc()) { ?>
                            <tr>
                              <td class="p-0 p-2"><?=$row['CORREO']?></td>
                              <td class="p-0 p-2"><?=$row['NOMBRE']?></td>
                              <td class="p-0 p-2">
                                <?php
                                switch($row['NIVEL']){
                                  case 1:
                                  echo 'Administrador';
                                  break;
                                  case 2:
                                  echo 'Blogger';
                                  break;
                                } ?>
                              </td>
                              <td class="p-0 p-2"><a class="btn btn-outline-danger btn-sm" href="?delete=<?=$row['IDUSUARIO']?>" >Eliminar</a></td>
                              <td class="p-0 p-2"><button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Cambiar Password</button></td>
                            </tr>
                            <!-- Modal Password -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title"><?=$row['CORREO']?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="" method="post">
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Nueva Password</span>
                                          </div>
                                          <input type="password" class="form-control" placeholder="Inserte aqui.." name="nuevaPassw">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Confirme Password</span>
                                          </div>
                                          <input type="password" class="form-control" placeholder="Inserte aqui.." name="nuevaPasswConfirm">
                                        </div>
                                      </div>
                                      <input type="hidden" name="user" value="<?=$row['CORREO']?>">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-primary px-5">Cambiar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                        </tbody>
                      </table>
                      <center>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                      <?php if($curpage != $startpage){ ?>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">firts</span>
                          </a>
                        </li>
                      <?php } ?>
                      <?php if($curpage >=2){ ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                      <?php } ?>
                      <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                      <?php if($curpage != $endpage){ ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                      <?php } ?>
                      <?php if($curpage != $endpage){ ?>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Last</span>
                          </a>
                        </li>
                      <?php } ?>
                    </ul>
                  </nav>
                </center>
              </div>
            </div>
          </div>
        <?php }else{ ?>
          <div class="card-body">
            <h4 class="card-title text-center">Sin usuarios en Base de Datos</h4>
          </div>
        <?php } ?>
      </div>
    </div>
    </div>
    <!-- Cambio de clave -->
    <script>
    $(document).ready(function(){
      var pass=<?php if(isset($passw)){echo $passw;}else{echo "No";} ?>;
      if (pass==1) {
        const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
        toast({type:'success',title:"¡Se camibo la clave exitosamente!"})
      }else if (pass==2) {
        const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
        toast({type:'error',title:"¡No se pudo cambiar la clave, intentalo de nuevo!"})
      }
    });
    </script>
    <!-- usuarios -->
    <script>
      $(document).on('click',"#submit_users",function(){
        var nombre=$("#nombre").val();
        var nivel=$("#nivel").val();
        var email=$("#email").val();
        var clave=$("#clave").val();
        $.post('ajax_usuarios.php',{nombre:nombre,nivel:nivel,email:email,clave:clave},verificar,'text');
        function verificar(text){
          if (text=="1") {
            const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
            toast({type:'success',title:"¡Se agregó el usuario exitosamente!"})
          }else {
            const toast=swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:4000});
            toast({type:'error',title:"Hubo un error! \n Vuelve a intentarlo."})
          }
        }
      });
    </script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendors/admin/custom.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
