<div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Empleados</h2>
          <div>
          <form class="form-horizontal">
            <div class="row">

            <div class="col-xs-12 col-md-6">
            <!-- Button Drop Down -->
            <div class="control-group">
              <label class="control-label" for="buttondropdown">Buscar empleado</label>
              <div class="controls">
                <div class="input-append">
                  <input id="buttondropdown" name="buttondropdown" class="input-xlarge" placeholder="" type="text">
                  <div class="btn-group">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                      Tipo de búsqueda
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Nombre</a></li>
                      <li><a href="#">Cédula</a></li>
                      <li><a href="#">Id</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="col-xs-12 col-md-6">
                      <br>
                    <a href="<?= base_url("index.php/empleados/cargarRegistroEmpleados");?>"> <input  type="button "value="Agregar Empleado" class="btn btn-primary btn-block btn-lg" tabindex="7" >
                   </a>
                </div>
            </div>
          </form>

          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Sexo</th>
                  <th>Dirección</th>
                  <th>F. Contratacion</th>
                  <th>Departamento</th>
                  <th>Cargo</th>
                  <th>Estatus</th>
                  <th>Info Contacto</th>
                  <th>Dependientes</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($empleados) && count($empleados) ) {
                        $i=0;
                        foreach($empleados as $loop){
                ?>
                <tr>
                  <td><?=$loop->cedula;?></td>
                  <td><?=$loop->nombre?> <?=$loop->apellido1?> <?=$loop->apellido2?></td>
                  <td><?=$loop->sexo?></td>
                  <td><?=$loop->dir;?></td>
                  <td>
                    <?php
                        if($loop->fecha_contr){
                            echo date("d/m/Y",strtotime($loop->fecha_contr));
                    }
                  ?></td>
                  <td><?= $departamentos[$i]; ?></td>
                  <td><?= $cargos[$i]; ?></td>
                  <td><?= $loop->status; ?></td>
                  <td>
                       <form action="<?= base_url("index.php/empleados/cargarContactosEmpleado");?>" method="post" id="contactos">
                            <input type="hidden" name = "id" value="<?= $loop->id; ?>">
                            <input type="hidden" name = "cedula" value="<?= $loop->cedula; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "apellido1" value="<?= $loop->apellido1; ?>">
                            <input type="hidden" name = "apellido2" value="<?= $loop->apellido2; ?>">
                            <input type="hidden" name = "dpto" value="<?= $departamentos[$i]; ?>">
                           <button class="btn btn-xs btn-primary" type="submit">Ver</input>
                        </form>
                  </td>
                  <td>
                       <form action="<?= base_url("index.php/dependientes/cargarGestionDependientes");?>" method="post" id="dependientes">
                            <input type="hidden" name = "id" value="<?= $loop->id; ?>">
                            <input type="hidden" name = "cedula" value="<?= $loop->cedula; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "apellido1" value="<?= $loop->apellido1; ?>">
                            <input type="hidden" name = "apellido2" value="<?= $loop->apellido2; ?>">
                            <input type="hidden" name = "dpto" value="<?= $departamentos[$i]; ?>">
                           <button class="btn btn-xs btn-warning" type="submit">Ver</input>
                        </form>
                  </td>
                  <td>
                        <form action="<?= base_url("index.php/empleados/cargarEdicionEmpleados");?>" method="post" id="formulario">
                            <input type="hidden" name = "id" value="<?= $loop->id; ?>">
                            <input type="hidden" name = "password" value="<?= $loop->password; ?>">
                            <input type="hidden" name = "cedula" value="<?= $loop->cedula; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "apellido1" value="<?= $loop->apellido1; ?>">
                            <input type="hidden" name = "apellido2" value="<?= $loop->apellido2; ?>">
                            <input type="hidden" name = "sexo" value="<?= $loop->sexo; ?>">
                            <input type="hidden" name = "dir" value="<?= $loop->dir; ?>">
                            <input type="hidden" name = "fecha_nac" value="<?= $loop->fecha_nac; ?>">
                            <input type="hidden" name = "fecha_contr" value="<?= $loop->fecha_contr; ?>">
                            <input type="hidden" name = "status" value="<?= $loop->status; ?>">
                            <input type="hidden" name = "cod_cargo" value="<?= $loop->cod_cargo; ?>">
                            <input type="hidden" name = "cod_dpto" value="<?= $loop->cod_dpto; ?>">
                            <button class="btn-success btn-xs btn-primary" type="submit">Editar</input>

                        </form>
                  </td>
                </tr>
                <?php
                         $i++;
                        }
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
