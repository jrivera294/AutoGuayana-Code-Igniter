<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Desempeño General</h2>
         <div class="row">
             <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="control-group">
                    <label class="control-label" for="searchinput">Ingresar Vendedor</label>
                    <div class="controls">
                        <input id="searchinput" name="searchinput" type="text" placeholder="Ci o ID" class="input-xlarge search-query">

                    </div>
                </div>

                 <!-- Button -->
                 <div class="control-group">
                    <div class="controls">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Generar</button>
                    </div>
                </div>
             </div>
             <div class="col-xs-12 col-sm-3 col-md-3">
                   <h4>Desde:</h4>
                   <input type="date">
             </div>
             <div class="col-xs-12 col-sm-3 col-md-3">
                   <h4>Hasta:</h4>
                   <input type="date">
             </div>

             <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="control-group">
                    <label class="control-label" for="button1id">Generar Reporte Para Todos Los Vendedores</label>
                    <div class="controls">
                        <button id="button1id" name="button1id" class="btn btn-success">Generar Todos</button>
                    </div>
                </div>
            </div>
        </div>
         <br>
         <br>
        <legend>Info Vendedor:</legend>
        <div class="row">
               <div class="col-xs-12 col-sm-3 col-md-4">
                   <h4>Cedula:</h4>
                   <textarea id="textarea" name="textarea">10759175</textarea>
               </div>
               <div class="col-xs-12 col-sm-3 col-md-4">
                   <h4>Nombre:</h4>
                   <textarea id="textarea" name="textarea">Pedro Perez</textarea>
               </div>
               <div class="col-xs-12 col-sm- col-md-4">
                   <h4>Direccion:</h4>
                   <textarea id="textarea" name="textarea">Puerto Ordaz</textarea>
               </div>

        </div>
           <br>
        <legend>Vehiculos</legend>
         <div class="table-responsive">
           <table class="table table-striped">
             <thead>
               <tr>
                 <th>Nro Factura</th>
                 <th>Modelo</th>
                 <th>Serial</th>
                 <th>Precio de Venta</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>123</td>
                 <td>Hilux</td>
                 <td>123456789</td>
                 <td>2 Millones $$</td>
               </tr>
               <tr>
                 <td>124</td>
                 <td>Corolla</td>
                 <td>314236789</td>
                 <td>1 Millon $$</td>

               </tr>

             </tbody>
           </table>
         </div>
           <legend>Subtotal</legend><br>
           <div class="table-responsive">
           <table class="table table-striped">
             <thead>
               <tr>
                 <th>2009</th>
                 <th>2010</th>
                 <th>2011</th>
                 <th>2012</th>
                 <th>2013</th>
                 <th>Total</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td>10</td>
                 <td>100</td>
                 <td>1000</td>
                 <td>10000</td>
                 <td>100000</td>
                 <td>111110</td>
               </tr>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
