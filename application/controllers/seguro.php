<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguro extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Seguro_model');
    }
    
   public function index(){
        $query = $this->Seguro_model->getSeguros();
        $data['seguros'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionSeguros_view',$data);
        $this->load->view('layouts/footer');
    }

    public function cargarRegistroSeguros(){
         $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroSeguros_view');
        $this->load->view('layouts/footer');
    }

    public function registrarSeguro(){
        $seguro = array(
            'rif_aseguradora' => $this->input->post('rif_aseguradora'),
            'nombre' => $this->input->post('nombre')
        );

        $result = $this->Seguro_model->addSeguro($seguro);
        $this->index();
    }
     public function getAseguradoraFactura(){
        $rif_aseguradora = $this->input->post('rif_aseguradora');
         
        $query = $this->Seguro_model->getSeguroByRif($rif_aseguradora);
        echo json_encode($query); 
    }  
}
