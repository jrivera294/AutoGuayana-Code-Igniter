<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Stock_model');
        $this->load->library('pagination');
    }

    public function registroVehiculos(){
        $this->load->view('layouts/header');
        $this->load->view('admin/registroVehiculos_view');
        $this->load->view('layouts/footer');
    }

    public function guardarVehiculo(){
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

        $result = $this->Admin_model->addVehiculo($vehiculo);


        for ($i=0 ; $i < count($_POST) - 10 ; $i++ ){
            if (!empty($_POST['color'.$i]))
                //echo "color".$i.": ".$_POST['color'.$i];
                $result_color = $this->Admin_model->addColorVehiculo($_POST['color'.$i],$vehiculo['serial']);
        }
        for ($i=0 ; $i < count($_POST) - 10 ; $i++ ){
            if (!empty($_POST['opcion'.$i]))
               // echo "opcion".$i.": ".$_POST['opcion'.$i];
                 $result_opcion = $this->Admin_model->addOpcionVehiculo($_POST['opcion'.$i],$vehiculo['serial']);
        }
       // $result = $this->Admin_model->addVehiculo($vehiculo);

        $data['message_type']=1;
        $data['message']="Vehiculo registrado satisfactoriamente";
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/registroVehiculos_view');
        $this->load->view('layouts/footer');
    }

    public function gestionVehiculos(){
        $query = $this->Stock_model->getVehiculos();
        $colores = array();
        $i=0;
        //$colores[0] = array();
        $data['vehiculos'] = $query;
        
        //$colo
        foreach($data['vehiculos'] as $row ){
            $colores[$i] = array();
          /*  foreach ($this->Admin_model->getColoresVehiculo($row->id) as $row)
                echo $row->color;*/
            $colores[$i] = $this->Admin_model->getColoresVehiculo($row->id);

            //$row['colores'] =$this->Admin_model->getColoresVehiculo($row->id);
            $i++;
        }
        $data['colores'] = $colores;



        $this->load->view('layouts/header');
        $this->load->view('admin/gestionVehiculos_view',$data);
        $this->load->view('layouts/footer');
    }


}
?>
