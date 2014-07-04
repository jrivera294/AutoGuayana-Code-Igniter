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
    <h3 align="center">Ficha Empleado</h3>

    <body>
        <div>
            <?php
               /* echo $info_emp->id."<br>";
                echo $info_emp->cedula."<br>";
                echo $info_emp->nombre."<br>";
                echo $info_emp->dir."<br>";
                echo $departamento."<br>";*/
                foreach ($info_cargo as $c){
                     $cargo = $c->nombre;
                     $sueldo = $c->sueldo;
                }
/*foreach ($dependientes as $dep){
        echo $dep->nombre;
    */


            ?>
            <hr>
            <h3 align="center">DATOS EMPLEADO</h3>
           <table align="center" class="table table-striped"  CELLPADDING=10 CELLSPACING=5>

        <tbody>
            <tr>
                <td>
                    <h4> ID: <?=$info_emp->id?> </h4>
                </td>
                <td align="left">
                   <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       Departamento:<?=$departamento?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>C.I: <?=$info_emp->cedula?> </h4>
                </td>
                <td align="left">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Cargo: <?= $cargo ?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h4> Empleado: <?=$info_emp->nombre?> <?=$info_emp->apellido1?> <?=$info_emp->apellido2?></h4>
                </td>
                <td>
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Sueldo: <?=$sueldo?> </h4>
                </td>
            </tr>
            <tr>
                <td>
                  <h4> Dirección: <?= $info_emp->dir ?></h4>
                </td>
            </tr>
        </tbody>

        </table>
            <h3 align="center">DATOS DEPENDIENTES</h3>
        <table  align="center" class="table table-striped" TABLE BORDER CELLPADDING=10 CELLSPACING=10>
            <?php
            if (is_array($dependientes) && count($dependientes)){

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
                foreach($dependientes as $dep){
                    echo "<tr> <td>$dep->nombre</td> <td>$dep->parentesco</td> <td>$dep->fecha_nac</td></tr>";
                }
            }
            else
                echo "NO POSEE DEPENDIENTES";
            ?>
        </table>
            <hr>
        </div>
  </body>
</html>
