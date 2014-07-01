 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Vehículos</h2>
          <div>
          <form class="form-horizontal">
            <div class="row">


            <!-- Button Drop Down -->
            <div class="col-xs-12 col-md-6">
            <div class="control-group">
              <label class="control-label" for="buttondropdown">Buscar Vehículo</label>
              <div class="controls">
                <div class="input-append">
                  <input id="buttondropdown" name="buttondropdown" class="input-xlarge" placeholder="" type="text">
                  <div class="btn-group">
                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                      Tipo de búsqueda
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Id</a></li>
                      <li><a href="#">Modelo</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            </div>

             <div class="col-xs-12 col-md-6">
                      <br>
                    <a href="<?= base_url("index.php/vehiculos/cargarRegistroVehiculos");?>"> <input  type="button "value="Agregar Vehiculo" class="btn btn-primary btn-block btn-lg" tabindex="7" >
                   </a>
                </div>
            </div>
          <br>
          </form>

          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Serial</th>
                  <th>Modelo</th>
                  <th>Color</th>
                  <th>Fecha de fabricación</th>
                  <th>Precio (Bsf)</th>
                  <th>Editar</th>
                  <th>Generar calcomania</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $vehiculoActual=0; //variables auxiliares para imprimir el color
                    $indiceVehiculo=0;
                    if(is_array($vehiculos) &&  is_array($colores) && count($vehiculos) ) {
                        foreach($vehiculos as $loop){
                ?>
                <tr>
                  <td><?= $loop->id ?></td>
                  <td><?= $loop->modelo ?></td>
                  <?php
                    $indiceVehiculo=0;
                    foreach ($colores  as $row){
                        if ($indiceVehiculo==$vehiculoActual){
                            echo"<td>";
                            foreach($row as $r)
                                echo $r->color."<br>";
                            echo"</td>";
                        }
                        $indiceVehiculo++;
                    }
                   ?>

                  <td><?= $loop->fecha_fab ?></td>
                  <td><?= $loop->precio ?></td>
                  <td>
                        <form action="<?= base_url("index.php/vehiculos/cargarEdicionVehiculos");?>" method="post" id="formulario">
                            <input type="hidden" name = "serial" value="<?= $loop->id; ?>">
                            <input type="hidden" name = "precio" value="<?= $loop->precio?>">
                            <input type="hidden" name = "modelo" value="<?=$loop->modelo;?>">
                            <input type="hidden" name = "fecha_fab" value="<?= $loop->fecha_fab;?>">
                            <input type="hidden" name = "placa" value="<?= $loop->placa;?>">
                            <input type="hidden" name = "lugar_fab" value="<?= $loop->lugar_fab;?>">
                            <input type="hidden" name = "nro_cil" value="<?= $loop->nro_cil;?>">
                            <input type="hidden" name = "nro_puertas" value="<?= $loop->nro_puertas;?>">
                            <input type="hidden" name = "peso" value="<?= $loop->peso;?>">
                            <input type="hidden" name = "capacidad" value="<?= $loop->capacidad;?>">
                            <input type="hidden" name = "fecha_entrega" value="<?= $loop->fecha_entrega;?>">
                            <input type="hidden" name = "kilometraje" value="<?= $loop->kilometraje;?>">
                            <input type="hidden" name = "monto_garantia" value="<?= $loop->monto_garantia_ext;?>">
                            <button class="btn-warning btn-xs btn-primary" type="submit">Editar</input>

                        </form>
                  </td>
                  <td>
                      <a href="<?= base_url("index.php/vehiculos/calcomania_pdf/$loop->id");?>" type="button" class="btn btn-xs btn-primary">Generar</a>
                  </td>
                </tr>
                <?php
                        $vehiculoActual++;
                        }
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
