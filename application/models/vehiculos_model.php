<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Vehiculos_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }



       //VEHICULOSS OPTIONS

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

        function getVehiculos(){
            $query = $this->db->query("SELECT * FROM vehiculo", array());
            return $query->result();
        }

        function getVehiculoBySerial($serial){
            $query = $this->db->query("SELECT * FROM vehiculo WHERE id = ?",array($serial));
            return $query->result();
       }

        function getColoresVehiculo($serial_vehiculo){
            $query = $this->db->query("SELECT color FROM color_vehiculo WHERE id_vehiculo = ?",$serial_vehiculo);
            return $query->result();
        }
        function getOpcionesVehiculo($serial_vehiculo){
            $query = $this->db->query("SELECT opcion FROM opciones_vehiculo WHERE id_vehiculo = ?",$serial_vehiculo);
            return $query->result();
        }

   }
?>
