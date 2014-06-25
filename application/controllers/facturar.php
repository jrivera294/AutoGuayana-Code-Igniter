<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturar extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->library("mpdf");
    }

    public function index(){
        $this->load->view('layouts/header');
        $this->load->view('facturar_view');
        $this->load->view('layouts/footer');   
    }
    
    public function save(){
        $comision=$this->input->post('total_post')*0.01;
        $precio_venta_ve=$this->input->post('precio_vehiculo')-$this->input->post('descuento_vehiculo');
        
        $factura =array(
            //'fecha_emision' => getdate(),
            'tipo_financiamiento' => $this->input->post('tfinanc'),
            'cuotas' => $this->input->post('nro_cuotas_financ'),
            'pago_cuota' => $this->input->post('monto_cuotas_financ'),
            'interes' => $this->input->post('interes_financ'),
            'tipo_garantia' => $this->input->post('tipo_garantia'),  
            'id_vehiculo' => $this->input->post('id_vehiculo'),
            //En el modelo hacer get de los demas campos de vehiculo
            'precio_venta_ve' => $precio_venta_ve,
            'rif_aseguradora' => $this->input->post('rif_aseguradora'),
            'ci_cliente' => $this->input->post('cedula_cliente'),
            //'id_empleado' => $this->input->post('ingresos'),
            'id_empleado' => 1,
            'rif_banco' => $this->input->post('rif_banco'),
            'comision' => $comision
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
        $this->load->view('clientes/imprimir_factura_view.php');
        $this->load->view('layouts/footer');
    }
    
    public function imprimir_pdf($nro_factura){
        //Buscar datos de factura:
       /* $factura = ;
        $vehiculo = ;
        $artículos = ;
        $cliente = ;
        $vendedor = ; */
        
        
        
        //Especificamos algunos parametros del PDF
        $this->mpdf->mPDF('utf-8','A4');
        
        //PASAMOS LA RUTA DONDE ESTA EL ESTILO
        //$stylesheet = file_get_contents('public/');
        //cargamos el estilo CSS
        //$this->mpdf->WriteHTML($stylesheet,1);
        //CARGAMOS LOS PARAMETROS
        $data['nombre'] = "Renatto NL";
        //OBTENEMOS LA VISTA EN HTML
        $html = $this->load->view('pdf/factura.php', $data, true);
        //ESCRIBIMOS AL PDF
        $this->mpdf->WriteHTML($html,2);
        
        //SALIDA DE NUESTRO PDF
        $this->mpdf->Output();
    }
}
?>