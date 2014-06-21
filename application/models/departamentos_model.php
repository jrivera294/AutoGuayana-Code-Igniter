<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Departamentos_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

       public function getDepartamentos(){
            $query = $this->db->query("SELECT * FROM departamento");
            return $query->result();
       }

   }
?>
