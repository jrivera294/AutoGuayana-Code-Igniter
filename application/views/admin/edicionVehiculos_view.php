<script type='text/javascript'>
        //window.onload=traer_Op_Col($data['colores'],$data['opciones']);
        function traerOp_Col(color,i){

           var containerColor = document.getElementById("color");
           // var container = document.getElementById("color");
         //  document.writeln("<h3>hola mundooooooooooooooo!!!</h3>");

          //for (i = 0 ; i < nColores ; i++){
           containerColor.appendChild(document.createTextNode("Color " + (i+1)));
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "color"+i;
                    input.id="color"+i;
                    input.className = "form-control input-lg";
                    input.value = color;
                    // document.writeln("<h3>colorrrrrrrrrrrrrrrrrrrrrrrrr</h3>"+input.name);
                    containerColor.appendChild(input);
                    containerColor.appendChild(document.createElement("br"));

           // }
          /*  container.appendChild(document.createTextNode("Color " + (i)));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "color"+i;
            input.id="color"+i;
            input.className = "form-control input-lg";*/
            //input.addClass("form-control input-lg");
          //  container.appendChild(input);
            // Append a line break
           // container.appendChild(document.createElement("br"));
            // }

        }
      //  traerOp_Col('verde',0);
    </script>
<div class="container-fluid" id="epa">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Edicion de vehículo</h2>
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
                        <input type="text" name="serial_vista" id="serial_vista" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['serial']; ?>" tabindex="1" disabled>
                        <input type="hidden" name="serial" id="serial" class="form-control input-lg" placeholder="" value="<?php echo $vehiculo['serial']; ?>" tabindex="1" >
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
                        <input type="date" name="fecha_fab" value="<?php echo $vehiculo['fecha_fab']; ?>"id="fecha_fab">
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
					<div class="form-group" id="color" name="color">
                    <?php $i=0;
                            foreach($colores as $array){

                            foreach($array as $color){
                                echo "Color"+$i; ?>

                                <input type="text" name="<?php echo "color"+$i ?>" id="<?php echo "color"+$i ?>" class="form-control input-lg" placeholder="" value="<?php echo $color; ?>" tabindex="9">
                        <?php
                                $i++;
                            }
              } ?>
                                <br>

					</div>
                  <!--  <button type="button" class="btn btn-md btn-primary" onclick="traerOp_Col('verde',0)">Añadir</button>-->
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
               <!-- Opcion0:
				<input type="text" name="opcion0" id="opcion0" class="form-control input-lg" placeholder="Opcion" tabindex="12">
                    <br>-->
			     </div>
            </div>

			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="13"></div>
				<div class="col-xs-12 col-md-6"><a href='<?= base_url("index.php/vehiculos/cargarGestionVehiculos");?>' class="btn btn-warning btn-block btn-lg">Cancelar</a></div>
			</div>
              <?php }
        ?>

		</form>
          </div>
        </div>
      </div>
    </div>
<?php foreach($colores as $array){
            foreach($array as $color){
               // echo "color: ".$color;
               ?> <script type="text/javascript">traerOp_Col(<?php $color; ?>,0)</script>
      <?php  }}?>


