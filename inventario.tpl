{if !empty($opc)}
<h1 class="fa fa-suitcase fa-2x"> Inventario</h1>
<ul>
	<a href="principal.php?opcion=inventario&opc=consultar&con=1"><li>Consultar por Id unica de productos</li></a>
	<a href="principal.php?opcion=inventario&opc=consultar&con=2"><li>Consultar por categoria</li></a>
	<a href="principal.php?opcion=inventario&opc=consultar&con=3"><li>Consultar todos</li></a>
</ul>
<br />
	{if $opc eq 1}
		{if $con eq 1}
<h4>Ingrese el codigo del producto</h4>
			<form action="principal.php?opcion=inventario&opc=consultar&con=1" method="post">
			<input type="text" name="buscar" class="inp-buscar1" placeholder="Buscar..."/>
			<input type="submit" value="Consultar" id="buttons1"/>
			</form>
			{if $dato1 eq "n1"}
                <br />	
                No se encontraron productos
            {else}
                <br />			
                <table border="1">			
                    <tr>
                        <td>Codigo Interno</td>
                        <td>Nombre</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Estado</td>
                        <td>Codigo Categoria </td>
                        <td>Familia</td>
                        <td>Descripciòn</td>
                        <td>Existencia total</td>
                    </tr>		
                    <tr>	
                        <td>{$dato1[0]}</td>
                        <td>{$dato1[4]}</td>
                        <td>{$dato1[1]}</td>
                        <td>{$dato1[2]}</td>
                        <td>{$dato1[3]}</td>
                        <td>{$dato1[5]}</td>
                        <td>{$dato1[6]}</td>
                        <td>{$dato1[7]}</td>
                        <td>{$dato1[8]}</td>
                    </tr>
                </table>
            {/if}
        {elseif $con eq 2}
<h4>Ingrese el codigo de la categoria</h4>
            <form action="principal.php?opcion=inventario&opc=consultar&con=2" method="post">
            <input type="text" name="buscar2" class="inp-buscar1" placeholder="Buscar..."/>
            <input type="submit" value="Consultar" id="buttons1"/>
            </form>
            {if $dato2 eq "No se han encontrado datos"}
                <br />	
                {$dato2}	
            {else}		
				<center>
				<table border="1">	
					<tr>
						<td>Codigo Familias</td>
                        <td>Categoria o Familia</td>
                        <td>Descripción</td>
                        <td>Existencia total</td>
                        <td>Codigo Producto</td>
                        <td>Nombre</td>
                        <td>Cantidad Interna</td><td>Precio</td>
                        <td>Estado</td>
					</tr>
				{for $i=0 to ($vec-1)}
					<tr>
						{for $j=0 to 8}
						<td>{$dato2[$i][$j]}</td>
						{/for}
					</tr>
				{/for}
				</table>
				</center>
            {/if}
		{elseif $con eq 3}
<h4>los datos que hay son</h4>
		<table border="1">	
			<tr>
                <td>Codigo Categoria</td>
                <td>Familia</td>
                <td>Descripción</td>
                <td>Cantidad Total</td>
                <td>Codigo Producto</td>
                <td>Nombre</td>
                <td>Estado</td>
                <td>Precio</td>
                <td>Cantidad</td>
			</tr>
		{for $i=0 to ($vec-1)}					
		<tr>	
			{for $j=0 to 8}
			<td>{$dato3[$i][$j]}</td>	
			{/for}	
		</tr>	
		{/for}
		</table>
		{/if}
	{/if}
{else}
<h1 class="fa fa-shopping-bag fa-2x">Inventario</h1><br />
<p class="fa fa-suitcase fa-5x"></p>
{/if}