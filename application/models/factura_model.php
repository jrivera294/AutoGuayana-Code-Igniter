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
            foreach ($factura as $cell=>$value){
                if($value==''){
                    $factura[$cell]=null;
                }
            }
            $query = $this->db->query("INSERT INTO factura VALUES (?,?,?,?,?,?,?,?,?)",$factura);
            return $query;
        }    
   }
?>