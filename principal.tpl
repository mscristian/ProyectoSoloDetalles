<html>
    <head>
        <title>PRINCIPAL</title>
        
        <meta charset="utf-8" />
        <meta name="description" content="Pägína principal" />
        <meta name="keywords" content="Inicio,principal">
        
        <link rel="stylesheet" href="estilos/css/estilo.css" />
        <link rel="stylesheet" href="estilos/css/font-awesome.min.css" />
		
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="estilos/js/jquery.slides.min.js"></script>
		<script src="estilos/js/jquery.config.js"></script>
        
        
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
                        <a href="principal.php?opcion=producto"><li><i class="fa fa-archive"></i>Productos</li></a>
						<a href="principal.php?opcion=categoria"><li><i class="fa fa-archive"></i>Categoria</li></a>
                        <a href="principal.php?opcion=proveedor"><li><i class="fa fa-truck"></i>Proveedores</li></a>
                        <a href="principal.php?opcion=vender"><li><i class="fa fa-shopping-basket"></i>Vender</li></a>
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
					<a href="principal.php?opcion=categoria&opc=Ingresar"><li>Ingresar Categoria</li></a>
					<a href="principal.php?opcion=categoria&opc=Modificar"><li>Modificar Categoria</li></a>
					<a href="principal.php?opcion=categoria&opc=Consultar"><li>Consultar Categoria</li></a>
					<a href="principal.php?opcion=categoria&opc=Desactivar"><li>Desactivar</li></a>
				</ul>
				
				{elseif $submenu eq 3}
				<ul>	
					<a href="principal.php?opcion=producto&opc=Ingresar"><li>Ingresar Producto</li></a>
					<a href="principal.php?opcion=producto&opc=Modificar"><li>Modificar Producto</li></a>
					<a href="principal.php?opcion=producto&opc=Consultar"><li>Consultar Producto</li></a>
					<a href="principal.php?opcion=producto&opc=Desactivar"><li>Desactivar</li></a>
				</ul>
				{elseif $submenu eq 4}
				<ul>	
					<a href="principal.php?opcion=proveedor&opc=Consultar"><li>Consultar</li></a>
					<a href="principal.php?opcion=proveedor&opc=Calificar"><li>Calificar</li></a>
				</ul>
				{elseif $submenu eq 5}
				<ul>	
					<a href="principal.php?opcion=vender&opc=Ingresar"><li>Ingresar Venta</li></a>
					<a href="principal.php?opcion=vender&opc=Devolucion"><li>Devolución</li></a>
				</ul>
				{/if}
			</aside>
			{/if}
			<section class="separador"></section>
			<section>	
				<center>
				{if isset($submenu)}
					{if $submenu eq 1}
						{include file='inventario.tpl'}
					{elseif $submenu eq 2}
						{include file='categoria.tpl'}
					{elseif $submenu eq 3}
						{include file='producto1.tpl'}
					{elseif $submenu eq 4}
						{include file='proveedor.tpl'}
					{elseif $submenu eq 5}
						{include file='vender.tpl'}
					{/if}
				{else}
					<div class="container">
						<div class="slides">
						  <img src="estilos/images/1.png">
						  <img src="estilos/images/2.png">
						  <img src="estilos/images/3.png">
						</div>
					 </div>
				{/if}
				</center>
			</section>
            <footer><center>Acerca de Crow Unity - Desarrolladores -Derechos De Autor - Terminos Y Condiciones<br /> 
				Privacidad - Politica Y Seguridad - © Crow Unity 2016</center><div id="logofo"></div></footer>
        </div>
    </body>
</html>