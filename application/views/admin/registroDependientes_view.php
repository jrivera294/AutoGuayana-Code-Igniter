<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h2 class="sub-header">Registro Dependiente</h2>
         <div>
         <form role="form"  action="<?= base_url();?>index.php/dependientes/registrarDependiente"  method="post">

             <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>C.I:</h3>
                     <div class="form-group">
                       <input disabled type="text" name="nombre"  value="<?= $_POST['cedula']; ?>" >
                         <input  type="hidden" name="id"  value="<?= $_POST['id']; ?>" >
                         <input  type="hidden" name="nombreE"  value="<?= $_POST['nombre']; ?>" >
                         <input  type="hidden" name="apellido1E"  value="<?= $_POST['apellido1']; ?>" >
                         <input  type="hidden" name="apellido2" value="<?= $_POST['cedula']; ?>" >
                         <input  type="hidden" name="departamentoE" value="<?= $_POST['departamento']; ?>" >
                     </div>
                 </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                   <h3>Nombre:</h3>
                     <div class="form-group">
                       <input disabled type="text" name="apellido1" id="apellido1" class="form-control input-lg" value="<?php echo $_POST['nombre']." ".$_POST['apellido1']." ".$_POST['apellido2']; ?>" tabindex="1">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-4 col-md-4">
                  <!-- <h3>Departamento:</h3>
                     <div   class="form-group">
                       <input disabled type="text" name="apellido2" id="apellido2" class="form-control input-lg" placeholder="" tabindex="1">
                     </div>-->
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

             <br>

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




             <br>

            <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Parentesco:</h3>
                    <div class="form-group">
                        <input type="text" name="parentesco" id="parentesco" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
            </div>

             <br>
             <div class="row">
                 <div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                 </form>

                 <div class="col-xs-12 col-md-6">
                 <form role="form"  action="<?= base_url();?>index.php/dependientes/cargarGestionDependientes"  method="post">


                         <input  type="hidden" name="id" value="<?= $_POST['id']; ?>">
                         <input  type="hidden" name="nombre"  value="<?= $_POST['nombre']; ?>" >
                         <input  type="hidden" name="apellido1"  value="<?= $_POST['apellido1']; ?>">
                         <input  type="hidden" name="apellido2" value="<?= $_POST['apellido2']; ?>" >
                         <input  type="hidden" name="cedula"  value="<?= $_POST['cedula']; ?>" >
                         <input  type="hidden" name="dpto" value="<?= $_POST['departamento']; ?>" >
                         <input type="submit" value="Cancelar" class="btn btn-warning btn-block btn-lg">
                 </form>
                </div>
            </div>

         </div>
       </div>
     </div>
   </div>
