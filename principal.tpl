<!DOCTYPE html>
<html>
    <head>
        <title>PRINCIPAL</title>
        
        <meta charset="utf-8" />
        <meta name="description" content="Pägína principal" />
        <meta name="keywords" content="Inicio,principal">
        
        <link rel="stylesheet" href="estilos/css/estilo.css" />
        <link rel="stylesheet" href="estilos/css/font-awesome.min.css" />
        <link rel="stylesheet" href="estilos/css/jquery-ui.min.css" />
        <link href="principal.tpl" rel="shortcut icon" type="../images/logo.png" />
		
		<script src="estilos/js/jquery-1.12.3.min.js"></script>
		<script src="estilos/js/jquery.slides.min.js"></script>
		<script src="estilos/js/jquery.config.js"></script>
        <script src="estilos/js/jquery-ui.min.js"></script>
        <script>
            $('document').ready(function(){
                $('.inp-buscar1').autocomplete({
                   source : 'includes/contenido/ajax.php'
                });
            });
        </script>
		<script type="text/javascript">
            function mostrar(id) {
                if (id == "ventas") {
                    $("#ventas").show();
                    $("#compras").hide();
                    $("#productos").hide();
                    $("#clientes").hide();
                    $("#proveedores").hide();
                }

                if (id == "compras") {
                    $("#ventas").hide();
                    $("#compras").show();
                    $("#productos").hide();
                    $("#clientes").hide();
                    $("#proveedores").hide();
                }

                if (id == "productos") {
                    $("#ventas").hide();
                    $("#compras").hide();
                    $("#productos").show();
                    $("#clientes").hide();
                    $("#proveedores").hide();
                }

                if (id == "clientes") {
                    $("#ventas").hide();
                    $("#compras").hide();
                    $("#productos").hide();
                    $("#clientes").show();
                    $("#proveedores").hide();
                }

                if (id == "proveedores") {
                    $("#ventas").hide();
                    $("#compras").hide();
                    $("#productos").hide();
                    $("#clientes").hide();
                    $("#proveedores").show();
                }
            }
        </script>
		
    </head>
    <body>		
		<div id="pagina">
            <form method="post" action="principal.php">
                <input type="submit" name="cerrar" value="Cerrar Sesiòn" class="inp-buscar3"/>
            </form>
            
            <header>
                <div id="logo"></div>
            </header>
                <nav>
                    <ul>
                        <a href="principal.php"><li><i class="fa fa-home"></i> Inicio</li></a>
                        <a href="principal.php?opcion=inventario"><li><i class="fa fa-shopping-bag"></i> Inventario</li></a>
                        <a href="principal.php?opcion=producto"><li><i class="fa fa-archive"></i> Productos</li></a>
						<a href="principal.php?opcion=categoria"><li><i class="fa fa-archive"></i> Categoría</li></a>
                        <a href="principal.php?opcion=proveedor"><li><i class="fa fa-truck"></i> Proveedores</li></a>
                        <a href="principal.php?opcion=vender"><li><i class="fa fa-shopping-basket"></i> Ventas</li></a>
						<a href="principal.php?opcion=clientes"><li><i class="fa fa-child"></i> Clientes</li></a>
						<a href="principal.php?opcion=reportes"><li><i class="fa fa-bar-chart"></i> Reportes</li></a>
                        <a href="principal.php?opcion=comprar"><li><i class="fa fa-shopping-cart"></i> Compras</li></a>
                    </ul>
                    <!--<div id="buscar">
                        <input class="inp-buscar" type="text" value="" name="" placeholder="Buscar...">
                        <div class="btn-buscar"><i class="fa fa-search fa-lg"></i></div>
                    </div>-->
                </nav>
			{if isset($submenu)}
            <aside>
				{if $submenu eq 1}
				<ul>	
				    <a href="principal.php?opcion=inventario&opc=consultar&con=1"><li>Producto</li></a>
	               <a href="principal.php?opcion=inventario&opc=consultar&con=2"><li>Categoría</li></a>
	               <a href="principal.php?opcion=inventario&opc=consultar&con=3"><li>Consultar todo</li></a>
				</ul>
				{elseif $submenu eq 2}
				<ul>	
					<a href="principal.php?opcion=categoria&opc=Ingresar"><li>Crear Categoria</li></a>
					<a href="principal.php?opcion=categoria&opc=Modificar"><li>Modificar Categoria</li></a>
					<a href="principal.php?opcion=categoria&opc=Consultar"><li>Consultar Categoria</li></a>
					
				</ul>
				
				{elseif $submenu eq 3}
				<ul>	
					<a href="principal.php?opcion=producto&opc=Ingresar"><li>Crear Producto</li></a>
					<a href="principal.php?opcion=producto&opc=Modificar"><li>Modificar Producto</li></a>
					<a href="principal.php?opcion=producto&opc=Consultar"><li>Consultar Producto</li></a>
				</ul>
				{elseif $submenu eq 4}
				<ul>	
					<a href="principal.php?opcion=proveedor&opc=Ingresar"><li>Ingresar</li></a>
					<a href="principal.php?opcion=proveedor&opc=Modificar"><li>Modificar</li></a>
					<a href="principal.php?opcion=proveedor&opc=Consultar"><li>Consultar</li></a>
					<a href="principal.php?opcion=proveedor&opc=Calificar"><li>Calificar</li></a>
				</ul>
				{elseif $submenu eq 5}
				<ul>	
					<a href="principal.php?opcion=vender&opc=Ingresar"><li>Ingresar Venta</li></a>
					<a href="principal.php?opcion=vender&opc=Devolucion"><li>Cambiar estados</li></a>
					<a href="principal.php?opcion=vender&opc=Consultar"><li>Consultar</li></a>
				</ul>
				{elseif $submenu eq 6}
				<ul>	
					<a href="principal.php?opcion=clientes&opc=Ingresar"><li>Ingresar Cliente</li></a>
					<a href="principal.php?opcion=clientes&opc=Modificar"><li>Modificar Cliente</li></a>
					<a href="principal.php?opcion=clientes&opc=Consultar"><li>Consultar Cliente</li></a>
				</ul>
				{elseif $submenu eq 7}
				<ul>	
					<a href="principal.php?opcion=reportes&opc=consulta_unica"><li>Consulta unica</li></a>
					<!--<a href="principal.php?opcion=reportes&opc=consulta_mezclada"><li>Consulta mezclada</li></a>-->
				</ul>
				{elseif $submenu eq 8}
				<ul>	
					<a href="principal.php?opcion=comprar&opc=Ingresar"><li>Ingresar Compra</li></a>
					<a href="principal.php?opcion=comprar&opc=Devolucion"><li>Devolucion</li></a>
					<a href="principal.php?opcion=comprar&opc=Consultar"><li>Consultar</li></a>
				</ul>
				{/if}
			</aside>
			{/if}
			
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
					{elseif $submenu eq 6}
						{include file='cliente.tpl'}
					{elseif $submenu eq 7}
						{include file='reportes.tpl'}
					{elseif $submenu eq 8}
						{include file='comprar.tpl'}
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
            <footer><center><div class="foo"><a href="https://drive.google.com/open?id=0B4tUzJUf610iQjNCWTFFQmhNYTg" target="_blank"> Acerca de Crow Unity - Desarrolladores - Derechos De Autor - Terminos Y Condiciones<br /> 
				Privacidad - Politica Y Seguridad © Crow Unity 2016</a></div></center><div id="logofo"></div></footer>
        </div>
    </body>
</html>