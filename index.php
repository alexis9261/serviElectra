<?php
$home="active";
date_default_timezone_set('America/Caracas');
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Servielectra</title>
  <!-- Bootstrap CSS -->
  <style media="screen">
  @font-face{
    font-family: "Gotham";
    src: url("fonts/gotham-regular.otf");
  }
  @font-face{
    font-family: "Gotham Ligth";
    src: url("fonts/gotham-thin.ttf");
  }
  @font-face{
    font-family: "Gotham Bold";
    src: url("fonts/bold/WEB/HomepageBaukasten-Bold.ttf");
  }
  </style>
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
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
</head>
<body>
  <!-- Amarilllo #fff500 \ rgba(250, 183, 0, 0.85)
  Azul #002169 \ rgba(0, 33, 105, 1)
-->
<?php include 'common/navbar.php';?>
<!--================Home Banner Area =================-->
<section class="home_banner_area">
  <div class="owl-carousel" id="carouselBanner" style="display: block!important;">
    <?php
    $sql="SELECT * FROM `IMAGENESBANNER`";
    $result=$conn->query($sql);
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        $imagenBanner=$row['IMAGEN'];
        $titulo=$row['TITULO'];
        $titulo=explode(" ",$titulo);
        $ultimaPalabra=array_pop($titulo);
        $titulo=implode(" ",$titulo);
        $resumen=nl2br($row['RESUMEN']);
        $boton=$row['NOMBREBOTON'];
        $urlBoton=$row['URLBOTON'];
        ?>
        <div class="item">
          <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background: url(../img/banner/<?php echo $imagenBanner;?>) no-repeat scroll center center;"></div>
            <div class="container">
              <div class="banner_content text-center">
                <h3><?php echo $titulo ?> <span><?php echo $ultimaPalabra;?></span></h3>
                <p><strong><?php echo $resumen ?></strong> </p>
                <a class="black_btn" href="<?php echo $urlBoton;?>"><?php echo $boton;?></a>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>
  </div>
</section>
<script>
  $('#carouselBanner').owlCarousel({
    loop:true,
    nav:true,
    autoplay: false,
    dots: false,
    navText: ['<img src="img/arrow_left.svg"/>', '<img src="img/arrow_right.svg"/>'],
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      }
    }
  });
</script>
<!--================End Home Banner Area =================-->

<!--================Categorias Area =================-->
<section class="services_area pb-4 pt-5 mt-5">
  <div class="container mt-4">
    <div class="main_title mb-3">
      <h2>NUESTROS SERVICIOS</h2>
    </div>
    <div class="row services_inner">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="productos.php?cat=1"><img src="img/icon/service-icon-1.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="productos.php?cat=1"><h4>RESISTENCIAS</h4></a>
          <p>Fabricación de resistencias eléctricas a la medida para el sector industrial, comercial y residencial.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="productos.php?cat=2"><img src="img/icon/service-icon-2.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="productos.php?cat=2"><h4>SENSORES</h4></a>
          <p>Fabricación de sensores de temperatura a la medida: Termopares y RTD PT100.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="productos.php?cat=4"><img src="img/icon/service-icon-3.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="productos.php?cat=4"><h4>CONTROL</h4></a>
          <p>Venta y distribución de materiales eléctricos para el control y la automatización de procesos.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="services_item">
          <a href="productos.php?cat=3"><img src="img/icon/service-icon-4.png" width="75%" style="border-radius:50%;border:solid 2px #eee;" alt=""></a>
          <a href="productos.php?cat=3"><h4>ELECTRICIDAD</h4></a>
          <p>Material especializado para altas temperaturas. Cables, terminales, borneras, aisladores y más.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Services Area =================-->
<!--================Products Area =================-->
<section class="clients_logo_area p_120">
  <div class="container">
    <div class="main_title">
      <h2>NUESTROS PRODUCTOS</h2>
      <p>Todos nuestros productos estan adaptados a los requerimientos del sector comercial y empresarial</p>
    </div>
    <div class="owl-carousel" id="products_slider" style="position:relative;">
      <?php
      $sql="SELECT * FROM PRODUCTOS LIMIT 12";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
          $id_p=$row['IDPRODUCTO'];
          $imagen=$row['IMAGEN'];
          ?>
          <div class="item">
            <div class="product_card_item">
              <div class="card_img">
                <img class="product_card_img w-100" src="admin/productos/img/<?php echo $imagen ?>" alt="">
              </div>
              <div class="product_card_name text-center py-3" style="background-color:#fff500">
                <a href="productoDetalle.php?detalle=<?php echo $id_p;?>"><h3><?php echo ucwords($row['TITULO']);?></h3></a>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</section>
<script>
  $('#products_slider').owlCarousel({
    loop:true,
    margin: 20,
    items: 5,
    autoplay: false,
    responsiveClass: true,
    nav: true,
    navText: ['<img src="img/arrow_left_product.svg"/>', '<img src="img/arrow_right_product.svg"/>'],
    responsive: {
      0: {
        items: 1,
      },
      400: {
        items: 2,
      },
      575: {
        items: 3,
      },
      768: {
        items: 4,
      },
      992: {
        items: 5,
      }
    }
  })
</script>
<!--================Metricas Area =================-->
<section class="counter_area">
  <div class="container">
    <div class="row m0 counter_inner justify-content-center">
      <div class="counter_item text-center">
        <span>+</span><h4 class="counter d-inline">550</h4>
        <p>Clientes satisfechos</p>
      </div>
      <div class="counter_item text-center">
        <span>+</span><h4 class="counter d-inline">5800</h4>
        <p>Piezas fabricadas</p>
      </div>
      <div class="counter_item text-center">
        <span>+</span><h4 class="counter d-inline">4960</h4>
        <p>Tazas de café tomadas</p>
      </div>
      <div class="counter_item text-center">
        <h4 class="counter d-inline">15</h4>
        <p>Profesionales en casa</p>
      </div>
    </div>
  </div>
</section>
<!--================Info Area =================-->
<section class="feature_area p_120 pb-5">
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
<!--================Blog Area =================-->
<section class="testimonials_area p_120 pt-5">
  <div class="container">
    <div class="main_title">
      <h2>Algunos artículos de interes</h2>
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
                  <p><?php echo substr($desciption,0,175)."...";?></p>
                  <h4><a class="enlace_home_blog" href="blog.php?<?php echo $id_articulo;?>"><?php echo $titulo;?></a> </h4>
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
        <img src="img/clients-logo/c-logo-4.png" alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-5.png" alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-7.png" style="width: 156px; height: 60px; " alt="">
      </div>
      <div class="item">
        <img src="img/clients-logo/c-logo-6.png" style="width: 156px; height: 60px; " alt="">
      </div>
    </div>
  </div>
</section>
<?php include 'common/footer.php'; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope-min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
<script src="js/suscripcion.js"></script>
</body>
</html>
