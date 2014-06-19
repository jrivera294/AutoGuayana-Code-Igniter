<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seguro extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Seguro_model');
    }
    
     public function getAseguradoraFactura(){
        $rif_aseguradora = $this->input->post('rif_aseguradora');
         
        $query = $this->Seguro_model->getSeguroByRif($rif_aseguradora);
        echo json_encode($query); 
    }  
}