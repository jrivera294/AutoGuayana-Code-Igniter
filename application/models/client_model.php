<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Client_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function getClient(){
            $query = $this->db->query("SELECT * FROM cliente", array());
            return $query->result();
        }

        function addClient($client){
            $query = $this->db->query("INSERT INTO cliente VALUES (?,?,?,?,?,?,?,?,?)",$client);
            return $query;
        }    
   }
?>