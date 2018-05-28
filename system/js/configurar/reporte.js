jQuery(function () {
    jQuery("#btnReporte").on("click",function () {
        generar();
    })
});

(function() {
    numeral.register('locale', 'es-es', {
        delimiters: {
            thousands: '.',
            decimal: ','
        },
        abbreviations: {
            thousand: 'k',
            million: 'mm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function (number) {
            var b = number % 10;
            return (b === 1 || b === 3) ? 'er' :
                (b === 2) ? 'do' :
                    (b === 7 || b === 0) ? 'mo' :
                        (b === 8) ? 'vo' :
                            (b === 9) ? 'no' : 'to';
        },
        currency: {
            symbol: 'BS'
        }
    });
    numeral.locale('es-es');
})();

function generar(desde,hasta){
    var criterio = jQuery("#criterio").val();
    if(desde == undefined){
        var desde = jQuery("#desde").val();
        var hasta = jQuery("#hasta").val();
    }
    if(desde == ""){
        jQuery('#msj').html("Debe ingresar una fecha de busqueda");
        jQuery('#mensajes').modal('show', {backdrop: 'static'});
        return false;
    }
    jQuery("#dd").val(desde);
    jQuery("#dh").val(hasta);
    var datos = "criterio="+criterio+"&desde="+desde+"&hasta="+hasta;
    jQuery.ajax({
        url: urlAdmin + "generar",
        data: datos,
        type: 'POST',
        dataType:"JSON",
        success: function (rep) {
            jQuery("#desde").val("");
            jQuery("#hasta").val("");
            jQuery('#tablaresp').DataTable( {
                destroy: true,
                columns: [
                    { data: 'contador' },
                    { data: 'refe' },
                    { data: 'monto' },
                    { data: 'nombre' },
                    { data: 'cedula' },
                    { data: 'fecha' },
                    { data: 'creado' },
                    { data: 'accion' },
                ],
                data: rep.datos,
                ordering:  false,
                scrollX: true,
                "sPaginationType": "bootstrap",

                "sDom": "<'row hidden-xs'<'col-xs-6 col-left'l><'col-xs-6 col-right'<'export-data'T>f>r>t<'row'<'col-sm-6 hidden-xs col-left'i><'col-sm-6 col-xs-12 col-right'p>>",
                "oTableTools": {
                    "aButtons": [
                        {
                            "sExtends":"print",
                            "sButtonText":"Imprimir"
                        }
                    ]
                },
                "aLengthMenu": [[10, 25, 5, -1], [10, 25, 5, "Todo"]],
                "bStateSave": true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ filas por pagina",
                    "zeroRecords": "Nada que mostrar",
                    "info": "Motrando _PAGE_ de _PAGES_ de _MAX_",
                    "infoEmpty": "No se encontro nada",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Busacar"
                },
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    jQuery(api.column(2).footer()).html(
                        numeral(parseFloat(total)).format('0,0[.]00 $')
                    );
                }
            } );
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

function borrar(id) {
    jQuery.ajax({
        url: urlAdmin + "borrarTransferencia/"+id,
        type: 'GET',
        success: function (rep) {
            jQuery('#msj').html(rep);
            jQuery('#mensajes').modal('show', {backdrop: 'static'});
            generar(jQuery("#dd").val(),jQuery("#dh").val());
        }
    });
    return false;
}