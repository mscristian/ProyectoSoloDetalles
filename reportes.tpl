{if !empty($opc)}
<br />
	{if $opc eq 1}
		<form action="index.php" method="post">
			Estado actual: 
			<select id="status" name="status" onChange="mostrar(this.value);">
				<option value="ventas">Ventas</option>
				<option value="compras">Compras</option>
				<option value="productos">Productos</option>
				<option value="clientes">Clientes</option>
				<option value="proveedores">Proveedores</option>
			 </select>
		</form>
		
		<div id="ventas" style="display: none;">
			<form action="index.php" method="post">
				Conultar <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Registro de Ventas</option>
					<option value="compras">Productos Devueltos</option>
					<option value="productos">Productos Pasados Por Garantia</option>
			 	</select>
				Entre las fechas de <input type="datetime-local" > a <input type="datetime-local" > 
				Ordenado por <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Registro mas reciente</option>
					<option value="compras">Precio de venta</option>
					<option value="productos">Pro nombe de Clientes</option>
			 	</select>
			</form>
		</div>
	
		<div id="compras" style="display: none;">
			<form action="index.php" method="post">
				Conultar <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Registro de Compras</option>
					<option value="compras">Compras Rechazadas</option>
					<option value="productos">Compras Pasadas por garantia</option>
			 	</select>
				Entre las fechas de <input type="datetime-local" > a <input type="datetime-local" > 
				Ordenado por <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Registro mas reciente</option>
					<option value="compras">Monto toal de la compra</option>
					<option value="productos">Proveedor</option>
					<option value="productos">Calificacion del proveedor</option>
			 	</select>
			</form>
		</div>
		
		<div id="productos" style="display: none;">
			<form action="index.php" method="post">
				Conultar <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Productos Vendidos</option>
					<option value="compras">Productos Comprados</option>
			 	</select>
				Entre las fechas de <input type="datetime-local" > a <input type="datetime-local" > 
				Ordenado por <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Nombe de productos</option>
					<option value="compras">Existencia total</option>
					<option value="productos">Precio</option>
					<option value="productos">Productos mas vendidos</option>
			 	</select>
			</form>
		</div>
		
		<div id="clientes" style="display: none;">
			<form action="index.php" method="post">
				Entre las fechas de <input type="datetime-local" > a <input type="datetime-local" > 
				Ordenado por <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Nombre de los clientes</option>
					<option value="compras">Frecuencia de compra</option>
			 	</select>
			</form>
		</div>
		
		<div id="proveedores" style="display: none;">
			<form action="index.php" method="post">
				Entre las fechas de <input type="datetime-local" > a <input type="datetime-local" > 
				Ordenado por <select id="status" name="status" onChange="mostrar(this.value);">
					<option value="ventas">Productos Ingresados</option>
					<option value="compras">Calidad del proveedor</option>
					<option value="productos">Nombre del proveedor</option>
			 	</select>
			</form>
		</div>
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
{/if}