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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
	<?php include 'common/navbar.php';?>
	<section class="container vista_productos_main">
		<h1 class="vista_producto_main_title text-center">Productos</h1>
    
    <div class="productos_container_main mt-3">
    <?php 
      $sql="SELECT * FROM PRODUCTOS";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
    ?>
      <?php
        while($row=$result->fetch_assoc()){
      ?>
      <div class="row mb-5">
          <div class="col-12">
             <h2 class="vista_producto_card_title mb-2 "><?php echo ucwords($row['TITULO']); ?></h2>
          </div>
          <div class="vista_producto_card_img col-12 col-sm-6 col-lg-6 w-100">
              <img class="" src="./img/productos/<?php echo $row['IMAGEN']; ?>" alt="">
          </div>
          
          <div class="vista_producto_card_information col-12 col-sm-6 col-lg-5">
              <p class="vista_producto_card_subtext" > <?php echo substr( $row['DESCRIPCION'],0, 150). "...";?> </p>
              <a href="#" class="btn vista_productos_card_boton">Read Now</a>
          </div>
      </div>
      <?php }?>
     <?php } ?>
    </div>
    
	</section>
</body>
</html>