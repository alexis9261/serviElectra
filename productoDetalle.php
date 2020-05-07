<?php
   
    
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
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
	<?php include 'common/navbar.php';?>
	<section class="container vista_productos_detalles_main">
        <?php
            if(isset($_GET['detalle'])){
                $detalle = $_GET['detalle'];
                $sql="SELECT * FROM PRODUCTOS WHERE IDPRODUCTO = $detalle";
            }
            
            $result = $conn->query($sql);
            if($result->num_rows > 0){
        ?>
        <?php while($row=$result->fetch_assoc()){ 
            $idcat = $row['IDCATEGORIA'];
        ?>
            
        <div class="row detalle_producto_container">
            <div class=" col-12 col-sm-6 col-lg-7 text-center detalle_img_container">
                <img class="detalle_producto_img" src="img/productos/<?php echo $row['IMAGEN'] ?>" alt="">
            </div>
            <div class="col-12 col-sm-6 col-lg-5 detalle_producto_info">
                <h2 class="detalle_producto_title"> <?php echo $row['TITULO'] ?></h2>
                <p class="detalle_producto_precio">Precio: <span><?php echo $row['PRECIO'] ?></span></p>
                <?php 
                    $sql="SELECT * FROM CATEGORIAS WHERE IDCATEGORIA = $idcat";
                    $resultCat = $conn->query($sql);
                    if($resultCat->num_rows > 0){
                ?>
                 <?php while($rowCat=$resultCat->fetch_assoc()){ ?>
                    <p class="detalle_producto_categoria">Categoria: <span><?php echo $rowCat['CATEGORIA'] ?></span></p>
                 <?php } ?>
                <?php }?>
            </div>
        </div>

        <div class="row">
            <div class=" col-sm-12 col-lg-12 detalle_producto_descripcion">
                <h2 class="detalle_producto_descripcion_title">Descripción</h2>
                <p class="detalle_producto_descripcion_content"><?php echo $row['DESCRIPCION'] ?></p>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
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
</body>
</html>