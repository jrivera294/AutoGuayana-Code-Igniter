<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Registro Aseguradora</h2>
         <div>
         <form role="form" action="<?= base_url();?>index.php/seguro/registrarSeguro" method="post">




         <div class="row">

             <div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Rif Aseguradora:</h3>
                        <div class="form-group">
                            <input type="text" name="rif_aseguradora" id="rif_aseguradora" class="form-control input-lg" placeholder="" tabindex="1">
                        </div>
            </div>
             <div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Nombre:</h3>
                 <div class="form-group">
                       <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="" tabindex="1">
                 </div>
             </div>
         </div>



<br>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
            <div class="col-xs-12 col-md-6"><a href="<?= base_url();?>index.php/seguro" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
        </div>
    </form>
         </div>
       </div>
     </div>
   </div>
