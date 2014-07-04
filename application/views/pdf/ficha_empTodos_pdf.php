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
    <h3 align="center">Fichas Empleados</h3>

    <body>
        <div>
            <?php

           /* for($i= 0 ; $i<count($arreglo_empleados) ; $i++){
                echo $arreglo_empleados[$i]['empleado']->nombre."<br>";
                echo $arreglo_empleados[$i]['empleado']->id."<br>";
                echo $arreglo_empleados[$i]['empleado']->cedula."<br>";
                echo $arreglo_empleados[$i]['empleado']->dir."<br>";
                echo $arreglo_empleados[$i]['departamento']."<br>";
                echo $arreglo_empleados[$i]['cargo']."<br>";
                echo $arreglo_empleados[$i]['sueldo']."<br><br>";
                foreach ($arreglo_empleados[$i]['dependientes'] as $dep){
                    echo $dep->nombre."<br>";
                }
                echo "<br><br><br>";


            }*/
            ?>

        </div>
        <?php for($i= 0 ; $i<count($arreglo_empleados) ; $i++){ ?>
        <hr>
            <h3 align="center">DATOS EMPLEADO</h3>
           <table align="center" class="table table-striped"  CELLPADDING=10 CELLSPACING=5>

        <tbody>
            <tr>
                <td>
                    <h4> ID: <?=$arreglo_empleados[$i]['empleado']->id?> </h4>
                </td>
                <td align="left">
                   <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       Departamento:<?=$arreglo_empleados[$i]['departamento']?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>C.I: <?=$arreglo_empleados[$i]['empleado']->cedula?> </h4>
                </td>
                <td align="left">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Cargo: <?= $cargo ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4> Empleado:
                        <?=$arreglo_empleados[$i]['empleado']->nombre?>
                        <?=$arreglo_empleados[$i]['empleado']->apellido1?>
                        <?=$arreglo_empleados[$i]['empleado']->apellido2?>
                    </h4>
                </td>
                <td>
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Sueldo: <?=$arreglo_empleados[$i]['sueldo']?> </h4>
                </td>
            </tr>
            <tr>
                <td>
                  <h4> Dirección: <?= $arreglo_empleados[$i]['empleado']->dir ?></h4>
                </td>
            </tr>
        </tbody>

        </table>
            <h3 align="center">DATOS DEPENDIENTES</h3>
        <table  align="center" class="table table-striped" TABLE BORDER CELLPADDING=10 CELLSPACING=10>
            <?php
            if (is_array($arreglo_empleados[$i]['dependientes']) && count($arreglo_empleados[$i]['dependientes'])){

                echo"<thead>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Parentesco
                        </th>
                        <th>
                            Fecha Nac.
                        </th>
                    </tr>
                </thead>";
                foreach($arreglo_empleados[$i]['dependientes'] as $dep){
                    echo "<tr> <td>$dep->nombre $dep->apellido1</td> <td>$dep->parentesco</td> <td>$dep->fecha_nac</td></tr>";
                }
            }
            else
                echo "<td>NO POSEE DEPENDIENTES</td>";
            ?>
        </table>
            <hr>
        <?php
            }
        ?>
  </body>
</html>
