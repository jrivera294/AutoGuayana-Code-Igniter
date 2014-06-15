<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Stock_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function getArticulos(){
            $query = $this->db->query("SELECT * FROM articulos", array());
            return $query->result();
        }

        function getVehiculos(){
            $query = $this->db->query("SELECT * FROM vehiculo", array());
            return $query->result();
        }

        function addArticulo($articulo){
            $query = $this->db->query("INSERT INTO articulos VALUES (?,?,?,?,?,?)",$articulo);
            return $query;
        }
   }
?>
