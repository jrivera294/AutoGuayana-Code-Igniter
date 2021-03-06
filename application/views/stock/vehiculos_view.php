<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= base_url("index.php/vehiculos/vehiculos");?>">Vehículos</a></li>
            <li ><a href="<?= base_url("index.php/articulos/articulos");?>">Artículos</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Vehículos</h2>
          <div>
          <form class="form-horizontal">
            <fieldset>


            <!-- Button Drop Down -->
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

            </fieldset>
          </form>

          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Modelo</th>
                  <th>Color</th>
                  <th>Fecha de fabricación</th>
                  <th>Precio (Bsf)</th>
                  <th>Ver más</th>
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
                  <td><?=$loop->id;?></td>
                  <td><?=$loop->modelo;?></td>
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
                  <td><?=$loop->fecha_fab;?></td>
                  <td><?=$loop->precio;?></td>
                  <td>
                      <button type="button" class="btn btn-xs btn-primary">Ver</button>
                  </td>
                </tr>
                <?php    $vehiculoActual++;
                        }
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
