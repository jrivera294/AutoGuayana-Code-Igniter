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
         <h2 class="sub-header">Registro Empleado</h2>
         <div>
         <form role="form"  action="<?= base_url();?>index.php/empleados/registrarEmpleado"  method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Cédula:</h3>
                    <div class="form-group">
                       <input type="text" name="cedula" id="cedula" class="form-control input-lg" placeholder="Ejemplo: 12345678" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Contraseña:</h3>
                    <div class="form-group">
                       <input type="password" name="password1" id="password1" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Verificar Contraseña:</h3>
                    <div class="form-group">
                       <input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>

             </div>

             <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Nombre:</h3>
                     <div class="form-group">
                       <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="" tabindex="1">
                     </div>
                 </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Primer apellido:</h3>
                     <div class="form-group">
                       <input type="text" name="apellido1" id="apellido1" class="form-control input-lg" placeholder="" tabindex="1">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Segundo apellido:</h3>
                     <div class="form-group">
                       <input type="text" name="apellido2" id="apellido2" class="form-control input-lg" placeholder="" tabindex="1">
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-xs-12 col-sm-2 col-md-2"></div>
                 <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Sexo:</h3>
                     <div class="form-group">
                        <label class="radio" for="radios-0">
                        <input type="radio" name="sexo" id="radios-0" value="M" checked="checked" tabindex="5">
                        Masculino
                        </label>
                        <label class="radio" for="radios-1">
                        <input type="radio" name="sexo" id="radios-1" value="F" tabindex="6">
                        Femenino
                        </label>
					</div>
                 </div>
                 <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Fecha de nacimiento:</h3>
                     <div class="form-group">
                       <input type="date" name="fecha_nac" id="fecha_nac">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-2 col-md-2"></div>

                 <!-- <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Fecha de Contratación:</h3>
                     <div class="form-group">
                       <input type="date" name="fecha_contr" id="fecha_contr">
                     </div>
                 </div>-->
             </div>
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Dirección:</h3>
                    <div class="form-group">
                        <input type="text" name="dir" id="dir" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Departamento:</h3>
                    <div class="form-group">
                        <input type="text" name="cod_dpto" id="cod_dpto" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Cargo:</h3>
                    <div class="form-group">
                        <input type="text" name="cod_cargo" id="cod_cargo" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>

             </div>



                 <br>


           <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-6" id="correos">
                 <!--   <input type="email" name="correo" id="correo" class="form-control input-lg" placeholder="Correo" tabindex="4">-->
                   <button type="button" class="btn btn-md btn-primary" onclick="addCorreo()">Añadir Correo</button>
                   <br>
                </div>


               <div class="col-xs-12 col-sm-6 col-md-6" id="telefonos">
<!--<input type="tel" name="telefono" id="telefono" class="form-control input-lg" placeholder="Teléfono" tabindex="4">-->
                   <button type="button" class="btn btn-md btn-primary" onclick="addTelefono()">Añadir Telefono</button>
                   <br>
                </div>
           </div>

             <br>
             <div class="row">
                 <div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                 <div class="col-xs-12 col-md-6"><a href="<?= base_url();?>index.php/empleados/cargarGestionEmpleados" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
            </div>
</form>
         </div>
       </div>
     </div>
   </div>
