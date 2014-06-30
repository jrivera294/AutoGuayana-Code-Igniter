<div class="container-fluid">
      <div class="row">

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Opciones post-venta. Factura Nro.: <?php echo $nro_factura; ?></h2>
            <div class="col-xs-4 col-md-3"><a href="<?= base_url("index.php/facturar/factura_pdf/$nro_factura");?>" class="btn btn-success btn-block btn-lg" tabindex="13">Factura</a></div>


            <div class="col-xs-4 col-md-3"><a href="<?= base_url("index.php/facturar/licencia_pdf/$nro_factura");?>" class="btn btn-success btn-block btn-lg" tabindex="13">Licencia del vehiculo</a></div>

            <div class="col-xs-4 col-md-3"><a href="<?= base_url("index.php/facturar/estado_pdf/$nro_factura");?>" class="btn btn-success btn-block btn-lg" tabindex="13">Documentos del estado</a></div>
        </div>
      </div>
</div>
