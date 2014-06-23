<script type='text/javascript'>
        function addTelefono(){


            var container = document.getElementById("telefonos");

            i=(container.childElementCount-2)/2;
            container.appendChild(document.createTextNode("Telefono " + (i)));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "telefono"+i;
            input.id="telefono"+i;
            input.className = "form-control input-lg";
            //input.addClass("form-control input-lg");
            container.appendChild(input);
            // Append a line break
            container.appendChild(document.createElement("br"));

        }
        function addCorreo(){


            var container = document.getElementById("correos");

            i=((container.childElementCount)-2)/2;
            container.appendChild(document.createTextNode("Correo " + (i)));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "email";
            input.name = "correo"+i;
            input.id="correo"+i;
            input.className = "form-control input-lg";
            container.appendChild(input);
            container.appendChild(document.createElement("br"));


        }
</script>

<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h2 class="sub-header">Editar Empleado</h2>
         <div>
         <form role="form"  action="<?= base_url();?>index.php/empleados/editarEmpleado"  method="post">
            <input type="hidden" name="id" id="id" class="form-control input-lg"  value="<?php echo $empleado['id']; ?>" tabindex="1">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Cédula:</h3>
                    <div class="form-group">
                        <input type="hidden" name="cedula" id="cedula" class="form-control input-lg"  value="<?php echo $empleado['cedula']; ?>" tabindex="1">
                        <input disabled type="text" name="cedula_visible" id="cedula_visible"  value="<?php echo $empleado['cedula']; ?>" class="form-control" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">

                   <h3>Sexo:</h3>
                     <div class="form-group">
                       <input type="hidden" name="sexo" id="sexo" class="form-control input-lg" value="<?php echo $empleado['sexo']; ?>" tabindex="1">
                          <input disabled type="text" name="sexo_visible" id="sexo_visible" class="form-control" value="<?php echo ($empleado['sexo']=='M')?'Masculino':'Femenino'; ?>" tabindex="1">
                     </div>

                 </div>
                 <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Fecha de nacimiento:</h3>
                     <div class="form-group">
                       <input type="hidden" name="fecha_nac" id="fecha_nac" value="<?php echo $empleado['fecha_nac']; ?>">
                        <input disabled type="date"  class="form-control" name="fecha_nac_visible" id="fecha_nac_visible" value="<?php echo $empleado['fecha_nac']; ?>">
                     </div>
                 </div>

             </div>

             <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Nombre:</h3>
                     <div class="form-group">
                       <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $empleado['nombre']; ?>" tabindex="1">
                     </div>
                 </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Primer apellido:</h3>
                     <div class="form-group">
                       <input type="text" name="apellido1" id="apellido1" class="form-control" value="<?php echo $empleado['apellido1']; ?>" tabindex="1">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Segundo apellido:</h3>
                     <div class="form-group">
                       <input type="text" name="apellido2" id="apellido2" class="form-control" value="<?php echo $empleado['apellido2']; ?>" tabindex="1">
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-xs-12 col-sm-1 col-md-2"></div>
                 <div class="col-xs-12 col-sm-3 col-md-2">
                   <h3>Clave actual:</h3>

                    <div class="form-group">
                       <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="" tabindex="1">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-1 col-md-1"></div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                   <h3>Clave:</h3>

                    <div class="form-group">
                       <input type="password" name="password" id="password" class="form-control" placeholder="" tabindex="1">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-1 col-md-1"></div>
                <div class="col-xs-12 col-sm-3 col-md-2">
                   <h3>Verif. Clave:</h3>

                    <div class="form-group">
                       <input type="password" name="password1" id="password1" class="form-control " placeholder="" tabindex="1">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-1 col-md-2"></div>
             </div>
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Dirección:</h3>
                    <div class="form-group">
                        <input type="text" name="dir" id="dir" class="form-control" value="<?php echo $empleado['dir']; ?>" tabindex="1">
                    </div>
                </div>
            </div>
             <div class="row">
                 <div class="col-xs-12 col-sm-6 col-md-2"></div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                    <h3>Departamento:</h3>
                    <div class="form-group">
                        <input type="text" name="cod_dpto" id="cod_dpto" class="form-control" value="<?php echo $empleado['cod_dpto']; ?>" tabindex="1">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-6 col-md-1"></div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                    <h3>Cargo:</h3>
                    <div class="form-group">
                        <input type="text" name="cod_cargo" id="cod_cargo" class="form-control" value="<?php echo $empleado['cod_cargo']; ?>" tabindex="1">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-6 col-md-1"></div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                    <h3>Estatus:</h3>
                    <div class="form-group">
                        <select class= "form-control" id="status" name="status">
                          <?php
                            $dominio = array("Activo","Permiso","Retirado","Vacaciones");
                            for ($i = 0 ; $i < count($dominio) ; $i++){
                                if ($empleado['status'] == $dominio[$i])
                                    echo "<option value=".$dominio[$i]."selected >".$dominio[$i]."</option>";
                                else
                                    echo "<option value=".$dominio[$i].">".$dominio[$i]."</option>";
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2"></div>
             </div>


             <br>
             <br>
             <div class="row">
                 <div class="col-xs-12 col-md-4">
                     <input type="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg" tabindex="7">
                 </div>
                 <div class="col-xs-12 col-md-4">
                     <a href="<?= base_url("index.php/empleados/cargarContactosEmpleado");?>" class="btn btn-success btn-block btn-lg">Editar Contacto</a>
                 </div>
                 <div class="col-xs-12 col-md-4">
                     <a href="<?= base_url();?>index.php/empleados/cargarGestionEmpleados"  class="btn btn-warning btn-block btn-lg">Cancelar</a>
                 </div>
            </div>
</form>
         </div>
       </div>
     </div>
   </div>
