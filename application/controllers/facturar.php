<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturar extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->model('Client_model');
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
        
        $nro_factura = $this->Factura_model->addFactura($factura,$articulos);
        $data['message_type']=1;
        $data['message']="Factura nro: $nro_factura procesada satisfactoriamente";
        $data['nro_factura'] = $nro_factura;

        $this->load->view('layouts/header',$data);
        $this->load->view('imprimir_factura_view');
        $this->load->view('layouts/footer');
    }
    
    public function factura_pdf($nro_factura=0){
        if($nro_factura==0){
            show_404();
        }else{
            //Buscar datos de factura:
           /* $factura = ;
            $vehiculo = ;
            $artículos = ;
            $cliente = ;
            $vendedor = ; */



            //Especificamos algunos parametros del PDF
            //$this->mpdf->mPDF('utf-8','A4');

            //PASAMOS LA RUTA DONDE ESTA EL ESTILO
            //$stylesheet = file_get_contents('public/');
            //cargamos el estilo CSS
            //$this->mpdf->WriteHTML($stylesheet,1);
            //CARGAMOS LOS PARAMETROS

            $data['factura'] = $this->Factura_model->getFacturaById($nro_factura);
            $data['articulos'] = $this->Factura_model->getArticulosById($nro_factura);
            $data['cliente']= $this->Client_model->getClientByCedula($data['factura'][0]->ci_cliente);
            //OBTENEMOS LA VISTA EN HTML


            $this->load->view('pdf/factura_view_pdf.php', $data);

            //ESCRIBIMOS AL PDF
            //$this->mpdf->WriteHTML($html,2);

            //SALIDA DE NUESTRO PDF
            //$this->mpdf->Output();
        }
        
    }
}
?>