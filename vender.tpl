{if !empty($opc)}
	{if $opc eq 1}
<h4 class="fa fa-shopping-basket fa-2x">Ingresar Venta</h4><br />
Ingrese el nombre del Producto<br /><br />
<form action="principal.php?opcion=vender&opc=Ingresar" method="post">
    <input type="text" name="buscar2" class="inp-buscar1" placeholder="Agregar..."/>
    <input type="submit" name="ingresar" value="Agregar" id="buttons1"/>
        <input type="submit" name="vender" value="Vender" id="buttons1"/>
        <input type="submit" onclick="pregunta()" name="cancelar" value="Cancelar" id="buttons1"/>
<br />
    <br />
	{$x=0}
    
        {if $vect[0][0] eq "N"}
        {else}
	   <table border="1">	
			<tr>
				<td>N</td>
                <td>Producto</td>
                <td>Familia</td>
                <td>Precio</td> 
			</tr>
		{for $i=0 to ($cont-1)}					
		<tr>	
			<td>{$i+1}</td>
			{for $j=0 to 2}
			<td>{$vect[$i][$j]}</td>
			
			{/for}	
			{$x=$x+$vect[$i][2]}
		</tr>	
		{/for}
		<tr>
		<td></td><td></td><td>Total</td><td>{$x}</td>
		</tr>
		</table>
      <input type="hidden" name="total" value="{$x}"/>
    {/if}
    {if $control eq 'op0'}
    no se econtro el producto
	{elseif $control eq 'op1'}
    se encontro el producto
	{elseif $control eq 'op2'}
    Se creo la venta con id {$idv}
    {/if}
</form>
	{elseif $opc eq 2}
<h4 class="fa fa-shopping-basket fa-2x">Devolución</h4><br />
<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>
    {elseif $opc eq 3}
<h4 class="fa fa-shopping-basket fa-2x">Consulta</h4><br />
<form action="principal.php?opcion=vender&opc=Consultar" method="post">
        Ingrese el id de la venta<br/><br/><input type="text" name="consultar" class="inp-buscar1" placeholder="Consultar..." />
    <input type="submit" value="Consultar" id="buttons1" />
</form>
{if $vec eq "n1"}
	No hay venta registradas
{else}
{if $opcv eq 1}
<br/><table>
	<tr>
		<td>Id </td><td>{$vecci[0]} </td>
		<td></td><td></td><td></td><td></td>
		<td> Fecha de Venta </td><td> {$vecci[3]}</td>
		</tr><tr>
	<td></td><td></td>
		<td>Total Original </td><td>{$vecci[1]} </td>
		<td> Total Real</td><td> {$vecci[2]}</td>
		
	</tr>
</table>
<br/>
<table>
	<tr>
		<td>Producto</td><td>Familia</td><td>Cantidad</td><td>Precio</td>
	</tr>
	Cantidad de productos: {$c}
	{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 3}
			<td>{$vec[$i][$j]}</td>
		{/for}
		</tr>
	{/for}	
</table>
{else}
	<br/><table border="1">
		<tr>
			<td>Id</td><td>Precio Original</td><td>Precio Real</td><td>Fecha</td>
		</tr>
	{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 3}
			<td>{$vec[$i][$j]}</td>
			
		{/for}
			
		</tr>
	{/for}	
	</table>
	{/if}
		{/if}
	
{/if}
{else}
<a href="principal.php?opcion=vender&opc=Ingresar" class="link1"><h1 class="fa fa-shopping-basket fa-2x">Venta</h1><br />
	<p class="fa fa-shopping-basket fa-5x"></p></a>
<!--<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>-->
{/if}


