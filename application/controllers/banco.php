<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banco extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Banco_model');
    }
    
     public function getBancoFactura(){
        $rif_banco = $this->input->post('rif_banco');
         
        $query = $this->Banco_model->getBancoByRif($rif_banco);
        echo json_encode($query); 
    }  
}