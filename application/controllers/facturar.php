<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturar extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Factura_model');
    }

    public function index(){
        $this->load->view('layouts/header');
        $this->load->view('facturar_view');
        $this->load->view('layouts/footer');   
    }
    
    public function save(){
        $factura =array(
            'fecha_emision' => getdate(),
            'tipo_financiamiento' => $this->input->post('tfinanc'),
            'cuotas' => $this->input->post('nro_cuotas_financ'),
            'pago_cuota' => $this->input->post('monto_cuotas_financ'),
            'interes' => $this->input->post('interes_financ'),
            'tipo_garantia' => $this->input->post('tipo_garantia'),  
            'id_vehiculo' => $this->input->post('id_vehiculo'),
            //En el modelo hacer get de los demas campos de vehiculo
            //'precio_venta_ve' => $this->input->post('empresa'),
            'rif_aseguradora' => $this->input->post('rif_aseguradora'),
            'ci_cliente' => $this->input->post('cedula_cliente'),
            //'id_empleado' => $this->input->post('ingresos'),
            'rif_banco' => $this->input->post('rif_banco'),
            'comision' => $this->input->post('total')*0.05
        );
        
        $nro_articulos = $this->input->post('nro_articulos');
        $articulos=array();
        
        $j=0;
        
        for($i=0;$i<=$nro_articulos;$i++){
            if($this->input->post('id_articulo'.$i)){
                $articulos[$j]['id_articulo']=$this->input->post('id_articulo'.$i);
                //$articulos[$j]['nro_factura']=$this->input->post('nro_factura'.$i);
                $articulos[$j]['precio_venta']=$this->input->post('precio_articulo'.$i);
                $articulos[$j]['descuento']=$this->input->post('descuento_articulo'.$i);
                $articulos[$j]['cantidad']=$this->input->post('cantidad_articulo'.$i);
                $j++;
            }
        }
        
        $this->Factura_model->addFactura($factura,$articulos);
        
        $data['message_type']=1;
        $data['message']="Factura procesada satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/registrocliente_view');
        $this->load->view('layouts/footer');
    }
}
?>