<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Seguro_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

       function getSeguros(){
            $query = $this->db->query("SELECT * FROM aseguradora");
            return $query->result();
       }

       public function addSeguro($seguro){
           $query = $this->db->query("INSERT INTO aseguradora VALUES (?,?)",$seguro);
           return $query;
       }

         function getSeguroByRif($rif_aseguradora){
            $query = $this->db->query("SELECT * FROM aseguradora WHERE rif_aseguradora=?", array($rif_aseguradora));
            return $query->result();
       }
   }
