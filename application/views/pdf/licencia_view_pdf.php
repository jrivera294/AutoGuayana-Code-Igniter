<!DOCTYPE html>
<html lang="es">
  <head>
    
  </head>
   
    <body>
    <h3 align="center">Licencia emitida por AutoGuayana C.A</h3>
    <div align="center">
        AutoGuayana C.A - RIF. J-0000000001 <br>
        Av. Principal Ciudad Guayana, <br>
        Concesionario AutoGuayana <br>
        Sector industrial, Zona postal 8050.<br>
<br>
    </div>

    <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                <h4 align="center">Información del comprador</h4>
                Nombre o razón social: <?= $cliente[0]->nombre." ".$cliente[0]->apellido1." ".$cliente[0]->apellido2 ; ?><br>
                C.I: <?= $cliente[0]->cedula; ?> <br>

                </td>
                <td align="right">
                <h4 align="center">Información del facturación</h4>
        Fecha de emisión: <?= $factura[0]->fecha_emision; ?><br>    
        Nro. Factura: <?= $factura[0]->nro_factura; ?><br>
        <br> 

                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <h4 align="center">Información del vehículo</h4>
        <br>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                <h4 align="center">General</h4> 
                    N° Serial: <?= $vehiculo[0]->id;?><br>
                    Preio: <?= $factura[0]->precio_venta_ve;?> <br>
                    Modelo: <?= $vehiculo[0]->modelo;?><br>
                    Colores: <?php foreach ($colores as $loop){ echo $loop->color.", "; }?><br>
                    Fecha de fabricación: <?= $vehiculo[0]->fecha_fab;?><br>
                    Lugar de fabricación: <?= $vehiculo[0]->lugar_fab;?><br>
                    <br>
                    <h4 align="center">Otras características</h4> 
                    <?php foreach ($opciones as $loop){ echo "-".$loop->opcion."<br> "; }?>
                </td>
                <td>
                <h4 align="center">Características</h4> 
                    N° de puertas: <?= $vehiculo[0]->nro_puertas;?><br>
                    Peso: <?= $vehiculo[0]->peso;?>Kg<br>
                    N° de cilindros: <?= $vehiculo[0]->nro_cil;?><br>
                    Capacidad: <?= $vehiculo[0]->capacidad;?><br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h4 align="center">Información de entrega</h4> 
                    Fecha entrega: <?= $vehiculo[0]->fecha_entrega;?><br>
                </td>
            </tr>
        </tbody>
    </table>     
  
  </body>
</html>