<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamentos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Departamentos_model');
    }

      public function index()
      {
        $query = $this->Departamentos_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDepartamentos_view',$data);
        $this->load->view('layouts/footer');
      }

     public function cargarRegistroDepartamentos(){
         $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroDepartamentos_view');
        $this->load->view('layouts/footer');
     }

}

?>
