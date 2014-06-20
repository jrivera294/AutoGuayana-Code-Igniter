<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Admin_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }


       //ARTICULOSS OPTIONS
       function addArticulo($articulo){
           $query = $this->db->query("INSERT INTO articulos (precio,stock,descripcion,modelo,fabricante) VALUES (?,?,?,?,?)",$articulo);
            return $query;
       }

       function updateArticulo($articulo){
           $query = $this->db->query("UPDATE articulos SET precio=?,stock=?,descripcion=?,modelo=?,fabricante=? WHERE id=?",$articulo);
            return $query;
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante']; */
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
       
        function getColoresVehiculo($serial_vehiculo){
            $query = $this->db->query("SELECT color FROM color_vehiculo WHERE id_vehiculo = (?)",$serial_vehiculo);
            return $query->result();
        }
        function getOpcionesVehiculo($serial_vehiculo){
            $query = $this->db->query("SELECT color FROM opciones_vehiculo WHERE id_vehiculo = (?)",$serial_vehiculo);
            return $query->result();
        }

   }
?>
