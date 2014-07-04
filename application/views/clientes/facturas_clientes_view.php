<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?= base_url("index.php/clientes/");?>">Clientes</a></li>
            <li><a href="<?= base_url("index.php/clientes/register");?>">Registrar clientes</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Facturas de cliente <?php echo $cliente->nombre; ?> <?php echo $cliente->apellido1; ?> <?php echo $cliente->apellido2; ?> - CI:<?php echo $cliente->cedula; ?></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nro. Factura</th>
                  <th>Fecha emision</th>
                  <th>Vehiculo</th>
                  <th>Total(incl. articulos)</th>
                  <th>Ver factura</th>
                  <th>Ver encuesta</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(is_array($facturas) && count($facturas) ) {
                        foreach($facturas as $loop){
                ?>
                <tr>
                  <td><?=$loop->nro_factura;?></td>
                  <td><?=$loop->fecha_emision?></td>
                  <td>Serial: <?=$loop->vehiculo->id?><br>Modelo: <?=$loop->vehiculo->modelo?></td>
                  <td><?=$loop->total?></td>
                  <td><a href="<?= base_url("index.php/facturar/factura_pdf/$loop->nro_factura");?>" class="btn btn-success btn-block btn-sm">Ver</a></td>
                  <td><a href="<?= base_url("index.php/clientes/encuesta/$loop->nro_factura");?>" class="btn btn-success btn-block btn-sm">Ver</a></td>
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