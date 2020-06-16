<?php
if (isset($_GET['detalle']) && !empty($_GET['detalle'])) {
  $detalle = $_GET['detalle'];
} else {
  header('Location: https://servielectraapp.000webhostapp.com/');
}
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Servielectra</title>
  <!-- Bootstrap CSS -->
  <style media="screen">
    @font-face {
      font-family: "Gotham";
      src: url("fonts/gotham-regular.otf");
    }

    @font-face {
      font-family: "Gotham Ligth";
      src: url("fonts/gotham-thin.ttf");
    }

    @font-face {
      font-family: "Gotham Bold";
      src: url("fonts/bold/WEB/HomepageBaukasten-Bold.ttf");
    }

    .border_ligth {
      border: 1px solid #ddd;
    }

    #facebook_footer,
    #twitter_footer,
    #instagram_footer,
    #youtube_footer {
      margin-top: 8px !important;
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
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
</head>

<body>
  <?php include 'common/navbar.php'; ?>
  <section class="container">
    <div class="row">
      <div class="col-lg-8">
        <?php
        $sql = "SELECT * FROM PRODUCTOS WHERE IDPRODUCTO=$detalle";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $id_producto = $row['IDPRODUCTO'];
            $idcat = $row['IDCATEGORIA'];
            $titulo = $row['TITULO'];
            $descripcion = $row['DESCRIPCION'];
            $caracteristicas = $row['CARACTERISTICAS'];
            $aplicaciones = $row['APLICACIONES'];
            $ventajas = $row['VENTAJAS'];
            $imagenPpal = $row['IMAGEN'];
        ?>
            <div class="row align-items-center mb-2">
              <div class="col-md-7">
                <div class="container-img-product-detalles">
                  <img class="img-product-detalles" src="admin/productos/img/<?php echo $imagenPpal; ?>">
                </div>
              </div>
              <div class="col-md-5">
                <div class="row">
                  <div class="col-12">
                    <!--p class="text-muted" style="font-family:'Gotham';">
                      <?php
                      $sql = "SELECT * FROM CATEGORIAS WHERE IDCATEGORIA = $idcat";
                      $resultCat = $conn->query($sql);
                      if ($resultCat->num_rows > 0) {
                        while ($rowCat = $resultCat->fetch_assoc()) { ?>
                          Categoria: <strong><?php echo $rowCat['CATEGORIA'] ?></strong>
                        <?php }
                      } ?>
                    </p-->
                    <h2 class="lead" style="font-size:1.5rem;color:#002169;font-weight:500;font-family:'Gotham';"><?php echo $titulo; ?></h2>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-auto">
                    <a href="https://wa.me/584244215217" target="_blank" class="btn vista_productos_card_boton">Ver precios</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row px-2 mt-1">
              <h2 class="mb-3" style="color:#222222;font-family:'Gotham';"><strong>Descripción</strong></h2>
            </div>
            <div class="row px-2 mt-1">
              <p style="font-family:'Gotham';"><?php echo nl2br($descripcion) ?></p>
            </div>

            <!-- Coarusel otras imagenes -->
            <section class="my-5">
              <div class="owl-carousel" id="otros_productos_detalles" style="position:relative;">
                <?php
                $result = $conn->query("SELECT IMAGEN FROM IMAGENESPRODUCTO WHERE `PRODUCTOID`=$id_producto");
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $imagen = $row['IMAGEN'];
                ?>
                    <div class="item">
                      <div class="product_card_item">
                        <div class="card_img">
                          <img class="product_card_img w-100" src="admin/productos/img/<?php echo $imagen ?>" alt="">
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </section>
            <script>
              $('#otros_productos_detalles').owlCarousel({
                loop: true,
                margin: 20,
                items: 5,
                autoplay: false,
                responsiveClass: true,
                nav: true,
                navText: ['<img src="img/arrow_left_product.svg"/>', '<img src="img/arrow_right_product.svg"/>'],
                responsive: {
                  0: {
                    items: 2,
                  },
                  768: {
                    items: 4,
                  },
                }
              })
            </script>
          <?php } ?>
        <?php } ?>
        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="caracteristicas-tab" data-toggle="tab" href="#caracteristicas" role="tab" aria-controls="caracteristicas" aria-selected="true">Características técnicas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="aplicaciones-tab" data-toggle="tab" href="#aplicaciones" role="tab" aria-controls="aplicaciones" aria-selected="false">Aplicaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="ventajas-tab" data-toggle="tab" href="#ventajas" role="tab" aria-controls="ventajas" aria-selected="false">Ventajas</a>
          </li>
        </ul>
        <div class="tab-content pt-3" id="myTabContent">
          <div class="tab-pane fade show active" id="caracteristicas" role="tabpanel" aria-labelledby="caracteristicas-tab"><?php echo nl2br($caracteristicas); ?></div>
          <div class="tab-pane fade" id="aplicaciones" role="tabpanel" aria-labelledby="aplicaciones-tab"><?php echo nl2br($aplicaciones); ?></div>
          <div class="tab-pane fade" id="ventajas" role="tabpanel" aria-labelledby="ventajas-tab"><?php echo nl2br($ventajas); ?></div>
        </div>
      </div>
      <div class="col-lg-4 mt-5">
        <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget search_widget">
            <form action="" method="get">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar artículos" name="search">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                </span>
              </div>
            </form>
            <div class="br"></div>
          </aside>
          <aside class="single_sidebar_widget author_widget">
            <img class="author_img rounded-circle" src="img/blog/author.png" alt="" width="50%">
            <h4>Servielectra VE, C.A.</h4>
            <p>J-410208686</p>
            <div class="social_icon">
              <?php if ($facebook != "") { ?>
                <a href="#"><i class="fa fa-facebook"></i></a>
              <?php }
              if ($twitter != "") { ?>
                <a href="#"><i class="fa fa-twitter"></i></a>
              <?php }
              if ($instagram != "") { ?>
                <a href="#"><i class="fa fa-instagram"></i></a>
              <?php }
              if ($youtube != "") { ?>
                <a href="#"><i class="fa fa-youtube"></i></a>
              <?php } ?>
            </div>
            <p>Diseñamos y fabricamos resistencias eléctricas calefactoras y sensores para medición de temperatura.</p>
            <div class="br"></div>
          </aside>
          <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">CATEGORÍA DE ARTÍCULOS</h4>
            <ul class="list cat-list">
              <?php
              $sql = "SELECT * FROM `CATEGORIAS`";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $categoria = $row['CATEGORIA'];
                  $idCat = $row['IDCATEGORIA'];
                  $sqla = "SELECT COUNT(IDARTICULO) AS CUENTA FROM ARTICLESBLOG WHERE IDCATEGORIA=$idCat;";
                  $resultado = $conn->query($sqla);
                  if ($resultado->num_rows > 0) {
                    while ($rowa = $resultado->fetch_assoc()) {
                      $total = $rowa['CUENTA'];
                    }
                  }
              ?>
                  <li>
                    <a href="blog.php?id=<?php echo $idCat; ?>" class="d-flex justify-content-between">
                      <p><?php echo $categoria; ?></p>
                      <p><?php echo $total; ?></p>
                    </a>
                  </li>
              <?php
                }
              } ?>
            </ul>
            <div class="br"></div>
          </aside>
          <aside class="single-sidebar-widget newsletter_widget">
            <h4 class="widget_title" style="background: #002169;color: #fff500;font-family:'Gotham Bold';">SUSCRIPCIÓN</h4>
            <p>
              Suscríbete a nosotros y te enviaremos información relevante
              sobre artículos tecnológicos y de electricidad en general
            </p>
            <div class="form-group d-flex flex-row">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text correo_icon_sidebar"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                </div>
                <input type="text" class="form-control" id="correo_blog" placeholder="Inserta tu correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserta tu correo'">
              </div>
              <a href="#" id="suscripcion_blog" class="bbtns">Suscribirse</a>
            </div>
            <div class="br"></div>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!--================ Carousel Productos =================-->
  <section class="product_area my-5">
    <div class="container">
      <div class="row">
        <h2 class="text-left" style="color:#002169;font-family:'Gotham';">Tambien te podrian interesar estos productos</h2>
      </div>
      <div class="row mt-5">
        <div class="owl-carousel" id="products_slider" style="position:relative;">
          <?php
          $sql = "SELECT * FROM PRODUCTOS WHERE NOT IDPRODUCTO=$detalle LIMIT 12";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $id_p = $row['IDPRODUCTO'];
              $imagen = $row['IMAGEN'];
          ?>
              <div class="item">
                <div class="product_card_item">
                  <div class="card_img">
                    <img class="product_card_img w-100" src="admin/productos/img/<?php echo $imagen ?>" alt="">
                  </div>
                  <div class="product_card_name text-center py-3" style="background-color:#fff500">
                    <a href="productoDetalle.php?detalle=<?php echo $id_p; ?>">
                      <h3><?php echo ucwords($row['TITULO']); ?></h3>
                    </a>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('#products_slider').owlCarousel({
      loop: true,
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
        768: {
          items: 4,
        }
      }
    })
  </script>
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
</body>

</html>