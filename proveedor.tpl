{if !empty($opc)}
<br />
	{if $opc eq 1}
<li class="fa fa-truck fa-2x"> Ingresar Proveedor</li><br><br>
		{if $control eq 'op0'}
			<br>se ingreso con exito el Proveedor  {$prod[1]}
		{elseif $control eq 'op1'}
			<br>el Proveedor ya existe
		{else}
		<form action="principal.php?opcion=proveedor&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre</td><td><input type="text" name="nombre" class="inp-buscar2" placeholder="Ejemplo Pelanas..." required/></td></tr>
				<tr><td>Calificaciòn</td><td><input type="number" name="calificacion" class="inp-buscar2" placeholder="Ejemplo 100..." required/></td></tr>
				<tr><td>Correo</td><td><input type="text" name="email" class="inp-buscar2" placeholder="Ejemplo pelanas@gmail.com..." required/></td></tr>
				<tr><td>Telefono Fijo</td><td><input type="number" name="tf" class="inp-buscar2" placeholder="Ejemplo Telefono Fijo..." required/></td></tr>
				<tr><td>Telefono Celular</td><td><input type="number" name="tc" class="inp-buscar2" placeholder="Ejemplo Telefono Celular..." required/></td></tr>
			</table><br />
			<input type="hidden" name="datos">
			<input type="submit" value="Insertar" id="buttons1">
		</form>	
		{/if}
	{elseif $opc eq 2}
<li class="fa fa-truck fa-2x"> Modificar Proveedor</li><br><br>
		<form action="principal.php?opcion=proveedor&opc=Modificar" method="post">
			nombre del Proveedor <br /><br /><input type="text" name="nombre" class="inp-buscar4" placeholder="Ejemplo Pelanas..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
		{if isset($mod)}
			{if $mod eq "n1"}
				<br>no se encontro el proveedor
			{else}
				<br />Proveedor:<br /><br>
	
				<form action="principal.php?opcion=proveedor&opc=Modificar" method="post">
					<table>
						<tr><td>Nombre</td><td><input type="text" name="nombre" value="{$mod[1]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Calificación</td><td><input type="number" name="calificacion" value="{$mod[2]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Correo</td><td><input type="text" name="email" value="{$mod[3]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Teléfono Fijo</td><td><input type="number" name="tf" value="{$mod[4]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Teléfono Celular</td><td><input type="number" name="tc" value="{$mod[5]}" class="inp-buscar2" required/></td></tr>
					</table><br>
					<input type="hidden" name="id" value="{$mod[0]}">
					<input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			<br>Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}
<li class="fa fa-truck fa-2x"> Consultar Proveedor</li><br><br>
		<form action="principal.php?opcion=proveedor&opc=Consultar" method="post">
			Nombre del Proveedor <br><br><input type="text" name="nombre" class="inp-buscar4" placeholder="Ejemplo Pelanas..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
{if isset($vec)}
{if $vec eq "n1"}
No se encontro el proveedor
{else}
<br />
<table>
	<tr bgcolor="#000000" style="color:#ffffff">
		<td style="text-align: center">Nombre</td>
        <td style="text-align: center">Calificaciòn</td>
        <td style="text-align: center">Correo</td>
		<td style="text-align: center">Teléfono Fijo</td>
		<td style="text-align: center">Teléfono Celular</td>
    </tr>
	<tr><td style="text-align: center">{$vec[1]}</td>
        <td style="text-align: center">{$vec[2]}</td>
        <td style="text-align: center">{$vec[3]}</td>
		<td style="text-align: center">{$vec[4]}</td>
		<td style="text-align: center">{$vec[5]}</td>
    </tr>
</table>
{/if}
{/if}
	{elseif $opc eq 4}
<li class="fa fa-truck fa-2x"> Calificar Proveedor</li><br /><br>
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
	<a href="principal.php?opcion=proveedor&opc=Ingresar" class="link1"><h1 class="fa fa-truck fa-2x"> Proveedor</h1><br />
        <p class="fa fa-archive fa-5x"></p></a>
{/if}