<div class="container-fluid">
     <div class="row">
       <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


         <h2 class="sub-header">Fichas Empleados</h2>
        <form action="<?= base_url("index.php/empleados/fichasTodos");?>" method="post">
         <div class="row">
               <br>
               <div class="col-xs-12 col-sm-3 col-md-6">
                <div class="control-group">
                    <label class="control-label" for="button1id">Generar Fichas Para Todos Los Vendedores</label>
                    <div class="controls">
                        <input type="submit" class="btn btn-success" value="Generar Todos">
                    </div>
                </div>
                </div>
           </div>
         <br>
         <br>
        </form>
        <form action="<?= base_url("index.php/empleados/fichasInd");?>" method="post">
         <div class="row">
               <br>
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <label class="control-label" for="button1id">ID empleado</label>
                    <input type="text" name="id">
                </div>

               <div class="col-xs-12 col-sm-3 col-md-3">
                <div class="control-group">
                    <label class="control-label" for="button1id">Generar Ficha</label>
                    <div class="controls">
                        <input type="submit" class="btn btn-primary" value="Generar">
                    </div>
                </div>
                </div>
           </div>
         <br>
         <br>
        </form>
       </div>
     </div>
   </div>
