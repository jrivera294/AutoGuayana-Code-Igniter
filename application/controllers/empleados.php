<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleados extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Empleados_model');
        $this->load->model('Departamentos_model');
        $this->load->model('Cargos_model');
        $this->load->library("mpdf");
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

    public function desempenio (){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/desempenioGeneral_view');
        $this->load->view('layouts/footer');
    }

    public function desempenioTodos(){

      /*  echo"hola mundo";
        echo "fecha_inicio:(".$this->input->post('fecha_inicio').")";
        echo "fecha_fin:(".$this->input->post('fecha_fin').")";*/
        if ($this->input->post('fecha_fin')=="" || $this->input->post('fecha_inicio')==""){
            $data['message_type']=1;
            $data['message']="Ingrese fecha";
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/adminSidebar');
            $this->load->view('admin/desempenioGeneral_view');
            $this->load->view('layouts/footer');
            return;
        }
        $datos = array(
            "fecha_inicio" =>$this->input->post('fecha_inicio'),
            "fecha_fin" => $this->input->post('fecha_fin')
        );

       $this->mpdf->mPDF('utf-8','A4');
       $info = $this->Empleados_model->desempenio($datos,0);
       $empleados = $this->Empleados_model->getEmpleados();

        $nombreDpto = array();
         $i=0;
        foreach ($empleados as $emp){
            $nombreDpto[$i++] = $this->Departamentos_model->getNombreDpto($emp->cod_dpto);
        }
        $data['departamento']=$nombreDpto;
        $data['fecha_inicio']=$this->input->post('fecha_inicio');
        $data['fecha_fin']=$this->input->post('fecha_fin');
        $data['empleado'] = $empleados;
        $data['info'] = $info;
        $data['individual'] = 1;


            $html=$this->load->view('pdf/desempenio_view_pdf.php',$data, true);


            //ESCRIBIMOS AL PDF
            $this->mpdf->WriteHTML($html,2);

            //SALIDA DE NUESTRO PDF
            $this->mpdf->Output();
    }
     public function desempenioInd(){

      /*  echo"hola mundo";
        echo "fecha_inicio:(".$this->input->post('fecha_inicio').")";
        echo "fecha_fin:(".$this->input->post('fecha_fin').")";*/
        if ($this->input->post('fecha_fin')=="" || $this->input->post('fecha_inicio')=="" || $this->input->post('id')==""){
            $data['message_type']=1;
            $data['message']="Ingrese datos correctamente";
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/adminSidebar');
            $this->load->view('admin/desempenioGeneral_view');
            $this->load->view('layouts/footer');
            return;
        }
        $datos = array(
            "fecha_inicio" =>$this->input->post('fecha_inicio'),
            "fecha_fin" => $this->input->post('fecha_fin'),
            "id" => $this->input->post('id')
        );

        $info = $this->Empleados_model->desempenio($datos,1);
        $empleado = $this->Empleados_model->getEmpleado_ById($this->input->post('id'));
        $nombreDpto = array();
         $i=0;
        foreach ($empleado as $emp){
            $nombreDpto[$i++] = $this->Departamentos_model->getNombreDpto($emp->cod_dpto);
        }
        $data['departamento']=$nombreDpto;
        $data['fecha_inicio']=$this->input->post('fecha_inicio');
        $data['fecha_fin']=$this->input->post('fecha_fin');
        $data['empleado'] = $empleado;
        $data['info'] = $info;
        $data['individual'] = 1;
        $this->load->view('pdf/desempenio_view_pdf',$data);
    }

    public function top5 (){
       // echo "hola mundo top5<br>";
        $top5 = $this->Empleados_model->getTop5();
        $top5_porAnios = array();
        $i=0;
       /* foreach ($top5 as $emp){
            echo "cedula: ".$emp->cedula."<br>";
            echo "nombre: ".$emp->nombre."<br>";
            echo "total: ".$emp->total."<br>";
            echo "<br><br>";
        }*/
        foreach($top5 as $emp)
            $cedulas[$i++] = $emp->cedula;

        $top5_porAnios= $this->Empleados_model->getTop5porAnios($cedulas);

       /* foreach ( $top5_porAnios as $top5a){
            echo $top5a->cedula." ".$top5a->total." ".$top5a->anio."<br>";
        }*/
        $anioActual =  date("Y");
        $arrayAux = array();
        $arrayFinal = array();
       for ($i = 0 ; $i < 5 ; $i++){
            foreach ($top5_porAnios as $top5a){
                if ($cedulas[$i] == $top5a->cedula)
                    $arrayFinal["$top5a->anio"] = $top5a->total;
            }

                foreach ($top5 as $emp){
                    if ($emp->cedula== $cedulas[$i]){
                        $arrayFinal["cedula"] = $emp->cedula;
                        $arrayFinal["nombre"] = $emp->nombre;
                        $arrayFinal["apellido1"] = $emp->apellido1;
                        $arrayFinal["apellido2"] = $emp->apellido2;
                        $arrayFinal["total"] = $emp->total;

                    }
            }
           $arrayAux[$i] = $arrayFinal;
           for ($anio_actual =date("Y") ; $anio_actual >= date("Y")-3 ; $anio_actual-- ){
                $arrayFinal["$top5a->anio"] ="";
           }
        }
        foreach($arrayAux as $array){
            echo "<br>";
            echo "cedula: ".$array["cedula"]."<br>";
            echo "nombre: ".$array["nombre"]."<br>";
            echo "total".$array["total"]."<br>";
            echo "2014 ".$array["2014"]."<br>";
            echo "2013 ".$array["2013"]."<br>";
            echo "2012 ".$array["2012"]."<br>";
            echo "2011 ".$array["2011"]."<br>";
             echo "<br>";
        }
        $ventasAnios = $this->Empleados_model->getVentasPorAnio();

        foreach ($ventasAnios as $ven){
            echo "anio:".$ven->anio."  total  ";
            echo $ven->total."<br>";
        }
    }
    public function eliminarEmpleado(){
        $this->Empleados_model->deleteEmpleado($this->input->post('id'));
        $this->cargarGestionEmpleados();
    }

}
