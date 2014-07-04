<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Banco_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
       
       function getBancos(){
            $query = $this->db->query("SELECT * FROM banco");
            return $query->result();
       }

       public function addBanco($banco){
           $query = $this->db->query("INSERT INTO banco VALUES (?,?)",$banco);
           return $query;
       }

      function getBancoByRif($rif_banco){
            $query = $this->db->query("SELECT * FROM banco WHERE rif_banco=?", array($rif_banco));
            return $query->result();
       }
   }
