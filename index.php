<?php
$home="active";

 ?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>ServiElectra</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="vendors/animate-css/animate.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
  <!-- Amarilllo #fff500
  Azul #002169
-->
<?php include 'common/navbar.php';?>
<!--================Home Banner Area =================-->
<section class="home_banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="banner_content text-center">
        <h3>Resistencias <span>Eléctricas</span></h3>
        <p><strong>Ponemos a su disposición nuestro servicio de diseño y fabricación a la medida de todo tipo de resistencias eléctricas calefactoras y sensores de temperatura.</strong> </p>
        <a class="black_btn" href="#">Ver los productos</a>
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Categorias Area =================-->
<section class="services_area py-4 mt-3">
  <div class="container">
    <div class="main_title mb-3">
      <h2>Categorias Principales</h2>
      <p>Fabricación de Resistencias Eléctricas y Sensores Termocuplas/RTD</p>
    </div>
    <div class="row services_inner">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="#"><img src="img/icon/service-icon-1.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="#"><h4>Resistencias</h4></a>
          <p>Fabricación de resistencias eléctricas a la medida para el sector industrial, comercial y residencial.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="#"><img src="img/icon/service-icon-2.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="#"><h4>Sensores</h4></a>
          <p>Fabricación de sensores de temperatura a la medida: Termopares y RTD PT100.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="#"><img src="img/icon/service-icon-3.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="#"><h4>Control</h4></a>
          <p>Venta y distribución de materiales eléctricos para el control y la automatización de procesos.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="#"><img src="img/icon/service-icon-4.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="#"><h4>Electricidad</h4></a>
          <p>Material especializado para altas temperaturas. Cables, terminales, borneras, aisladores y más.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Services Area =================-->
<!--================Products Area =================-->
<section class="product_area mb-5">
  <div class="container">
    <div class="main_title">
      <h2>Algunos de nuestros productos</h2>
    </div>
      <?php
        $sql="SELECT * FROM PRODUCTOS LIMIT 4";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
      ?>
    <div class="row products_cards">
        <?php
          while($row=$result->fetch_assoc()){
        ?>
        <div class="col-lg-3 col-sm-6">
          <div class="product_card_item">
            <div class="card_img">
              <img class="product_card_img w-100" src="img/productos/<?php echo $row['IMAGEN']?>" alt="">
              <div class="product_card_hover">
                <h3 class="product_card_title"><?php echo ucwords($row['TITULO']); ?></h3>
              </div>
            </div>
            <div class="product_card_name text-center py-4">
              <h3><?php echo ucwords($row['TITULO']); ?></h3>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
    </div>
  </div>
</section>

<!--================End Products Area =================-->


<!--================Metricas Area =================-->
<section class="counter_area">
  <div class="container">
    <div class="row m0 counter_inner">
      <div class="counter_item">
        <h4 class="counter">596</h4>
        <p>Projects Completed</p>
      </div>
      <div class="counter_item">
        <h4 class="counter">552</h4>
        <p>Really Happy Clients</p>
      </div>
      <div class="counter_item">
        <h4 class="counter">5962</h4>
        <p>Total Tasks Completed</p>
      </div>
      <div class="counter_item">
        <h4 class="counter">1009</h4>
        <p>Cups of Coffee Taken</p>
      </div>
      <div class="counter_item">
        <h4 class="counter">435</h4>
        <p>In House Professionals</p>
      </div>
    </div>
  </div>
</section>
<!--================End Counter Area =================-->

<!--================Feature Area =================-->
<section class="feature_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Más de nosotros</h2>
      <p>El compromiso principal de nuestro equipo de trabajo es satisfacer las necesidades de nuestros clientes, garantizando la efectividad y calidad de nuestros productos y servicios en general.</p>
    </div>
    <div class="row feature_inner">
      <div class="col-lg-4 col-md-6">
        <div class="feature_item">
          <h4><i class="lnr lnr-diamond"></i>Nuestra Visión</h4>
          <p>Ser la referencia nacional en calentamiento eléctrico y soluciones industriales.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="feature_item">
          <h4><i class="lnr lnr-rocket"></i>Nuestra Misión</h4>
          <p>Ser aliados comerciales de todo el aparato productor del país proveyendo soluciones térmicas y eléctricas para asegurar la producción nacional.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="feature_item">
          <h4><i class="lnr lnr-user"></i>Somos Fabricantes</h4>
          <p>Diseñamos y fabricamos resistencias eléctricas calefactoras y sensores para medición de temperatura</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="feature_item">
          <h4><i class="lnr lnr-license"></i>Somos Distribuidores</h4>
          <p>Distribuimos y suministramos Material Eléctrico de las mejores marcas del mercado.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="feature_item">
          <h4><i class="lnr lnr-phone"></i>Rápida Respuesta</h4>
          <p>Atendendemos las urgencias de nuestros clientes para que nunca dejen de producir..</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="feature_item">
          <h4><i class="lnr lnr-bubble"></i>Atención Personalizada</h4>
          <p>Seguiremos muy de cerca su caso para ofrecer el producto que más le convenga.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Feature Area =================-->

<!--================Blog Area =================-->
<section class="testimonials_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>Algunas Noticias</h2>
    </div>
    <div class="testi_slider owl-carousel">
      <?php
      $meses=['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
      $sql="SELECT IDARTICULO,IMAGE,DATE,TITLE,DESCRIPTION FROM `ARTICLESBLOG` LIMIT 5";
      $result=$conn->query($sql);
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
          $id_articulo=$row['IDARTICULO'];
          $titulo=$row['TITLE'];
          $desciption=$row['DESCRIPTION'];
          $date=$row['DATE'];
          $aux=substr($date,5,2);
          if($aux<10){$aux="0".$aux;}
          $fecha=substr($date,8,2)." ".$meses[intval($aux)]." del ".substr($date,0,4);
          $imagen=$row['IMAGE'];
          ?>
          <div class="item">
            <div class="testi_item">
              <div class="media">
                <div class="d-flex">
                  <img src="admin/blog/img/<?php echo $imagen;?>" alt="" style="border-radius:50%;width:100px!important;height:100px!important;">
                </div>
                <div class="media-body">
                  <p><?php echo substr($desciption,0,150)."...";?></p>
                  <h4><a href="blog.php?<?php echo $id_articulo;?>"><?php echo $titulo;?></a> </h4>
                  <h5><?php echo $fecha;?></h5>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      }
       ?>
    </div>
  </div>
</section>
<!--================End Testimonials Area =================-->

<!--================Clients Logo Area =================-->
<section class="clients_logo_area p_120">
  <div class="container">
    <div class="clients_slider owl-carousel">
      <div class="item">
        <img src="img/clients-logo/c-logo-1.png" alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-2.png" alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-3.png" alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-4.png" alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-5.png" alt="">
      </div>
    </div>
  </div>
</section>
<!--================End Clients Logo Area =================-->

<?php include 'common/footer.php'; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope-min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
<script src="js/suscripcion.js"></script>
</body>
</html>
