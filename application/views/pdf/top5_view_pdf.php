<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url("favicon.ico");?>">

    <!--<title><?php /*echo (isset($title)) ? $title : "AutoGuayana" */?></title>-->

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url("assets/css/custom.css");?>" rel="stylesheet">
  </head>

    <h1 align="center">AUTOGUAYANA</h1>
    <h3 align="center">Top 5 Vendedores</h3>
    <h4 align="center">Periodo: <?= date("Y")-3 ?>-<?= date("Y") ?></h4>

      <?php $i=0;
            foreach ($anios as $vent){
                $ventas_anios[$i++] = $vent->total;
            }
        ?>
    <body>
        <?php
        /*  foreach($top5 as $array){

                echo "<br>";
                echo "cedula: ".$array["cedula"]."<br>";
                echo "nombre: ".$array["nombre"]."<br>";
                echo "total".$array["total"]."<br>";
                echo "2014 ".$array["2014"]."<br>";
                echo "2013 ".$array["2013"]."<br>";
                echo "2012 ".$array["2012"]."<br>";
                echo "2011 ".$array["2011"]."<br>";
                 echo "<br>";

        }*/

        /*
       $ventasA =array();
        $i=0;
        foreach ($anios as $ven){
            if ($ven->anio==date("Y")-$i++)
                $ventasA[date("Y")-$i]=$ven->total;
        }*/
    ?>
    <?php if(is_array($top5) && count($top5) ) {
            $nro=1;
                        foreach($top5 as $loop){
    ?>
    <br>
    <div class="row">
        <br>
        <hr>
        <?php echo "<h4>NRO".$nro++."</h4>"; ?>
        <table class="table table-striped">

        <tbody>
            <tr>
                <td>
                    <h4> C.I: <?=$loop['cedula'];?> </h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4> Vendedor: <?=$loop['nombre'];?> <?=$loop['apellido1'];?> <?=$loop['apellido2'];?></h4>
                </td>
            </tr>
        </tbody>
        </table>

        <br>
        <br>
        <br>
        <div class="col-lg-12">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>------------------</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("Y"); ?></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("Y")-1; ?></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("Y")-2; ?></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("Y")-3; ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>total año</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $loop[date("Y")]; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $loop[date("Y")-1]; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $loop[date("Y")-2]; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $loop[date("Y")-3]; ?></td>
                </tr>
                <tr>
                    <td>rep. porcentual</td>
                    <?php foreach ($anios as $anio){




                             if ($anio->anio == date("Y") && $anio->total!=0 && $loop[date("Y")]!=0)
                            {
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo number_format(100/$anio->total *$loop[date("Y")],2);
                                echo "</td>";
                                continue;

                            }

                            if ($anio->anio == date("Y")-1 && $anio->total!=0  && $loop[date("Y")-1]!=0)
                            {
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo number_format(100/$anio->total *$loop[date("Y")-1],2);
                                echo "</td>";
                                continue;
                            }
                             if ($anio->anio ==date("Y")-2 && $anio->total!=0 && $loop[date("Y")-2]!=0)
                            {
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo number_format(100/$anio->total *$loop[date("Y")-2],2);
                                echo "</td>";
                                continue;
                            }


                              if ($anio->anio==date("Y")-3 && $anio->total!=0  && $loop[date("Y")-3]!=0)
                            {
                                echo "<td>";
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo number_format(100/$anio->total *$loop[date("Y")-3],2);
                                echo "</td>";
                                 continue;
                            }

                    }
                ?>
                </tr>


              </tbody>
            </table>
            <div align="right">
               <h3> Total Vendido = <?php echo  $loop['2011']+ $loop['2012']+ $loop['2013']+ $loop['2014']; ?> </h3>
            </div>

        <?php
                }
            }
        ?>
        </div>
    </div>

  </body>
</html>
