<script language="JavaScript"> 
 
function oculta(id){
	 var elDiv = document.getElementById(id);
	 elDiv.style.display='none';	 
	}
 
function muestra(id){
	 var elDiv = document.getElementById(id);
	 elDiv.style.display='block';	 
	}
 
 
window.onload = function(){
    oculta('inputs_financiamiento');
    oculta('inputs_banco');
}
</script>

       

<section >
        <div class="container">
            <div class="row">
                <div class="board">
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#Cliente" data-toggle="tab" title="Cliente">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-user"></i>
                      </span> 
                  </a></li>
                  <li><a href="#Vehiculo" data-toggle="tab" title="Vehiculo">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-road"></i>
                     </span> </a>
                     </li>
                 <li><a href="#Articulos" data-toggle="tab" title="Articulos">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span> </a>
                     </li>

                     <li><a href="#Financiamiento" data-toggle="tab" title="Financiamiento">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-usd"></i>
                         </span> 
                     </a></li>

                     <li><a href="#check" data-toggle="tab" title="Facturar">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                         </span> </a>
                     </li>
                     
                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane active" id="Cliente">
                          <h3 class="head text-center">Información del cliente</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Cédula:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1" required>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Nombre:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Primer apellido:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Segundo Apellido:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Teléfono fijo:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Teléfono celular:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Dirección</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>

<div class="col-xs-6 col-md-6"><a href="<?= base_url("index.php/clientes/edit");?>" class="btn btn-warning btn-block btn-lg" tabindex="2">Editar cliente</a></div>


                      </div>
                      <div class="tab-pane" id="Vehiculo">
                          <h3 class="head text-center">Añadir vehículo</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Serial vehículo:</h4>
                                <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Modelo:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Monto garantía extendida:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>

                             <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Precio</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Descuento:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1" required>
					            </div>
				            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                     <br><br>
                                  <button type="button" class="btn btn-md btn-primary" onclick="addColor()">Buscar</button>
                                  <button type="button" class="btn btn-md btn-success" onclick="addColor()">Añadir</button>
                             </div>
                      </div>
                      <div class="tab-pane" id="Articulos">
                          <h3 class="head text-center">Añadir artículos</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Serial artículo:</h4>
                                <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Fabricante:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Modelo:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Stock disponible:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Descripción</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" value="" readonly placeholder="">
					            </div>
				            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Precio</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" readonly placeholder="">
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Descuento:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1" required>
					            </div>
				            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                  <button type="button" class="btn btn-md btn-primary" onclick="addColor()">Buscar</button>
                                  <button type="button" class="btn btn-md btn-success" onclick="addColor()">Añadir</button>
                             </div>
                      </div>
                      <div class="tab-pane" id="Financiamiento">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3 class="head text-center">Información del seguro</h3>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3 class="head text-center">Tipo de pago</h3>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <h4>Tipo de pago</h4>
                                   <div class="form-group">
                                        <label class="radio" for="radios-0">
                                            <input type="radio" name="tpago" id="contado" value="Contado" checked="checked" tabindex="5" onClick="oculta('inputs_financiamiento');">
                                            De contado
                                        </label>
                                        <label class="radio" for="radios-1">
                                            <input type="radio" name="tpago" id="financiado" value="Financiado" tabindex="6" onClick="muestra('inputs_financiamiento');">
                                            Financiado
                                        </label>
                                    </div>   
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12" id="inputs_financiamiento">
                                    <h4>Tipo de financiamiento</h4>
                                       <div class="form-group">
                                        <label class="radio" for="radios-0">
                                            <input type="radio" name="tfinanc" id="contado" value="Contado" checked="checked" tabindex="5" onClick="oculta('inputs_banco');">
                                            Concesionario
                                        </label>
                                        <label class="radio" for="radios-1">
                                            <input type="radio" name="tfinanc" id="financiado" value="Financiado" tabindex="6" onClick="muestra('inputs_banco');">
                                            Banco
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Nro de cuotas</h4>
                                        <div class="form-group">
                                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Monto por cuota</h4>
                                        <div class="form-group">
                                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Interés (%)</h4>
                                        <div class="form-group">
                                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3" id="inputs_banco">
                                        <h4>RIF Banco</h4>
                                        <div class="form-group">
                                        <input type="text" name="cedula" id="cedula" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>                                                                        
                                </div>
                                                                
                            </div>
                      </div>
                      <div class="tab-pane" id="check">
                          <h3 class="head text-center">Confirmar e imprimir</h3>
                          
                           <div class="table-responsive">
                            <table class="table table-striped">
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
                                <tr>
                                  <td>512354545 - Toyota corolla<br>
                                  Placa: asdasfa<br>
                                  Color: Rojo, Verde, Azul<br>
                                  Peso: 5000kg<br>
                                  Otras características:<br>
                                  -<br>
                                  -<br>
                                  -<br>

                                  </td> 
                                  <td>1</td>
                                  <td>5000000</td>
                                  <td>0</td>
                                  <td>5000000</td>
                                </tr>
                                <tr>
                                    <td>412421412 - Pioneer superbass<br>
                                    Subwoofer 10000w paj paja...
                                    </td>
                                    <td>2</td>
                                    <td>5000</td>
                                    <td>200</td>
                                    <td>9800</td>
                                </tr>
                                <tr>
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub-Total:</td>
                                    <td>5900</td>
                                </tr>
                                <tr>
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Iva(12%):</td>
                                    <td>600</td>
                                </tr>
                                <tr>
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                    <td>6500</td>
                                </tr>                                                                                              
                              </tbody>
                            </table>
                          </div>
                          <div class="col-xs-6 col-md-6"> </div>                   
<div class="col-xs-6 col-md-6"><a href="<?= base_url("index.php/clientes/edit");?>" class="btn btn-success btn-block btn-lg" tabindex="2">Confirmar factura</a></div>
                      </div>

                          
<div class="clearfix"></div>
</div>

</div>
</div>
</div>
</section>
