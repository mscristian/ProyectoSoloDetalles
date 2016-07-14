<html>
    <head>
        <title>PRINCIPAL</title>
        
        <meta charset="utf-8" />
        <meta name="description" content="Pägína principal" />
        <meta name="keywords" content="Inicio,principal">
        
        <link rel="stylesheet" href="estilos/css/estilo.css" />
        <link rel="stylesheet" href="estilos/css/font-awesome.min.css" />
        
        
    </head>
    <body>		
		<div id="pagina">
            <header>
                <div id="logo"></div>
            </header>
                <nav>
                    <ul>
                        <a href="principal.php"><li><i class="fa fa-home"></i>Inicio</li></a>
                        <a href="principal.php?opcion=inventario"><li><i class="fa fa-shopping-bag"></i>Inventario</li></a>
                        <a href="principal.php?opcion=2"><li><i class="fa fa-archive"></i>Productos</li></a>
                        <a href="principal.php?opcion=3"><li><i class="fa fa-truck"></i>Proveedores</li></a>
                        <a href="principal.php?opcion=4"><li><i class="fa fa-shopping-basket"></i>Vender</li></a>
                    </ul>
                    <div id="buscar">
                        <input class="inp-buscar" type="text" value="" name="" placeholder="Buscar...">
                        <div class="btn-buscar"><i class="fa fa-search fa-lg"></i></div>
                    </div>
                </nav>
			{if isset($submenu)}
            <aside>
				{if $submenu eq 1}
				<ul>	
					<a href="principal.php?opcion=inventario&opc=consultar"><li>Consultar</li></a>
				</ul>
				{elseif $submenu eq 2}
				<ul>	
					<li>{$opc1}</li>
					<li>{$opc2}</li>
					<li>{$opc3}</li>
					<li>{$opc4}</li>
				</ul>
				{elseif $submenu eq 3}
				<ul>	
					<li>{$opc1}</li>
					<li>{$opc2}</li>
				</ul>
				{elseif $submenu eq 4}
				<ul>	
					<li>{$opc1}</li>
					<li>{$opc2}</li>
				</ul>
				{/if}
			</aside>
			{/if}
			<section class="separador"></section>
			<section class="contenido">	
				<center>
				{if isset($submenu)}
					{if $submenu eq 1}
						{include file='inventario.tpl'}
					{/if}
				{else}
				por defecto
				{/if}
				</center>
			</section>
            <footer>
                <center>Aqui va el footer</center>
            </footer>
        </div>
    </body>
</html>