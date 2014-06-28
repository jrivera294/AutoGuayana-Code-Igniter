<div class="container-fluid">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2 class="sub-header">Dependientes</h2>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3>Empleado: <?php echo $empleado['nombre']." ".$empleado['apellido1']." ".$empleado['apellido2']; ?> </h3>
            </div>
            <div class="col-xs-12 col-md-6">
                <h3>Departamento: <?php echo $empleado['departamento']; ?></h3>
            </div>
        </div>
          <div>
             <?php
                    if(is_array($empleado) && count($empleado) ) {
                ?>
             <form action="<?= base_url("index.php/dependientes/cargarRegistroDependientes");?>" method="post" id="dependientes">
                            <input type="hidden" name = "id" value="<?= $empleado['id']; ?>">
                            <input type="hidden" name = "cedula" value="<?= $empleado['cedula']; ?>">
                            <input type="hidden" name = "nombre" value="<?= $empleado['nombre']; ?>">
                            <input type="hidden" name = "apellido1" value="<?= $empleado['apellido1']; ?>">
                            <input type="hidden" name = "apellido2" value="<?= $empleado['apellido2']; ?>">
                            <input type="hidden" name = "departamento" value="<?= $empleado['departamento']; ?>">
                           <button class="btn btn-lg btn-primary" type="submit">Agregar Dependiente</input>
             </form>
              <?php


                    }
            ?>
          </div>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Sexo</th>
                  <th>F. Nacimiento</th>
                  <th>Parentesco</th>
                </tr>
              </thead>
                <tbody>
                <?php
                    if(is_array($dependientes) && count($dependientes) ) {
                        $i=0;
                        foreach($dependientes as $loop){
                ?>
                <tr>
                  <td><?=$loop->nombre?> <?=$loop->apellido1?> <?=$loop->apellido2?></td>
                  <td><?=$loop->sexo; ?></td>
                  <td><?=$loop->fecha_nac; ?></td>
                  <td><?=$loop->parentesco; ?></td>
                </tr>
                <?php
                        }
                    } ?>
                </tbody>
            </table>
              <div class="row">
                  <div class="col-xs-12 col-md-2"><br><br></div>
                  <div class="col-xs-12 col-md-6">
                      <a href="<?= base_url();?>index.php/empleados/cargarGestionEmpleados" class="btn btn-warning btn-block btn-lg">Retornar</a>
                  </div>
              </div>
        </div>
    </div>
</div>
