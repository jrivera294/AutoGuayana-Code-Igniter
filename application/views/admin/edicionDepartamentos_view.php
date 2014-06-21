<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Editar Departamento</h2>
         <div>
          <form role="form" action='<?= base_url();?>index.php/departamentos/editarDepartamento' method="post">
             <?php
                    if(is_array($departamento) && count($departamento) ) {

                   //  $desc = $articulos['descripcion'];

              ?>
             <input type="hidden" name = "cod_dpto" value="<?php echo $departamento['cod_dpto']; ?>">
             <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <h3>Cod_Dpto:</h3>
                    <div class="form-group">
                        <input disabled type="text" name="cod_dpto_visible" id="cod_dpto_visible"  class="form-control input-lg" placeholder="" value=
                               "<?php echo $departamento['cod_dpto']; ?>" tabindex="1">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-10 col-md-10">
                    <h3>Nombre:</h3>
                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre"  class="form-control input-lg" placeholder="" value=
                               "<?php echo $departamento['nombre']; ?>" tabindex="1">
                    </div>
                </div>
            </div>


             <?php } ?>

             <br>

             <div class="row">
                 <div class="col-xs-12 col-md-6"><input type="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                 <div class="col-xs-12 col-md-6"><a href="<?= base_url("index.php/departamentos");?>" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
             </div>

             </form>
         </div>
       </div>
     </div>
   </div>
