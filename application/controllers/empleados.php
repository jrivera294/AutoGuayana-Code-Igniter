<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){


    }

    public function cargarRegistroEmpleados(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroEmpleados_view');
        $this->load->view('layouts/footer');
    }
}
