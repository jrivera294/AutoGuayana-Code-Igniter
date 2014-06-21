<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h2 class="sub-header">Departamentos</h2>
                </div>

          </div>
          <div>
          <form class="form-horizontal">
            <fieldset>

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
                              <li><a href="#">Nombre</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                      <br>
                    <a href="<?= base_url("index.php/departamentos/cargarRegistroDepartamentos");?>"> <input  type="button "value="Agregar Departamento" class="btn btn-primary btn-block btn-lg" tabindex="7" >
                   </a>
                </div>
            </div>
            </fieldset>
              <br>
          </form>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo Departamento</th>
                  <th>Nombre</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($departamentos) && count($departamentos) ) {
                        foreach($departamentos as $loop){
                ?>
                <tr>
                  <td><?= $loop->cod_dpto; ?></td>
                  <td><?= $loop->nombre; ?></td>
                  <td>
                        <form action="<?= base_url("index.php/departamentos/cargarEdicionDepartamentos");?>" method="post" id="formulario">
                            <input type="hidden" name = "cod_dpto" value="<?= $loop->cod_dpto; ?>">
                            <input type="hidden" name = "nombre" value="<?= $loop->nombre; ?>">
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
