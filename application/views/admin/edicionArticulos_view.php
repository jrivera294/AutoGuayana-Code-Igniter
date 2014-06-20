<div class="container-fluid">
     <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
         <ul class="nav nav-sidebar">
             <li class="dropdown-submenu active">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Artículos
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu ">
                    <li class="active" ><a href="<?= base_url("index.php/admin/registroArticulo");?>">Registrar artículos</a></li>
                    <li ><a href="<?= base_url("index.php/admin/gestionArticulos");?>">Gestionar artículos</a></li>
               </ul>
           </li>
             <li class="dropdown-submenu">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Vehículos
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                    <li><a href="<?= base_url("index.php/admin/registroVehiculos");?>">Registrar vehículos</a></li>
                    <li ><a href="<?= base_url("index.php/admin/gestionVehiculos");?>">Gestionar vehículos</a></li>
               </ul>
           </li>
           <li class="dropdown-submenu">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Empleados
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                    <li ><a href="#">Gestionar empleados</a></li>
                    <li ><a href="#">Gestionar fichas</a></li>
               </ul>
           </li>
             <li class="dropdown-submenu">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Reportes
                    <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                    <li ><a href="#">Ventas</a></li>
                    <li ><a href="#">Top 5 vendedores</a></li>
                    <li ><a href="#">Desempeño general</a></li>
               </ul>
           </li>
         </ul>
        </div>
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Edicion Articulo</h2>
         <div>
         <form role="form" action='<?= base_url();?>index.php/admin/updateArticulo' method="post">
             <?php
                    if(is_array($articulos) && count($articulos) ) {

                   //  $desc = $articulos['descripcion'];

              ?>
             <input type="hidden" name = "id" value="<?php echo $articulos['id']; ?>">
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Descripcion:</h3>
                    <div class="form-group">
                        <input type="text" name="descripcion" id="descripcion"  class="form-control input-lg" placeholder="" value=
                               "<?php echo $articulos['descripcion']; ?>" tabindex="1">
                    </div>
                </div>
            </div>
             <div class="row">
                 <div class="col-xs-12 col-sm-6 col-md-6">
                   <h3>Modelo:</h3>
                    <div class="form-group">
                       <input type="text" name="modelo" id="modelo" class="form-control input-lg" placeholder="" value=
                               "<?php echo $articulos['modelo']; ?>" tabindex="1">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Fabricante:</h3>
                    <div class="form-group">
                        <input type="text" name="fabricante" id="fabricante" class="form-control input-lg" placeholder="" value=
                               "<?php echo $articulos['fabricante']; ?>" tabindex="1">
                    </div>
                </div>

             </div>

            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Precio:</h3>
                        <div class="form-group">
                            <input type="text" name="precio" id="precio" class="form-control input-lg" placeholder="" value=
                               "<?php echo $articulos['precio']; ?>" tabindex="1">
                        </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Disponibilidad:</h3>
                    <div class="form-group">
                        <input type="text" name="stock" id="stock" class="form-control input-lg" placeholder="" value=
                               "<?php echo $articulos['stock']; ?>" tabindex="1">
                    </div>
                </div>
            </div>

             <?php } ?>

             <br>

             <div class="row">
                 <div class="col-xs-12 col-md-6"><input type="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                 <div class="col-xs-12 col-md-6"><a href="<?= base_url("index.php/admin/gestionArticulos");?>" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
             </div>

             </form>
         </div>
       </div>
     </div>
   </div>
