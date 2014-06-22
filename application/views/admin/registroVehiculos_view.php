<script type='text/javascript'>
        function addColor(){


            var container = document.getElementById("color");

            i=container.childElementCount/2;
            container.appendChild(document.createTextNode("Color " + (i)));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "color"+i;
            input.id="color"+i;
            input.className = "form-control input-lg";
            //input.addClass("form-control input-lg");
            container.appendChild(input);
            // Append a line break
            container.appendChild(document.createElement("br"));
            // }

        }
        function addOpcion(){


            var container = document.getElementById("opcion");

            i=((container.childElementCount))/2;
            container.appendChild(document.createTextNode("Opcion " + (i)));
            // Create an <input> element, set its type and name attributes
            var input = document.createElement("input");
            input.type = "text";
            input.name = "opcion" + i;
            input.id="opcion"+i;
            input.className = "form-control input-lg";
            container.appendChild(input);
            container.appendChild(document.createElement("br"));


        }
    </script>
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Registro de vehículo</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/vehiculos/registrarVehiculo' method="post">

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Serial:</h3>
					<div class="form-group">
                        <input type="text" name="serial" id="serial" class="form-control input-lg" placeholder="" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Modelo:</h3>
					<div class="form-group">
                        <input type="text" name="modelo" id="modelo" class="form-control input-lg" placeholder="" tabindex="2">
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Precio (Bsf):</h3>
					<div class="form-group">
                        <input type="text" name="precio" id="precio" class="form-control input-lg" placeholder="" tabindex="3">
					</div>
				</div>

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Fecha de fabricación:</h3>
					<div class="form-group">
                        <input type="date" name="fecha_fab" id="fecha_fab">
					</div>
				</div>

			</div>

			<div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Lugar de fabricación:</h3>
					<div class="form-group">
                        <input type="text" name="lugar_fab" id="lugar_fab" class="form-control input-lg" placeholder="" tabindex="4">
					</div>
				</div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Nro. Cilindros:</h3>
					<div class="form-group">
                        <input type="text" name="nro_cilindros" id="nro_cilindros" class="form-control input-lg" placeholder="" tabindex="5">
					</div>
				</div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Nro. Puertas:</h3>
					<div class="form-group">
                        <input type="text" name="nro_puertas" id="nro_puertas" class="form-control input-lg" placeholder="" tabindex="6">
					</div>
				</div>

			</div>
			<div class="row">

 				<div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Peso (Kg):</h3>
					<div class="form-group">
                        <input type="text" name="peso" id="peso" class="form-control input-lg" placeholder="" tabindex="7">
					</div>
				</div>
 				<div class="col-xs-12 col-sm-3 col-md-3">
                    <h3>Capacidad:</h3>
					<div class="form-group">
                        <input type="text" name="capacidad" id="capacidad" class="form-control input-lg" placeholder="" tabindex="8">
					</div>
				</div>
                <div class="col-xs-8 col-sm-6 col-md-6">
                    <h3>Color:</h3>
					<div class="form-group" id="color"/>

                        Color0:
                        <input type="text" name="color0" id="color0" class="form-control input-lg" placeholder="" tabindex="9">
                        <br>

					</div>
                <button type="button" class="btn btn-md btn-primary" onclick="addColor()">Añadir</button>
				</div>
			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Kilometraje:</h3>
					<div class="form-group">
                        <input type="text" name="kms" id="kms" class="form-control input-lg" placeholder="" tabindex="10">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Monto de la garantía extendida:</h3>
					<div class="form-group">
                        <input type="text" name="monto_garantia" id="monto_garantia" class="form-control input-lg" placeholder="" tabindex="11">
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
		</form>
          </div>
        </div>
      </div>
    </div>
