{if !empty($opc)}
	{if $opc eq 1}
<h4 class="fa fa-shopping-cart fa-2x">Ingresar Compra</h4><br />
Ingrese el nombre del Producto<br /><br />
<form action="principal.php?opcion=comprar&opc=Ingresar" method="post">
    <input type="text" name="buscar2" class="inp-buscar1" placeholder="Agregar..."/>
	<input type="number" name="cant" class="inp-buscar5" value="1"/>
    <input type="submit" name="ingresar" value="Agregar" id="buttons1"/>
        <input type="submit" name="comprar" value="Comprar" id="buttons1"/>
        <input type="submit" onclick="pregunta()" name="cancelar" value="Cancelar" id="buttons1"/><br/><br/>
	Nombre de la Empresa proveedora   	<input type="text" name="nombreE" class="inp-buscar1" placeholder="Empresa..."/>
	<a href="principal.php?opcion=proveedor&opc=Ingresar" class="link1"><h1 class="fa fa-truck">Ingresar Nuevo Proveedor</h1><br /></a>
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
				<td>Cantidad</td> 
			</tr>
		{for $i=0 to ($cont-1)}					
		<tr>	
			<td>{$i+1}</td>
			{for $j=0 to 3}
			<td>{$vect[$i][$j]}</td>
			{/for}	
			{for $total=1 to $vect[$i][3]}
			{$x=$x+$vect[$i][2]}
			{/for}
		</tr>	
		{/for}
		<tr>
		<td></td><td></td><td>Total</td><td>{$x}</td>
		</tr>
		</table>
		Total Real<input type="number" name="totalR" class="inp-buscar6" value="{$x}"/>
      <input type="hidden" name="total" value="{$x}"/>
    {/if}
    {if $control eq 'op0'}
    no se econtro el producto
	{elseif $control eq 'op1'}
    se encontro el producto
	{elseif $control eq 'op2'}
    Se creo la compra con id {$idv}
    {/if}
</form>
	{elseif $opc eq 2}
<h4 class="fa fa-shopping-cart fa-2x">Devolución</h4><br />

{if !isset($opcv)}
<form action="principal.php?opcion=comprar&opc=Devolucion" method="post">
        Ingrese el id de la Compra<br/><br/><input type="text" name="consultar" class="inp-buscar1" placeholder="Consultar..." />
    <input type="submit" value="Consultar" id="buttons1" />
</form>
{/if}
{if $vec eq "n1"}
	No hay Compras registradas
{else}
{if $opcv eq 1}
		Id {$vecci[0]}
		<br /><br />
		Fecha de la Compra {$vecci[3]}
<br />
<br/>
<form method="post" action="principal.php?opcion=comprar&opc=Devolucion">
<table border="1">
	<tr>
		<td>Producto</td><td>Familia</td><td>Cantidad</td><td>Precio U</td><td>Monto</td><td>Estado</td>
	</tr>
    Proveedor {$vecci[4]}<br /><br />
	Cantidad de productos: {$c}<br /><br />
	{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 3}
			<td>{$vec[$i][$j]}</td>
		{/for}
			<td>{$vec[$i][2] * $vec[$i][3]}</td>
			<td><select name=Estado{$i} onchange="salta(this.form)" class="inp-buscar2">
                    {if $vec[$i][4] eq "Devuelto"}
                        <option selected>{$vec[$i][4]}
                        <option value=2>Comprado
                        <option value=3>Garantia
                    {else if $vec[$i][4] eq "Garantia"}
                        <option selected>{$vec[$i][1]}
                        <option value=2>Comprado
                        <option value=4>Devuelto
                    {else if $vec[$i][4] eq "Comprado"}
                        <option selected>{$vec[$i][4]}
                        <option value=3>Garantia
                        <option value=4>Devuelto
                    {/if}
                    </select>                        
                </td>
				<input type="hidden" name="Cantidad{$i}" value={$vec[$i][2]} />
				<input type="hidden" name="idCompra" value={$vecci[0]} />
				<input type="hidden" name=idProducto{$i} value={$vec[$i][5]} />
		</tr>
	{/for}	
</table>
<br />
	  <input type="submit" value="Actualizar" id="buttons1" name="cambiarE">
</form>
<br />
<table>
	<tr>
		<td>Total Valor Compra</td><td>{$vecci[2]}</td>
	</tr><tr>
	</tr>
</table>
{else}
	<br/><table border="1">
		<tr>
			<td>Id</td><td>Total Compra</td><td>Fecha</td><td>Proveedor</td>
		</tr>
	{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 4}
			
			{if $j eq 1}
				{if $vec[$i][1] eq 999999999}
					<!--<td>anonimo</td>-->
				{else}
					<!--<td>{$vec[$i][1]}</td>-->
				{/if}
			{else}
				<td>{$vec[$i][$j]}</td>	
			{/if}
		{/for}
			
		</tr>
	{/for}	
	</table>
	{/if}
		{/if}
	

    {elseif $opc eq 3}
<h4 class="fa fa-shopping-cart fa-2x">Consulta</h4><br />
{if !isset($opcv)}
<form action="principal.php?opcion=comprar&opc=Consultar" method="post">
        Ingrese el id de la Compra<br/><br/><input type="text" name="consultar" class="inp-buscar1" placeholder="Consultar..." />
    <input type="submit" value="Consultar" id="buttons1" />
</form>
{/if}
{if $vec eq "n1"}
	No hay Compras registradas
{else}
{if $opcv eq 1}
		Id {$vecci[0]}
		<br /><br />
		Fecha de la Compra {$vecci[3]}
<br />
<br/>
<table border="1">
	<tr>
		<td>Producto</td><td>Familia</td><td>Cantidad</td><td>Precio U</td><td>Monto</td><td>Estado</td>
	</tr>
    Proveedor {$vecci[4]}<br /><br />
	Cantidad de productos: {$c}<br /><br />
	{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 3}
			<td>{$vec[$i][$j]}</td>
		{/for}
			<td>{$vec[$i][2] * $vec[$i][3]}</td>
			<td>{$vec[$i][4]}</td>
		</tr>
	{/for}	
</table>
<br />
<table>
	<tr>
		<td>Total Valor Compra</td><td>{$vecci[2]}</td>
	</tr><tr>
	</tr>
</table>
{else}
	<br/><table border="1">
		<tr>
			<td>Id</td><td>Total Compra</td><td>Fecha</td><td>Proveedor</td>
		</tr>
	{for $i=0 to ($c-1)}
		<tr>
		{for $j=0 to 4}
			
			{if $j eq 1}
				{if $vec[$i][1] eq 999999999}
					<!--<td>anonimo</td>-->
				{else}
					<!--<td>{$vec[$i][1]}</td>-->
				{/if}
			{else}
				<td>{$vec[$i][$j]}</td>	
			{/if}
		{/for}
			
		</tr>
	{/for}	
	</table>
	{/if}
		{/if}
	
{/if}
{else}
<a href="principal.php?opcion=comprar	&opc=Ingresar" class="link1"><h1 class="fa fa-shopping-cart fa-2x">Compra</h1><br />
	<p class="fa fa-shopping-cart fa-5x"></p></a>
<!--<i class="fa fa-cog fa-spin fa-2x"></i> <li class="fa fa-2x">Pagina en Construcción </li><li class="fa fa-gears fa-2x"></li>-->
{/if}