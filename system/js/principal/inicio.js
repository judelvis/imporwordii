$(function () {
    $("#tipoCuenta option[value='']").attr("selected",true)
    $("#frmlogin").on("submit",function (event) {
        $(this).prevent_default;
        var datos = $(this).serialize();
        //alert(datos);
        $.ajax({
            url:urlPrincipal+"validarCliente",
            type:"POST",
            data:datos,
            dataType:"json",
            success:function(respuesta){
                if(respuesta.login_status == "invalid"){
                    $("#mensaje").html("<p>clave invalida</p>");
                    $(".popup-content").show();
                }else{
                    location.href=sUrl;
                }
            }
        });
        return false;
    });
    $("#frmregistro").on("submit",function (event) {
        $(this).prevent_default;
        var datos = $(this).serialize();
        var cl1 = $("#clave1").val();
        var cl2 = $("#clave2").val();
        if(cl1 != cl2){
            $("#mensaje").html("<p>Las contraseñas no coincide</p>");
            $(".popup-content").show();
            return false;
        }
        //alert(datos);
        $.ajax({
            url:urlPrincipal+"registrarCliente",
            type:"POST",
            data:datos,
            dataType:"json",
            success:function(respuesta){
                $("#mensaje").html("<p>"+respuesta.mensaje+"</p>");
                $(".popup-content").show();
                if(respuesta.resp == 1){
                    $('#frmregistro').each(function () {
                        this.reset();
                    });
                }
            }
        });

        return false;
    });
});

function verificarTipo(){
    var tc = $("#tipoCuenta").val();
    if( tc== ""){
        $("#datosRegistro").hide();
    }else{
        $("#datosRegistro").show();
        if(tc == 0){
            $("#codigo").attr("placeholder","SU DNI");
            $("#nombre").attr("placeholder","NOMBRE Y APELLIDO");
            $(".personal").show();
            $(".mayorista").hide();
        }else{
            $(".personal").hide();
            $(".mayorista").show();
            $("#codigo").attr("placeholder","SU NIF");
            $("#nombre").attr("placeholder","EMPRESA");
        }
    }
}