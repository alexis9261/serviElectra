<?php
include 'common/conexion.php';
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
    }else if($row['ATRIBUTO']=="youtube"){
      $youtube=$row['VALOR'];
    }else if($row['ATRIBUTO']=="instagram"){
      $instagram=$row['VALOR'];
    }
  }
}
 ?>
 <div class="whatsapp_div">
   <a href="https://wa.me/584244215217" target="_blank">
     <img class="whatsapp_image" src="../img/whatsapp.png" alt="whatsapp Button">
   </a>
 </div>
<footer class="footer-area p_120 pb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget ab_wd">
          <h6 class="footer_title">Sobre Nosotros</h6>
          <p>Somos fábrica de resistencias eléctricas y sensores para medición de temperatura.</p>
        </div>
        <div class="mt-4">
          <img src="img/hecho.png" alt="" width="50%">
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget contact_wd">
          <h6 class="footer_title">Contáctanos</h6>
          <a href="tel:02416177327" style="font-size:1rem!important;"> 0241 617 73 27 </a>
          <a href="tel:+584244215217" style="font-size:1rem!important;">+58 424 421 52 17</a>
          <a href="mailto:info@servielectra.com.ve" style="font-size:1rem!important;margin-top:10px;">info@servielectra.com.ve</a>
        </div>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-6 offset-lg-1">
        <div class="single-footer-widget">
          <h6 class="footer_title">Suscríbete</h6>
          <p>Suscríbete en nuestro sitio y te mantendremos al tanto de todas nuestras ofertas.</p>
          <div class="mt-3">
            <div class="input-group d-flex flex-row">
              <input name="correo" id="correo_footer" placeholder="Tu correo electrónico" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Correo electrónico '" required="" type="email">
              <button class="btn sub-btn" id="suscripcion"><span class="lnr lnr-arrow-right"></span></button>
            </div>
            <div class="mt-10 info"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row footer-bottom d-flex align-items-center pt-4">
      <div class="col-auto footer-social align-self-center">
          <?php if($facebook!=""){ ?>
            <a target="_blank" href="<?php echo $facebook;?>"><i class="fa fa-facebook" id="facebook_footer"></i></a>
          <?php }if($twitter!=""){ ?>
            <a target="_blank" href="<?php echo $twitter;?>"><i class="fa fa-twitter" id="twitter_footer"></i></a>
          <?php }if($instagram!=""){ ?>
            <a target="_blank" href="<?php echo $instagram;?>"><i class="fa fa-instagram" id="instagram_footer"></i></a>
          <?php }if($youtube!=""){ ?>
            <a target="_blank" href="<?php echo $youtube;?>"><i class="fa fa-youtube" id="youtube_footer"></i></a>
          <?php } ?>
      </div>
    </div>
  </div>
</footer>
