<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dependientes extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Dependientes_model');
    }

    public function cargarGestionDependientes(){
        //echo "Hola Mundo";
        $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'departamento' => $this->input->post('dpto')
        );

        $dependientes = $this->Dependientes_model->getDependientes($empleado['id']);

        $data['empleado'] = $empleado;
        $data['dependientes'] = $dependientes;

        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDependientes_view',$data);
        $this->load->view('layouts/footer');
    }

    public function cargarRegistroDependientes(){
        echo "Epale registro Dependiente";
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroDependientes_view');
        $this->load->view('layouts/footer');
    }


    public function registrarDependiente(){
       $dependiente = array(
            'id_empleado' => $this->input->post('id'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'sexo' => $this->input->post('sexo'),
            'fecha_nac' => $this->input->post('fecha_nac'),
            'parentesco' => $this->input->post('parentesco'),

       );

        $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedulaE'),
            'nombre' => $this->input->post('nombreE'),
            'apellido1' => $this->input->post('apellido1E'),
            'apellido2' => $this->input->post('apellido2E'),
            'departamento' => $this->input->post('departamentoE'),
        );

        $this->Dependientes_model->addDependiente($dependiente);

        //codigo de cargar gestion dep

        $dependientes = $this->Dependientes_model->getDependientes($empleado['id']);

        $data['empleado'] = $empleado;
        $data['dependientes'] = $dependientes;
        $data['message_type']=1;
        $data['message']="Dependiente registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDependientes_view');
        $this->load->view('layouts/footer');
    }
}
