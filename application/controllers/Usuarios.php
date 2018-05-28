<?php
/*
 * Desarrolado por judprog and kazike
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    function index(){
        //$this->register();
        echo "llega";
    }

    function validarUsuario(){
        $this->load->model('usuario', 'Usuario');
        echo json_encode($this->Usuario->validarUsuario($_POST));
    }

    function RegistrarUsuario(){
        $this->load->model('usuario', 'Usuario');
        //print_R($_POST);
        echo json_encode($this->Usuario->crearJugador($_POST));
    }
    function crear(){
        if($this->session->userdata('tipo' ) == 0) {
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $datos['csrf'] = $csrf;
            $this->load->model("usuario", "Usuario");
            $datos["vista"] = "admin/registro";
            $this->load->view("admin/incluir/head");
            $this->load->view('admin/dashboart', $datos);
            $js["vista"] = "configurar/registro.js";
            $this->load->view("admin/incluir/script", $js);
        }else{
            redirect(site_url("principal"));
        }
    }

    function salir(){
        session_destroy();
        $array_items = array('quiniela_login', 'quiniela_grupo','quiniela_tipo','quiniela_nombre','quiniela_apellido','quiniela_id');

        $this->session->unset_userdata($array_items);
        redirect(site_url('principal'));
    }


}