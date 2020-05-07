$("#suscripcion").click(function(){
  var email=$("#correo_footer").val();
  if (email=="") {
    const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
    toast({type:'info',title:'Coloca tu correo electrónico'});
  }else {
    $.get('../ajax_suscripcion.php',{email:email},verificar,'text');
    function verificar(respuesta){
      if (respuesta==1){
        const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:5000});
        toast({type:'success',title:'¡Gracias por suscribirte! \n Estaremos enviandote información relevante'});
        $("#correo_footer").val("");
      }else {
        const toast=swal.mixin({toast:true,position:'top',showConfirmButton:false,timer:3500});
        toast({type:'info',title:'¡Hubo un pequeño problema! \n Inténtalo de nuevo'});
      }
    }
  }
});
