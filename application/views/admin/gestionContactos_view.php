<div class="container-fluid">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php
        echo "Contactos"."<br>";
        echo $empleado['id']."<br>";
        echo $empleado['cedula']."<br>";
        echo $empleado['nombre']."<br>";
        echo $empleado['departamento']."<br>";

        foreach($telefonos as $tlf){
            echo "telefono ".$tlf->telefono." <br>";
        }
        foreach($correos as $correo){
            echo "correo ".$correo->correo." <br>";
        }

    ?>
        <h2 class="sub-header">Información de Contacto</h2>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3>Empleado: <?php echo $empleado['nombre']." ".$empleado['apellido1']." ".$empleado['apellido2']; ?> </h3>
            </div>
            <div class="col-xs-12 col-md-6">
                <h3>Departamento: <?php echo $empleado['departamento']; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3>C.I: <?php echo $empleado['cedula']; ?></h3>
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
                                    <form action="<?= base_url("index.php/empleados/eliminarTelefono"); ?>" method="post" id="tlf">
                                    <input type="hidden" name = "id" value="<?php $empleado['id']; ?>">
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
                                        <form action="<?= base_url("index.php/empleados/eliminarCorreo");?>" method="post" id="correo">
                                            <input type="hidden" name = "id" value="<?php $empleado['id']; ?>">
                                            <input type="hidden" name = "telefono" value="<?= $correo->correo;  ?>">
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
                <form action="<?= base_url("index.php/empleados/agregarCorreo");?>" method="post" id="correo">
                    <input type="hidden" name = "id" value="<?php $empleado['id']; ?>">
                    <input type="text" name = "telefono" >
                    <button class="btn btn-xs btn-primary" type="submit">Agregar</input>
                </form>
            </div>
            <div class="col-xs-6 col-md-6"></div>
            <div class="col-xs-6 col-md-3">
                <label>Nuevo Correo</label>
                <form action="<?= base_url("index.php/empleados/agregarTelefono");?>" method="post" id="correo">
                    <input type="hidden" name = "id" value="<?php $empleado['id']; ?>">
                    <input type="email" name = "correo">
                    <button class="btn btn-xs btn-primary" type="submit">Agregar</input>
                </form>
            </div>
          <!--  <div class="col-xs-6 col-md-2"></div> -->
        </div>
</div>
