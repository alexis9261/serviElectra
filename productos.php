<?php
include 'common/conexion.php';
$productos="active";
#Paginacion
$perpage=10;
if(isset($_GET['page']) & !empty($_GET['page'])){$curpage=$_GET['page'];}else{$curpage=1;}
$start=($curpage*$perpage) - $perpage;
#necesito el total de elementos
$sql="SELECT * FROM PRODUCTOS";
$pageres=mysqli_query($conn,$sql);
$totalres=mysqli_num_rows($pageres);
$endpage=ceil($totalres/$perpage);
$startpage=1;
$nextpage=$curpage + 1;
$previouspage=$curpage - 1;
?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Productos</title>
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
  .border_ligth{
    border: 1px solid #ddd;
  }
  #facebook_footer, #twitter_footer, #instagram_footer, #youtube_footer{
    margin-top: 8px!important;
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
      <style media="screen">
      .banner_area .banner_inner .overlay {
        background: url(../img/banner/productos.jpg) no-repeat scroll center center;
      }
      </style>
</head>
<body>
  <?php include 'common/navbar.php';?>
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container">
        <div class="banner_content text-center">
          <div class="page_link">
            <a href="index.php" style="color:#002169!important">Inicio</a>
            <a href="nosotros.php" style="color:#002169!important">Productos</a>
          </div>
          <h2 style="color:#002169!important">Nuestros Productos</h2>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <section class="container vista_productos_main mt-5">
          <?php if (isset($_GET['cat']) || isset($_GET['producto'])) { ?>
            <div class="productos_container_main mt-3">
              <?php
              if(isset($_GET['cat'])){
                $categoriaID = $_GET['cat'];
                $sql="SELECT * FROM PRODUCTOS WHERE IDCATEGORIA = $categoriaID";
              } elseif (isset($_GET['producto'])) {
                $search = $_GET['producto'];
                $sql="SELECT * FROM PRODUCTOS WHERE TITULO LIKE '%$search%' ";
              }
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                  ?>
                  <div class="row mb-5">
                    <div class="vista_producto_card_img col-12 col-sm-5 w-100">
                      <img class="img-fluid" src="admin/productos/img/<?php echo $row['IMAGEN']; ?>" alt="" width="100%">
                    </div>
                    <div class="vista_producto_card_information col-12 col-sm-7 ">
                      <h2 class="vista_producto_card_title mb-2"><?php echo ucwords($row['TITULO']); ?></h2>
                      <p class="vista_producto_card_subtext"> <?php echo substr( $row['DESCRIPCION'],0,120). "...";?> </p>
                      <a class="btn vista_productos_card_boton" href="productoDetalle.php?detalle=<?php echo $row['IDPRODUCTO'] ?>">ver producto</a>
                    </div>
                  </div>
                <?php }
              }else { ?>
                <p>
                  <strong>No se encontraron productos.</strong>
                </p>
                <strong class="text-muted mb-5">Busca en otras categorias o has una busqueda general.</strong>
                <br>
                <br>
                <br>
                <br>
              <?php } ?>
            </div>
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
                <?php if($curpage!=$startpage){ ?>
                  <li class="page-item">
                    <a href="?page=<?php echo $startpage;?>" class="page-link" aria-label="Previous">
                      <span aria-hidden="true">
                        <span class="lnr lnr-chevron-left"></span>
                      </span>
                    </a>
                  </li>
                <?php } ?>
                <?php if($curpage>=2){ ?>
                  <li class="page-item"><a href="?page=<?php echo $previouspage;?>" class="page-link"><?php echo $previouspage;?></a></li>
                <?php } ?>
                <li class="page-item"><a href="?page=<?php echo $curpage;?>" class="page-link"><?php echo $curpage;?></a></li>
                <?php if($curpage!=$endpage){ ?>
                  <li class="page-item"><a href="?page=<?php echo $nextpage;?>" class="page-link"><?php echo $nextpage;?></a></li>
                <?php } ?>
                <?php if($curpage!=$endpage){ ?>
                  <li class="page-item">
                    <a href="?page=<?php echo $endpage;?>" class="page-link" aria-label="Next">
                      <span aria-hidden="true">
                        <span class="lnr lnr-chevron-right"></span>
                      </span>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </nav>
            <?php }else { ?>
              <div class="row border_ligth">
                <div class="col-3 pl-0">
                  <a href="productos.php?cat=1">
                  <img src="img/icon/service-icon-1.png" alt="" width="100%">
                  </a>
                </div>
                <div class="col-9 card_categorias py-3">
                  <a href="productos.php?cat=1"><h2>RESISTENCIAS CALEFACTORAS</h2></a>
                  <p>Fabricación de resistencias eléctricas a la medida para el sector industrial, comercial y residencial.</p>
                </div>
              </div>
              <div class="row border_ligth mt-2">
                <div class="col-3 pl-0">
                  <a href="productos.php?cat=2">
                  <img src="img/icon/service-icon-2.png" alt="" width="100%">
                  </a>
                </div>
                <div class="col-9 card_categorias py-3">
                  <a href="productos.php?cat=2"><h2>SENSORES DE TEMPERATURA</h2></a>
                  <p>Fabricación de sensores de temperatura a la medida: Termopares y RTD PT100.</p>
                </div>
              </div>
              <div class="row border_ligth mt-2">
                <div class="col-3 pl-0">
                  <a href="productos.php?cat=4">
                    <img src="img/icon/service-icon-3.png" alt="" width="100%">
                    </a>
                </div>
                <div class="col-9 card_categorias py-3">
                  <a href="productos.php?cat=4"><h2>CONTROL Y AUTOMATIZACIÓN</h2></a>
                  <p>Venta y distribución de materiales eléctricos para el control y la automatización de procesos.</p>
                </div>
              </div>
              <div class="row border_ligth mt-2">
                <div class="col-3 pl-0">
                  <a href="productos.php?cat=3">
                  <img src="img/icon/service-icon-4.png" alt="" width="100%">
                  </a>
                </div>
                <div class="col-9 card_categorias py-3">
                  <a href="productos.php?cat=3"><h2>ELECTRICIDAD</h2></a>
                  <p>Material especializado para altas temperaturas. Cables, terminales, borneras, aisladores y más.</p>
                </div>
              </div>
              <div class="row mt-5 pt-4">
                <!--================ Carousel Productos =================-->
                <div class="owl-carousel" id="products_slider" style="position:relative;">
                  <?php
                  $sql="SELECT * FROM PRODUCTOS LIMIT 12";
                  $result=$conn->query($sql);
                  if($result->num_rows>0){
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
            <?php } ?>
        </section>
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
              <?php if($facebook!=""){ ?>
                <a href="#"><i class="fa fa-facebook"></i></a>
              <?php } if($twitter!=""){ ?>
                <a href="#"><i class="fa fa-twitter"></i></a>
              <?php } if($instagram!=""){ ?>
                <a href="#"><i class="fa fa-instagram"></i></a>
              <?php } if($youtube!=""){ ?>
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
              $sql="SELECT * FROM `CATEGORIAS`";
              $result=$conn->query($sql);
              if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  $categoria=$row['CATEGORIA'];
                  $idCat=$row['IDCATEGORIA'];
                  $sqla="SELECT COUNT(IDARTICULO) AS CUENTA FROM ARTICLESBLOG WHERE IDCATEGORIA=$idCat;";
                  $resultado=$conn->query($sqla);
                  if($resultado->num_rows>0){
                    while($rowa=$resultado->fetch_assoc()){
                      $total=$rowa['CUENTA'];
                    }
                  }
                  ?>
                  <li>
                    <a href="blog.php?id=<?php echo $idCat;?>" class="d-flex justify-content-between">
                      <p><?php echo $categoria;?></p>
                      <p><?php echo $total;?></p>
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
              Suscribete a nosotros y te enviaremos información relevante
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
  </div>
  <?php include 'common/footer.php';?>
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
      768: {
        items: 4,
      }
    }
  })
  </script>
</body>
</html>
