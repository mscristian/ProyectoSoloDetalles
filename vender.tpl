{if !empty($opc)}
	{if $opc eq 1}
<br><li class="fa fa-shopping-basket fa-2x">Ingresar Venta</li><br /><br />
Ingrese el nombre del Producto<br /><br />
<form action="principal.php?opcion=vender&opc=Ingresar" method="post">
    <input type="text" name="buscar2" class="inp-buscar1" placeholder="Agregar..."/>
	<input type="number" name="cant" class="inp-buscar5" value="1"/>
    <input type="submit" name="ingresar" value="Agregar" id="buttons1"/>
        <input type="submit" name="vender" value="Vender" id="buttons1"/>
        <input type="submit" onclick="pregunta()" name="cancelar" value="Cancelar" id="buttons1"/><br/><br/>
	Documento del cliente    	<input type="number" name="documento" class="inp-buscar1" placeholder="documento"/>
	<a href="principal.php?opcion=clientes&opc=Ingresar" class="link1"><h1 class="fa fa-child">Ingresar Nuevo Cliente</h1><br /></a>
<br />
	{if $control eq 'op0'}
    no se econtro el producto
	{elseif $control eq 'op1'}
    se encontro el producto
	{elseif $control eq 'op2'}
    Se creo la venta con Numero {$idv}
    {/if}
	<br><br>
	{$x=0}
    
        {if $vect[0][0] eq "N"}
        {else}
	   <table>	
			<tr bgcolor="#000000" style="color:#ffffff">
				<td style="text-align: center">N</td>
                <td style="text-align: center">Producto</td>
                <td style="text-align: center">Categoria</td>
                <td style="text-align: center">Precio</td> 
				<td style="text-align: center">Cantidad</td> 
			</tr>
		{for $i=0 to ($cont-1)}					
			{if $i % 2 eq 0 }
            <tr>
            {else}
            <tr style="background:  rgb(178, 178, 178)">
            {/if}	
				<td style="text-align: center">{$i+1}</td>
				{for $j=0 to 3}
				<td style="text-align: center">{$vect[$i][$j]}</td>
				{/for}	
				{for $total=1 to $vect[$i][3]}
				{$x=$x+$vect[$i][2]}
				{/for}
		</tr>	
		{/for}
		<tr>
		<td></td><td></td><td style="text-align: center">Total</td><td style="text-align: center">{$x}</td>
		</tr>
		<tr>
		<td></td><td></td><td style="text-align: center">Total Real</td><td style="text-align: left"><input type="number" name="totalR" class="inp-buscar6" value="{$x}" /></td>
		</tr>
		</table>
      <input type="hidden" name="total" value="{$x}"/>
    {/if}
    
</form>
	{elseif $opc eq 2}
<br><li class="fa fa-shopping-basket fa-2x"> Cambio de Estado</li><br /><br>
{if !isset($opcv)}
<form action="principal.php?opcion=vender&opc=Devolucion" method="post">
        Ingrese el Nùmero de la venta<br/><br/><input type="text" name="consultar" class="inp-buscar1" placeholder="Consultar..." />
    <input type="submit" value="Consultar" id="buttons1" />
</form>
<br/>
{/if}
{if $vec eq "n1"}
No hay venta registradas
{else}
{if $opcv eq 1}
<div class="formato1">
Número de Venta: {$vecci[0]} 
</div> 
<br>
<div class="formato2">
Fecha de Venta {$vecci[4]}
</div>
<br>
<div class="formato3">
Cliente: {$vecci[1]} {$vecci[5]}
</div>
<br>
<div class="formato4">
Cantidad de productos: {$c}
</div>
<form method="post" action="principal.php?opcion=vender&opc=Devolucion">
    <table>
        <tr bgcolor="#000000" style="color:#ffffff">
            <td style="text-align: center">Producto</td>
            <td style="text-align: center">Categoria</td>
            <td style="text-align: center">Cantidad</td>
            <td style="text-align: center">Precio U</td>
            <td style="text-align: center">Monto</td>
            <td style="text-align: center">Estado</td>
        </tr>
        {for $i=0 to ($c-1)}
            {if $i % 2 eq 0 }
            <tr>
            {else}
            <tr style="background:  rgb(178, 178, 178)">
            {/if}
            {for $j=0 to 3}
                <td style="text-align: center">{$vec[$i][$j]}</td>
            {/for}
                <td style="text-align: center">{$vec[$i][2] * $vec[$i][3]}</td>
                <td><select name=Estado{$i} onchange="salta(this.form)" class="inp-buscar2">
                    {if $vec[$i][4] eq "Devuelto"}
                        <option selected>{$vec[$i][4]}
                        <option value=1>Vendido
                        <option value=3>Garantia
                    {else if $vec[$i][4] eq "Garantia"}
                        <option selected>{$vec[$i][4]}
                        <option value=1>Vendido
                        <option value=4>Devuelto
                    {else if $vec[$i][4] eq "Vendido"}
                        <option selected>{$vec[$i][4]}
                        <option value=3>Garantia
                        <option value=4>Devuelto
                    {/if}
                    </select>                        
                </td>
				<input type="hidden" name="Cantidad{$i}" value={$vec[$i][2]} />
				<input type="hidden" name="idVenta" value={$vecci[0]} />
				<input type="hidden" name=idProducto{$i} value={$vec[$i][5]} />
            </tr>
        {/for}	
        <tr>
            <td></td><td></td><td></td><td class="formato5">Total Original:</td><td class="formato5">{$vecci[2]}</td>
        </tr><tr>
            <td></td><td></td><td></td><td class="formato5" align="right">Total Real:</td><td class="formato5">{$vecci[3]}</td>	
        </tr>
    </table>
    <br>
    <input type="submit" value="Actualizar" id="buttons1" name="cambiarE">
</form>
<br />
{else}
	<br/><table>
		<tr bgcolor="#000000" style="color:#ffffff">
            <td style="text-align: center">Nº De venta</td>
			<td style="text-align: center">Nombre</td>
			<td style="text-align: center">Precio Original</td>
			<td style="text-align: center">Precio Real</td>
			<td style="text-align: center">Fecha</td>
		</tr>
	{for $i=0 to ($c-1)}
		{if $i % 2 eq 0 }
        <tr>
        {else}
        <tr style="background:  rgb(178, 178, 178)">
        {/if}
		{for $j=0 to 4}
			
			{if $j eq 1}
				{if $vec[$i][1] eq 999999999}
					<td style="text-align: center"><center>anonimo</center></td>
				{else}
					<td style="text-align: center"><center>{$vec[$i][1]}</center></td>
				{/if}
			{else}
				<td style="text-align: center"><center>{$vec[$i][$j]}</center></td>
			{/if}
		{/for}
			
		</tr>
	{/for}	
	</table>
	{/if}
		{/if}
    {elseif $opc eq 3}
<br><li class="fa fa-shopping-basket fa-2x">Consulta</li><br /><br>
{if !isset($opcv)}
<form action="principal.php?opcion=vender&opc=Consultar" method="post">
        Ingrese el Nùmero de la venta<br/><br/><input type="text" name="consultar" class="inp-buscar1" placeholder="Consultar..." />
    <input type="submit" value="Consultar" id="buttons1" />
</form>
<br/>
{/if}
{if $vec eq "n1"}
	No hay venta registradas
{else}
{if $opcv eq 1}
<div class="formato1">
Número de venta {$vecci[0]} 
</div><br>
<div class="formato2">
Fecha de Venta{$vecci[4]}
</div><br>
<div class="formato3">
Cliente: {$vecci[1]}
</div><br>
<div class="formato4">
Cantidad de productos: {$c}
</div>
<table>
	<tr bgcolor="#000000" style="color:#ffffff">
		<td style="text-align: center">Producto</td>
		<td style="text-align: center">Categoria</td>
		<td style="text-align: center">Cantidad</td>
		<td style="text-align: center">Precio Unidad</td>
		<td style="text-align: center">Monto</td>
		<td style="text-align: center">Estado</td>
	</tr>
	{for $i=0 to ($c-1)}
		{if $i % 2 eq 0 }
        <tr>
        {else}
        <tr style="background:  rgb(178, 178, 178)">
        {/if}
		{for $j=0 to 3}
			<td style="text-align: center">{$vec[$i][$j]}</td>
		{/for}
			<td style="text-align: center">{$vec[$i][2] * $vec[$i][3]}</td><td style="text-align: center">{$vec[$i][4]}</td>
		</tr>
	{/for}	
	<tr>
		<td></td><td></td><td class="formato5">Total Original</td><td class="formato5">{$vecci[2]}</td>
	</tr><tr>
		<td></td><td></td><td class="formato5">Total Real</td><td class="formato5">{$vecci[3]}</td>	
	</tr>
</table>	
<a href="reportes/reporte.php">Imprimir</a>
{else}
	<br/><table>
		<tr bgcolor="#000000" style="color:#ffffff">
			<td style="text-align: center">Nº de Venta</td>
			<td style="text-align: center">Nombre</td>
			<td style="text-align: center">Precio Original</td>
			<td style="text-align: center">Precio Real</td>
			<td style="text-align: center">Fecha</td>
		</tr>
	{for $i=0 to ($c-1)}
		{if $i % 2 eq 0 }
        <tr>
        {else}
        <tr style="background:  rgb(178, 178, 178)">
        {/if}
		{for $j=0 to 4}
			
			{if $j eq 1}
				{if $vec[$i][1] eq 999999999}
					<td style="text-align: center">anonimo</td>
				{else}
					<td style="text-align: center">{$vec[$i][1]}</td>
				{/if}
			{else}
				<td style="text-align: center">{$vec[$i][$j]}</td>	
			{/if}
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


