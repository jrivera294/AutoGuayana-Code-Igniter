<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Stock_model');
        $this->load->library('pagination');
    }

    public function registroArticulos(){
        $this->load->view('layouts/header');
        $this->load->view('admin/registroArticulos_view');
        $this->load->view('layouts/footer');
    }


    public function guardarArticulo(){
        $articulo = array(
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante')
        );
        echo $articulo['descripcion'];
        echo $articulo['precio'];

        $result = $this->Admin_model->addArticulo($articulo);
        $data['message_type']=1;
        $data['message']="Articulo registrado satisfactoriamente";
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/registroArticulos_view');
        $this->load->view('layouts/footer');
    }

    public function gestionArticulos(/*$actualizacion*/){
        $query = $this->Stock_model->getArticulos();
        $data['articulos'] = $query;
        /*if ($actualizacion==1){
            $data['message_type']=1;
            $data['message']="Articulo actualizado satisfactoriamente";
        }*/
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/gestionArticulos_view');
        $this->load->view('layouts/footer');
    }

    public function edicionArticulos(){
        $act=1;
        $articulo = array(
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante'),
            'id' => $this->input->post('id')
        );
        $data['articulos']=$articulo;
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante'];*/
       /* $result = $this->Admin_model->updateArticulo($articulo,$this->input->post('id'));
        $data['message_type']=1;
        $data['message']="Articulo Actualizado satisfactoriamente";*/
        $this->load->view('layouts/header');
        $this->load->view('admin/edicionArticulos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function updateArticulo(){
        $articulo = array(
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante'),
            'id' => $this->input->post('id')
        );
        $data['articulos']=$articulo;
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante'];*/
        $result = $this->Admin_model->updateArticulo($articulo);

        $data['message_type']=1;
        $data['message']="Articulo Actualizado satisfactoriamente";
       $this->gestionArticulos();
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

    public function edicionVehiculos(){
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
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante'];*/
       /* $result = $this->Admin_model->updateArticulo($articulo,$this->input->post('id'));
        $data['message_type']=1;
        $data['message']="Articulo Actualizado satisfactoriamente";*/
        $this->load->view('layouts/header');
        $this->load->view('admin/edicionVehiculos_view',$data);
        $this->load->view('layouts/footer');
    }


}
?>
