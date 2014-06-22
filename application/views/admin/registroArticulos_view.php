<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Registro Articulo</h2>
         <div>
         <form role="form" action='<?= base_url();?>index.php/articulos/registrarArticulo' method="post">


             <div class="row">
                 <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>ID:</h3>
                    <div class="form-group">
                        <input type="text" name="id" id="id" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Descripcion:</h3>
                    <div class="form-group">
                        <input type="text" name="descripcion" id="descripcion" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>
            </div>
             <div class="row">
                 <div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Modelo:</h3>
                    <div class="form-group">
                       <input type="text" name="modelo" id="modelo" class="form-control input-lg" placeholder="" tabindex="1">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Fabricante:</h3>
                    <div class="form-group">
                        <input type="text" name="fabricante" id="fabricante" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>

             </div>

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Precio:</h3>
                        <div class="form-group">
                            <input type="text" name="precio" id="precio" class="form-control input-lg" placeholder="" tabindex="1">
                        </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Disponibilidad:</h3>
                    <div class="form-group">
                        <input type="text" name="stock" id="stock" class="form-control input-lg" placeholder="" tabindex="1">
                    </div>
                </div>
            </div>



             <br>

             <div class="row">
                 <div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                 <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
             </div>
             </form>
         </div>
       </div>
     </div>
   </div>
