<div class="container-fluid">
      <div class="row">
       <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li class="dropdown-submenu  active">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Artículos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li ><a href="<?= base_url("index.php/admin/registroArticulos");?>">Registrar artículos</a></li>
                     <li class="active" ><a href="<?= base_url("index.php/admin/gestionArticulos");?>">Gestionar artículos</a></li>
                </ul>
            </li>
              <li class=" dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Vehículos
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li ><a href="<?= base_url("index.php/admin/registroVehiculos");?>">Registrar vehículos</a></li>
                     <li ><a href="<?= base_url("index.php/admin/gestionVehiculos");?>">Gestionar vehículos</a></li>
                </ul>
            </li>
            <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Empleados
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li ><a href="#">Gestionar empleados</a></li>
                     <li ><a href="#">Gestionar fichas</a></li>
                </ul>
            </li>
              <li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     Reportes
                     <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li ><a href="#">Ventas</a></li>
                     <li ><a href="#">Top 5 vendedores</a></li>
                     <li ><a href="#">Desempeño general</a></li>
                </ul>
            </li>
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
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($articulos) && count($articulos) ) {
                        foreach($articulos as $loop){
                ?>
                <tr>
                  <td><?=$loop->id;?></td>
                  <td><?=$loop->fabricante?></td>
                  <td><?=$loop->modelo;?></td>
                  <td><?= $loop->descripcion;?></td>
                  <td><?= $loop->stock;?></td>
                  <td><?= $loop->precio?></td>
                  <td>
                        <form action="<?= base_url("index.php/admin/edicionArticulos");?>" method="post" id="formulario">
                            <input type="hidden" name = "id" value="<?= $loop->id; ?>">
                            <input type="hidden" name = "fabricante" value="<?= $loop->fabricante?>">
                            <input type="hidden" name = "modelo" value="<?=$loop->modelo;?>">
                            <input type="hidden" name = "descripcion" value="<?= $loop->descripcion;?>">
                            <input type="hidden" name = "stock" value="<?= $loop->stock;?>">
                            <input type="hidden" name = "precio" value="<?= $loop->precio?>">
                            <button class="btn-warning btn-xs btn-primary" type="submit">Editar</input>

                        </form>
                  </td>
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
