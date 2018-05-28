var sUrl = 'http://' + window.location.hostname + '/transfer';
var urlPrincipal = sUrl + '/principal/';
var urlAdmin = sUrl + '/admin/';
var urlUsu = sUrl + '/usuarios/';
var sImg = sUrl + '/system/images/';
var sMaq = sUrl + '/system/assets/';
var sJs = sUrl + '/system/js/';
function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = "0123456789";
    especiales = [8, 37, 39, 46,13,9];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (numeros.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46,9,13,17];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function Especiales(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
    especiales = [8, 37, 39, 46, 9, 17,13];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function SoloMonto(event,elemento) {
    var key = event.keyCode || event.which;
    var tecla = String.fromCharCode(key).toLowerCase();
    var numeros = "0123456789";
    var especiales = [8, 37, 39, 13, 9,46];
    if(key == 46){
        if(elemento.value.indexOf(".") != -1 || elemento.value == ""){
            return false;
        }
    }

    var tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (numeros.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
    return true;
}

function include(url){
    document.write('<script src="'+sMaq+url+'"></script>');
    return false ;
}

function abrirVentana(url) {
    valor = Math.floor((Math.random() * 100) + 1);
    window.open(url, "nuevo" + valor, "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}