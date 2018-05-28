$(function () {
   $("#registro-resultados").on("submit",function () {
      var datos = $(this).serializeArray();
       jQuery.ajax({
           url: urlPrincipal + "guardarQuiniela",
           data: datos,
           type: 'POST',
           success: function (rep) {
               console.log(rep);
               jQuery('form').each(function () {
                   this.reset();
               });
               jQuery('#msj').html(rep);
               jQuery('#mensajes').modal('show', {backdrop: 'static'});
               setTimeout('document.location.reload()',5000);
           }
       });
       return false;
   });
});