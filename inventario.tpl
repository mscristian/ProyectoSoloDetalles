{if !empty($opc)}
<h1 class="fa fa-shopping-bag fa-2x">  Inventario</h1>
<!--<ul>
	<a href="principal.php?opcion=inventario&opc=consultar&con=1"><li>Por nombre de Producto</li></a>
	<a href="principal.php?opcion=inventario&opc=consultar&con=2"><li>Por nombre de Categoria</li></a>
	<a href="principal.php?opcion=inventario&opc=consultar&con=3"><li>Consultar todos Los Productos</li></a>
</ul>-->
	{if $opc eq 1}
		{if $con eq 1}
<br>
Ingrese el nombre exacto del producto
<br><br>
			<form action="principal.php?opcion=inventario&opc=consultar&con=1" method="post">
			<input type="text" name="buscar" class="inp-buscar1"  placeholder="Ejemplo Osos Grandes..."/>
			<input type="submit" value="Consultar" id="buttons1"/>
			</form>
			{if $dato1 eq "n1"}
                <br />	
                No se encontraron productos
            {else}
                <br />	

                <table>			
                    <tr bgcolor="#000000" style="color:#ffffff">
                        <td style="text-align: center">Nombre</td>
                        <td style="text-align: center">Familia</td>
                        <td style="text-align: center">Precio</td>
                        <td style="text-align: center">Estado</td>
                        <td style="text-align: center">Cantidad</td>
                        <td style="text-align: center">Descripciòn</td>
                        <td style="text-align: center">Existencia total</td>
                    </tr>		
                    <tr>	
                        <td style="text-align: center">{$dato1[0]}</td>
                        <td style="text-align: center">{$dato1[4]}</td>
                        <td style="text-align: center">{$dato1[1]}</td>
						{if $dato1[2] eq 0}
                        <td style="text-align: center">Activo</td>
						{else}
						<td style="text-align: center">Desactivo</td>
						{/if}
                        <td style="text-align: center">{$dato1[3]}</td>
                        <td style="text-align: center">{$dato1[5]}</td>
                        <td style="text-align: center">{$dato1[6]}</td>
                    </tr>                    
</table>
                    <form method="post"  target="_blank" action="includes/contenido/Reporte.php">           
<input type="hidden" name="nombre" value="{$dato1[0]}">
    <input type="hidden" name="familia" value="{$dato1[4]}">
    <input type="hidden" name="precio" value="{$dato1[1]}">
    <input type="hidden" name="estado" value="{$dato1[2]}">
    <input type="hidden" name="cantidad" value="{$dato1[3]}">
    <input type="hidden" name="descripcion" value="{$dato1[5]}">
    <input type="hidden" name="total" value="{$dato1[6]}">
           <br/> <input type=submit value="Generar Reporte" id="buttons1">
            </form> 
            {/if}
        {elseif $con eq 2}
<br>Ingrese el nombre de la categoría
<br><br>
            <form action="principal.php?opcion=inventario&opc=consultar&con=2" method="post">
            <input type="text" name="buscar2" class="inp-buscar4" placeholder="Ejemplo Perros..."/>
            <input type="submit" value="Consultar" id="buttons1"/>
            </form>
            {if $dato2 eq "No se han encontrado datos"}
                <br />	
                {$dato2}	
            {else}	
				<center>
					<br>Datos Encontrados:
                    <br /><br>
				<table>	
					<tr bgcolor="#000000" style="color:#ffffff">
                        <td style="text-align: center">Categoría o Familia</td>
                        <td style="text-align: center">Descripción</td>
                        <td style="text-align: center">Existencia total</td>
                        <td style="text-align: center">Nombre producto</td>
                        <td style="text-align: center">Cantidad Interna</td><td style="text-align: center">Precio</td>
                        <td style="text-align: center">Estado</td>
					</tr>
				{for $i=0 to ($vec-1)}
					{if $i % 2 eq 0 }
            		<tr>
            		{else}
            		<tr style="background:  rgb(178, 178, 178)">
					{/if}
						{for $j=0 to 6}
						{if $j eq 6}
							{if $dato1[$i][6] eq 0}
							<td style="text-align: center">Activo</td>
							{else}
							<td style="text-align: center">Desactivo</td>
							{/if}
						{else}
							<td style="text-align: center">{$dato2[$i][$j]}</td>
						{/if}
						{/for}
					</tr>
				{/for}
				</table>
				</center>
            {/if}
		{elseif $con eq 3}
<br>los datos que hay son:<br><br>
            <table >	
                <tr tr bgcolor="#000000" style="color:#ffffff">
                    <td style="text-align: center">Categoría o Familia</td>
                    <td style="text-align: center">Descripción</td>
                    <td style="text-align: center">Cantidad Total</td> 
                    <td style="text-align: center">Nombre</td>
                    <td style="text-align: center">Estado</td>
                    <td style="text-align: center">Precio</td>
                    <td style="text-align: center">Cantidad</td>
                </tr>
            {for $i=0 to ($vec-1)}					
            {if $i % 2 eq 0 }
            <tr>
            {else}
            <tr style="background:  rgb(178, 178, 178)">
            {/if}	
                {for $j=0 to 6}
                    {if $j eq 4}
                        {if $dato3[$i][4] eq 0}
                            <td style="text-align: center">Activo</td>
                        {else}
                            <td style="text-align: center">Desactivo</td>
                        {/if}
                    {else}
                        <td style="text-align: center">{$dato3[$i][$j]}</td>	
                    {/if}
                {/for}	
            </tr>	
            {/for}
            </table>
            {/if}
        {/if}
{else}
<a href="principal.php?opcion=inventario&opc=consultar&con=3" class="link1"><h1 class="fa fa-shopping-bag fa-2x">Inventario</h1><br />
<p class="fa fa-suitcase fa-5x"></p></a>
{/if}