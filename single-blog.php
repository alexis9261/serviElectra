<?php
include 'common/conexion.php';
$blog="active";
if(isset($_GET['id'])){
  $id_blog=$_GET['id'];
}else{
  header("Location: blog.php");
}
$blog="active";
//busco si tienen redes sociales
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
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Servielectra</title>
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
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container">
        <div class="banner_content text-center">
          <div class="page_link">
            <a href="index.php">Inicio</a>
            <a href="blog.php">Noticias</a>
            <a href="single-blog.php?id=<?php echo $id_blog;?>">Detalles</a>
          </div>
          <h2>Noticias</h2>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Blog Area =================-->
  <section class="blog_area single-post-area p_120">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 posts-list">
          <div class="single-post row">
            <?php
            $meses=['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
            $sql="SELECT * FROM ARTICLESBLOG WHERE IDARTICULO=$id_blog";
            $result=$conn->query($sql);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $id_articulo=$row['IDARTICULO'];
                $titulo=$row['TITLE'];
                $desciption=$row['DESCRIPTION'];
                $keywords=$row['KEYWORDS'];
                $keywords_array=explode(",",$keywords);
                $autor=$row['AUTOR'];
                $date=$row['DATE'];
                $aux=substr($date,5,2);
                if($aux<10){$aux="0".$aux;}
                $fecha=substr($date,8,2)." ".$meses[intval($aux)]." del ".substr($date,0,4);
                $imagen=$row['IMAGE'];
                $contenido=$row['CONTENT'];
                ?>
                <div class="col-lg-12">
                  <div class="feature-img text-center">
                    <img class="img-fluid" src="admin/blog/img/<?php echo $imagen;?>" alt="" style="width:100%;height:auto;">
                  </div>
                </div>
                <div class="col-lg-3  col-md-3">
                  <div class="blog_info text-right">
                    <div class="post_tag">
                      <?php foreach ($keywords_array as $keyword){ ?>
                        <a href="blog.php?keyword=<?php echo $keyword;?>"><?php echo $keyword;?>,</a>
                      <?php } ?>
                    </div>
                    <ul class="blog_meta list">
                      <li><a href="#"><?php echo $autor;?><i class="lnr lnr-user"></i></a></li>
                      <li><a href="#"><?php echo $fecha;?><i class="lnr lnr-calendar-full"></i></a></li>
                      <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                    </ul>
                    <ul class="social-links">
                      <?php if($facebook!=""){ ?>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <?php } if($twitter!=""){ ?>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <?php } if($instagram!=""){ ?>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                      <?php } if($youtube!=""){ ?>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-9 col-md-9 blog_details">
                  <h2><?php echo $titulo;?></h2>
                  <p class="excert">
                    <?php echo $desciption;?>
                  </p>
                  <p class="excert">
                    <?php echo $contenido;?>
                  </p>
                </div>
                <?php
              }
            }
             ?>
          </div>
          <div class="navigation-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                <div class="thumb">
                  <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                </div>
                <div class="arrow">
                  <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                </div>
                <div class="detials">
                  <p>Prev Post</p>
                  <a href="#"><h4>Space The Final Frontier</h4></a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                <div class="detials">
                  <p>Next Post</p>
                  <a href="#"><h4>Telescopes 101</h4></a>
                </div>
                <div class="arrow">
                  <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                </div>
                <div class="thumb">
                  <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
          <div class="comments-area">
            <h4>05 Comments</h4>
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="img/blog/c1.jpg" alt="">
                  </div>
                  <div class="desc">
                    <h5><a href="#">Emilly Blunt</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                      Never say goodbye till the end comes!
                    </p>
                  </div>
                </div>
                <div class="reply-btn">
                  <a href="" class="btn-reply text-uppercase">reply</a>
                </div>
              </div>
            </div>
            <div class="comment-list left-padding">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="img/blog/c2.jpg" alt="">
                  </div>
                  <div class="desc">
                    <h5><a href="#">Elsie Cunningham</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                      Never say goodbye till the end comes!
                    </p>
                  </div>
                </div>
                <div class="reply-btn">
                  <a href="" class="btn-reply text-uppercase">reply</a>
                </div>
              </div>
            </div>
            <div class="comment-list left-padding">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="img/blog/c3.jpg" alt="">
                  </div>
                  <div class="desc">
                    <h5><a href="#">Annie Stephens</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                      Never say goodbye till the end comes!
                    </p>
                  </div>
                </div>
                <div class="reply-btn">
                  <a href="" class="btn-reply text-uppercase">reply</a>
                </div>
              </div>
            </div>
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="img/blog/c4.jpg" alt="">
                  </div>
                  <div class="desc">
                    <h5><a href="#">Maria Luna</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                      Never say goodbye till the end comes!
                    </p>
                  </div>
                </div>
                <div class="reply-btn">
                  <a href="" class="btn-reply text-uppercase">reply</a>
                </div>
              </div>
            </div>
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="thumb">
                    <img src="img/blog/c5.jpg" alt="">
                  </div>
                  <div class="desc">
                    <h5><a href="#">Ina Hayes</a></h5>
                    <p class="date">December 4, 2017 at 3:12 pm </p>
                    <p class="comment">
                      Never say goodbye till the end comes!
                    </p>
                  </div>
                </div>
                <div class="reply-btn">
                  <a href="" class="btn-reply text-uppercase">reply</a>
                </div>
              </div>
            </div>
          </div>
          <div class="comment-form">
            <h4>Leave a Reply</h4>
            <form>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name">
                  <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                </div>
                <div class="form-group col-lg-6 col-md-6 email">
                  <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
              </div>
              <div class="form-group">
                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
              </div>
              <a href="#" class="primary-btn submit_btn">Post Comment</a>
            </form>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
              <form action="" method="get">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar artículos" name="search">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                  </span>
                </div><!-- /input-group -->
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
              <h4 class="widget_title">Catgorias de los artículos</h4>
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
                  <input type="text" class="form-control" id="correo_blog" placeholder="Inserta tu correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Inserta tu correo'">
                </div>
                <a href="#" id="suscripcion_blog" class="bbtns">Suscribirse</a>
              </div>
              <div class="br"></div>
            </aside>
            <aside class="single-sidebar-widget tag_cloud_widget">
              <h4 class="widget_title">Etiquetas</h4>
              <ul class="list">
                <?php
                $array_keywords=array();
                $sql="SELECT KEYWORDS FROM `ARTICLESBLOG`";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){
                    $aux=explode(',',$row['KEYWORDS']);
                    foreach($aux as $keyword){
                      array_push($array_keywords,$keyword);
                    }
                  }
                }
                foreach($array_keywords as $keyword){
                  ?>
                  <li><a href="blog.php?keyword=<?php echo $keyword;?>"><?php echo $keyword;?></a></li>
                <?php } ?>
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
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/theme.js"></script>
  <script src="js/suscripcion.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  <script type="text/javascript">
  $("#suscripcion_blog").click(function(){
    var email=$("#correo_blog").val();
    if (email=="") {
      const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
      toast({type:'info',title:'Coloca tu correo electrónico'});
    }else {
      $.get('ajax_suscripcion.php',{email:email},verificar,'text');
      function verificar(respuesta){
        if (respuesta==1){
          const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3000});
          toast({type:'success',title:'¡Gracias por suscribirte! \n Estaremos enviandote información relevante'});
          $("#correo_footer").val("");
        }else {
          const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
          toast({type:'info',title:'¡Hubo un pequeño problema! \n Inténtalo de nuevo'});
        }
      }
    }
  });
  </script>
</body>
</html>
