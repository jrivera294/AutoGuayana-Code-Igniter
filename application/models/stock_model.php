<?php /*if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Stock_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        function getArticulos(){
            $query = $this->db->query("SELECT * FROM articulos", array());
            return $query->result();
        }

        function getVehiculos(){
            $query = $this->db->query("SELECT * FROM vehiculo", array());
            return $query->result();
        }

        function addArticulo($articulo){
            $query = $this->db->query("INSERT INTO articulos VALUES (?,?,?,?,?,?)",$articulo);
            return $query;
        }

    public function record_count() {
        return $this->db->count_all("vehiculo");
    }

    public function fetch_vehiculos($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("vehiculo");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   }*/
?>
