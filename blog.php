<?php
include 'common/conexion.php';
date_default_timezone_set('America/Caracas');
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
#Paginacion
$perpage=5;
if(isset($_GET['page']) & !empty($_GET['page'])){$curpage=$_GET['page'];}else{$curpage=1;}
$start=($curpage*$perpage) - $perpage;
//pregunto si existe solicitud GET en la url
if(isset($_GET['id'])){
  $id_categoria=$_GET['id'];
  $sqlBlogs="SELECT * FROM ARTICLESBLOG WHERE IDCATEGORIA=$id_categoria";
}elseif(isset($_GET['keyword'])){
  $keyword=$_GET['keyword'];
  $sqlBlogs="SELECT * FROM ARTICLESBLOG WHERE KEYWORDS LIKE '%$keyword%'";
}elseif(isset($_GET['search'])){
  $search=$_GET['search'];
  $sqlBlogs="SELECT * FROM ARTICLESBLOG WHERE TITLE LIKE '%$search%' OR KEYWORDS LIKE '%$search%'";
}else{
  $sqlBlogs="SELECT * FROM ARTICLESBLOG";
}
#necesito el total de elementos
$pageres=mysqli_query($conn,$sqlBlogs);
$totalres=mysqli_num_rows($pageres);
$endpage=ceil($totalres/$perpage);
$startpage=1;
$nextpage=$curpage + 1;
$previouspage=$curpage - 1;
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
          <h2>Noticias </h2>
          <p>Podrás encontrar noticias tecnologicas, historicas y de actualidad</p>
          <a class="white_bg_btn" href="blog.php">Ver todas</a>
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
                <a href="blog.php?id=11"><h5>Resistencias</h5></a>
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
                <a href="blog.php?id=12"><h5>Sensores</h5></a>
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
                <a href="blog.php?id=13"><h5>Control</h5></a>
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
                <a href="blog.php?id=14"><h5>Electricidad</h5></a>
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
            $meses=['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
            $sqlBlogs.=" LIMIT $start,$perpage";
            $result=$conn->query($sqlBlogs);
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
                ?>
                <article class="row blog_item">
                  <div class="col-md-3">
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
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="blog_post">
                      <img src="admin/blog/img/<?php echo $imagen;?>" alt="<?php echo $titulo;?>" style="width:100%;height:auto;">
                      <div class="blog_details">
                        <a href="single-blog.php?id=<?php echo $id_articulo;?>"><h2><?php echo $titulo;?></h2></a>
                        <p><?php echo $desciption;?></p>
                        <a href="single-blog.php?id=<?php echo $id_articulo;?>" class="white_bg_btn">Leer más</a>
                      </div>
                    </div>
                  </div>
                </article>
                <?php
              }
             }else{ ?>
              <h4 style="color:#002169">No Hay Artículos</h4>
            <?php } ?>
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
                $array_keywords=array_unique($array_keywords);
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
  <script src="vendors/jquery-ui/jquery-ui.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script>
  <script src="js/theme.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  <script src="js/suscripcion.js"></script>
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
