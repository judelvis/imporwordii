jQuery(function () {
   jQuery("#referencia").on("blur",function () {
       verificar();
   })
});

function verificar(){
    if(jQuery("#referencia").val() == "" ){
        jQuery('#msj').html("Debe ingresar una referencia");
        jQuery('#mensajes').modal('show', {backdrop: 'static'});
        return false;
    }
    var datos = "referencia="+jQuery("#referencia").val();
    jQuery.ajax({
        url: urlAdmin + "verificar",
        data: datos,
        type: 'POST',
        dataType:"JSON",
        success: function (rep) {
            if(rep.cant != 0){
                jQuery('#frm-transf').each(function () {
                    this.reset();
                });
                jQuery('#msj').html(rep.msj);
                jQuery('#mensajes').modal('show', {backdrop: 'static'});
            }
        }
    });
}

function guardar(){
    var datos = jQuery("#frm-transf").serializeArray();
    jQuery.ajax({
        url: urlAdmin + "registrar",
        data: datos,
        type: 'POST',
        success: function (rep) {
            jQuery('form').each(function () {
                this.reset();
            });
            jQuery('#msj').html(rep);
            jQuery('#mensajes').modal('show', {backdrop: 'static'});
        }
    });
    return false;
}