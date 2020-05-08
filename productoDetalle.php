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
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'common/navbar.php';?>
  <section class="container">
    <?php
    if(isset($_GET['detalle'])){
      $detalle = $_GET['detalle'];
      $sql="SELECT * FROM PRODUCTOS WHERE IDPRODUCTO = $detalle";
    }
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
        $idcat = $row['IDCATEGORIA'];
        ?>
        <div class="row align-items-center">
          <div class="col-md-7">
            <div class="container-img-product-detalles">
              <img class="img-product-detalles" src="admin/productos/img/<?php echo $row['IMAGEN'] ?>">
            </div>
          </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col-12">
              <p class="text-muted" style="font-family:'Gotham';">
                <?php
                $sql="SELECT * FROM CATEGORIAS WHERE IDCATEGORIA = $idcat";
                $resultCat = $conn->query($sql);
                if($resultCat->num_rows > 0){
                  while($rowCat=$resultCat->fetch_assoc()){ ?>
                    Categoria: <strong><?php echo $rowCat['CATEGORIA'] ?></strong>
                  <?php }
                } ?>
              </p>
              <h2 class="lead" style="font-size:1.5rem;color:#002169;font-weight:500;font-family:'Gotham';"><?php echo $row['TITULO'] ?></h2>
            </div>
            <div class="col-12 mb-4">
              <h3 class="lead d-inline" style="font-size:1.8rem;color:#222222;font-weight:300;">Bs. <?=number_format($row['PRECIO'],'2', ',', '.')?></h3>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-auto">
              <a href="productos.php" class="btn vista_productos_card_boton">ver más productos</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <h2 class="mb-3" style="color:#222222;font-family:'Gotham';"><strong>Descripción</strong></h2>
        <p style="font-family:'Gotham';"><?php echo nl2br($row['DESCRIPCION']) ?></p>
      </div>
    <?php } ?>
  <?php } ?>
</section>
<section class="product_area my-5">
  <div class="container">
    <div class="row mb-4">
      <h2 class="text-left" style="color:#002169;font-family:'Gotham';">Tambien te podrian interesar estos productos</h2>
    </div>
    <div class="row products_cards">
      <?php
        $sql="SELECT * FROM PRODUCTOS WHERE NOT IDPRODUCTO=$detalle LIMIT 4 ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
          while($row=$result->fetch_assoc()){
            $imagen=$row['IMAGEN'];
        ?>
        <div class="col-lg-3 col-sm-6">
          <div class="product_card_item">
            <div class="card_img">
              <img class="product_card_img w-100" src="admin/productos/img/<?php echo $imagen ?>" alt="">
              <a href="productoDetalle.php?detalle=<?php echo $row['IDPRODUCTO'] ?>" class="product_card_hover">
                <h3 class="product_card_title"><?php echo ucwords($row['TITULO']); ?></h3>
              </a>
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
