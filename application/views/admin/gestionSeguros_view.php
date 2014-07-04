<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h2 class="sub-header">Aseguradoras</h2>
                </div>

          </div>
          <div>
          <form class="form-horizontal">
            <fieldset>

            <div class="row">
            <!-- Button Drop Down -->
                <div class="col-xs-12 col-md-6">
                    <div class="control-group">
                      <label class="control-label" for="buttondropdown">Buscar Banco</label>
                      <div class="controls">
                        <div class="input-append">
                          <input id="buttondropdown" name="buttondropdown" class="input-xlarge" placeholder="" type="text">
                          <div class="btn-group">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                              Tipo de búsqueda
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="#">Codigo</a></li>
                              <li><a href="#">Nombre</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6">
                      <br>
                    <a href="<?= base_url("index.php/seguro/cargarRegistroSeguros");?>"> <input  type="button "value="Agregar Banco" class="btn btn-primary btn-block btn-lg" tabindex="7" >
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
                  <th>Rif Seguro</th>
                  <th>Nombre</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($seguros) && count($seguros) ) {
                        foreach($seguros as $loop){
                ?>
                <tr>
                  <td><?= $loop->rif_aseguradora; ?></td>
                  <td><?= $loop->nombre_aseguradora; ?></td>
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
