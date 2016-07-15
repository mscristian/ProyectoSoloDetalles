{if !empty($opc)}
<br />
	{if $opc eq 1}
		{if $control eq 'op0'}
			se ingreso con exito el producto {$prod[0]}
		{elseif $control eq 'op1'}
			el producto ya existe
		{else}
<h4 class="fa fa-archive fa-2x">Ingresar Producto</h4>
		<form action="principal.php?opcion=producto&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre</td><td><input type="text" name="nombre" class="inp-buscar2" required/></td>
			<tr><td>Cantidad Producto</td><td><input type="text" class="inp-buscar2" name="cantidadP" required/></td>
			<tr><td>Precio</td><td><input type="text" name="precio" class="inp-buscar2" required/></td>
			<tr><td>Estado</td><td><input type="text" name="estado" class="inp-buscar2" required/></td>
			<tr><td>Codigo Familia</td><td><input type="text" class="inp-buscar2" name="codigo"></td>
			</table><br />
			<input type="submit" value="Insertar" name="insert" id="buttons1">
		</form>
		{/if}
	{elseif $opc eq 2}
<h4 class="fa fa-archive fa-2x">Modificar Producto</h4>
		<form action="principal.php?opcion=producto&opc=Modificar" method="post">
			<table>
				<tr><td>Producto </td><td><input type="text" name="nombre" class="inp-buscar2"></td><td><input type="submit" value="Buscar" id="buttons1"></td></tr>
			</table>
			
		</form>	
		{if isset($mod)}

			{if $mod eq "n1"}
				no se encontro el producto
			{else}
				si se encontro el producto

				<form action="principal.php?opcion=producto&opc=Modificar" method="post">
					<table><input type="hidden" name="nombreO" value="{$mod[0]}" />
						<tr><td>Producto </td><td><input type="text" name="nombre" value="{$mod[0]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Categoria </td><td><input type="text" name="familia" value="{$mod[1]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Cantidad </td><td><input type="text" name="cantidad" value="{$mod[2]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Precio </td><td><input type="text" name="precio" value="{$mod[3]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Estado </td><td><input type="text" name="estado" value="{$mod[4]}" class="inp-buscar2" required/></td></tr>
					</table>
					<input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}	
<h4 class="fa fa-archive fa-2x">Consultar Producto</h4>
<form action="principal.php?opcion=producto&opc=Consultar" method="post">
			<input type="text" name="buscar" class="inp-buscar1" placeholder="Buscar..."/>
			<input type="submit" value="Consultar" id="buttons1"/>
			</form>
			{if $dato1 eq "n1"}
                <br />	
                No se encontraron productos
            {else}
                <br />			
                <table border="1">			
                    <tr>
                        <td>Producto</td>
                        <td>Categoria</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Estado</td>		
                    </tr>		
                    <tr>	
                        <td>{$dato1[0]}</td>
                        <td>{$dato1[1]}</td>
                        <td>{$dato1[2]}</td>
                        <td>{$dato1[3]}</td>
                        <td>{$dato1[4]}</td>
                    </tr>
                </table>
            {/if}
	{elseif $opc eq 4}	
<h4 class="fa fa-archive fa-2x">Desactivar Producto</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
	{/if}
{else}
	<h1 class="fa fa-archive fa-2x">Producto</h1><br />
	<p class="fa fa-archive fa-5x"></p>
{/if}