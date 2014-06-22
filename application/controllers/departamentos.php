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

     public function registrarDepartamento(){
        $departamento = array(
            'cod_dpto' => $this->input->post('cod_dpto'),
            'nombre' => $this->input->post('nombre')
        );


        $result = $this->Departamentos_model->addDepartamento($departamento);
        $data['message_type']=1;
        $data['message']="Departamento registrado satisfactoriamente";

        $query = $this->Departamentos_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDepartamentos_view');
        $this->load->view('layouts/footer');
    }

     public function cargarEdicionDepartamentos(){
       $departamento = array(
            'cod_dpto' => $this->input->post('cod_dpto'),
            'nombre' => $this->input->post('nombre')
        );

        $data['departamento']=$departamento;

         $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/edicionDepartamentos_view',$data);
        $this->load->view('layouts/footer');
     }

     public function editarDepartamento(){
        $departamento = array(
            'nombre' => $this->input->post('nombre'),
            'cod_dpto' => $this->input->post('cod_dpto')
        );
        $data['departamentos']=$departamento;
        $result = $this->Departamentos_model->updateDepartamento($departamento);

        $data['message_type']=1;
        $data['message']="Departamento Actualizado satisfactoriamente";

        //volver a copiar index
        $query = $this->Departamentos_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDepartamentos_view');
        $this->load->view('layouts/footer');
    }


}

?>
