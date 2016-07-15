{if !empty($opc)}
<br />
	{if $opc eq 1}
<li class="fa fa-archive fa-2x"> Crear Categoría</li><br><br>
		{if $control eq 'op0'}
			se ingreso con exito la categoría  {$prod[1]}
		{elseif $control eq 'op1'}
			la categoría ya existe
		{else}
		<form action="principal.php?opcion=categoria&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre de la Categoría</td><td><input type="text" name="nombreF" class="inp-buscar2" placeholder="Ejemplo Osos..." required/></td></tr>
				<tr><td>Descripción</td><td><input type="text" name="descripcion" class="inp-buscar2" placeholder="Ejemplo Todos los Osos..." required/></td></tr>
			</table><br />
			<input type="submit" value="Crear Categoría" id="buttons1">
		</form>	
		{/if}
	{elseif $opc eq 2}
<li class="fa fa-archive fa-2x"> Modificar Categoría</li><br><br>
		<form action="principal.php?opcion=categoria&opc=Modificar" method="post">
			Ingrese el Nombre exacto de la categoría<br /><br /> <input type="text" name="familia" class="inp-buscar4" placeholder="Ejemplo Perros..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
		{if isset($mod)}
			{if $mod eq "n1"}
				no se encontro la categoría
			{else}
<br>
				Categoría:<br>
	
				<form action="principal.php?opcion=categoria&opc=Modificar" method="post">
					<table>
						<tr><td>Nombre</td><td><input type="text" name="familia" value="{$mod[1]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Descipción</td><td><input type="text" name="descripcion" value="{$mod[2]}" class="inp-buscar2" required/></td></tr>
					</table>
					<input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}
<li class="fa fa-archive fa-2x"> Consultar Categoría</li><br><br>
		<form action="principal.php?opcion=categoria&opc=Consultar" method="post">
			Ingrese el nombre exacto de la Categoría<br><br> <input type="text" name="familia" class="inp-buscar4" placeholder="Ejemplo Osos..." required/>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
{if isset($vec)}
{if $vec eq "n1"}
No se encontraron Categorías
{else}
<br />
<table border="1">
	<tr><td>Nombre de la categoría</td>
        <td>Descipción</td>
        <td>Cantidad Total</td>
    </tr>
	<tr><td>{$vec[1]}</td>
        <td>{$vec[2]}</td>
        <td>{$vec[3]}</td>
    </tr>
</table>
{/if}
{/if}
	{elseif $opc eq 4}
<h4 class="fa fa-archive fa-2x">Desactivar Categoria</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
	{/if}
{else}
	<a href="principal.php?opcion=categoria&opc=Ingresar" class="link1"><h1 class="fa fa-archive fa-2x"> Categoría</h1><br />
        <p class="fa fa-archive fa-5x"></p></a>
{/if}