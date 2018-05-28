$(function () {
});

function envio() {
    var datos = $("#frm").serializeArray();

    $.ajax({
        url: urlUsu + 'validarUsuario',
        method: 'POST',
        dataType: 'json',
        data: datos,
        error: function () {
            alert("A ocurrido un error!");
        },
        success: function (response) {

            // Login status [success|invalid]
            var login_status = response.login_status;

            console.log(login_status);
            if (login_status == 'invalid') {
                var alert = alertify.alert('Notification', "Datos invalidos").set('label', 'Accepter');
                //alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
                alert.set('modal', true);
            }
            if (login_status == 'success') {
                // Redirect to login page
                var redi = urlPrincipal+"entrada";
                setTimeout(function () {
                    window.location.href = redi;
                }, 400);
            }
            if (login_status == 'pending') {
                var alert = alertify.alert('Notification', "Debe completar su registro").set('label', 'Accepter');
                //alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
                alert.set('modal', true);
            }
        }
    });
    return false;
}

function validarEmail() {
    console.log("Valida email");
    var email = $("#email").val();
    console.log(email);
    if (email == "") {
        return false;
    }
    //var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);


    if (caract.test(email) == false) {
        var alert = alertify.alert('Notification', 'Vous devez entrer une adresse e-mail valide').set('label', 'Accepter');
        //alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
        alert.set('modal', true);

        $("#email").val("");

        return false;
    }
    return true;
}

function modalRecovery(){
    alertify.genericDialog ($('#frm-recovery')[0]).set('selector', 'input[type="email"]');
}

alertify.genericDialog || alertify.dialog('genericDialog',function(){
    return {
        main:function(content){
            this.setContent(content);
        },
        setup:function(){
            return {
                focus:{
                    element:function(){
                        return this.elements.body.querySelector(this.get('selector'));
                    },
                    select:true
                },
                options:{
                    basic:true,
                    maximizable:false,
                    resizable:false,
                    padding:true
                }
            };
        },
        settings:{
            selector:undefined
        }
    };
});