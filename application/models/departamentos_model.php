<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Departamentos_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

       public function getDepartamentos(){
            $query = $this->db->query("SELECT * FROM departamento");
            return $query->result();
       }

       public function addDepartamento($departamento){
           $query = $this->db->query("INSERT INTO departamento VALUES (?,?)",$departamento);
           return $query;
       }

       public function updateDepartamento($departamento){
           $query = $this->db->query("UPDATE departamento SET nombre=? WHERE cod_dpto=?",$departamento);
            return $query;
       }

   }
?>
