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


       function addTelefonoCliente($telefono,$cedula){
            $info = array($cedula,$telefono);
            $query = $this->db->query("INSERT INTO telefonos_cliente VALUES (?,?)",$info);
            return $query;
        }

       function getTelefonosCliente($cedula){
            $query = $this->db->query("SELECT telefono FROM telefonos_cliente WHERE id_cliente = ?",$cedula);
            return $query->result();
        }

        function deleteTelefonoCliente($cedula,$telefono){
            $info = array($cedula,$telefono);
            $query = $this->db->query("DELETE FROM telefonos_cliente WHERE  id_cliente = ? AND telefono = ?",$info);
            return $query;
        }

        function addCorreoCliente($correo,$cedula){
            $info = array($cedula,$correo);
            $query = $this->db->query("INSERT INTO correos_cliente VALUES (?,?)",$info);
            return $query;
        }

        function getCorreosCliente($cedula){
            $query = $this->db->query("SELECT correo FROM correos_cliente WHERE id_cliente = ?",$cedula);
            return $query->result();
        }

       function deleteCorreoCliente($cedula,$correo){
            $info = array($cedula,$correo);
            $query = $this->db->query("DELETE FROM correos_cliente WHERE  id_cliente = ? AND correo = ?",$info);
            return $query;
        }

        function addClient($client,$tlf,$correos){
            foreach ($client as $cell=>$value){
                if($value==''){
                    $client[$cell]=null;
                }
            }
            $query = $this->db->query("INSERT INTO cliente VALUES (?,?,?,?,?,?,?,?,?)",$client);

            //$query = $this->db->query("SELECT cedula FROM cliente WHERE cedula=?", $client['cedula']);//busco id
            //foreach($query->result() as $c)
              //  $idCliente = $c->id;

            for ($i = 0 ; $i < count($tlf) ; $i++){//inserto tlf
                $info = array($client['cedula'],$tlf[$i]);
                $queryT = $this->db->query("INSERT INTO telefonos_cliente VALUES (?,?)",$info);
            }

            for ($i = 0 ; $i < count($correos) ; $i++){//inserto correos
                $info = array($client['cedula'],$correos[$i]);
                $queryC = $this->db->query("INSERT INTO correos_cliente VALUES (?,?)",$info);
            }
            return $query;
        }    
   }
?>
