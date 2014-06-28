<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= base_url("index.php/clientes/");?>">Clientes</a></li>
            <li><a href="<?= base_url("index.php/clientes/register");?>">Registrar clientes</a></li>
          </ul>
        </div>
<div class="container-fluid">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php


    ?>
        <h2 class="sub-header">Información de Contacto</h2>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3>Cliente: <?php echo $cliente['nombre']." ".$cliente['apellido1']." ".$cliente['apellido2']; ?> </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3>C.I: <?php echo $cliente['cedula']; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-5">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th>Telefono</th>
                              <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($telefonos as $tlf){?>
                            <tr>
                                <td><?php echo $tlf->telefono; ?></td>
                                <td>
                                    <form action="<?= base_url("index.php/clientes/eliminarTelefono"); ?>" method="post" id="tlf">
                                    <input type="hidden" name = "cedula" value="<?= $cliente['cedula']; ?>">
                                    <input type="hidden" name = "nombre" value="<?= $cliente['nombre']; ?>">
                                    <input type="hidden" name = "apellido1" value="<?= $cliente['apellido1']; ?>">
                                    <input type="hidden" name = "apellido2" value="<?= $cliente['apellido2']; ?>">
                                    <input type="hidden" name = "telefono" value="<?= $tlf->telefono;  ?>">
                                    <button class="btn btn-xs btn-danger" type="submit">Eliminar</input>
                                    </form>
                                </td>
                            </tr>
                             <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-md-2"></div>
            <div class="col-xs-12 col-md-5">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th>Correo</th>
                              <th>Eliminar</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php foreach($correos as $correo){?>
                                <tr>
                                    <td><?php echo $correo->correo; ?></td>
                                    <td>
                                        <form action="<?= base_url("index.php/clientes/eliminarCorreo");?>" method="post" id="correo">
                                        <input type="hidden" name = "cedula" value="<?= $cliente['cedula']; ?>">
                                        <input type="hidden" name = "nombre" value="<?= $cliente['nombre']; ?>">
                                        <input type="hidden" name = "apellido1" value="<?= $cliente['apellido1']; ?>">
                                        <input type="hidden" name = "apellido2" value="<?= $cliente['apellido2']; ?>">
                                        <input type="hidden" name = "correo" value="<?= $correo->correo;  ?>">
                                        <button class="btn btn-xs btn-danger" type="submit">Eliminar</input>
                                        </form>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
          <!--  <div class="col-xs-6 col-md-2"></div> -->
            <div class="col-xs-6 col-md-3">
                <label>Nuevo Telefono</label>
                <form action="<?= base_url("index.php/clientes/agregarTelefono");?>" method="post" id="telefono">
                    <input type="hidden" name = "cedula" value="<?= $cliente['cedula']; ?>">
                    <input type="hidden" name = "nombre" value="<?= $cliente['nombre']; ?>">
                    <input type="hidden" name = "apellido1" value="<?= $cliente['apellido1']; ?>">
                    <input type="hidden" name = "apellido2" value="<?= $cliente['apellido2']; ?>">

                    <input type="text" name = "telefono" >
                    <button class="btn btn-xs btn-primary" type="submit">Agregar</input>
                </form>
            </div>
            <div class="col-xs-6 col-md-6"></div>
            <div class="col-xs-6 col-md-3">
                <label>Nuevo Correo</label>
                <form action="<?= base_url("index.php/clientes/agregarCorreo");?>" method="post" id="correo">
                    <input type="hidden" name = "cedula" value="<?= $cliente['cedula']; ?>">
                    <input type="hidden" name = "nombre" value="<?= $cliente['nombre']; ?>">
                    <input type="hidden" name = "apellido1" value="<?= $cliente['apellido1']; ?>">
                    <input type="hidden" name = "apellido2" value="<?= $cliente['apellido2']; ?>">
                    <input type="email" name = "correo">
                    <button class="btn btn-xs btn-primary" type="submit">Agregar</input>
                </form>
            </div>
          <!--  <div class="col-xs-6 col-md-2"></div> -->
        </div>
            <div class="row">
                  <div class="col-xs-12 col-md-3"><br><br></div>
                  <div class="col-xs-12 col-md-6">
                      <br>
                      <br>
                      <a href="<?= base_url();?>index.php/clientes" class="btn btn-warning btn-block btn-lg">Retornar</a>
                  </div>
              </div>
</div>
