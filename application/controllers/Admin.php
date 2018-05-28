<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 * @author: Mauricio Barrios
 * E-mail: mjbr.poet@gmail.com
 *
 */
class Admin extends CI_Controller {

    public $img = "";
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }

// Funciones Usadas
    public function index()
    {
        if($this->session->has_userdata('transfer_login')){
            $this->inicio();
        }else{
            $this->login();
        }
    }

    function login(){
        $data["jdu"] = "";
        $this->load->view('admin/login',$data);
    }

    function inicio(){
        if($this->session->has_userdata('transfer_login')) {
            $datos["vista"] = "admin/configurar/inicio";
            $this->load->view("admin/incluir/head");
            $this->load->view('admin/dashboart', $datos);
            $js["vista"] = "configurar/inicio.js";
            $this->load->view("admin/incluir/script", $js);
        }else{
            redirect(site_url("admin"));
        }
    }

    function datosOrden($id=null){
        $this->load->model("servicios","serv");
        echo json_encode($this->serv->datosOrden($id));
    }

    function crear(){
        if($this->session->has_userdata('transfer_login')) {
            $datos["vista"] = "admin/configurar/crear";
            $this->load->view("admin/incluir/head");
            $this->load->view('admin/dashboart', $datos);
            $js["vista"] = "configurar/crear.js";
            $this->load->view("admin/incluir/script", $js);
        }else{
            redirect(site_url("admin"));
        }
    }

    function verificar(){
        $this->load->model("servicios","serv");
        echo json_encode($this->serv->verificar($_POST["referencia"]));
    }

    function registrar(){
        $this->load->model("servicios","serv");
        echo $this->serv->registrar($_POST);
    }

    function reporte(){
        if($this->session->has_userdata('transfer_login')) {
            $datos["vista"] = "admin/configurar/reporte";
            $this->load->view("admin/incluir/head");
            $this->load->view('admin/dashboart', $datos);
            $js["vista"] = "configurar/reporte.js";
            $this->load->view("admin/incluir/script", $js);
        }else{
            redirect(site_url("admin"));
        }

    }

    function generar(){
        $this->load->model("servicios","serv");
        echo json_encode($this->serv->generar($_POST));
    }

    function borrarTransferencia($id){
        $this->load->model("servicios","serv");
        echo $this->serv->borrarTransferencia($id);
    }

    function salir(){
        session_destroy();
        $array_items = array('quinela_login', 'quinela_email','quinela_tipo','quinela_nombre','quinela_apellido');

        $this->session->unset_userdata($array_items);
        redirect(site_url('admin'));
    }
}
