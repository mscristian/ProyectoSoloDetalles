{if !empty($opc)}
<br />
	{if $opc eq 1}
<li class="fa fa-archive fa-2x"> Ingresar Cliente</li><br><br>
		{if $control eq 'op0'}
			se ingreso con exito el cliente  {$prod[1]}
		{elseif $control eq 'op1'}
			el cliente ya existe
		{else}
		<form action="principal.php?opcion=clientes&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre</td><td><input type="text" name="nombre" class="inp-buscar2" placeholder="Ejemplo Juan..." required/></td></tr>
				<tr><td>Apellido</td><td><input type="text" name="apellido" class="inp-buscar2" placeholder="Ejemplo Perez..." required/></td></tr>
				<tr><td>Documento</td><td><input type="number" name="documento" class="inp-buscar2" placeholder="Ejemplo 1031173598..." required/></td></tr>
				<tr><td>Correo</td><td><input type="text" name="email" class="inp-buscar2" placeholder="Ejemplo juan@gmail.com..." required/></td></tr>
				<tr><td>Telefono</td><td><input type="number" name="telefono" class="inp-buscar2" placeholder="Ejemplo 7713685..." required/></td></tr>
				<tr><td>Direcciòn</td><td><input type="text" name="direccion" class="inp-buscar2" placeholder="Ejemplo cra 8 n 78 t 05" required/></td></tr>
			</table><br />
			<input type="hidden" name="datos"/>
			<input type="submit" value="Insertar" id="buttons1">
		</form>	
		{/if}
	{elseif $opc eq 2}
<li class="fa fa-archive fa-2x"> Modificar Cliente</li><br><br>
		<form action="principal.php?opcion=clientes&opc=Modificar" method="post">
			Documento <input type="text" name="documento" class="inp-buscar4" placeholder="Buscar..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
		{if isset($mod)}
			{if $mod eq "n1"}
				<br>no se encontro el cliente
			{else}
				<br>Cliente:<br><br>
	
				<form action="principal.php?opcion=clientes&opc=Modificar" method="post">
					<table>
						<tr><td>Nombre</td><td><input type="text" name="nombre" value="{$mod[1]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Apellido</td><td><input type="text" name="apellido" value="{$mod[2]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Documento</td><td><input type="text" name="documento" value="{$mod[3]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Correo</td><td><input type="text" name="email" value="{$mod[4]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Telefono</td><td><input type="text" name="telefono" value="{$mod[5]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Dirección</td><td><input type="text" name="direccion" value="{$mod[6]}" class="inp-buscar2" required/></td></tr>
					</table>
					<input type="hidden" name="id" value="{$mod[0]}" /><br>
					<input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}
<li class="fa fa-archive fa-2x"> Consultar Cliente</li><br><br>
		<form action="principal.php?opcion=clientes&opc=Consultar" method="post">
			Documento <input type="text" name="documento" class="inp-buscar4" placeholder="Buscar..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
{if isset($vec)}
{if $vec eq "n1"}
No se encontraro el cliente
{else}
<br />
<table>
	<tr bgcolor="#000000" style="color:#ffffff"><td>Nombre</td>
        <td style="text-align: center">Apellido</td>
        <td style="text-align: center">Documento</td>
		<td style="text-align: center">Correo</td>
		<td style="text-align: center">Telefono</td>
		<td style="text-align: center">Direcciòn</td>
    </tr>
	<tr><td style="text-align: center">{$vec[1]}</td>
        <td style="text-align: center">{$vec[2]}</td>
        <td style="text-align: center">{$vec[3]}</td>
		<td style="text-align: center">{$vec[4]}</td>
		<td style="text-align: center">{$vec[5]}</td>
		<td style="text-align: center">{$vec[6]}</td>
		
    </tr>
</table>
{/if}
{/if}
{/if}
{else}
	<a href="principal.php?opcion=clientes&opc=Ingresar" class="link1"><h1 class="fa fa-child fa-2x">Clientes</h1><br />
        <p class="fa fa-child fa-5x"></p></a>
{/if}