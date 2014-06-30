<!DOCTYPE html>
<html lang="es">
  <head>
    
  </head>
   
    <body>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                    AutoGuayana C.A - RIF. J-0000000001 <br>
                    Av. Principal Ciudad Guayana, <br>
                    Concesionario AutoGuayana <br>
                    Sector industrial, Zona postal 8050.<br>
                    <br>
                


                </td>
                <td align="right">
                <h4>Concilicación de documentos para</h4>
                <h4>Alcaldía de Caroní</h4>
                <br> 

                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <p>Auto guayana remite la siguiente información a la Alcaldía de Caroní el <?php $date = new Datetime(); echo $date->format('d/m/Y'); ?>, en cumplimiento con el artículo 92 de la ley de venta de vehículos, esperando su pronta aprobación para efectua la emisión de la placa y posteriormente realizar la entrega del vehículo al propietario <?= $cliente[0]->apellido1." ".$cliente[0]->apellido2." ".$cliente[0]->nombre ; ?></p>
       <p>Esperando su respuesta se sdespide el subgerente: ____________________</p>
        <br>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                <h4 align="center">Datos del cliente:</h4>
                Nombre o razón social: <?= $cliente[0]->nombre." ".$cliente[0]->apellido1." ".$cliente[0]->apellido2 ; ?><br>
                C.I: <?= $cliente[0]->cedula; ?> <br>
                <br>
                <h4 align="center">Datos del vehículo:</h4>
                    N° Serial: <?= $vehiculo[0]->id;?><br>
                    Modelo: <?= $vehiculo[0]->modelo;?><br>
                    Colores: <?php foreach ($colores as $loop){ echo $loop->color.", "; }?><br>
                    Preio: <?= $factura[0]->precio_venta_ve;?> <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
                <td>
                <h4 align="center">Datos del vendedor:</h4>
                Nombre: <?= $vendedor[0]->nombre." ".$vendedor[0]->apellido1." ".$vendedor[0]->apellido2 ; ?><br>
                C.I: <?= $vendedor[0]->cedula; ?> <br>
                <br>  
                <h4>Impuesto:</h4>
                <?php echo $total_factura*0.12; ?> Bsf      
                <h4>Seguro:</h4>
                <?= $factura[0]->rif_aseguradora;?> - <?= $aseguradora[0]->nombre_aseguradora;?><br><br>
                <h4>Fecha de compra:</h4>         
                 <?= $factura[0]->fecha_emision;?><br>
                </td>
            </tr>
        </tbody>
    </table> 
    <br>    
  <p align="center">____________________________</p>
  <p align="center">Firma subgerente</p>
  </body>
</html>