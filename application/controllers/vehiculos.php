<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehiculos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Vehiculos_model');
        $this->load->library('pagination');
    }

     public function index()
    {
        $query = $this->Vehiculos_model->getVehiculos();
        $data['vehiculos'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('stock/vehiculos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function cargarRegistroVehiculos(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroVehiculos_view');
        $this->load->view('layouts/footer');
    }

    public function registrarVehiculo(){
        $vehiculo=array(
            'serial' => $this->input->post('serial'),
            'precio' => $this->input->post('precio'),
            'modelo' => $this->input->post('modelo'),
            //'precio' => $this->input->post('precio'),
            'fecha_fab' => $this->input->post('fecha_fab'),
            'placa' => '',
            'lugar_fab' => $this->input->post('lugar_fab'),
            'nro_cilindros' => $this->input->post('nro_cilindros'),
            'nro_puertas' => $this->input->post('nro_puertas'),
            'peso' => $this->input->post('peso'),
            'capacidad' => $this->input->post('capacidad'),
            'fecha_entrega' => '',
            'kms' => $this->input->post('kms'),
            'monto_garantia' => $this->input->post('monto_garantia')
        );

        $result = $this->Vehiculos_model->addVehiculo($vehiculo);


        for ($i=0 ; $i < count($_POST) - 10 ; $i++ ){
            if (!empty($_POST['color'.$i]))
                //echo "color".$i.": ".$_POST['color'.$i];
                $result_color = $this->Vehiculos_model->addColorVehiculo($_POST['color'.$i],$vehiculo['serial']);
        }
        for ($i=0 ; $i < count($_POST) - 10 ; $i++ ){
            if (!empty($_POST['opcion'.$i]))
               // echo "opcion".$i.": ".$_POST['opcion'.$i];
                 $result_opcion = $this->Vehiculos_model->addOpcionVehiculo($_POST['opcion'.$i],$vehiculo['serial']);
        }
       // $result = $this->Admin_model->addVehiculo($vehiculo);

        $data['message_type']=1;
        $data['message']="Vehiculo registrado satisfactoriamente";
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroVehiculos_view');
        $this->load->view('layouts/footer');
    }

    public function cargarGestionVehiculos(){
        $query = $this->Vehiculos_model->getVehiculos();
        $colores = array();
        $i=0;
        //$colores[0] = array();
        $data['vehiculos'] = $query;

        //$colo
        foreach($data['vehiculos'] as $row ){
            $colores[$i] = array();
          /*  foreach ($this->Admin_model->getColoresVehiculo($row->id) as $row)
                echo $row->color;*/
            $colores[$i] = $this->Vehiculos_model->getColoresVehiculo($row->id);

            //$row['colores'] =$this->Admin_model->getColoresVehiculo($row->id);
            $i++;
        }
        $data['colores'] = $colores;



        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionVehiculos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function cargarEdicionVehiculos(){
        $act=1;
        $vehiculo = array(
             'serial' => $this->input->post('serial'),
            'precio' => $this->input->post('precio'),
            'modelo' => $this->input->post('modelo'),
            //'precio' => $this->input->post('precio'),
            'fecha_fab' => $this->input->post('fecha_fab'),
            'placa' => $this->input->post('placa'),
            'lugar_fab' => $this->input->post('lugar_fab'),
            'nro_cil' => $this->input->post('nro_cil'),
            'nro_puertas' => $this->input->post('nro_puertas'),
            'peso' => $this->input->post('peso'),
            'capacidad' => $this->input->post('capacidad'),
            'fecha_entrega' => $this->input->post('fecha_entrega'),
            'kilometraje' => $this->input->post('kilometraje'),
            'monto_garantia' => $this->input->post('monto_garantia')
        );
        $data['vehiculo']=$vehiculo;
        $data['colores'] = $this->Vehiculos_model->getColoresVehiculo($vehiculo['serial']);
        $data['opciones'] = $this->Vehiculos_model->getOpcionesVehiculo($vehiculo['serial']);

       /* foreach($data['colores'] as $array){
            foreach($array as $color)
                echo "color: ".$color;
        }*/
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante'];*/
       /* $result = $this->Admin_model->updateArticulo($articulo,$this->input->post('id'));

        $data['message_type']=1;
        $data['message']="Articulo Actualizado satisfactoriamente";*/
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/edicionVehiculos_view',$data);
        $this->load->view('layouts/footer');
    }

     public function getVehiculoFactura(){
        $serial = $this->input->post('id_vehiculo');
        $query = $this->Vehiculos_model->getVehiculoBySerial($serial);
        echo json_encode($query);
    }

}
?>
