<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Seguro_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

         function getSeguroByRif($rif_aseguradora){
            $query = $this->db->query("SELECT * FROM aseguradora WHERE rif_aseguradora=?", array($rif_aseguradora));
            return $query->result();
       }
   }