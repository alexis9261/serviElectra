<?php
$contacto="active";
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
</head>
<body>

  <?php include 'common/navbar.php';?>

  <!--================Home Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container py-4">
        <div class="banner_content text-center py-5">
          <div class="page_link">
            <a href="index.php">Inicio</a>
            <a href="contacto.php">Contacto</a>
          </div>
          <h2>Contáctanos</h2>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Contact Area =================-->
  <section class="contact_area p_120">
    <div class="container">
      <div class="row mb-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.096799678982!2d-68.01285198615287!3d10.172786892732823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e805df4361bc079%3A0xee065411e88c884a!2sServielectra%20VE%2C%20C.A.!5e0!3m2!1ses!2sve!4v1588728445165!5m2!1ses!2sve" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="contact_info">
          <div class="info_item">
            <i class="lnr lnr-home"></i>
            <h6>Carabobo, Venezuela</h6>
            <p>Av. Michelena, entre Escalona y Aranzazu, Local 108-41, sector La Candelaria, Valencia.</p>
          </div>
          <div class="info_item">
            <i class="lnr lnr-phone-handset"></i>
            <h6><a href="tel:02416177327"> 0241 617 73 27 </a></h6>
          </div>
          <div class="info_item mt-2">
            <img src="img/whatsapp.svg" alt="" width="20px" style="position:absolute;left:0;top:0;">
            <h6 class="d-inline"><a href="tel:+584244215217">+58 424 421 52 17</a></h6>
            <p>Lun a Vie 8am a 5pm</p>
          </div>
          <div class="info_item">
            <i class="lnr lnr-envelope"></i>
            <h6><a href="mailto:ventas@Servielectra.com.ve">ventas@servielectra.com.ve</a></h6>
            <h6><a href="mailto:info@Servielectra.com.ve">info@servielectra.com.ve</a></h6>
            <p>¡Estamos atentos a tus inquietudes!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row contact_form">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea class="form-control" name="message" id="message" rows="1" placeholder="Escribir Mensaje"></textarea>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" value="submit" class="btn submit_btn" id="enviar">Enviar Mensaje</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================Contact Area =================-->
<script>
  $("#enviar").click(function(){
    var name=$("#name").val();
    var email=$("#email").val();
    var subject=$("#subject").val();
    var message=$("#message").val();
    if (name=="" || email=="" || message=="") {
      const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
      toast({type:'info',title:'Completa los campos que son obligatorios'});
    }else {
      $.get('ajax_email_send.php',{name:name,email:email,subject:subject,message:message},verificar,'text');
      function verificar(respuesta){
        if (respuesta==1) {
          const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3000});
          toast({type:'success',title:'El Mensaje fue enviado Exitosamente \n Pronto nos estaremos comunicando contigo.'});
          $("#name").val("");$("#email").val("");$("#subject").val("");$("#company").val("");$("#message").val("");
        }else {
          const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
          toast({type:'info',title:'¡Hubo un pequeño problema! \n Inténtalo de nuevo'});
        }
      }
    }
  });
</script>
<?php include 'common/footer.php'; ?>

  <!--================Contact Success and Error message Area =================-->
  <div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
          </button>
          <h2>Thank you</h2>
          <p>Your message is successfully sent...</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals error -->

  <div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
          </button>
          <h2>Sorry !</h2>
          <p> Something went wrong </p>
        </div>
      </div>
    </div>
  </div>
  <!--================End Contact Success and Error message Area =================-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
  <!-- contact js -->
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/contact.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/theme.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js'></script>
  <script src="js/suscripcion.js"></script>
</body>
</html>
