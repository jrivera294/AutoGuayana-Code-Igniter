<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= base_url("index.php/clientes/");?>">Clientes</a></li>
            <li><a href="<?= base_url("index.php/clientes/register");?>">Registrar clientes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Encuesta de la factura Nro: <?php echo $nro_factura; ?></h2>
          <form role="form" action='<?= base_url();?>index.php/clientes/addEncuesta' method="post">
          
          
        <?php foreach ($preguntas as $loop){?>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
                    <h4><?= $loop->pregunta ?></h4>
					<div class="form-group">
                        <input type="text" name="<?= $loop->nro_preg ?>" id="<?= $loop->nro_preg ?>" class="form-control input-sm" placeholder="" tabindex="1" required>
					</div>
				</div>
             </div>
         <?php }?>
         <input type="submit" value="Guardar" class="btn btn-success btn-block btn-lg" tabindex="12">
         </form>
              <input type="hidden" name="<?= $loop->nro_preg ?>" id="<?= $nro_factura ?>" class="form-control input-sm" placeholder="" tabindex="1" required>
        </div>
      </div>
    </div>