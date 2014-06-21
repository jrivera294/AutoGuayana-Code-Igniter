<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargos extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cargos_model');
    }

      public function index()
      {
        $query = $this->Cargos_model->getCargos();
        $data['cargos'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionCargos_view',$data);
        $this->load->view('layouts/footer');
      }

      public function cargarRegistroCargos(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroCargos_view');
        $this->load->view('layouts/footer');
      }

    public function registrarCargo(){
        $cargo = array(
            'cod_cargo' => $this->input->post('cod_cargo'),
            'nombre' => $this->input->post('nombre'),
            'sueldo' => $this->input->post('sueldo')
        );


        $result = $this->Cargos_model->addCargo($cargo);
        $data['message_type']=1;
        $data['message']="Cargo registrado satisfactoriamente";

        $query = $this->Cargos_model->getCargos();
        $data['cargos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionCargos_view');
        $this->load->view('layouts/footer');
    }

    public function cargarEdicionCargos(){
       $cargo= array(
            'cod_cargo' => $this->input->post('cod_cargo'),
            'nombre' => $this->input->post('nombre'),
            'sueldo' => $this->input->post('sueldo')
        );

        $data['cargo']=$cargo;

        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/edicionCargos_view',$data);
        $this->load->view('layouts/footer');
     }

    public function editarCargo(){
          $cargo= array(
            'nombre' => $this->input->post('nombre'),
            'sueldo' => $this->input->post('sueldo'),
            'cod_cargo' => $this->input->post('cod_cargo')
        );
        $data['cargos']=$cargo;
        $result = $this->Cargos_model->updateCargo($cargo);

        $data['message_type']=1;
        $data['message']="Cargo Actualizado satisfactoriamente";

        //volver a copiar index
        $query = $this->Cargos_model->getCargos();
        $data['cargos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionCargos_view');
        $this->load->view('layouts/footer');
    }

}

?>
