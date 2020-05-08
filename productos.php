
<?php
$productos="active";
?>

<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>Productos</title>
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
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container">
        <div class="banner_content text-center">
          <div class="page_link">
            <a href="index.php">Inicio</a>
            <a href="nosotros.php">Productos</a>
          </div>
          <h2>Nuestros Productos</h2>
        </div>
      </div>
    </div>
  </section>
	<section class="container vista_productos_main mt-1">
		<h1 class="vista_producto_main_title text-center my-5">Algunos de nuestros productos</h1>
    <div class="productos_container_main mt-3">
    <?php
      if(isset($_GET['cat'])){
        $categoriaID = $_GET['cat'];
        $sql="SELECT * FROM PRODUCTOS WHERE IDCATEGORIA = $categoriaID";
      } elseif (isset($_GET['producto'])) {
        $search = $_GET['producto'];
        $sql="SELECT * FROM PRODUCTOS WHERE TITULO LIKE '%$search%' ";
      } else {
        $sql="SELECT * FROM PRODUCTOS";
      }
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
          ?>
          <div class="row mb-5">
            <div class="vista_producto_card_img col-12 col-sm-6 col-lg-6 w-100">
              <img class="" src="admin/productos/img/<?php echo $row['IMAGEN']; ?>" alt="">
            </div>
            <div class="vista_producto_card_information col-12 col-sm-6 col-lg-5">
              <h2 class="vista_producto_card_title mb-2"><?php echo ucwords($row['TITULO']); ?></h2>
              <p class="vista_producto_card_subtext"> <?php echo substr( $row['DESCRIPCION'],0, 150). "...";?> </p>
              <a href="productoDetalle.php?detalle=<?php echo $row['IDPRODUCTO'] ?>" class="btn vista_productos_card_boton">ver producto</a>
            </div>
          </div>
      </div>
      <?php }?>
    <?php }else { ?>
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
  </section>
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
