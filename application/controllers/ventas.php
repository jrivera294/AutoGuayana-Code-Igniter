<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->model('Empleados_model');
        $this->load->model('Vehiculos_model');
        $this->load->library("mpdf");
    }
    
     public function index(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/ventas_view');
        $this->load->view('layouts/footer');
    }
    
    public function ventas_pdf(){
        
        $data['fecha_ini'] = $this->input->post('fecha_inicio');
        $data['fecha_fin'] = $this->input->post('fecha_fin');
        
        //Especificamos algunos parametros del PDF
        $this->mpdf->mPDF('utf-8','A4');

        //PASAMOS LA RUTA DONDE ESTA EL ESTILO
        $stylesheet = file_get_contents(base_url("assets/css/bootstrap.min.css"));
        //cargamos el estilo CSS
        $this->mpdf->WriteHTML($stylesheet,1);
        //CARGAMOS LOS PARAMETROS

        $data['factura'] = $this->Factura_model->getFacturaByFecha($data['fecha_ini'],$data['fecha_fin']);
        foreach($data['factura'] as $loop)
        if(trim($loop->tipo_garantia)==="Extendida"){
            $loop->total_factura=$this->Factura_model->getFacturaTotal($loop->nro_factura)[0]->total+$loop->monto_garantia_ext;
        }else{
            $loop->total_factura=$this->Factura_model->getFacturaTotal($loop->nro_factura)[0]->total;
        }
        //OBTENEMOS LA VISTA EN HTML

        $html=$this->load->view('pdf/lista_ventas_pdf.php',$data, true);


        //ESCRIBIMOS AL PDF
        $this->mpdf->WriteHTML($html,2);

        //SALIDA DE NUESTRO PDF
        $this->mpdf->Output();
    }
}