<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Empleados_model');
        $this->load->model('Departamentos_model');
        $this->load->model('Cargos_model');
    }

   /* public function index(){

        $query = $this->Empleados_model->getEmpleados();
        $data['empleados'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('layout/adminSidebar');
        $this->load->view('empleados/gestionEmpleados_view',$data);
        $this->load->view('layouts/footer');

    }*/



    public function cargarRegistroEmpleados(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroEmpleados_view');
        $this->load->view('layouts/footer');
    }



     public function registrarEmpleado(){
        $empleado = array(
            'password' => $this->input->post('password1'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'sexo' => $this->input->post('sexo'),
            'dir' => $this->input->post('dir'),
            'fecha_nac' => $this->input->post('fecha_nac'),
           // 'fecha_contr' => $this->input->post('fecha_contr'),
            'cod_cargo' => $this->input->post('cod_cargo'),
            'cod_dpto' => $this->input->post('cod_dpto'),
        );

       // $this->transaction->start(); //INICIA LA TRANSACCION

       /* $result = $this->Empleados_model->addEmpleado($empleado);
         $id = $this->Empleados_model->getIdEmpleado($empleado['cedula']);*/
         $tlf = array();
         $correos = array();
         for ($i=0 ; $i < count($_POST) ; $i++ ){
            if (!empty($this->input->post('telefono'.$i)))
               /* foreach($id as $pk)
                    $result_telefono = $this->Empleados_model->addTelefonoEmpleado($_POST['telefono'.$i],$pk->id);*/
                $tlf[$i] = $this->input->post('telefono'.$i);
        }
        for ($i=0 ; $i < count($_POST) ; $i++ ){
            if (!empty($_POST['correo'.$i]))
                /*foreach($id as $pk)
                    $result_correo = $this->Empleados_model->addCorreoEmpleado($_POST['correo'.$i],$pk->id);*/
                $correos[$i] = $this->input->post('correo'.$i);

        }
         $this->Empleados_model->addEmpleado($empleado,$tlf,$correos);
   //     $this->transaction->complete(); //FINALIZA LA TRANSACCION

        //preparar info del vehiculo y desplegar index agaiinnn
        $data['message_type']=1;
        $data['message']="Empleado registrado satisfactoriamente";

         //codigo de gestion empleado
        $query = $this->Empleados_model->getEmpleados();
        $i=0;
        $cargos = array();
        $departamentos = array();
        foreach ($query as $row){

                $cargos[$i] = $this->Cargos_model->getNombreCargo($row->cod_cargo);
                $departamentos[$i] = $this->Departamentos_model->getNombreDpto($row->cod_dpto);

            $i++;
        }

       $data['empleados'] = $query;
       $data['departamentos'] = $departamentos;
       $data['cargos'] = $cargos;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionEmpleados_view');
        $this->load->view('layouts/footer');
    }






    public function cargarGestionEmpleados(){
        $query = $this->Empleados_model->getEmpleados();
        $i=0;
        $cargos = array();
        $departamentos = array();
        foreach ($query as $row){

                $cargos[$i] = $this->Cargos_model->getNombreCargo($row->cod_cargo);
                $departamentos[$i] = $this->Departamentos_model->getNombreDpto($row->cod_dpto);

            $i++;
        }

       $data['empleados'] = $query;
       $data['departamentos'] = $departamentos;
       $data['cargos'] = $cargos;

          /*  foreach($empleados as $e){
                    echo $e['nombre'];
                    echo "<br>";
                    echo $e['departamento'];
                    echo "<br>";
                    echo $e['cargo'];
                    echo "<br>";

            }*/
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionEmpleados_view',$data);
        $this->load->view('layouts/footer');
    }

    public function cargarEdicionEmpleados(){
       $empleado = array(
            'id' => $this->input->post('id'),
            'password' => $this->input->post('password1'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'sexo' => $this->input->post('sexo'),
            'dir' => $this->input->post('dir'),
            'fecha_nac' => $this->input->post('fecha_nac'),
            'fecha_contr' => $this->input->post('fecha_contr'),
            'status' => $this->input->post('status'),
            'cod_cargo' => $this->input->post('cod_cargo'),
            'cod_dpto' => $this->input->post('cod_dpto'),
        );

        $data['empleado']=$empleado;
        $data['telefonos'] = $this->Empleados_model->getTelefonosEmpleado($empleado['id']);
        $data['correos'] = $this->Empleados_model->getCorreosEmpleado($empleado['id']);

        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/edicionEmpleados_view',$data);
        $this->load->view('layouts/footer');

    }

    public function editarEmpleado(){
        $empleado = array(
            'password' => $this->input->post('password'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'dir' => $this->input->post('dir'),
            'status' => $this->input->post('status'),
            'cod_cargo' => $this->input->post('cod_cargo'),
            'cod_dpto' => $this->input->post('cod_dpto'),
            'id' => $this->input->post('id')
        );
        $this->Empleados_model->updateEmpleado($empleado);

         $query = $this->Empleados_model->getEmpleados();
        $i=0;
        $cargos = array();
        $departamentos = array();
        foreach ($query as $row){

                $cargos[$i] = $this->Cargos_model->getNombreCargo($row->cod_cargo);
                $departamentos[$i] = $this->Departamentos_model->getNombreDpto($row->cod_dpto);

            $i++;
        }

       $data['empleados'] = $query;
       $data['departamentos'] = $departamentos;
       $data['cargos'] = $cargos;

        $data['message_type']=1;
        $data['message']="Empleado actualizado satisfactoriamente";
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionEmpleados_view');
        $this->load->view('layouts/footer');

    }

    public function cargarContactosEmpleado(){
        $idEmpleado = $this->input->post('id');

        $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'departamento' => $this->input->post('dpto')
        );
        $telefonos = $this->Empleados_model->getTelefonosEmpleado($empleado['id']);
        $correos = $this->Empleados_model->getCorreosEmpleado($empleado['id']);

        $data['empleado'] = $empleado;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $this->load->view('layouts/header',$data);
        $this->load->view('admin/gestionContactos_view');
        $this->load->view('layouts/footer');
    }

    public function agregarCorreo(){
      /* $correo = array(
            'id' => $this->input->post('id'),
            'correo' => $this->input->post('correo')
       );*/
        $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'departamento' => $this->input->post('dpto')
        );
        echo $empleado['id'];
        $this->Empleados_model->addCorreoEmpleado($this->input->post('correo'),$empleado['id']);
       // $this->cargarContactosEmpleado();

        $telefonos = $this->Empleados_model->getTelefonosEmpleado($empleado['id']);
        $correos = $this->Empleados_model->getCorreosEmpleado($empleado['id']);

        $data['empleado'] = $empleado;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $data['message_type']=1;
        $data['message']="Correo registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionContactos_view');
        $this->load->view('layouts/footer');
    }

    public function eliminarCorreo(){
        $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'departamento' => $this->input->post('dpto')
        );

        $this->Empleados_model->deleteCorreoEmpleado($empleado['id'],$this->input->post('correo'));

        $telefonos = $this->Empleados_model->getTelefonosEmpleado($empleado['id']);
        $correos = $this->Empleados_model->getCorreosEmpleado($empleado['id']);

        $data['empleado'] = $empleado;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $data['message_type']=1;
        $data['message']="Correo eliminado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionContactos_view');
        $this->load->view('layouts/footer');

    }

    public function agregarTelefono(){
      /* $correo = array(
            'id' => $this->input->post('id'),
            'correo' => $this->input->post('correo')
       );*/
        $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'departamento' => $this->input->post('dpto')
        );
        echo "id traido".$empleado['id']."<br>";
        echo "ci" .$empleado['cedula']."<br>";
        echo "departamento".$empleado['departamento']."<br>";
        $this->Empleados_model->addTelefonoEmpleado($this->input->post('telefono'),$empleado['id']);
     //   $this->cargarContactosEmpleado();

         $telefonos = $this->Empleados_model->getTelefonosEmpleado($empleado['id']);
        $correos = $this->Empleados_model->getCorreosEmpleado($empleado['id']);

        $data['empleado'] = $empleado;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;
        $data['message_type']=1;
        $data['message']="Telefono registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionContactos_view');
        $this->load->view('layouts/footer');
    }

    public function eliminarTelefono(){
         $empleado = array(
            'id' => $this->input->post('id'),
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'departamento' => $this->input->post('dpto')
        );

        $this->Empleados_model->deleteTelefonoEmpleado($empleado['id'],$this->input->post('telefono'));

        $telefonos = $this->Empleados_model->getTelefonosEmpleado($empleado['id']);
        $correos = $this->Empleados_model->getCorreosEmpleado($empleado['id']);

        $data['empleado'] = $empleado;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $data['message_type']=1;
        $data['message']="Telefono eliminado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionContactos_view');
        $this->load->view('layouts/footer');
    }

    public function eliminarEmpleado(){
        $this->Empleados_model->deleteEmpleado($this->input->post('id'));
        $this->cargarGestionEmpleados();
    }

}
