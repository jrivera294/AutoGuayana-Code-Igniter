<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Stock_model');
    }

  /*  public function index(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/footer');
    }*/
    public function traerArticulos()
    {
        $query = $this->Stock_model->getArticulos();
        $data['articulos'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('stock/articulos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function traerVehiculos()
    {
        $query = $this->Stock_model->getVehiculos();
        $data['vehiculos'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('stock/vehiculos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function registrarArticulo(){
        $articulo =array(
            'id' => $this->input->post('id'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante'),
        );

        $result = $this->Stock_model->addArticulo($articulo);


        $this->load->view('layouts/header');
        $this->load->view('stock/articulos_view');
        $this->load->view('layouts/footer');
    }

}
?>
