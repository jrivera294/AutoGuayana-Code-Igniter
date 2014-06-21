<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Cargos_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

       public function getCargos(){
            $query = $this->db->query("SELECT * FROM cargo", array());
            return $query->result();
       }

       public function addCargo($cargo){
           $query = $this->db->query("INSERT INTO cargo VALUES (?,?,?)",$cargo);
           return $query;
       }

       public function updateCargo($cargo){
           $query = $this->db->query("UPDATE cargo SET nombre=?, sueldo=? WHERE cod_cargo=?",$cargo);
            return $query;
       }
   }
?>
