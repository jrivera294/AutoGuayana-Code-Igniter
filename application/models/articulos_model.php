<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Articulos_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }


       //ARTICULOSS OPTIONS

       function getArticulos(){
            $query = $this->db->query("SELECT * FROM articulos", array());
            return $query->result();
        }

       function getArticuloById($id){
            $query = $this->db->query("SELECT * FROM articulos WHERE id = ?",array($id));
            return $query->result();
       }



       function addArticulo($articulo){
           $query = $this->db->query("INSERT INTO articulos VALUES (?,?,?,?,?,?)",$articulo);
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


   }
?>
