<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="<?= base_url("index.php/clientes/");?>">Clientes</a></li>
            <li class="active"><a href="<?= base_url("index.php/clientes/register");?>">Registrar clientes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Registro de cliente</h2>
          <div>
          <form role="form" action='<?= base_url();?>index.php/clientes/save' method="post">

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Cédula:</h3>
					<div class="form-group">
                        <input type="text" name="cedula" id="cedula" class="form-control input-lg" placeholder="Ejemplo: 12345678" tabindex="1" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Nombre:</h3>
					<div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="" tabindex="2" required>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Primer apellido:</h3>
					<div class="form-group">
                        <input type="text" name="apellido1" id="apellido1" class="form-control input-lg" placeholder="" tabindex="3" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Segundo apellido:</h3>
					<div class="form-group">
                        <input type="text" name="apellido2" id="apellido2" class="form-control input-lg" placeholder="" tabindex="4" required>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
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

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Fecha de nacimiento:</h3>
					<div class="form-group">
                        <input type="date" name="fecha_nac" >
					</div>
				</div>


			</div>
			<div class="row">

 				<div class="col-xs-12 col-sm-12 col-md-12">
                    <h3>Dirección:</h3>
					<div class="form-group">
                        <input type="text" name="dir" id="dir" class="form-control input-lg" placeholder="" tabindex="7">
					</div>
				</div>

			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Empresa donde trabaja:</h3>
					<div class="form-group">
                        <input type="text" name="empresa" id="empresa" class="form-control input-lg" placeholder="" tabindex="8">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h3>Aproximado de ingresos:</h3>
					<div class="form-group">
                        <input type="number" name="ingresos" step="any" id="ingresos" class="form-control input-lg" tabindex="9" value="0">
					</div>
				</div>

			</div>

            <div class="row">
                <div class="col-xs-8 form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Correo" tabindex="10">
			     </div>
                <button type="button" class="btn btn-md btn-primary">Añadir</button>
            </div>
            <div class="row">
                <div class="col-xs-8 form-group">
				<input type="tel" name="telefono" id="telefono" class="form-control input-lg" placeholder="Teléfono" tabindex="11">
			     </div>
                <button type="button" class="btn btn-md btn-primary">Añadir</button>
            </div>


			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
				<div class="col-xs-12 col-md-6"><a href="<?= base_url("index.php/clientes/register");?>" class="btn btn-warning btn-block btn-lg" tabindex="13">Cancelar</a></div>
			</div>
		</form>
          </div>
        </div>
      </div>
    </div>
