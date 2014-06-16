<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Admin_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }


        function addVehiculo($vehiculo){
            //not ready for implementation
            foreach ($vehiculo as $cell=>$value){
                if($value==''){
                    $vehiculo[$cell]=null;
                }
            }
            $query = $this->db->query("INSERT INTO vehiculo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",$vehiculo);
            return $query;
        }
        function addColorVehiculo($color,$serial_vehiculo){
            $info = array($serial_vehiculo,$color);
            $query = $this->db->query("INSERT INTO color_vehiculo VALUES (?,?)",$info);
            return $query;
        }
        function addOpcionVehiculo($opcion,$serial_vehiculo){
            $info = array($serial_vehiculo,$opcion);
            $query = $this->db->query("INSERT INTO opciones_vehiculo VALUES (?,?)",$info);
            return $query;
        }

        function gestionarVehiculos(){
            //not ready for implementation
        }
   }
?>
