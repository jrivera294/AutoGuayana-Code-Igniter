<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= base_url("index.php/clientes/");?>">Clientes</a></li>
            <li><a href="<?= base_url("index.php/clientes/register");?>">Registrar clientes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Encuesta de satisfaccion del cliente <?php echo $cliente->nombre; ?> <?php echo $cliente->apellido1; ?> <?php echo $cliente->apellido2; ?> - CI:<?php echo $cliente->cedula; ?></h2>
          
          
          
        </div>
      </div>
    </div>