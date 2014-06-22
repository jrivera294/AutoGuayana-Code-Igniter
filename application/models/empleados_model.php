<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Empleados_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function getIdEmpleado($cedula){
            $query = $this->db->query("SELECT id FROM empleado WHERE cedula=?", $cedula);
            return $query->result();
        }

        function getEmpleados(){
            $query = $this->db->query("SELECT * FROM empleado", array());
            return $query->result();
        }

        function addEmpleado($empleado){
            $query = $this->db->query("INSERT INTO empleado
            (password,cedula,nombre,apellido1,apellido2,sexo,dir,fecha_nac,fecha_contr,cod_cargo,cod_dpto)
            VALUES (?,?,?,?,?,?,?,?,?,?,?)",$empleado);
            return $query;
        }

        function addTelefonoEmpleado($telefono,$idEmpleado){
            $info = array($idEmpleado,$telefono);
            $query = $this->db->query("INSERT INTO telefonos_empleados VALUES (?,?)",$info);
            return $query;
        }

        function addCorreoEmpleado($correo,$idEmpleado){
            $info = array($idEmpleado,$correo);
            $query = $this->db->query("INSERT INTO correos_empleados VALUES (?,?)",$info);
            return $query;
        }

   }
?>
