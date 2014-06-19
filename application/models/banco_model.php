<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Banco_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
       
      function getBancoByRif($rif_banco){
            $query = $this->db->query("SELECT * FROM banco WHERE rif_banco=?", array($rif_banco));
            return $query->result();
       }
   }