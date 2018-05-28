jQuery(function () {
    cargarBarra();
});

function cargarBarra() {
    jQuery.ajax({
        url: urlConf + "comboBarra",
        type: 'GET',
        success: function (rep) {
            jQuery("#Deposito").html(rep);
        }
    });
}
