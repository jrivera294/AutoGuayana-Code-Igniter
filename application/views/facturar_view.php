<script language="JavaScript"> 
    var nro_articulos=0;
    
/* ------------ Ocultar y mostrar campos -------------------- */
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
    oculta('inputs_financiamiento2');
    oculta('inputs_banco');
}

/* ------------ Buscar cliente -------------------- */
function getClient(){
    if($('#cedula_cliente').val()){
        $.ajax({
            type : "post",
            url: "<?php echo base_url().'index.php/clientes/getClienteFactura'?>",
            cache: false,
            data : {cedula :  $('#cedula_cliente').val()},
            success : function(json){
                var obj=jQuery.parseJSON(json);
                if(obj[0]){
                    $('#nombre_cliente').val(obj[0].nombre);
                    $('#apellido1_cliente').val(obj[0].apellido1);
                    $('#apellido2_cliente').val(obj[0].apellido2);
                    //$('#tlf_cel_cliente').val(obj[0].asd);
                    //$('#tlf_fijo_cliente').val(obj[0].nombre);
                    $('#dir_cliente').val(obj[0].dir);
                }else{
                    alert("Usuario no encontrado");
                }

            },
        });
    }else{
        alert("Debe ingresar una cédula de usuario");
    }
}
function getVehiculo(){
    if($('#id_vehiculo').val()){
        $.ajax({
            type : "post",
            url: "<?php echo base_url().'index.php/vehiculos/getVehiculoFactura'?>",
            cache: false,
            data : {id_vehiculo :  $('#id_vehiculo').val()},
            success : function(json){
                var obj=jQuery.parseJSON(json);
                if(obj[0]){
                    $('#modelo_vehiculo').val(obj[0].modelo);
                    $('#garantia_vehiculo').val(obj[0].monto_garantia_ext);
                    $('#precio_vehiculo').val(obj[0].precio);
                }else{
                    alert("Vehiculo no encontrado");
                }
            },
        });
    }else{
        alert("Debe ingresar un serial de vehiculo");
    }
}
function getArticulo(){
    if($('#id_articulo').val()){
        $.ajax({
            type : "post",
            url: "<?php echo base_url().'index.php/articulos/getArticuloFactura'?>",
            cache: false,
            data : {id :  $('#id_articulo').val()},
            success : function(json){
                var obj=jQuery.parseJSON(json);
                if(obj[0]){
                    $('#fabricante_articulo').val(obj[0].fabricante);
                    $('#modelo_articulo').val(obj[0].modelo);
                    $('#stock_articulo').val(obj[0].stock);
                    $('#descripcion_articulo').val(obj[0].descripcion);
                    $('#precio_articulo').val(obj[0].precio);
                }else{
                    alert("Articulo no encontrado");
                }

            },
        });
    }else{
        alert("Debe ingresar un id de articulo");
    }
} 
function getAseguradora(){
    if($('#rif_aseguradora').val()){
        $.ajax({
            type : "post",
            url: "<?php echo base_url().'index.php/seguro/getAseguradoraFactura'?>",
            cache: false,
            data : {rif_aseguradora :  $('#rif_aseguradora').val()},
            success : function(json){
                var obj=jQuery.parseJSON(json);
                if(obj[0]){
                    $('#nombre_aseguradora').val(obj[0].nombre_aseguradora);
                }else{
                    alert("Aseguradora no encontrada");
                }

            },
        });
    }else{
        alert("Debe ingresar un RIF de la aseguradora");
    }
}
function getBanco(){
    if($('#rif_banco').val()){
        $.ajax({
            type : "post",
            url: "<?php echo base_url().'index.php/banco/getBancoFactura'?>",
            cache: false,
            data : {rif_banco :  $('#rif_banco').val()},
            success : function(json){
                var obj=jQuery.parseJSON(json);
                if(obj[0]){
                    $('#nombre_banco').val(obj[0].nombre_banco);
                }else{
                    alert("Banco no encontrado");
                }

            },
        });
    }else{
        alert("Debe ingresar un RIF de banco");
    }
}
 
function addArticulo(){
    newRow = "<tr>" +
        "<td style=display:none><input type=hidden name=id_articulo"+nro_articulos+" id=id_articulo"+nro_articulos+" class=form-control></td>" +
        "<td style=display:none><input type=hidden name=cantidad_articulo"+nro_articulos+" id=cantidad_articulo"+nro_articulos+" class=form-control></td>" +
        "<td style=display:none><input type=hidden name=descuento_articulo"+nro_articulos+" id=descuento_articulo"+nro_articulos+" class=form-control></td>" +
        "<td style=display:none><input type=hidden name=precio_articulo"+nro_articulos+" id=precio_articulo"+nro_articulos+" class=form-control></td>" +
        "<td >412421412 - Pioneer superbass<br>Subwoofer 10000w</td>" +
        "<td >Cantidad</td>" +
        "<td >Precio</td>" +
        "<td >Descuento</td>" +
        "<td >Precio-Descuento</td>" +
        "<td ><button type=button onclick=deleteRow(this);>X</button></td>" +
    "</tr>";
    $('#tabla_factura > tbody:last').append(newRow);
   nro_articulos++;
    $('#nro_articulos').val(nro_articulos);
    alert("Artículo añadido correctamente");
    
}
function addVehiculo(){

    newRow = "<tr>" +
        "<td >512354545 - Toyota corolla<br>Placa: asdasfa<br>Color: Rojo, Verde, Azul<br>Peso: 5000kg<br>Otras características:</td>" +
        "<td >Cantidad</td>" +
        "<td >Precio</td>" +
        "<td >Descuento</td>" +
        "<td >Precio-Descuento</td>" +
        "<td ><button type=button onclick=deleteRow(this)>X</button></td>" +
    "</tr>";
    $('#tabla_factura > tbody:first').append(newRow);
    alert("Vehiculo añadido correctamente");
}
    
function deleteRow(td){
    document.getElementById("tabla_factura").deleteRow(td.parentNode.parentNode.rowIndex);
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
                     
                     
<form role="form" action='<?= base_url();?>index.php/facturar/save' method="post">
                     
                     
                     <div class="tab-content">
                      <div class="tab-pane active" id="Cliente">
                          <h3 class="head text-center">Información del cliente</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Cédula:</h4>
					            <div class="form-group">
                                    <input type="text" name="cedula_cliente" id="cedula_cliente" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1" required>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Nombre:</h4>
					            <div class="form-group">
                                    <input type="text" name="nombre_cliente" id="nombre_cliente" value=""  class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Primer apellido:</h4>
					            <div class="form-group">
                                    <input type="text" name="apellido1_cliente" id="apellido1_cliente" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Segundo Apellido:</h4>
					            <div class="form-group">
                                    <input type="text" name="apellido2_cliente" id="apellido2_cliente" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Teléfono fijo:</h4>
					            <div class="form-group">
                                    <input type="text" name="tlf_fijo_cliente" id="tlf_fijo_cliente" value="" class="form-control input-sm" readonly >
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Teléfono celular:</h4>
					            <div class="form-group">
                                    <input type="text" name="tlf_cel_cliente" id="tlf_cel_cliente" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Dirección</h4>
					            <div class="form-group">
                                    <input type="text" name="dir_cliente" id="dir_cliente" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>

<div class="col-xs-6 col-md-6"><a href="<?= base_url("index.php/clientes/edit");?>" class="btn btn-warning btn-block btn-lg" tabindex="2">Editar cliente</a></div>
<div class="col-xs-6 col-md-6"><button type="button" class="btn btn-block btn-lg btn-primary" onclick="getClient()">Verificar cliente</button></div>

                      </div>
                      <div class="tab-pane" id="Vehiculo">
                          <h3 class="head text-center">Añadir vehículo</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Serial vehículo:</h4>
                                <div class="form-group">
                                    <input type="text" name="id_vehiculo" id="id_vehiculo" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1">                <input type="hidden" name="id_valido" id="id_valido" class="form-control input-sm"> 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Modelo:</h4>
					            <div class="form-group">
                                    <input type="text" name="modelo_vehiculo" id="modelo_vehiculo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Monto garantía extendida:</h4>
					            <div class="form-group">
                                    <input type="text" name="garantia_vehiculo" id="garantia_vehiculo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>

                             <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Precio</h4>
					            <div class="form-group">
                                    <input type="text" name="precio_vehiculo" id="precio_vehiculo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Descuento:</h4>
					            <div class="form-group">
                                    <input type="text" name="descuento_vehiculo" id="descuento_vehiculo" class="form-control input-sm" placeholder="" tabindex="1" required>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Garantia</h4>
                               <div class="form-group">
                                    <label class="radio" for="radios-0">
                                        <input type="radio" name="tipo_garantia" id="estandar" value="Estandar" checked="checked" tabindex="5">
                                        Estandar
                                    </label>
                                    <label class="radio" for="radios-1">
                                        <input type="radio" name="tipo_garantia" id="extendida" value="Extendida" tabindex="6">
                                        Extendida
                                    </label>
                                </div>
                            </div>                         
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                     <br><br>
                                  <button type="button" class="btn btn-md btn-primary" onclick="getVehiculo()">Buscar</button>
                                  <button type="button" class="btn btn-md btn-success" onclick="addVehiculo()">Añadir</button>
                             </div>
                      </div>
                      <div class="tab-pane" id="Articulos">
                          <h3 class="head text-center">Añadir artículos</h3>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Serial artículo:</h4>
                                <div class="form-group">
                                    <input type="text" name="id_articulo" id="id_articulo" class="form-control input-sm" placeholder="Ejemplo: 12345678" tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Fabricante:</h4>
					            <div class="form-group">
                                    <input type="text" name="fabricante_articulo" id="fabricante_articulo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Modelo:</h4>
					            <div class="form-group">
                                    <input type="text" name="modelo_articulo" id="modelo_articulo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Stock disponible:</h4>
					            <div class="form-group">
                                    <input type="text" name="stock_articulo" id="stock_articulo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Descripción</h4>
					            <div class="form-group">
                                    <input type="text" name="descripcion_articulo" id="descripcion_articulo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Precio</h4>
					            <div class="form-group">
                                    <input type="text" name="precio_articulo" id="precio_articulo" value="" class="form-control input-sm" readonly>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Descuento:</h4>
					            <div class="form-group">
                                    <input type="text" name="descuento_articulo" id="descuento_articulo" class="form-control input-sm" placeholder="" tabindex="1" required>
					            </div>
				            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h4>Cantidad:</h4>
					            <div class="form-group">
                                    <input type="text" name="cantidad_articulo" id="cantidad_articulo" class="form-control input-sm" placeholder="" tabindex="1" required>
					            </div>
				            </div>
                                                      
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                 <br><br>  
                                  <button type="button" class="btn btn-md btn-primary" onclick="getArticulo()">Buscar</button>
                                  <button type="button" class="btn btn-md btn-success" onclick="addArticulo()">Añadir</button>
                             </div>
                      </div>
                      <div class="tab-pane" id="Financiamiento">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3 class="head text-center">Información del seguro</h3>
                                   <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>RIF Aseguradora</h4>
                                        <div class="form-group">
                                        <input type="text" name="rif_aseguradora" id="rif_aseguradora" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Aseguradora</h4>
                                        <div class="form-group">
                                        <input type="text" name="nombre_aseguradora" id="nombre_aseguradora" value="" class="form-control input-sm" placeholder="" tabindex="1" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Monto asegurado</h4>
                                        <div class="form-group">
                                        <input type="text" name="monto_seguro" id="monto_seguro" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Precio</h4>
                                        <div class="form-group">
                                        <input type="text" name="precio_seguro" id="precio_seguro" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>                                                                                                     
<div class="col-xs-3 col-md-3"><button type="button" class="btn btn-block btn-md btn-primary" onclick="getAseguradora()">Verificar aseguradora</button></div> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3 class="head text-center">Tipo de pago</h3>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <h4>Tipo de pago</h4>
                                   <div class="form-group">
                                        <label class="radio" for="radios-0">
                                            <input type="radio" name="tpago" id="contado" value="Contado" checked="checked" tabindex="5" onClick="oculta('inputs_financiamiento'); muestra('inputs_financiamiento2');">
                                            De contado
                                        </label>
                                        <label class="radio" for="radios-1">
                                            <input type="radio" name="tpago" id="financiado" value="Financiado" tabindex="6" onClick="muestra('inputs_financiamiento'); muestra('inputs_financiamiento2');">
                                            Financiado
                                        </label>
                                    </div>   
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6" id="inputs_financiamiento">
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
                                </div>
                                    <div id="inputs_financiamiento2">
                                     <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Nro de cuotas</h4>
                                        <div class="form-group">
                                        <input type="text" name="nro_cuotas_financ" id="nro_cuotas_financ" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Interés (%)</h4>
                                        <div class="form-group">
                                        <input type="text" name="interes_financ" id="interes_financ" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Monto por cuota</h4>
                                        <div class="form-group">
                                        <input type="text" name="monto_cuotas_financ" id="monto_cuotas_financ" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12" id="inputs_banco">                                    
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>RIF Banco</h4>
                                        <div class="form-group">
                                        <input type="text" name="rif_banco" id="rif_banco" class="form-control input-sm" placeholder="" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <h4>Nombre banco</h4>
                                        <div class="form-group">
                                        <input type="text" name="nombre_banco" id="nombre_banco" class="form-control input-sm" placeholder="" tabindex="1" disabled>
                                 
                                        </div>
                                    </div>
<br> <br>                                    
<div class="col-xs-3 col-md-3"><button type="button" class="btn btn-block btn-md btn-primary" onclick="getBanco()">Verificar banco</button></div>        
                                    </div>
                                    </div>                                                                
                            </div>
                      </div>
                      <div class="tab-pane" id="check">
                          <h3 class="head text-center">Confirmar e imprimir</h3>
                          
                           <div class="table-responsive">
                            <table class="table table-striped" id="tabla_factura">
                              <thead>
                                <tr>
                                  <th>ID - Descripción</th>
                                  <th>Cantidad</th>
                                  <th>Precio unit.</th>
                                  <th>Descuento</th>
                                  <th>Total</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                                                                       
                              </tbody>
                              <tfoot>
                                <tr>
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub-Total:</td>
                                    <td id="sub_total">0</td>
                                </tr>
                                <tr>
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td >Iva(12%):</td>
                                    <td id="iva">0</td>
                                </tr>
                                <tr>
                                    <td</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                    <td id="total">0</td>
                                </tr>                                     
                                  
                              </tfoot>
                            </table>
                          </div>
                          <div class="col-xs-6 col-md-6"> </div>                   
<div class="col-xs-12 col-md-6"><input type="submit" value="Facturar" class="btn btn-success btn-block btn-lg" tabindex="12"></div>
                                                    
<input type="hidden" name="nro_articulos" id="nro_articulos" class="form-control">
                          

</div>
</form>
</div>
</div>
</div>
</section>
