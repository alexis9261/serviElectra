<?php
include '../common/conexion.php';
include 'common/sesion.php';
$email=$_SESSION['USUARIO'];
$sql="SELECT NIVEL FROM USUARIOS WHERE CORREO='$email'";
$result_nivel=$conn->query($sql);
if($row=$result_nivel->fetch_assoc()){
  $_SESSION['nivel']=$row['NIVEL'];
}
$section="home";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Página administrativa de Servielectra">
  <meta name="author" content="Eutuxia Web">
  <title>ServiElectra - Administración</title>
  <link href="../vendors/admin/style.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>
  <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    <?php include 'common/navbar.php'; ?>
    <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-5 align-self-center">
            <h4 class="page-title">Principal </h4>
          </div>
          <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="principal.php">Inicio</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-11">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Página Administrativa de la Empresa ServiElectra</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../vendors/admin/custom.min.js"></script>
</body>
</html>
