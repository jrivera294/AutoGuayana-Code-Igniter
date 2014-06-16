<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Admin_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }


        function addVehiculo($vehiculo){
            //not ready for implementation
            $query = $this->db->query("INSERT INTO vehiculo VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",$vehiculo);
            return $query;
        }
        function addColorVehiculo($color,$serial_vehiculo){
            $query = $this->db->query("INSERT INTO vehiculo VALUES (?,?)",$serial_vehiculo,$color);
            return $query;
        }
        function addOpcionVehiculo($opcion,$serial_vehiculo){
            $query = $this->db->query("INSERT INTO vehiculo VALUES (?,?)",$serial_vehiculo,$opcion);
            return $query;
        }

        function gestionarVehiculos(){
            //not ready for implementation
        }
   }
?>
