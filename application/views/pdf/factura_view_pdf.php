<!DOCTYPE html>
<html lang="es">
  <head>


  </head>
   
    <body >
    <h3 align="center">Factura</h3>

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
                <td align="right"><br>
        Fecha de emisión: <?= $factura[0]->fecha_emision; ?><br>    
        Nro. Factura: <?= $factura[0]->nro_factura; ?><br>
        <br> 
        
        Vendedor: <?= $vendedor[0]->nombre." ".$vendedor[0]->apellido1." ".$vendedor[0]->apellido2 ; ?><br>
        Id: <?= $vendedor[0]->id; ?><br>

                </td>
            </tr>
            <tr>
                <td>
                              Nombre o razón social: <?= $cliente[0]->nombre." ".$cliente[0]->apellido1." ".$cliente[0]->apellido2 ; ?><br>
        C.I: <?= $cliente[0]->cedula; ?> <br>
        Dirección: <?= $cliente[0]->dir; ?><br>
        Teléfonos:<br>
        <?php 
            foreach($tlf_cliente as $loop){
                echo $loop->telefono;
                echo "<br>";
            } 
        echo "<br><br>";
        ?>  
                </td>
            </tr>
        </tbody>
    </table>    
    <div class="col-lg-12">
           
            <table class="table table-striped" id="tabla_factura" border="1">
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
              

                <tr >
                    <td >Serial: <?= $vehiculo[0]->id;?><br>
                         Modelo: <?= $vehiculo[0]->modelo;?><br>
                         Placa:  <?= $vehiculo[0]->placa;?><br>
                         Colores: <?php foreach ($colores as $loop){ echo $loop->color.", "; }?><br>
                         Peso:  <?= $vehiculo[0]->peso;?> kg<br>
                         Otras características: <br>
                           <?php foreach ($opciones as $loop){ echo "-".$loop->opcion."<br> "; }?>
                    </td>
                    <td ></td>
                    <td ><?= $vehiculo[0]->precio;?></td>
                    <td ><?= $vehiculo[0]->precio- $factura[0]->precio_venta_ve;?></td>
                    <td class="contar"><?= $factura[0]->precio_venta_ve;?></td>
                </tr>
              
              <?php 
                if(trim($factura[0]->tipo_garantia)==="Extendida"){?>
               <?php  ?>
                <tr>
                  <td id="garantiaTr"> Garantía extendida</td>
                  <td></td>
                  <td><?=$vehiculo[0]->monto_garantia_ext?></td>
                  <td></td>
                  <td class="contar"><?=$vehiculo[0]->monto_garantia_ext?></td>
                </tr>
                <?php } ?>               
                <?php
                    if(is_array($detalle) && count($detalle) ) {
                        foreach($detalle as $loop){
                ?>
                <tr>
                  <td>Serial: <?= $loop->articulo->id;?> - <?=$loop->articulo->fabricante;?> <?=$loop->articulo->modelo;?> <br>
                      Descripción: <?=$loop->articulo->descripcion;?>
                  </td>
                  <td><?=$loop->cantidad?></td>
                  <td><?=$loop->precio_venta?></td>
                  <td><?=$loop->descuento?></td>
                  <td class="contar"><?= $loop->precio_venta - $loop->descuento;?></td>
                </tr>
                <?php
                        }
                    }
                ?>
                
              </tbody>
              <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Sub-Total:</td>
                    <td id="sub_total"><?php echo $total_factura*0.88; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td >Iva(12%):</td>
                    <td id="iva"><?php echo $total_factura*0.12; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total:</td>
                    <td id="total"><?php echo $total_factura; ?></td>
                </tr>                                     

              </tfoot>
            </table>
      </div>  
    <div class="col-md-6">
    <h3 align="center">Información de financiamiento:</h3>
    Tipo de pago: <?= $factura[0]->tipo_financiamiento; ?><br> 
    <?php 
        if(trim($factura[0]->tipo_financiamiento)==='Financiado'){
            if(isset($factura[0]->rif_banco)){
            echo"<br>";
               echo "Financiado por banco<br>";
               echo "Entidad bancaria: Nombre banco ".$banco[0]->nombre_banco."   - RIF: ".$factura[0]->rif_banco."<br>";
            }else{
               echo "Financiado por AutoGuayana";
            }
            echo "<br>";
            echo "Cuotas: <br>";
            echo "Nro. de cuotas: ".$factura[0]->cuotas."<br>";
            echo "Pago por cuota: ".$factura[0]->pago_cuota."<br>";
            echo "Pago por cuota: ".$factura[0]->interes."<br>"; 
        }     
    ?>

    </div>
    <div class="col-md-6">  
        <h3 align="center">Información de financiamiento:</h3>
         Aseguradora: <?= $factura[0]->rif_aseguradora; ?>   - RIF: <?= $aseguradora[0]->nombre_aseguradora; ?><br>
         Monto asegurado: <?= $factura[0]->monto_asegurado; ?><br>
         Precio: <?= $factura[0]->precio_seguro; ?><br>
    </div>
  
  </body>
</html>