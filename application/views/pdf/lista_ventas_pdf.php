<!DOCTYPE html>
<html lang="es">
  <head>


  </head>
   
    <body >
    <h1 align="center">AUTOGUAYANA</h1>
    <h3 align="center"><?php echo "Lista de ventas"; ?></h3>
    <h4 align="center">Desde: <?= $fecha_ini ?> Hasta: <?= $fecha_fin?></h4><br><br>
    <div class="col-lg-12">
           
            <table class="table table-striped" id="tabla_factura" border="1">
              <thead>
                <tr>
                    <th>Nro. Factura</th>
                    <th>Fecha de venta</th>
                    <th>Id vehiculo</th>
                    <th>Modelo vehiculo</th>
                    <th>Total factura</th>
                    <th>Fecha entrega</th>
                    <th>Kilometraje</th>
                    <th>Vendedor</th>
                </tr>
              </thead>
              <tbody>
              
            <?php foreach($factura as $loop){ ?>
                <tr >
                    <td ><?= $loop->nro_factura?></td>
                    <td ><?= $loop->fecha_emision?></td>
                    <td ><?= $loop->id_vehiculo?></td>
                    <td ><?= $loop->modelo?></td>
                    <td ><?= $loop->total_factura?></td>
                    <td ><?= $loop->fecha_entrega?></td>
                    <td ><?= $loop->kilometraje?></td>
                    <td >Nombre: <?= $loop->nombre?> <?= $loop->apellido1?> <?= $loop->apellido2?><br>
                        Cedula: <?= $loop->cedula?> <br>
                        Id: <?= $loop->id_empleado?>
                    </td>
                </tr>
            <?php } ?>  
            </table>
      </div>  
  
  </body>
</html>