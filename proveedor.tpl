{if !empty($opc)}
<br />
	{if $opc eq 1}
<li class="fa fa-truck fa-2x">Ingresar Proveedor</li><br><br>
		{if $control eq 'op0'}
			se ingreso con exito el Proveedor  {$prod[1]}
		{elseif $control eq 'op1'}
			el Proveedor ya existe
		{else}
		<form action="principal.php?opcion=proveedor&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre</td><td><input type="text" name="nombre" class="inp-buscar2" required/></td></tr>
				<tr><td>Calificaciòn</td><td><input type="text" name="calificacion" class="inp-buscar2" required/></td></tr>
				<tr><td>Correo</td><td><input type="text" name="email" class="inp-buscar2" required/></td></tr>
				<tr><td>Telefono Fijo</td><td><input type="text" name="tf" class="inp-buscar2" required/></td></tr>
				<tr><td>Telefono Celular</td><td><input type="text" name="tc" class="inp-buscar2" required/></td></tr>
			</table><br />
			<input type="hidden" name="datos">
			<input type="submit" value="Insertar" id="buttons1">
		</form>	
		{/if}
	{elseif $opc eq 2}
<li class="fa fa-truck fa-2x">Modificar Proveedor</li><br><br>
		<form action="principal.php?opcion=proveedor&opc=Modificar" method="post">
			nombre del Proveedor <input type="text" name="nombre" class="inp-buscar4" placeholder="Buscar..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
		{if isset($mod)}
			{if $mod eq "n1"}
				no se encontro el proveedor
			{else}
				si se encontro el proveedor
	
				<form action="principal.php?opcion=proveedor&opc=Modificar" method="post">
					<table>
						<tr><td>Nombre</td><td><input type="text" name="nombre" value="{$mod[1]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Calificacion</td><td><input type="text" name="calificacion" value="{$mod[2]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Correo</td><td><input type="text" name="email" value="{$mod[3]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Teléfono Fijo</td><td><input type="text" name="tf" value="{$mod[4]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Teléfono Celular</td><td><input type="text" name="tc" value="{$mod[5]}" class="inp-buscar2" required/></td></tr>
					</table>
					<input type="hidden" name="id" value="{$mod[0]}">
					<input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}
<li class="fa fa-archive fa-2x">Consultar Proveedor</li><br><br>
		<form action="principal.php?opcion=proveedor&opc=Consultar" method="post">
			Nombre del Proveedor <input type="text" name="nombre" class="inp-buscar4" placeholder="Buscar..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
{if isset($vec)}
{if $vec eq "n1"}
No se encontro el proveedor
{else}
<br />
<table border="1">
	<tr><td>Nombre</td>
        <td>Calificaciòn</td>
        <td>Correo</td>
		<td>Teléfono Fijo</td>
		<td>Teléfono Celular</td>
    </tr>
	<tr><td>{$vec[1]}</td>
        <td>{$vec[2]}</td>
        <td>{$vec[3]}</td>
		<td>{$vec[4]}</td>
		<td>{$vec[5]}</td>
    </tr>
</table>
{/if}
{/if}
	{elseif $opc eq 4}
<li class="fa fa-truck fa-2x">Calificar Proveedor</li><br /><br>
<table>
{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 5}
			
				<td>{$vec[$i][$j]}</td>	
			
		{/for}
			
		</tr>
	{/for}	
    </table>
	{/if}
{else}
	<a href="principal.php?opcion=proveedor&opc=Ingresar" class="link1"><h1 class="fa fa-truck fa-2x">Proveedor</h1><br />
        <p class="fa fa-archive fa-5x"></p></a>
{/if}