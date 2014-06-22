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
            input.name = "correo" + i;
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
         <form role="form">

<div class="row">

<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Cédula:</h3>
<div class="form-group">
                       <input type="text" name="cedula" id="cedula" class="form-control input-lg" placeholder="Ejemplo: 12345678" tabindex="1">
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Nombre:</h3>
<div class="form-group">
                       <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>

</div>

<div class="row">

<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Primer apellido:</h3>
<div class="form-group">
                       <input type="text" name="apellido1" id="apellido1" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Segundo apellido:</h3>
<div class="form-group">
                       <input type="text" name="apellido2" id="apellido2" class="form-control input-lg" placeholder="" tabindex="1">
</div>
</div>
</div>

<div class="row">

<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Sexo:</h3>
<div class="form-group">
                       <label class="radio" for="radios-0">
                       <input type="radio" name="radios" id="radios-0" value="Masculino" checked="checked">
                       Masculino
                       </label>
                       <label class="radio" for="radios-1">
                       <input type="radio" name="radios" id="radios-1" value="Femenino">
                       Femenino
                       </label>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Fecha de nacimiento:</h3>
<div class="form-group">
                       <input type="date" name="fecha_nac" id="fecha_nac">
</div>
</div>


</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <h3>Dirección:</h3>
            <div class="form-group">
                <input type="text" name="direccion" id="direccion" class="form-control input-lg" placeholder="" tabindex="1">
            </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
        <h3>Departamento:</h3>
            <div class="form-group">
                <input type="text" name="departamento" id="departamento" class="form-control input-lg" placeholder="" tabindex="1">
            </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Cargo:</h3>
        <div class="form-group">
            <input type="text" name="cargo" id="cargo" class="form-control input-lg" placeholder="" tabindex="1">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <h3>Sueldo:</h3>
        <div class="form-group">
            <input type="text" name="sueldo" id="sueldo" class="form-control input-lg" placeholder="0 Bsf" tabindex="1">
        </div>
    </div>
</div>
<div class="row">


<br>
</div>

           <div class="row">
               <div class="col-xs-4 form-group" id="correos">
                 <!--   <input type="email" name="correo" id="correo" class="form-control input-lg" placeholder="Correo" tabindex="4">-->
                   <button type="button" class="btn btn-md btn-primary" onclick="addCorreo()">Añadir Correo</button>
                   <br>
                </div>


               <div class="col-xs-4 form-group" id="telefonos">
<!--<input type="tel" name="telefono" id="telefono" class="form-control input-lg" placeholder="Teléfono" tabindex="4">-->
                   <button type="button" class="btn btn-md btn-primary" onclick="addTelefono()">Añadir Telefono</button>
                   <br>
                </div>
           </div>


<div class="row">
<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
</div>
</form>
         </div>
       </div>
     </div>
   </div>
