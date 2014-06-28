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

       function getTelefonosEmpleado($idEmpleado){
            $query = $this->db->query("SELECT telefono FROM telefonos_empleados WHERE id_empleado = ?",$idEmpleado);
            return $query->result();
        }
        function getCorreosEmpleado($idEmpleado){
            $query = $this->db->query("SELECT correo FROM correos_empleados WHERE id_empleado = ?",$idEmpleado);
            return $query->result();
        }

        function addEmpleado($empleado,$tlf,$correos){

         //   $this->db->trans_start();//INICIA LA TRANSACCION
            $queryE = $this->db->query("INSERT INTO empleado
            (password,cedula,nombre,apellido1,apellido2,sexo,dir,fecha_nac,fecha_contr,cod_cargo,cod_dpto)
            VALUES (?,?,?,?,?,?,?,?,CURRENT_DATE,?,?)",$empleado); //inserto empleado

            $query = $this->db->query("SELECT id FROM empleado WHERE cedula=?", $empleado['cedula']);//busco id
            foreach($query->result() as $emp)
                $idEmpleado = $emp->id;

            for ($i = 0 ; $i < count($tlf) ; $i++){//inserto tlf
                $info = array($idEmpleado,$tlf[$i]);
                $queryT = $this->db->query("INSERT INTO telefonos_empleados VALUES (?,?)",$info);
            }

            for ($i = 0 ; $i < count($correos) ; $i++){//inserto correos
                $info = array($idEmpleado,$correos[$i]);
                $queryC = $this->db->query("INSERT INTO correos_empleados VALUES (?,?)",$info);
            }
            return $queryE;

            //$this->db->trans_complete();//TERMINA LA TRANSACCION
        }

        function addTelefonoEmpleado($telefono,$idEmpleado){
            $info = array($idEmpleado,$telefono);
            $query = $this->db->query("INSERT INTO telefonos_empleados VALUES (?,?)",$info);
            return $query;
        }
       function deleteTelefonoEmpleado($idEmpleado,$telefono){
            $info = array($idEmpleado,$telefono);
            $query = $this->db->query("DELETE FROM telefonos_empleados WHERE  id_empleado = ? AND telefono = ?",$info);
            return $query;
        }
        function addCorreoEmpleado($correo,$idEmpleado){
            $info = array($idEmpleado,$correo);
            $query = $this->db->query("INSERT INTO correos_empleados VALUES (?,?)",$info);
            return $query;
        }

        function deleteCorreoEmpleado($idEmpleado,$correo){
            $info = array($idEmpleado,$correo);
            $query = $this->db->query("DELETE FROM correos_empleados WHERE  id_empleado = ? AND correo = ?",$info);
            return $query;
        }

       function updateEmpleado($empleado){

            $query = $this->db->query
                (   "UPDATE empleado
                    SET password=?,nombre=?,apellido1=?,apellido2=?,dir=?,status=?,cod_cargo=?,cod_dpto=?
                    WHERE id=?",$empleado);
            return $query;
       }

       function deleteEmpleado($idEmpleado){
            $query = $this->db->query("DELETE FROM empleado WHERE id= ?",$idEmpleado);
            return $query;
       }

   }
?>
