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
    <div class="row">
        <div class="col-md-3"></div>
    <div class="col-md-6" align="center">
        <h3><?php if ($individual==1) echo "Reporte Individual"; else echo "Reporte Por Vendedor"; ?></h3>
        <h4>Desde: <?= $fecha_inicio ?> Hasta: <?= $fecha_fin ?></h4>
    </div>
    </div>
    <body>
    <!--<div class="col-md-4">
        RIF. J-0000000001 <br>
        Av. Principal Ciudad Guayana, <br>
        Concesionario AutoGuayana <br>
        Sector industrial, Zona postal 8050.<br>
        <br>

    </div>-->
    <?php if(is_array($empleado) && count($empleado) ) {
            $i=0;
                        foreach($empleado as $loop){
    ?>
    <br>
    <div class="row">
        <br>
        <div class="col-md-6">
           <h4> Vendedor: <?=$loop->nombre?> <?=$loop->apellido1?> <?=$loop->apellido2?></h4>
           <h4> C.I: <?=$loop->cedula?> </h4>
            <h4> ID: <?=$loop->id?> </h4>

        </div>
        <div class="col-md-6">
           <h4> Cod. Dpto:<?=$loop->cod_dpto?></h4>
           <h4> Departamento: <?= $departamento[$i++] ?></h4>
        </div>
        <br>
        <br>
        <br>
        <div class="col-lg-12">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>Nro. Factura</th>
                    <th>Fecha Emision</th>
                    <th>Precio Factura</th>
                    <th>Serial</th>
                    <th>Modelo</th>
                    <th>Precio Vehiculo</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $montoTotal = 0;
                    if(is_array($info) && count($info)){
                        $montoTotal = 0;
                        foreach ($info as $inf)
                            if($inf->id == $loop->id){
                ?>
                <tr>
                    <td><?=$inf->nro_factura?></td>
                    <td><?=$inf->fecha_emision?></td>
                    <td><?=$inf->total?></td>
                    <td><?=$inf->id_vehiculo?></td>
                    <td><?=$inf->modelo?></td>
                    <td><?=$inf->precio_venta_ve?></td>
                </tr>
                <?php
                        $montoTotal += $inf->total;
                        }
                    }

                ?>

              </tbody>
            </table>
            <div align="right">
               <h3> Total Vendido = <?php echo $montoTotal; ?> </h3>
            </div>
            <legend></legend>
        <?php
                }
            }
        ?>
        </div>
    </div>

  </body>
</html>
