<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturar extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('layouts/header');
        $this->load->view('facturar_view');
        $this->load->view('layouts/footer');   
    }
    
    public function save(){
        //Generar arreglo de datos
            //Id cliente
            //Id vehiculo
            //Arreglo de ids accesorios
            //Información de financiamiento
            //rif aseguradora
            //rif banco en caso de haberlo
            //Comisión
        
        //Realizar transacción
        
        //If transacción exitosa
            //Generar pdf factura
        //Sino
            //Mostrar error y permitir volver atrás
    }
}
?>