<?php
include 'common/conexion.php';
$facebook="";
$twitter="";
$youtube="";
$instagram="";
$sql="SELECT ATRIBUTO,VALOR FROM `CONFIGURACION`";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    if($row['ATRIBUTO']=="facebook"){
      $facebook=$row['VALOR'];
    }else if($row['ATRIBUTO']=="twitter"){
      $twitter=$row['VALOR'];
    }else if($row['ATRIBUTO']=="linkedin"){
      $youtube=$row['VALOR'];
    }else if($row['ATRIBUTO']=="instagram"){
      $instagram=$row['VALOR'];
    }
  }
}
?>
<script>
function buscar(){document.search1.submit()}
</script>
<script type="text/javascript">
  function productos() {
    window.location.href ="productos.php"
  }

  function nosotros() {
    window.location.href ="nosotros.php"

  }
</script>
<header class="header_area">
  <div class="top_menu row m0">
    <div class="container">
      <div class="float-left">
        <form action="productos.php" method="get" id="search1">
          <input class="search_menu ml-auto mt-2" type="text" name="producto" placeholder="Buscar..." onkeypress="if (event.keyCode == 13) buscar()">
        </form>
      </div>
      <div class="float-right">
        <span class="datos_navbar_menu">
          <a class="dn_btn " href="https://wa.me/584244215217" target="_blank" style="color:#002169"> <img class="pb-1 mr-1" src="img/whatsapp_nav.svg" width="12px">+58 424 421 52 17</a>
          <a class="dn_btn mx-2" href="mailto:info@servielectra.com.ve" target="_blank" style="color:#002169"><img class="mr-1" src="img/correo.svg" width="15px">info@servielectra.com.ve</a>
        </span>
        <ul class="list header_social d-inline ml-1">
          <?php if($facebook!=""){ ?>
            <li><a target="_blank" href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
          <?php } if($twitter!=""){ ?>
            <li><a target="_blank" href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
          <?php } if($instagram!=""){ ?>
            <li><a target="_blank" href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a></li>
          <?php } if($youtube!=""){ ?>
            <li><a target="_blank" href="<?php echo $youtube;?>"><i class="fa fa-youtube"></i></a></li>
          <?php } ?>
        </ul>
        <a class="dn_btn ml-3" href="https://wa.me/584244215217" target="_blank" style="color:#002169">Ver Precios</a>
      </div>
    </div>
  </div>
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand logo-responsive-navbar" href="index.php"><img src="img/logo.png" alt="" width="50%"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav ml-auto">
            <?php if(isset($home)){ ?>
              <li class="nav-item active"><a class="nav-link" href="index.php"><strong>INICIO</strong> </a></li>
            <?php }else{ ?>
              <li class="nav-item"><a class="nav-link" href="index.php"><strong>INICIO</strong> </a></li>
            <?php } ?>
            <li class="nav-item submenu dropdown">
                <a href="productos.php" onclick="productos()" class="nav-link dropdown-toggle" data-toggle="dropdown"><strong>PRODUCTOS</strong> </a>
              <ul class="dropdown-menu">
                <?php
                $sql="SELECT * FROM `CATEGORIAS`";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){
                    $categoria=strtoupper($row['CATEGORIA']);
                    $idCat=$row['IDCATEGORIA'];
                    ?>
                    <li class="nav-item"><a class="nav-link" href="productos.php?cat=<?php echo $idCat;?>"><strong><?php echo $categoria;?></strong> </a></li>
                    <?php
                  }
                } ?>
              </ul>
            </li>
            <li class="nav-item submenu dropdown">
              <a href="nosotros.php" onclick="nosotros()" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Nosotros</strong> </a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="nosotros.php"><strong>La Empresa</strong> </a></li>
                <li class="nav-item"><a class="nav-link" href="condiciones.php"><strong>Condiciones Generales de Venta</strong> </a></li>
              </ul>
            </li>
            <?php if(isset($blog)){ ?>
              <li class="nav-item active"><a class="nav-link" href="blog.php"><strong>NOTICIAS</strong> </a></li>
            <?php }else{ ?>
              <li class="nav-item"><a class="nav-link" href="blog.php"><strong>NOTICIAS</strong> </a></li>
            <?php } ?>
            <?php if(isset($contacto)){ ?>
              <li class="nav-item active"><a class="nav-link" href="contacto.php"><strong>CONTACTO</strong> </a></li>
            <?php }else{ ?>
              <li class="nav-item"><a class="nav-link" href="contacto.php"><strong>CONTACTO</strong> </a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
