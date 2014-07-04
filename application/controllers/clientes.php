<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->model('Factura_model');
        $this->load->model('Vehiculos_model');
        $this->load->model('Factura_model');
    }

    public function index()
    {
        $query = $this->Client_model->getClient();
        $data['clientes'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('clientes/clientes_view',$data);
        $this->load->view('layouts/footer');   
    }
    
    public function register(){
        $this->load->view('layouts/header');
        $this->load->view('clientes/registrocliente_view');
        $this->load->view('layouts/footer');           
    }
    
    public function facturasCliente($ci_cliente=0){
        $facturas = $this->Factura_model->getFacturas($ci_cliente);
        foreach($facturas as $loop){
            $loop->vehiculo = $this->Vehiculos_model->getVehiculoBySerial($loop->id_vehiculo)[0];
            if($loop->tipo_garantia==="Extendida"){
                $loop->total=$this->Factura_model->getFacturaTotal($loop->nro_factura)[0]->total+$loop->vehiculo->monto_garantia_ext;
            }else{
                $loop->total=$this->Factura_model->getFacturaTotal($loop->nro_factura)[0]->total;
            }
        }
        
        $data['facturas']=$facturas;
        $data['cliente']=$this->Client_model->getClientByCedula($ci_cliente)[0];
        //echo json_encode($data['facturas']);
        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/facturas_clientes_view',$data);
        $this->load->view('layouts/footer');        
    }
    
    public function save(){
        $cliente =array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'sexo' => $this->input->post('sexo'),
            'fecha_nac' => $this->input->post('fecha_nac'),  
            'dir' => $this->input->post('dir'),
            'empresa' => $this->input->post('empresa'),
            'ingresos' => $this->input->post('ingresos')              
        );
        

         $tlf = array();
         $correos = array();
         for ($i=0 ; $i < count($_POST) ; $i++ ){
            if (!empty($this->input->post('telefono'.$i)))
                $tlf[$i] = $this->input->post('telefono'.$i);
        }
        for ($i=0 ; $i < count($_POST) ; $i++ ){
            if (!empty($_POST['correo'.$i]))
                $correos[$i] = $this->input->post('correo'.$i);

        }

        $result = $this->Client_model->addClient($cliente,$tlf,$correos);
        
        $data['message_type']=1;
        $data['message']="Cliente registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/registrocliente_view');
        $this->load->view('layouts/footer');
    }

    public function cliente($cedula=0){
        $query = $this->Client_model->getClientByCedula($cedula);
        $data['cliente'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('clientes/clientes_view',$data);
        $this->load->view('layouts/footer');
    }
    
     public function getClienteFactura(){
        $cedula = $this->input->post('cedula');
         
        $query = $this->Client_model->getClientByCedula($cedula);
        echo json_encode($query); 
    }   

    public function cargarContactosCliente(){
        echo "he entrado en cargarContactos";

        $cliente = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2')
        );
        $telefonos = $this->Client_model->getTelefonosCliente($cliente['cedula']);
        $correos = $this->Client_model->getCorreosCliente($cliente['cedula']);

        $data['cliente'] = $cliente;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/gestionContactos_view');
        $this->load->view('layouts/footer');
    }

    public function eliminarCorreo(){
        $cliente = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2')
        );

        $this->Client_model->deleteCorreoCliente($cliente['cedula'],$this->input->post('correo'));

        $telefonos = $this->Client_model->getTelefonosCliente($cliente['cedula']);
        $correos = $this->Client_model->getCorreosCliente($cliente['cedula']);

        $data['cliente'] = $cliente;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $data['message_type']=1;
        $data['message']="Correo eliminado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/gestionContactos_view');
        $this->load->view('layouts/footer');

    }

    public function eliminarTelefono(){
        $cliente = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2')
        );

        $this->Client_model->deleteTelefonoCliente($cliente['cedula'],$this->input->post('telefono'));

        $telefonos = $this->Client_model->getTelefonosCliente($cliente['cedula']);
        $correos = $this->Client_model->getCorreosCliente($cliente['cedula']);

        $data['cliente'] = $cliente;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;

        $data['message_type']=1;
        $data['message']="Telefono eliminado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/gestionContactos_view');
        $this->load->view('layouts/footer');

    }
     public function agregarTelefono(){
        $cliente = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2')
        );
        $this->Client_model->addTelefonoCliente($this->input->post('telefono'),$cliente['cedula']);

         $telefonos = $this->Client_model->getTelefonosCliente($cliente['cedula']);
        $correos = $this->Client_model->getCorreosCliente($cliente['cedula']);

        $data['cliente'] = $cliente;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;
        $data['message_type']=1;
        $data['message']="Telefono registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/gestionContactos_view');
        $this->load->view('layouts/footer');
    }

    public function agregarCorreo(){
        $cliente = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2')
        );
        $this->Client_model->addCorreoCliente($this->input->post('correo'),$cliente['cedula']);

         $telefonos = $this->Client_model->getTelefonosCliente($cliente['cedula']);
        $correos = $this->Client_model->getCorreosCliente($cliente['cedula']);

        $data['cliente'] = $cliente;
        $data['telefonos'] = $telefonos;
        $data['correos'] = $correos;
        $data['message_type']=1;
        $data['message']="Telefono registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/gestionContactos_view');
        $this->load->view('layouts/footer');
    }
    
    public function encuesta($nro_factura){
        $data['nro_factura']=$nro_factura;
        $data['preguntas'] = $this->Factura_model->getPreguntas();
        
        $this->load->view('layouts/header');
        $this->load->view('clientes/encuesta_view',$data);
        $this->load->view('layouts/footer');       
    }
    
    public function addEncuesta(){
        
        $respuestas[0]= array(
            'nro_factura'=>$this->input->post('nro_factura'),
            'nro_preg'=>1,
            'respuesta'=>$this->input->post('1')
        );
        $respuestas[1]= array(
            'nro_factura'=>$this->input->post('nro_factura'),
            'nro_preg'=>2,
            'respuesta'=>$this->input->post('2')
        );
        $respuestas[2]= array(
            'nro_factura'=>$this->input->post('nro_factura'),
            'nro_preg'=>3,
            'respuesta'=>$this->input->post('3')
         );
        
        $this->Factura_model->addRespuestas($respuestas);
        
        
        $data['message_type']=1;
        $data['message']="Encuesta añadida satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/encuesta_view');
        $this->load->view('layouts/footer');
    }
    
}
?>
