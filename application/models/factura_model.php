<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Factura_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        /*function getFacturaByFecha($fecha_ini,$fecha_fin){
            $query = $this->db->query("SELECT * FROM cliente", array());
            return $query->result();
        }*/

       function getFacturaById($nro_factura){
            $factura = $this->db->query("SELECT * FROM factura WHERE nro_factura=?", array($nro_factura));
            return $factura->result();
       }
       
       function getArticulosById($nro_factura){
            $articulos = $this->db->query("SELECT * FROM detalle WHERE nro_factura=?", array($nro_factura));
            return $articulos->result();
       }     
       

        function addFactura($factura,$articulos){            
            
            foreach ($factura as $cell=>$value){
                if($value==''){
                    $factura[$cell]=null;
                }
            }
            $this->db->trans_start();
            
            $queryFactura = $this->db->query("INSERT INTO factura (fecha_emision,tipo_financiamiento,cuotas,pago_cuota,interes,tipo_garantia,id_vehiculo,precio_venta_ve,rif_aseguradora,ci_cliente,id_empleado,rif_banco,comision) VALUES (CURRENT_DATE,?,?,?,?,?,?,?,?,?,?,?,?)",$factura);
            
            $id_factura = $this->db->query("SELECT currval(pg_get_serial_sequence('factura', 'nro_factura'))",array())->result()[0]->currval;

            
            foreach ($articulos as $key){
                $queryFactura = $this->db->query("INSERT INTO detalle (id_articulo,nro_factura,precio_venta,descuento,cantidad) VALUES (?,$id_factura,?,?,?)",$key);
            } 
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE){
                // generate an error... or use the log_message() function to log your error
            }
            
            return $id_factura;
        }
       
       
   }
?>