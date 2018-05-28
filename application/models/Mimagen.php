<?php
/**
 *
 * @subpackage fisico
 * @author Judelvis Rivas
 * @since Version 1.0
 *
 */
class Mimagen extends CI_Model {
    var $directorio;
    var $nombre;
    var $nombre2;
    var $tipo;
    var $tamano;
    var $temporal;
    var $ruta;
    function __construct() {
        parent::__construct ();
    }
    function cargar($imagen,$ruta,$nom=null) {
        $this->directorio = $ruta;
        $this->nombre = $imagen['name'];
        $this->nombre2 = $nom;
        $this->tipo = $imagen['type'];
        $this->tamano = $imagen['size'];
        $this->temporal = $imagen['tmp_name'];
    }

    function salvar($tam1,$tam2,$metodo) {
        $t = '';
        $nomb = $this->nombre;

        if($this->nombre2 != null) $nomb = $this->nombre2;
        $this->ruta = $this->directorio . '/' . $nomb;
        if (! move_uploaded_file ( $this->temporal, $this->ruta )) {
            $arr = FALSE;
        } else {
            $arr = TRUE;

            switch($metodo){
                case 1: $t  = $this -> crearThumbnailRecortado($this->ruta, $this->directorio . '/miniatura/' . $nomb, $tam1, $tam2);
                    break;
                case 2: $t = $this -> crearThumbnail2($this->ruta, $this->directorio . '/miniatura/' . $nomb,  $tam1, $tam2);
                    break;
                default: $t  = $this -> crearThumbnailRecortado($this->ruta, $this->directorio . '/miniatura/' . $nomb, $tam1, $tam2);
                    break;
            }
        }
        $res['respuesta'] = $arr;
        $res['mensaje'] = $t;
        return $res;
    }


    function crearThumbnail2($nombreImagen, $nombreThumbnail, $nuevoAncho, $nuevoAlto) {

        // Obtiene las dimensiones de la imagen.
        list ( $ancho, $alto ) = getimagesize ( $nombreImagen );

        // Comprueba que medida es menor para ponerle luego bordes.
        if ($ancho > $alto) {
            $anchoImagen = $nuevoAncho;
            $factorReduccion = $ancho / $nuevoAncho;
            $altoImagen = $alto / $factorReduccion;
        } else {
            $altoImagen = $nuevoAlto;
            $factorReduccion = $alto / $nuevoAlto;
            $anchoImagen = $ancho / $factorReduccion;
        }

        // Abre la imagen original.
        list ( $imagen, $tipo ) = $this -> abrirImagen ( $nombreImagen );

        // Crea la nueva imagen (el thumbnail).
        $thumbnail = imagecreatetruecolor( $nuevoAncho, $nuevoAlto );
        $negro = imagecolorallocate($thumbnail, 0, 0, 0);

// Hacer el fondo transparente
        imagecolortransparent($thumbnail, $negro);
// Hacer el fondo transparente
        //imagecolortransparent($thumbnail, $negro);
        imagecopyresampled ( $thumbnail, $imagen, ($nuevoAncho - $anchoImagen) / 2, ($nuevoAlto - $altoImagen) / 2, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto );

        // Guarda la imagen.
        return $this -> guardarImagen ( $thumbnail, $nombreThumbnail.".png", "image/png" );
    }

    function crearThumbnailRecortado($nombreImagen, $nombreThumbnail, $nuevoAncho, $nuevoAlto){

        // Obtiene las dimensiones de la imagen.
        list($ancho, $alto) = getimagesize($nombreImagen);

        // Si la division del ancho de la imagen entre el ancho del thumbnail es mayor
        // que el alto de la imagen entre el alto del thumbnail entoces igulamos el
        // alto de la imagen  con el alto del thumbnail y calculamos cual deberia ser
        // el ancho para la imagen (Seria mayor que el ancho del thumbnail).
        // Si la relacion entre los altos fuese mayor entonces el altoImagen seria
        // mayor que el alto del thumbnail.
        if ($ancho/$nuevoAncho > $alto/$nuevoAlto){
            $altoImagen = $nuevoAlto;
            $factorReduccion = $alto / $nuevoAlto;
            $anchoImagen = $ancho / $factorReduccion;
        }
        else{
            $anchoImagen = $nuevoAncho;
            $factorReduccion = $ancho / $nuevoAncho;
            $altoImagen = $alto / $factorReduccion;
        }

        // Abre la imagen original.
        list($imagen, $tipo)= $this ->abrirImagen($nombreImagen);

        // Crea la nueva imagen (el thumbnail).
        $thumbnail = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        $thumbnail = imagecolorallocate($thumbnail, 255, 255, 255);

        // Si la relacion entre los anchos es mayor que la relacion entre los altos
        // entonces el ancho de la imagen que se esta creando sera mayor que el del
        // thumbnail porlo que se centrara para que se corte por la derecha y por la
        // izquierda. Si el alto fuese mayor lo mismo se cortaria la imagen por arriba
        // y por abajo.
        if ($ancho/$nuevoAncho > $alto/$nuevoAlto){
            imagecopyresampled($thumbnail , $imagen, ($nuevoAncho-$anchoImagen)/2, 0, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto);
        }  else {
            imagecopyresampled($thumbnail , $imagen, 0, ($nuevoAlto-$altoImagen)/2, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto);
        }

        // Guarda la imagen.
        return $this ->guardarImagen($thumbnail, $nombreThumbnail, $tipo);
    }
    function abrirImagen($nombre) {
        $info = getimagesize ( $nombre );
        switch ($info ["mime"]) {
            case "image/jpeg" :
                $imagen = imagecreatefromjpeg ( $nombre );
                break;
            case "image/gif" :
                $imagen = imagecreatefromgif ( $nombre );
                break;
            case "image/png" :
                $imagen = imagecreatefrompng ( $nombre );
                break;
            default :
                echo "Error: No es un tipo de imagen permitido.";
        }
        $resultado [0] = $imagen;
        $resultado [1] = $info ["mime"];
        return $resultado;
    }
    function guardarImagen($imagen, $nombre, $tipo) {
        switch ($tipo) {
            case "image/jpeg" :
                imagejpeg ( $imagen, $nombre, 100 ); // El 100 es la calidade de la imagen (entre 1 y 100. Con 100 sin compresion ni perdida de calidad.).
                break;
            case "image/gif" :
                imagegif ( $imagen, $nombre );
                break;
            case "image/png" :
                imagepng ( $imagen, $nombre, 9 ); // El 9 es grado de compresion de la imagen (entre 0 y 9. Con 9 maxima compresion pero igual calidad.).
                break;
            default :
                echo "Error: Tipo de imagen no permitido.";
        }
    }
}
?>