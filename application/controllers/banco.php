<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banco extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Banco_model');
    }
    
    public function index(){
        $query = $this->Banco_model->getBancos();
        $data['bancos'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionBancos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function cargarRegistroBancos(){
         $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroBancos_view');
        $this->load->view('layouts/footer');
    }

    public function registrarBanco(){
        $banco = array(
            'rif_banco' => $this->input->post('rif_banco'),
            'nombre' => $this->input->post('nombre')
        );


        $result = $this->Banco_model->addBanco($banco);
        $this->index();
        /*$data['message_type']=1;
        $data['message']="Departamento registrado satisfactoriamente";

        $query = $this->Departamentos_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDepartamentos_view');
        $this->load->view('layouts/footer');*/
    }
     public function getBancoFactura(){
        $rif_banco = $this->input->post('rif_banco');
         
        $query = $this->Banco_model->getBancoByRif($rif_banco);
        echo json_encode($query); 
    }  
}
