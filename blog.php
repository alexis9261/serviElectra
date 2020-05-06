<?php
$blog="active";
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
  <?php include 'common/navbar.php';?>
  <!--================Home Banner Area =================-->
  <section class="home_banner_area blog_banner">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container">
        <div class="blog_b_text text-center">
          <h2>Noticias <br /> relevantes</h2>
          <p>Podrás encontrar noticias tecnologicas, historicas y de actualidad</p>
          <a class="white_bg_btn" href="#">Ver todas</a>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Blog Categorie Area =================-->
  <section class="blog_categorie_area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="categories_post">
            <img src="img/icon/service-icon-1.png" alt="post" width="100%">
            <div class="categories_details">
              <div class="categories_text">
                <a href="blog-details.html"><h5>Resistencias</h5></a>
                <div class="border_line"></div>
                <p>Infomarción sobre resistencias eléctricas</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="categories_post">
            <img src="img/icon/service-icon-2.png" alt="post" width="100%">
            <div class="categories_details">
              <div class="categories_text">
                <a href="blog-details.html"><h5>Sensores</h5></a>
                <div class="border_line"></div>
                <p>Articulos relacionados a los sensores</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="categories_post">
            <img src="img/icon/service-icon-3.png" alt="post" width="100%">
            <div class="categories_details">
              <div class="categories_text">
                <a href="blog-details.html"><h5>Control</h5></a>
                <div class="border_line"></div>
                <p>Todo sobre el control industrial</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="categories_post">
            <img src="img/icon/service-icon-4.png" alt="post" width="100%">
            <div class="categories_details">
              <div class="categories_text">
                <a href="blog-details.html"><h5>Electricidad</h5></a>
                <div class="border_line"></div>
                <p>Ariculos de electricidad en general</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Blog Categorie Area =================-->

  <!--================Blog Area =================-->
  <section class="blog_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="blog_left_sidebar">
            <?php
            $sql="SELECT * FROM `ARTICLESBLOG`";
            $result=$conn->query($sql);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_articulo=$row['IDARTICULO'];
                $idCat=$row['IDCATEGORIA'];
                ?>
                <article class="row blog_item">
                  <div class="col-md-3">
                    <div class="blog_info text-right">
                      <div class="post_tag">
                        <a href="#">Food,</a>
                        <a class="active" href="#">Technology,</a>
                        <a href="#">Politics,</a>
                        <a href="#">Lifestyle</a>
                      </div>
                      <ul class="blog_meta list">
                        <li><a href="#">Mark wiens<i class="lnr lnr-user"></i></a></li>
                        <li><a href="#">12 Dec, 2017<i class="lnr lnr-calendar-full"></i></a></li>
                        <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="blog_post">
                      <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
                      <div class="blog_details">
                        <a href="single-blog.html"><h2>Astronomy Binoculars A Great Alternative</h2></a>
                        <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.</p>
                        <a href="single-blog.html" class="white_bg_btn">View More</a>
                      </div>
                    </div>
                  </div>
                </article>
                <?php
              }
            } ?>
            <article class="row blog_item">
              <div class="col-md-3">
                <div class="blog_info text-right">
                  <div class="post_tag">
                    <a href="#">Food,</a>
                    <a class="active" href="#">Technology,</a>
                    <a href="#">Politics,</a>
                    <a href="#">Lifestyle</a>
                  </div>
                  <ul class="blog_meta list">
                    <li><a href="#">Mark wiens<i class="lnr lnr-user"></i></a></li>
                    <li><a href="#">12 Dec, 2017<i class="lnr lnr-calendar-full"></i></a></li>
                    <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                    <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-9">
                <div class="blog_post">
                  <img src="img/blog/main-blog/m-blog-5.jpg" alt="">
                  <div class="blog_details">
                    <a href="single-blog.html"><h2>Telescopes 101</h2></a>
                    <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.</p>
                    <a href="single-blog.html" class="white_bg_btn">View More</a>
                  </div>
                </div>
              </div>
            </article>
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                      <span class="lnr lnr-chevron-left"></span>
                    </span>
                  </a>
                </li>
                <li class="page-item"><a href="#" class="page-link">01</a></li>
                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                <li class="page-item"><a href="#" class="page-link">03</a></li>
                <li class="page-item"><a href="#" class="page-link">04</a></li>
                <li class="page-item"><a href="#" class="page-link">09</a></li>
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">
                      <span class="lnr lnr-chevron-right"></span>
                    </span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar artículos">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                </span>
              </div><!-- /input-group -->
              <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget author_widget">
              <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
              <h4>Charlie Barber</h4>
              <p>Senior blog writer</p>
              <div class="social_icon">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </div>
              <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
              <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget popular_post_widget">
              <h3 class="widget_title">Popular Posts</h3>
              <div class="media post_item">
                <img src="img/blog/popular-post/post1.jpg" alt="post">
                <div class="media-body">
                  <a href="blog-details.html"><h3>Space The Final Frontier</h3></a>
                  <p>02 Hours ago</p>
                </div>
              </div>
              <div class="media post_item">
                <img src="img/blog/popular-post/post2.jpg" alt="post">
                <div class="media-body">
                  <a href="blog-details.html"><h3>The Amazing Hubble</h3></a>
                  <p>02 Hours ago</p>
                </div>
              </div>
              <div class="media post_item">
                <img src="img/blog/popular-post/post3.jpg" alt="post">
                <div class="media-body">
                  <a href="blog-details.html"><h3>Astronomy Or Astrology</h3></a>
                  <p>03 Hours ago</p>
                </div>
              </div>
              <div class="media post_item">
                <img src="img/blog/popular-post/post4.jpg" alt="post">
                <div class="media-body">
                  <a href="blog-details.html"><h3>Asteroids telescope</h3></a>
                  <p>01 Hours ago</p>
                </div>
              </div>
              <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget ads_widget">
              <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
              <div class="br"></div>
            </aside>
            <aside class="single_sidebar_widget post_category_widget">
              <h4 class="widget_title">Catgorias de los artículos</h4>
              <ul class="list cat-list">
                <?php
                $sql="SELECT * FROM `CATEGORIAS`";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){
                    $categoria=$row['CATEGORIA'];
                    $idCat=$row['IDCATEGORIA'];
                    ?>
                    <li>
                      <a href="blog.php?id=<?php echo $idCat;?>" class="d-flex justify-content-between">
                        <p><?php echo $categoria;?></p>
                        <p>37</p>
                      </a>
                    </li>
                    <?php
                  }
                } ?>
              </ul>
              <div class="br"></div>
            </aside>
            <aside class="single-sidebar-widget newsletter_widget">
              <h4 class="widget_title">Suscripción</h4>
              <p>
                Suscribete a nosotros y te enviaremos información relevante
                sobre artículos tecnológicos y de electricidad en general
              </p>
              <div class="form-group d-flex flex-row">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                  </div>
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Inserta tu correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserta tu correo'">
                </div>
                <a href="#" class="bbtns">Suscribirse</a>
              </div>
              <div class="br"></div>
            </aside>
            <aside class="single-sidebar-widget tag_cloud_widget">
              <h4 class="widget_title">Etiquetas</h4>
              <ul class="list">
                <li><a href="#">Technology</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Architecture</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Art</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Adventure</a></li>
              </ul>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================Blog Area =================-->

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
  <script src="vendors/jquery-ui/jquery-ui.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/theme.js"></script>
</body>
</html>
