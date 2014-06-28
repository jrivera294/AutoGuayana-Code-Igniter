<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Dependientes_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

       function getDependientes($idEmpleado){
            $query = $this->db->query("SELECT * FROM dependientes WHERE id_empleado= ?", $idEmpleado);
            return $query->result();
        }

       function addDependiente($dependiente){
            $query = $this->db->query("INSERT INTO dependientes
                                    (id_empleado,nombre,apellido1,apellido2,sexo,fecha_nac,parentesco)
                                    VALUES (?,?,?,?,?,?,?)",$dependiente);
           return $query;
       }
   }
