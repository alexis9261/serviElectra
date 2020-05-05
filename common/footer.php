<?php
include 'common/conexion.php';
$facebook="";
$twitter="";
$linkedin="";
$instagram="";
$sql="SELECT * FROM `CONFIGURACION`";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    if($row['ATRIBUTO']=="facebook"){
      $facebook=$row['VALOR'];
    }else if($row['ATRIBUTO']=="twitter"){
      $twitter=$row['VALOR'];
    }else if($row['ATRIBUTO']=="linkedin"){
      $linkedin=$row['VALOR'];
    }else if($row['ATRIBUTO']=="instagram"){
      $instagram=$row['VALOR'];
    }
  }
}
 ?>
<footer class="footer-area p_120">
  <div class="container">
    <div class="row">
      <div class="col-lg-3  col-md-6 col-sm-6">
        <div class="single-footer-widget ab_wd">
          <h6 class="footer_title">Sobre Nosotros</h6>
          <p>Somos fábrica de resistencias eléctricas y sensores para medición de temperatura.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget contact_wd">
          <h6 class="footer_title">Contáctanos</h6>
          <p> </p>
          <a href="tel:01265325689746">+58 424 421 52 17</a>
        </div>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-6 offset-lg-1">
        <div class="single-footer-widget">
          <h6 class="footer_title">Suscribete</h6>
          <p>Suscribete en nuestro sitio y te mantendremos al tanto de todas nuestras ofertas.</p>
          <div id="mc_embed_signup">
            <form target="_blank" action="" method="get" class="subscribe_form relative">
              <div class="input-group d-flex flex-row">
                <input name="EMAIL" placeholder="Tu correo electrónico" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Correo electrónico '" required="" type="email">
                <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
              </div>
              <div class="mt-10 info"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row footer-bottom d-flex justify-content-between align-items-center">
      <div class="col-lg-4 col-md-4 footer-social">
          <?php if ($facebook!=""){ ?>
            <a href="#"><i class="fa fa-facebook"></i></a>
          <?php }elseif ($twitter!="") { ?>
            <a href="#"><i class="fa fa-twitter"></i></a>
          <?php }elseif ($instagram!="") { ?>
            <a href="#"><i class="fa fa-instagram"></i></a>
          <?php }elseif ($linkedin!="") { ?>
            <a href="#"><i class="fa fa-linkedin"></i></a>
          <?php } ?>
      </div>
    </div>
  </div>
</footer>
