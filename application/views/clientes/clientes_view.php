<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= base_url("index.php/clientes/");?>">Clientes</a></li>
            <li><a href="<?= base_url("index.php/clientes/register");?>">Registrar clientes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Clientes</h2>
          <div>
          <form class="form-horizontal">
            <fieldset>


            <!-- Button Drop Down -->
            <div class="control-group">
              <label class="control-label" for="buttondropdown">Buscar cliente</label>
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

            </fieldset>
          </form>

          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Contacto</th>
                  <th>Fecha Nacimiento</th>
                  <th>Última actualización</th>
                  <th>Compras</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($clientes) && count($clientes) ) {
                        foreach($clientes as $loop){
                ?>
                <tr>
                  <td><?=$loop->cedula;?></td>
                  <td><?=$loop->nombre?> <?=$loop->apellido1?> <?=$loop->apellido2?></td>
                  <td><?=$loop->dir;?></td>
                  <td>
                      <form action="<?= base_url("index.php/clientes/cargarContactosCliente");?>" method="post" id="contactos">
                            <input type="hidden" name = "cedula" value="<?= $loop->cedula; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
                            <input type="hidden" name = "apellido1" value="<?= $loop->apellido1; ?>">
                            <input type="hidden" name = "apellido2" value="<?= $loop->apellido2; ?>">
                           <button class="btn btn-xs btn-primary" type="submit">Ver</input>
                        </form>
                  </td>
                  <td>
                    <?php
                        if($loop->fecha_nac){
                            echo date("d/m/Y",strtotime($loop->fecha_nac));
                    }
                  ?></td>
                  <td>31/05/2014</td>
                  <td>
                      <button type="button" class="btn btn-xs btn-primary">Ver</button>
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
