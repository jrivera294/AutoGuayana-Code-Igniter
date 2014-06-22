<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Factura_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        /*function getFacturaByFecha($fecha_ini,$fecha_fin){
            $query = $this->db->query("SELECT * FROM cliente", array());
            return $query->result();
        }

       function getFacturaById($id_factura){
            $query = $this->db->query("SELECT * FROM cliente WHERE cedula=?", array($cedula));
            return $query->result();
       }*/

        function addFactura($factura,$articulos){            
            $this->db->trans_start();
            
            $queryFactura = $this->db->query("INSERT INTO factura (fecha_emision,tipo_financiamiento,cuotas,pago_cuota,interes,tipo_garantia,id_vehiculo,precio_venta_ve,rif_aseguradora,ci_cliente,id_empleado,rif_banco,comision) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",$factura);
            $id_factura = $this->db->query("SELECT nro_factura FROM factura WHERE id_vehiculo=?",array($factura['id_vehiculo']));
            
            foreach ($articulos as $key){
                $articulos[$key]['nro_factura']=$id_factura;
            }  
            
            foreach ($articulos as $key){
                $queryFactura = $this->db->query("INSERT INTO detalle (id_articulo,nro_factura,precio_venta,descuento,cantidad) VALUES (?,?,?,?)",$articulos[$key]);
            }      
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE){
                // generate an error... or use the log_message() function to log your error
            }
        }    
   }
?>