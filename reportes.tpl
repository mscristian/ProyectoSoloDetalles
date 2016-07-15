{if !empty($opc)}
<br />
	{if $opc eq 1}
	<li class="fa fa-bar-chart fa-2x"> Consulta Unica</li><br><br>
		<form action="index.php" method="post">
			Opcion Actual: 
			<select id="status" name="status" onChange="mostrar(this.value);">
				<option value="ventas">Ventas</option>
				<option value="compras">Compras</option>
				<option value="productos">Productos</option>
				<option value="clientes">Clientes</option>
				<option value="proveedores">Proveedores</option>
			 </select>
		</form>
		<br>
		<div id="ventas" style="display: none;">
			<form action="principal.php?opcion=reportes&opc=consulta_unica" method="post">
				Conultar <select name="Tipo"  class="inp-buscar2">
					<option value="1">Registro de Ventas</option>
					<option value="4">Productos Devueltos</option>
					<option value="3">Productos Pasados Por Garantia</option>
			 	</select>
				Ordenado por <select name="Orden" class="inp-buscar2">
					<option value="venta.fecha">Registro mas reciente</option>
					<option value="venta.total_real">Precio de venta</option>
					<option value="cliente.nombre">Por nombre de Clientes</option>
			 	</select><br><br>
				Entre las fechas de <input class="inp-buscar2" type="datetime-local" value="2016-01-01T12:05:00" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaI" /> a <input class="inp-buscar2" type="datetime-local" value="{$fecha}" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaF"/><br><br>
				<table>
				<tr>
					<td>
						<input type="submit" value="Consultar Registro" name="registroV" id="buttons1" />
					</td>
					<td>
						<input type="submit" value="Reporte Torta" name="TortaV" id="buttons1" />
					</td><td>
						<input type="submit" value="Reporte Columnas" name="ColumnaV" id="buttons1" />
					</td>
				</tr>
			</table>		
			</form>
		</div>
	
		<div id="compras" style="display: none;">
			<form action="principal.php?opcion=reportes&opc=consulta_unica" method="post">
				Conultar <select name="Tipo"  class="inp-buscar2">
					<option value="2">Registro de Compras</option>
					<option value="4">Compras Rechazadas</option>
					<option value="3">Compras Pasadas por garantia</option>
			 	</select>
				Ordenado por <select name="Orden" class="inp-buscar2">
					<option value="compra.fecha">Registro mas reciente</option>
					<option value="compra.total">Monto total de la compra</option>
					<option value="proveedor.nombre">Proveedor</option>
			 	</select><br><br>
				Entre las fechas de <input type="datetime-local" value="2016-01-01T12:05:00" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaI"  class="inp-buscar2"/> a <input type="datetime-local" value="{$fecha}" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaF"  class="inp-buscar2"/> <br><br>
				<table>
					<tr>
					<td>
					<input type="submit" value="Consultar Registro" name="registroC" id="buttons1" />
					</td>
					<td>
						<input type="submit" value="Reporte Torta" name="TortaC" id="buttons1" />
					</td><td>
						<input type="submit" value="Reporte Columnas" name="ColumnaC" id="buttons1" />
					</td>
				</tr>
			</table>		
			</form>
		</div>
		
		<div id="productos" style="display: none;">
			<form action="principal.php?opcion=reportes&opc=consulta_unica" method="post">
				Conultar <select name="Tipo"  class="inp-buscar2">
					<option value="1">Productos Vendidos</option>
					<option value="2">Productos Comprados</option>
			 	</select>
				Ordenado por <select name="Orden" class="inp-buscar2">
					<option value="producto.nombre_prod">Nombe de productos</option>
					<option value="1">Fecha de Modificacion</option>
					<option value="estado.descripcionEstado">Estado</option>
					<option value="producto.precio">Productos mas vendidos o Comprados</option>
					<option value="3">Numero de Factura</option>
			 	</select><br><br>
				Entre las fechas de <input type="datetime-local" value="2016-01-01T12:05:00" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaI" class="inp-buscar2"/> a <input type="datetime-local" value="{$fecha}" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaF" class="inp-buscar2"/> <br><br>
				<table>
					<tr>
						<td>
				<input type="submit" value="Consultar Registro" name="registroP" id="buttons1" />
				</td>
					<td>
						<input type="submit" value="Reporte Torta" name="TortaProd" id="buttons1" />
					</td><td>
						<input type="submit" value="Reporte Columnas" name="ColumnaProd" id="buttons1" />
					</td>
				</tr>
			</table>		
			</form>
		</div>
		
		<div id="clientes" style="display: none;">
			<form action="principal.php?opcion=reportes&opc=consulta_unica" method="post">
				Entre las fechas de <input type="datetime-local" value="2016-01-01T12:05:00" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FeachaI" class="inp-buscar2"/> a <input type="datetime-local" value="{$fecha}" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaF" class="inp-buscar2"/> <br><br>
				Ordenado por <select name="Orden" class="inp-buscar2">
					<option value="cliente.nombre">Nombre de los clientes</option>
					<option value="venta.idVenta">Numero de Venta</option>
			 	</select><br><br>
				<table>
					<tr>
						<td>
				<input type="submit" value="Consultar Registro" name="registroCli" id="buttons1"/>
				</td>
					<td>
						<input type="submit" value="Reporte Torta" name="TortaClie" id="buttons1" />
					</td><td>
						<input type="submit" value="Reporte Columnas" name="ColumnaClie" id="buttons1" />
					</td>
				</tr>
			</table>		
			</form>
		</div>
		
		<div id="proveedores" style="display: none;">
			<form action="principal.php?opcion=reportes&opc=consulta_unica" method="post">
				Entre las fechas de <input type="datetime-local" value="2016-01-01T12:05:00" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaI" class="inp-buscar2"/> a <input type="datetime-local" value="{$fecha}" min=”2016-01-01T12:05:00″ max=”{$fecha}″ name="FechaF" class="inp-buscar2"/> <br><br>
				Ordenado por <select name="Orden" class="inp-buscar2">
					<option value="proveedor.nombre">Nombre de proveedor</option>
					<option value="compra.fecha">Por Fecha</option>
					<option value="compra.total">Total Compra</option>
			 	</select><br><br>
				<table>
					<tr>
						<td>
				<input type="submit" value="Consultar Registro" name="registroProv" id="buttons1"/>
				</td>
					<td>
						<input type="submit" value="Reporte Torta" name="TortaProv" id="buttons1" />
					</td><td>
						<input type="submit" value="Reporte Columnas" name="ColumnaProv" id="buttons1" />
					</td>
				</tr>
			</table>		
			</form>
		</div>
		{if $men eq 1}
<br><li class="fa fa-area-chart fa-2x"> Ventas</li><br><br>
			<table>
				<tr  bgcolor="#000000" style="color:#ffffff">
					<td style="text-align: center">Nº de Venta</td>
					<td style="text-align: center">Fecha</td>
					<td style="text-align: center">Nombre</td>
					<td style="text-align: center">Apellido</td>
					<td style="text-align: center">Preio Original</td>
					<td style="text-align: center">Precio Real</td>
					<td style="text-align: center">Nombre Producto</td>
					<td style="text-align: center">Cantidad</td>
					<td style="text-align: center">Estado</td>
				</tr>
				{for $i=0 to ($c-1)}					
				{if $i % 2 eq 0 }
				<tr>
				{else}
            	<tr style="background:  rgb(178, 178, 178)">
           		{/if}	
					{for $j=0 to 8}
					<td style="text-align: center">{$vec[$i][$j]}</td>
					{/for}	
				</tr>	
				{/for}
			</table>
		{else if $men eq 2}
<br><li class="fa fa-area-chart fa-2x"> Compras</li><br><br>
			<table>
				<tr  bgcolor="#000000" style="color:#ffffff">
					<td style="text-align: center">Nº de Compra</td>
					<td style="text-align: center">Fecha</td>
					<td style="text-align: center">Nombre</td>
					<td style="text-align: center">Total Compra</td>
					<td style="text-align: center">Producto</td>
					<td style="text-align: center">Precio</td>
					<td style="text-align: center">Cantidad</td>
					<td style="text-align: center">Estado</td>
				</tr>
				{for $i=0 to ($c-1)}					
				{if $i % 2 eq 0 }
            	<tr>
            	{else}
            	<tr style="background:  rgb(178, 178, 178)">
				{/if}
					{for $j=0 to 7}
					<td style="text-align: center">{$vec[$i][$j]}</td>
					{/for}	
				</tr>	
				{/for}
			</table>
		{else if $men eq 3}
<br><li class="fa fa-area-chart fa-2x"> Productos</li><br><br>
			<table>
				<tr bgcolor="#000000" style="color:#ffffff">
					<td style="text-align: center">Nº de factura</td>
					<td style="text-align: center">Categoria</td>
					<td style="text-align: center">Producto</td>
					<td style="text-align: center">Precio</td>
					<td style="text-align: center">Estado</td>
					<td style="text-align: center">Cantidad</td>
					<td style="text-align: center">Fecha</td>
				</tr>
				{for $i=0 to ($c-1)}					
				{if $i % 2 eq 0 }
				<tr>
            	{else}
            	<tr style="background:  rgb(178, 178, 178)">
           		{/if}
					{for $j=0 to 6}
					<td style="text-align: center">{$vec[$i][$j]}</td>
					{/for}	
				</tr>	
				{/for}
			</table>
		{else if $men eq 4}
<br><li class="fa fa-area-chart fa-2x"> Clientes</li><br><br>
			<table>
				<tr bgcolor="#000000" style="color:#ffffff">
					<td style="text-align: center">Nº de Venta</td>
					<td style="text-align: center">Nombre</td>
					<td style="text-align: center">Apellido</td>
					<td style="text-align: center">Documento</td>
					<td style="text-align: center">Correo</td>
					<td style="text-align: center">Numero Celular</td>
					<td style="text-align: center">Dirección</td>
					<td style="text-align: center">Total Venta</td>
					<td style="text-align: center">Fecha</td>
				</tr>
				{for $i=0 to ($c-1)}					
				{if $i % 2 eq 0 }
            	<tr>
            	{else}
            	<tr style="background:  rgb(178, 178, 178)">
				{/if}
					{for $j=0 to 8}
					<td style="text-align: center">{$vec[$i][$j]}</td>
					{/for}	
				</tr>	
				{/for}
			</table>
		{else if $men eq 5}
<br><li class="fa fa-area-chart fa-2x"> Proveedores</li><br><br>
			<table>
				<tr bgcolor="#000000" style="color:#ffffff">
					<td style="text-align: center">Proveedor</td>
					<td style="text-align: center">Correo</td>
					<td style="text-align: center">Número Fijo</td>
					<td style="text-align: center">Número Celular</td>
					<td style="text-align: center">Nº Compra</td>
					<td style="text-align: center">Total Compra</td>
					<td style="text-align: center">Fecha</td>
				</tr>
				{for $i=0 to ($c-1)}					
				{if $i % 2 eq 0 }
            	<tr>
            	{else}
            	<tr style="background:  rgb(178, 178, 178)">
            	{/if}
					{for $j=0 to 6}
					<td style="text-align: center">{$vec[$i][$j]}</td>
					{/for}	
				</tr>	
				{/for}
			</table>
		{/if}
	{else if $opc eq 2}
		<form action="principal.php?opcion=reportes&opc=consulta_mezclada" method="post">
		
			Inserte el id del usuario 	<input type="number" name="id" class="inp-buscar5">
			<select name="opcion" onchange="salta(this.form)" class="inp-buscar2">
            	<option selected>Ventas
                            
				<option value='Compra'>Compras
				<option value='Venta'>Ventas
            </select> 
			<br><br>
			de <input type="datetime-local" name="fechaI" class="inp-buscar2"> hasta <input type="datetime-local"  name="fechaF" class="inp-buscar2">
			<input type="submit" value="buscar" name="buscar" id="buttons1">
		</form>

	{/if}
{else}
<a href="principal.php?opcion=reportes&opc=consulta_unica" class="link1"><h1 class="fa fa-bar-chart fa-2x"> Reportes</h1><br />
	<p class="fa fa-bar-chart fa-5x"></p></a>
{/if}