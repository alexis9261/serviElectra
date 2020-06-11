$("#suscripcion").click(function(){
  var email=$("#correo_footer").val();
  if (email=="") {
    const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
    toast({type:'info',title:'Coloca tu correo electrónico'});
  }else {
    $.get('../ajax_suscripcion.php',{email:email},verificar,'text');
    function verificar(respuesta){
      if (respuesta==1){
        const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:8000});
        toast({type:'success',title:'¡Gracias por suscribirte! \n Pronto recibirás información de interés sobre nuestros productos y servicios.'});
        $("#correo_footer").val("");
      }else {
        const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:8000});
        toast({type:'info',title:'¡Hubo un pequeño problema! \n Inténtalo de nuevo'});
      }
    }
  }
});
