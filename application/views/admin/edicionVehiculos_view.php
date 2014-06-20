<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Artículos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="active"><a href="<?= base_url("index.php/admin/registroArticulos");?>">Registrar artículos</a></li>
                     <li ><a href="<?= base_url("index.php/admin/gestionArticulos");?>">Gestionar artículos</a></li>
                </ul>
            </li>
              <li class="dropdown-submenu active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Vehículos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="active"><a href="<?= base_url("index.php/admin/registroVehiculos");?>">Registrar vehículos</a></li>
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


          <h2 class="sub-header">Registro de vehículo</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/admin/guardarVehiculo' method="post">
              <?php
                    if(is_array($vehiculo) && count($vehiculo) ) {

                   //  $desc = $articulos['descripcion'];

              ?>
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Serial:</h3>
					<div class="form-group">
                        <input type="text" name="serial" id="serial" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['serial']; ?>" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Modelo:</h3>
					<div class="form-group">
                        <input type="text" name="modelo" id="modelo" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['modelo']; ?>" tabindex="2">
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Precio (Bsf):</h3>
					<div class="form-group">
                        <input type="text" name="precio" id="precio" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['precio']; ?>"tabindex="3">
					</div>
				</div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Fecha de fabricación:</h3>
					<div class="form-group">
                        <input type="date" name="fecha_fab" value="<?php echo $articulos['fecha_fab']; ?>"id="fecha_fab">
					</div>
				</div>

			</div>

			<div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Lugar de fabricación:</h3>
					<div class="form-group">
                        <input type="text" name="lugar_fab" id="lugar_fab" class="form-control input-lg" value="<?php echo $vehiculo['lugar_fab']; ?>" placeholder="" tabindex="4">
					</div>
				</div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Nro. Cilindros:</h3>
					<div class="form-group">
                        <input type="text" name="nro_cil" id="nro_cil" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['nro_cil']; ?>" tabindex="5">
					</div>
				</div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Nro. Puertas:</h3>
					<div class="form-group">
                        <input type="text" name="nro_puertas" id="nro_puertas" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['nro_puertas']; ?>" tabindex="6">
					</div>
				</div>

			</div>
			<div class="row">

 				<div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Peso (Kg):</h3>
					<div class="form-group">
                        <input type="text" name="peso" id="peso" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['peso']; ?>" tabindex="7">
					</div>
				</div>
 				<div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Capacidad:</h3>
					<div class="form-group">
                        <input type="text" name="capacidad" id="capacidad" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['capacidad']; ?>" tabindex="8">
					</div>
				</div>
                <div class="col-xs-8 col-sm-6 col-md-6">
                    <h3>Color:</h3>
					<div class="form-group" id="color"/>

                        Color0:
                        <input type="text" name="color0" id="color0" class="form-control input-lg" placeholder=""  tabindex="9">
                        <br>

					</div>
                <button type="button" class="btn btn-md btn-primary" onclick="addColor()">Añadir</button>
				</div>
			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Kilometraje:</h3>
					<div class="form-group">
                        <input type="text" name="kilometraje" id="kms" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['kilometraje']; ?>" tabindex="10">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Monto de la garantía extendida:</h3>
					<div class="form-group">
                        <input type="text" name="monto_garantia" id="monto_garantia" class="form-control input-lg" value="<?php echo $vehiculo['monto_garantia']; ?>" placeholder="" tabindex="11">
					</div>
				</div>
			</div>

            <div class="row">
                <h3>Otras especificaciones:</h3>
                <div class="col-xs-8 form-group" id="opcion">
                Opcion0:
				<input type="text" name="opcion0" id="opcion0" class="form-control input-lg" placeholder="Opcion" tabindex="12">
                    <br>
			     </div>
                <button type="button" class="btn btn-md btn-primary" onclick="addOpcion()">Añadir</button>
            </div>

			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="13"></div>
				<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
			</div>
              <?php } ?>
		</form>
          </div>
        </div>
      </div>
    </div>
