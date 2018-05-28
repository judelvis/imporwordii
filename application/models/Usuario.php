<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 * @author
 * @since
 *
 */


class Usuario extends CI_Model {

    var $token = null;

    function __construct() {
        $this -> load -> database();
    }
    function validarUsuario($arg = null) {
        $existe = $this -> db -> query("SELECT * FROM usuarios WHERE login='{$arg['username']}' AND clave=sha1('{$arg['password']}')");
        $cant = $existe->num_rows();
        $respuesta = array("login_status"=>"invalid");
        if($cant > 0){
            $this->_entrarAdmin($existe->row());
            $respuesta = array("login_status"=>"success");
        }else{
            $this->_salir();
        }
        return $respuesta;
    }

    private function _entrarAdmin($usu) {
        $newuser = array(
            'transfer_login'  => $usu->login,
            'transfer_nombre'=> $usu->nombre,
            'transfer_apellido'=> $usu->apellido,
            'transfer_id'=> $usu->id,
        );
        $this->session->set_userdata($newuser);
    }

    private function _salir() {
        $this->session->sess_destroy();
    }
    function __destruct() {
        unset($this -> Usuario);
    }

    function guardarQuiniela($dat){
        $usu = $this->session->userdata("quiniela_id");
        $grupo = $this->session->userdata("quiniela_grupo");
        foreach ($dat["id_encuentro"] as $pos=>$idenc){
            $insert= array("id_grupo"=>$grupo,"id_usu"=>$usu,"id_encuentro"=>$idenc,"gol_req1"=>$dat["gol_req1"][$pos],"gol_req2"=>$dat["gol_req2"][$pos]);
            $res = $this->db->insert("persona_resultado",$insert);
        }
        if($res) return "Se registro con exito";
        return "Error al registrar su quineiela";
    }

    function crearJugador($data){
        $resp =array("resp"=>0,"mensaje"=>'');
        $clavenueva = $this->claveAleatoria();
        $insertar = array(
            "nombre"=>$data['nombre'],
            "apellido"=>$data["apellido"],
            "cedula"=>$data["cedula"],
            "telefono"=>$data["telefono"],
            "clave"=>sha1($clavenueva),
            "tipo"=>1,
            "idgrupo"=>$this->session->userdata("quiniela_grupo")
        );
        $val1 = $this->db->query("SELECT * FROM usuarios WHERE cedula ='".$data['cedula']."'");
        if($val1 -> num_rows() > 0) return array("resp"=>0,"mensaje"=>'Usuario ya se encuentra registrado');

        if($this->db->insert("usuarios", $insertar)){
           /* if ($data['tipoCuenta'] == 1){
                $insertar2=array("idu"=> $this->db->insert_id());
                $this->db->insert("cui_sol_empresa", $insertar2);
            }*/
            return array("resp"=>1,"mensaje"=>'Se Registro con Exito, ya puede Ingresar.Su clave de acceso es:'.$clavenueva);
        }else{
            return array("resp"=>0,"mensaje"=>'Error al Ingresar');
        }
    }

    function claveAleatoria()
    {
        $numcaracteres = 4;
        $caracteres = array('e', 'M', 'm', 'n');
        if ($numcaracteres >= 2 && $numcaracteres <= 4) {
            $mayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $minusculas = "abcdefghijklmnopqrstuvwxyz";
            $numeros = "0123456789";
            $c_especiales = "?!*-+_%#/=()";
            $aux = floor($numcaracteres / count($caracteres));
            $residuo = $numcaracteres % count($caracteres);
            $bandera = false;
            if ($residuo != 0) $bandera = true;
            for ($i = 0; $i < count($caracteres); $i++) {
                if ($caracteres[$i] == "m") {
                    if ($bandera) {
                        $bandera = false;
                        $max = $aux + $residuo;
                    } else $max = $aux;
                    for ($x = 0; $x < $max; $x++) $arraypassword[] = substr($minusculas, rand(0, strlen($minusculas) - 1), 1);
                }
                if ($caracteres[$i] == "M") {
                    if ($bandera) {
                        $bandera = false;
                        $max = $aux + $residuo;
                    } else $max = $aux;
                    for ($x = 0; $x < $max; $x++) $arraypassword[] = substr($mayusculas, rand(0, strlen($mayusculas) - 1), 1);
                }
                if ($caracteres[$i] == "n") {
                    if ($bandera) {
                        $bandera = false;
                        $max = $aux + $residuo;
                    } else $max = $aux;
                    for ($x = 0; $x < $max; $x++) $arraypassword[] = substr($numeros, rand(0, strlen($numeros) - 1), 1);
                }
                if ($caracteres[$i] == "e") {
                    $max = $aux;
                    for ($x = 0; $x < $max; $x++) $arraypassword[] = substr($c_especiales, rand(0, strlen($c_especiales) - 1), 1);
                }
            }
            shuffle($arraypassword);
            $clave = "";
            foreach ($arraypassword as $caracter) $clave .= $caracter;
        }
        return $clave;
    }
}
