<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Generar listado de ventas</h2>
        <form action="<?= base_url("index.php/ventas/ventas_pdf/");?>" method="post">
             <div class="row">
                 <div class="col-xs-12 col-sm-3 col-md-3">
                   <h4>Desde:</h4>
                   <input type="date" name="fecha_inicio">
                </div>
                 <div class="col-xs-12 col-sm-3 col-md-3">
                       <h4>Hasta:</h4>
                       <input type="date" name="fecha_fin">
                 </div>
               <br>
               <br>
                <div class="col-xs-12 col-sm-3 col-md-6">
                    <input type="submit" class="btn btn-success" value="Generar pdf">
                </div>
           </div>
        </form>
       </div>
     </div>
   </div>