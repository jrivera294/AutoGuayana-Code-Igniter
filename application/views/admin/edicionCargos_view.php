<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Editar Cargo</h2>
         <div>
          <form role="form" action='<?= base_url();?>index.php/cargos/editarCargo' method="post">
             <?php
                    if(is_array($cargo) && count($cargo) ) {

                   //  $desc = $articulos['descripcion'];

              ?>
             <input type="hidden" name = "cod_cargo" value="<?php echo $cargo['cod_cargo']; ?>">
             <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-2">
                    <h3>Cod_Cargo:</h3>
                    <div class="form-group">
                        <input disabled type="text" name="cod_cargo_visible" id="cod_cargo_visible"  class="form-control input-lg" placeholder="" value=
                               "<?php echo $cargo['cod_cargo']; ?>" tabindex="1">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-5 col-md-5">
                    <h3>Nombre:</h3>
                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre"  class="form-control input-lg" placeholder="" value=
                               "<?php echo $cargo['nombre']; ?>" tabindex="1">
                    </div>
                </div>
                  <div class="col-xs-12 col-sm-5 col-md-5">
                    <h3>Sueldo:</h3>
                    <div class="form-group">
                        <input type="text" name="sueldo" id="sueldo"  class="form-control input-lg" placeholder="" value=
                               "<?php echo $cargo['sueldo']; ?>" tabindex="1">
                    </div>
                </div>
            </div>


             <?php } ?>

             <br>

             <div class="row">
                 <div class="col-xs-12 col-md-6"><input type="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                 <div class="col-xs-12 col-md-6"><a href="<?= base_url("index.php/cargos");?>" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
             </div>

             </form>
         </div>
       </div>
     </div>
   </div>
