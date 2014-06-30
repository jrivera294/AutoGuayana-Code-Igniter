<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehiculos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Vehiculos_model');
        $this->load->library("mpdf");
    }

     public function index()
    {
        $query = $this->Vehiculos_model->getVehiculos();
        $data['vehiculos'] = $query;
         $i=0;
         $colores = array();
        foreach($data['vehiculos'] as $row ){
            $colores[$i] = array();
            $colores[$i] = $this->Vehiculos_model->getColoresVehiculo($row->id);
            $i++;
        }
        $data['colores'] = $colores;

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


        //preparar info del vehiculo y desplegar index agaiinnn
        $query = $this->Vehiculos_model->getVehiculos();
        $colores = array();
        $i=0;
        $data['vehiculos'] = $query;

        foreach($data['vehiculos'] as $row ){
            $colores[$i] = array();
            $colores[$i] = $this->Vehiculos_model->getColoresVehiculo($row->id);
            $i++;
        }
        $data['colores'] = $colores;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionVehiculos_view');
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
         $query=array();
        $query['vehiculo'] = $this->Vehiculos_model->getVehiculoBySerial($serial);
        $query['colores'] = $this->Vehiculos_model->getColoresVehiculo($serial);
        $query['opciones'] = $this->Vehiculos_model->getOpcionesVehiculo($serial);
        echo json_encode($query);
    }
    
    public function calcomania_pdf($id_vehiculo=1){
        if($id_vehiculo==0){
            show_404();
        }else{
            //Especificamos algunos parametros del PDF
            $this->mpdf->mPDF('utf-8','A4');

            //PASAMOS LA RUTA DONDE ESTA EL ESTILO
            $stylesheet = file_get_contents(base_url("assets/css/bootstrap.min.css"));
            //cargamos el estilo CSS
            $this->mpdf->WriteHTML($stylesheet,1);
            //CARGAMOS LOS PARAMETROS
            $data['vehiculo']= $this->Vehiculos_model->getVehiculoBySerial($id_vehiculo);
            $data['colores']= $this->Vehiculos_model->getColoresVehiculo($id_vehiculo);
            $data['opciones']= $this->Vehiculos_model->getOpcionesVehiculo($id_vehiculo);
            
            
            //OBTENEMOS LA VISTA EN HTML

            $html=$this->load->view('pdf/calcomania_pdf.php',$data, true);


            //ESCRIBIMOS AL PDF
            $this->mpdf->WriteHTML($html,2);

            //SALIDA DE NUESTRO PDF
            $this->mpdf->Output();
        }
    }

}
?>
