function registro() {
    var datos = jQuery("#frmReg").serialize();
    var clav = jQuery("#txtClave").val();
    var clav2 = jQuery("#txtClave2").val();

    if(clav != clav2){
        jQuery("#msj").html("<p>Las Contraseñas No Coinciden</p>");
        jQuery('#mensajes').modal('show', {backdrop: 'static'});
        return false;
    }
    jQuery.ajax({
        url: urlPrincipal + "guardarRegistro",
        data: datos+"&csrf_token_scuti="+jQuery("#csrf_token_scuti").val(),
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