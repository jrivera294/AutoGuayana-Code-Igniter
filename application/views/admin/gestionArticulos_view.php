<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Artículos</h2>
          <div>
          <form class="form-horizontal">
            <div class="row">


            <!-- Button Drop Down -->
            <div class="col-xs-12 col-md-6">
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
                </div>
                <div class="col-xs-12 col-md-6">
                      <br>
                    <a href="<?= base_url("index.php/articulos/cargarRegistroArticulos");?>"> <input  type="button "value="Agregar Articulo" class="btn btn-primary btn-block btn-lg" tabindex="7" >
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
                        <form action="<?= base_url("index.php/articulos/cargarEdicionArticulos");?>" method="post" id="formulario">
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
