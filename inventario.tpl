{if !empty($opc)}
<ul>
	<a href="principal.php?opcion=inventario&opc=consultar&con=1"><li>Consultar por Id unica de productos</li></a>
	<a href="principal.php?opcion=inventario&opc=consultar&con=2"><li>Consultar por categoria</li></a>
	<li>Consultar todos</li>
</ul>
<br />
	{if $opc eq 1}
		{if $con eq 1}
			<form action="principal.php?opcion=inventario&opc=consultar&con=1" method="post">
			<input type="text" name="buscar" class="inp-buscar1" placeholder="Buscar..."/>
			<input type="submit" value="Consultar" id="buttons1"/>
			</form>
			{if $dato1 eq "No se han encontrado datos"}
                <br />	
                {$dato1}	
            {else}
                <br />			
                <table border="1">			
                    <tr>
                        <td>Codigo Interno</td>
                        <td>Categoria</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Estado</td>
                        <td>Nombre</td>		
                    </tr>		
                    <tr>	
                        <td>{$dato1[0]}</td>
                        <td>{$dato1[1]}</td>
                        <td>{$dato1[2]}</td>
                        <td>{$dato1[3]}</td>
                        <td>{$dato1[4]}</td>
                        <td>{$dato1[5]}</td>
                    </tr>
                </table>
            {/if}
        {elseif $con eq 2}
            <form action="principal.php?opcion=inventario&opc=consultar&con=2" method="post">
            <input type="text" name="buscar2" class="inp-buscar1" placeholder="Buscar..."/>
            <input type="submit" value="Consultar" id="buttons1"/>
            </form>
            {if $dato2 eq "No se han encontrado datos"}
                <br />	
                {$dato2}	
            {else}
{$dato2[0]}
{$dato2[1]}
{$dato2[2]}
{$dato2[3]}
{$dato2[4]}
{$dato2[5]}
{$dato2[6]}
{$dato2[7]}
{$dato2[8]}
{$dato2[9]}


            {/if}
		{/if}
	{/if}
{else}
hola mundo
{/if}