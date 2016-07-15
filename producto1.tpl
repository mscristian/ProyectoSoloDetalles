{if !empty($opc)}
<br />
	{if $opc eq 1}
		{if $control eq 'op0'}
			se ingreso con exito el producto {$prod[0]}
		{elseif $control eq 'op1'}
			el producto ya existe
		{else}
<li class="fa fa-archive fa-2x"> Ingresar Producto</li><br><br>
		<form action="principal.php?opcion=producto&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre</td><td><input type="text" name="nombre" class="inp-buscar2" placeholder="Ejemplo Osos Grandes..." required/></td>
			<tr><td>Cantidad Producto</td><td><input type="number" class="inp-buscar2" name="cantidadP" placeholder="Ejemplo 50..." required/></td>
			<tr><td>Precio</td><td><input type="number" name="precio" class="inp-buscar2" placeholder="Ejemplo 750000..." required/></td>
			<tr><!--<td>Estado</td><td><input type="text" name="estado" class="inp-buscar2" required/></td>
                <tr>--><td>Familia</td><td>
                    
                    <select name="familia" onchange="salta(this.form)" class="inp-buscar2">
                    <option selected> ---
                        {for $i=0 to ($vec-1)}	
                                <option value='{$fam[$i][0]}'>{$fam[$i][1]}
                                    
                        {/for}
                    </select>                             
                    </td>
			</table>
            <br />
			<input type="submit" value="Insertar" name="insert" id="buttons1">
		</form>
		{/if}
	{elseif $opc eq 2}
<li class="fa fa-archive fa-2x"> Modificar Producto</li>
<br><br>Ingrese el nombre del Producto<br><br>
		<form action="principal.php?opcion=producto&opc=Modificar" method="post">
			<table>
				<tr><td><input type="text" name="nombre" class="inp-buscar1" placeholder="Ejemplo Osos grandes..." /></td><td><input type="submit" value="Buscar" id="buttons1"></td></tr>
			</table>
			
		</form>	
		{if isset($mod)}

			{if $mod eq "n1"}
				<br>no se encontro el producto
			{else}
				<br>Producto:<br>

				<form action="principal.php?opcion=producto&opc=Modificar" method="post">
					<table><input type="hidden" name="nombreO" value="{$mod[0]}" />
						<tr><td>Nombre </td><td><input type="text" name="nombre" value="{$mod[0]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Categoría </td><td>
                        
                        <select name="familia" onchange="salta(this.form)" class="inp-buscar2">
                        <option selected> {$mod[5]}
                            {for $i=0 to ($vec-1)}	
                                    <option value='{$fam[$i][0]}'>{$fam[$i][1]}

                            {/for}
                        </select>       
                        
                        </td></tr>
					<tr><td>Cantidad </td><td><input type="number" name="cantidad" value="{$mod[2]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Precio </td><td><input type="number" name="precio" value="{$mod[3]}" class="inp-buscar2" required/></td></tr>
					<tr><td>Estado </td><td>{if $mod[4] eq 0}Activo{else}Desactivo{/if}<input type="hidden" name="estado" value="{$mod[4]}" class="inp-buscar2" required/></td></tr>
					</table>
					<br><input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}	
<li class="fa fa-archive fa-2x"> Consultar Producto</li><br><br>
<form action="principal.php?opcion=producto&opc=Consultar" method="post">
			Ingrese el nombre exacto del producto:<br><br>
			<input type="text" name="buscar" class="inp-buscar1" placeholder="Ejemplo Osos Grandes..."/>
			<input type="submit" value="Consultar" id="buttons1"/>
			</form>
			{if $dato1 eq "n1"}
                <br />	
                No se encontraron productos
            {else}
                <br />			
                <table>			
                    <tr bgcolor="#000000" style="color:#ffffff">
                        <td style="text-align: center">Producto</td>
                        <td style="text-align: center">Categoría</td>
                        <td style="text-align: center">Cantidad</td>
                        <td style="text-align: center">Precio</td>
                        <td style="text-align: center">Estado</td>
                    </tr>		
                    <tr>	
                        <td style="text-align: center">{$dato1[0]}</td>
                        <td style="text-align: center">{$dato1[1]}</td>
                        <td style="text-align: center">{$dato1[2]}</td>
                        <td style="text-align: center">{$dato1[3]}</td>
                        <td style="text-align: center">{if $dato1[4] eq 0}Activo{else}Desactivo{/if}</td>
                    </tr>
                </table>
            {/if}
	{elseif $opc eq 4}	
<h4 class="fa fa-archive fa-2x">Desactivar Producto</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
	{/if}
{else}
	<a href="principal.php?opcion=producto&opc=Ingresar" class="link1"><h1 class="fa fa-archive fa-2x"> Producto</h1><br />
        <p class="fa fa-archive fa-5x"></p></a>
{/if}