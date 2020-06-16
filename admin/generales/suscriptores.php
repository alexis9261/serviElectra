<?php
include('../common/sesion.php');
if($_SESSION['nivel']!=1){header('Location: ../principal.php');}
require '../../common/conexion.php';
#paginacion y eliinacion de categorias
$perpage=10;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage=$_GET['page'];
}else{ $curpage = 1;}
$start = ($curpage * $perpage) - $perpage;
#necesito el total de elementos
$PageSql = "SELECT * FROM SUSCRIPTORES";
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
  <link rel="icon" href="../../img/favicon.png" type="image/png">
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
                <h4 class="page-title">Suscriptores</h4>
              </div>
            </div>
          </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Se mostraran los correos de los suscribptores de tu sitio.</h4>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                $sql = "SELECT * FROM SUSCRIPTORES LIMIT $start,$perpage";
                $result = $conn->query($sql);
                if($result->num_rows>0){
              ?>
              <div class="row mt-1">
                <div class="col-12">
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Correo Electrónico</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $k=1; while($row=$result->fetch_assoc()) { ?>
                            <tr>
                              <td class="p-0 p-2"><strong><?php echo $k;?></strong> </td>
                              <td class="p-0 p-2"><?=$row['CORREO']?></td>
                            </tr>
                          <?php ++$k;} ?>
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
            <h4 class="card-title text-center">Sin suscriptores en Base de Datos</h4>
          </div>
        <?php } ?>
      </div>
    </div>
    </div>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendors/admin/custom.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
