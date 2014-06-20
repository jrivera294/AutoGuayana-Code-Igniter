<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Departamento_model');
    }

      public function index()
      {
        $query = $this->Departamento_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('stock/articulos_view',$data);
        $this->load->view('layouts/footer');
      }

}

?>
