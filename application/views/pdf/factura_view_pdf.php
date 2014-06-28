<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url("favicon.ico");?>">

    <title><?php echo (isset($title)) ? $title : "AutoGuayana" ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url("assets/css/custom.css");?>" rel="stylesheet">
  </head>
   
    <body>
    <div class="col-md-4">
        RIF. J-0000000001 <br>
        Av. Principal Ciudad Guayana, <br>
        Concesionario AutoGuayana <br>
        Sector industrial, Zona postal 8050.<br>
        <br>
                
    </div>
    <div class="col-md-4" align="left">
        Fecha de emisión: <br>    
        Nro. Factura: <br>
        <br>
        
        Vendedor: <br>
        Id: <br>

    </div>
    <div class="col-md-12">
            Nombre o razón social: <?= $cliente[0]->nombre." ".$cliente[0]->apellido1." ".$cliente[0]->apellido2 ; ?><br>
        C.I: <?= $cliente[0]->cedula; ?> <br>
        Dirección: <?= $cliente[0]->dir; ?><br>
        Teléfonos: <br>
         
    </div>
    <br>
    <div class="col-lg-12">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>ID - Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio unit.</th>
                    <th>Descuento</th>
                    <th>Total</th>
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
                  <td>
                      <button type="button" class="btn btn-xs btn-primary">Ver</button>
                  </td>
                  <td>
                    <?php
                        if($loop->fecha_nac){
                            echo date("d/m/Y",strtotime($loop->fecha_nac));
                    }
                  ?></td>
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
  
  </body>
</html>