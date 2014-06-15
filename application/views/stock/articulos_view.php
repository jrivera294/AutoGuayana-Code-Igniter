<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="<?= base_url("index.php/stock/traerVehiculos");?>">Vehículos</a></li>
            <li class="active"><a href="<?= base_url("index.php/stock/traerArticulos");?>">Artículos</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Artículos</h2>
          <div>
          <form class="form-horizontal">
            <fieldset>


            <!-- Button Drop Down -->
            <div class="control-group">
              <label class="control-label" for="buttondropdown">Buscar Artículo</label>
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
                  <th>Fabricante</th>
                  <th>Modelo</th>
                  <th>Descripción</th>
                  <th>Disponibilidad</th>
                  <th>Precio (Bsf)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($articulos) && count($articulos) ) {
                        foreach($articulos as $loop){
                ?>
                <tr>
                  <td><?=$loop->id;?></td>
                  <td><?=$loop->fabricante;?></td>
                  <td><?=$loop->modelo;?></td>
                  <td><?=$loop->descripcion;?></td>
                  <td><?=$loop->stock;?></td>
                  <td><?=$loop->precio;?></td>
                </tr>

                  <?php
                        }
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
