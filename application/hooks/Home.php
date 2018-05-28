<?php/*
if (!defined( 'BASEPATH')) exit('No direct script access allowed');
session_start();
class Home
{
    private $ci;
    public function __construct()
    {
        $this->ci =& get_instance();
        !$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;
    }

    public function check_login()
    {

        if(!isset(session) && $this->ci->uri->segment(2) != "login" && $this->ci->uri->segment(2) != "validarUsuario")
        {
            redirect(base_url()."index.php/principal/login");
		}
	}
}

/end hooks/home.php
*/