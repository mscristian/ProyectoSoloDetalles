{if !empty($opc)}
<br />
	{if $opc eq 1}
<h4 class="fa fa-archive fa-2x">Ingresar Categoria</h4>
		{if $control eq 'op0'}
			se ingreso con exito la categoria  {$prod[0]}
		{elseif $control eq 'op1'}
			la categoria ya existe
		{else}
		<form action="principal.php?opcion=categoria&opc=Ingresar" method="post">
			<table>
				<tr><td>Nombre de la Familia</td><td><input type="text" name="nombreF" class="inp-buscar2" required/></td></tr>
				<tr><td>Descripción</td><td><input type="text" name="descripcion" class="inp-buscar2" required/></td></tr>
			</table><br />
			<input type="submit" value="Insertar" id="buttons1">
		</form>	
		{/if}
	{elseif $opc eq 2}
<h4 class="fa fa-archive fa-2x">Modificar Categoria</h4>
		<form action="principal.php?opcion=categoria&opc=Modificar" method="post">
			Familia <input type="text" name="familia" class="inp-buscar2" required>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
		{if isset($mod)}
			{if $mod eq "n1"}
				no se encontro la categoria
			{else}
				si se encontro la categoria
	
				<form action="principal.php?opcion=categoria&opc=Modificar" method="post">
					<table>
						<tr><td>Familia</td><td><input type="text" name="familia" value="{$mod[0]}" class="inp-buscar2" required/></td></tr>
						<tr><td>Descipción</td><td><input type="text" name="descripcion" value="{$mod[1]}" class="inp-buscar2" required/></td></tr>
					</table>
					<input type="submit" name="modifique" value="Modificar" id="buttons1">	
				</form>
			{/if}
		{/if}
		{if $modsucces eq 1}
			Se actualizo correctamente
		{/if}
	{elseif $opc eq 3}
<h4 class="fa fa-archive fa-2x">Consultar Categoria</h4>
		<form action="principal.php?opcion=categoria&opc=Consultar" method="post">
			Familia <input type="text" name="familia" class="inp-buscar2" required>
			<input type="submit" value="Buscar" id="buttons1">
		</form>	
{if isset($vec)}
{if $vec eq "n1"}
No se encontraron Categorias
{else}
<br />
<table border="1">
	<tr><td>Familia</td>
        <td>Descipción</td>
        <td>Cantidad Total</td>
    </tr>
	<tr><td>{$vec[0]}</td>
        <td>{$vec[1]}</td>
        <td>{$vec[2]}</td>
    </tr>
</table>
{/if}
{/if}
	{elseif $opc eq 4}
<h4 class="fa fa-archive fa-2x">Desactivar Categoria</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
	{/if}
{else}
	<h1 class="fa fa-archive fa-2x">Categoria</h1><br />
	<p class="fa fa-archive fa-5x"></p>
{/if}