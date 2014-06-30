<!DOCTYPE html>
<html lang="es">
  <head>


  </head>
   
    <body >    
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                <h4 align="center">General</h4> 
                    N° Serial: <?= $vehiculo[0]->id;?><br>
                    Preio: <?= $vehiculo[0]->precio;?> <br>
                    Modelo: <?= $vehiculo[0]->modelo;?><br>
                    Colores: <?php foreach ($colores as $loop){ echo $loop->color.", "; }?><br>
                    Fecha de fabricación: <?= $vehiculo[0]->fecha_fab;?><br>
                    Lugar de fabricación: <?= $vehiculo[0]->lugar_fab;?><br>
                    <br><br><br><br>
                    
                </td>
                <td>
                <h4 align="center">Características</h4> 
                    N° de puertas: <?= $vehiculo[0]->nro_puertas;?><br>
                    Peso: <?= $vehiculo[0]->peso;?>Kg<br>
                    N° de cilindros: <?= $vehiculo[0]->nro_cil;?><br>
                    Capacidad: <?= $vehiculo[0]->capacidad;?><br>
                    <br>
                    <h4 align="center">Otras características</h4> 
                    <?php foreach ($opciones as $loop){ echo "-".$loop->opcion."<br> "; }?>


                </td>
            </tr>
        </tbody>
    </table>
  <hr>
  </body>
</html>