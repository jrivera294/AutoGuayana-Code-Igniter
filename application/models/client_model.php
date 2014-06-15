<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Client_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function getClient(){
            $query = $this->db->query("SELECT * FROM cliente", array());
            return $query->result();
        }

       function getClientByCedula($cedula){
            $query = $this->db->query("SELECT * FROM cliente WHERE cedula=?", array($cedula));
            return $query->result();
       }

        function addClient($client){
            foreach ($client as $cell=>$value){
                if($value==''){
                    $client[$cell]=null;
                }
            }
            $query = $this->db->query("INSERT INTO cliente VALUES (?,?,?,?,?,?,?,?,?)",$client);
            return $query;
        }    
   }
?>
