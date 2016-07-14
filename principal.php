<!DOCTYPE HTML>
<?php
require('includes/contenido/class.Conexion.php');
include('includes/libs/Smarty.class.php');
$template = new Smarty(0);
error_reporting(0);
session_start();

if(isset($_SESSION['user'])) {
	
	
	if(isset($_GET['opcion'])){
		if ($_GET['opcion']=="inventario"){
			
			$template->assign('submenu', 1);
			if(isset($_GET['opc'])){
				if ($_GET['opc']=="consultar"){
					include('includes/contenido/class.Consulta.php');
					
					$template->assign('opc', 1);
					$consulta = new Consulta();

					if ($_GET['con']==1){
						$a=$consulta->ConsultarInvIdProducto($_POST['buscar']);
						$template->assign('con', 1);
						$template->assign('dato1', $a);
					} else if ($_GET['con']==2) {
						$b=$consulta->ConsultarCodCategoria($_POST['buscar2']);
						$vec = count($b);
						$template->assign('con', 2);
						$template->assign('vec', $vec);
						$template->assign('dato2', $b);
					} else if ($_GET['con']==3) {
						$c=$consulta->ConsultarTodo();
						$vec = count($c);
						$template->assign('con', 3);
						$template->assign('vec', $vec);
						$template->assign('dato3', $c);
					}
				}
			}
			
		} else if ($_GET['opcion']=="categoria"){
			include('includes/contenido/class.Categoria.php');
			$template->assign('submenu', 2);
			if(isset($_GET['opc'])){
				if ($_GET['opc']=="Ingresar"){
					$template->assign('opc', 1);
					if (isset($_POST['nombreF']) and isset($_POST['descripcion'])){ 
                        include('includes/contenido/class.Consulta.php');
                        $consulta = new Consulta();
						$con=$consulta->ConsultarCategoriaU($_POST['nombreF']);
						
                        if($con=="n1"){
                            $categoria = new Categoria($_POST['nombreF'],$_POST['descripcion']);
				            $categoria->Ingresar();
                            $template->assign('control','op0');
                            $con1=$consulta->ConsultarCategoriaU($_POST['nombreF']);
                            $template->assign('prod',$con1);
                        }else{
						  $template->assign('control','op1');                            
                        }						
					}
					/*if ($_GET['sus']==1){
						$template->assign('modsucces', 1);
					}*/
				} else if ($_GET['opc']=="Modificar") {
					$template->assign('opc', 2);
					if (isset($_POST['familia'])){
                        include('includes/contenido/class.Consulta.php');
						
						$consulta = new Consulta();
						$x=$consulta->ConsultarCategoriaU($_POST['familia']);
						$template->assign('mod', $x);
                        
						if(isset($_POST['modifique'])){
							$obj = new Categoria($_POST['familia'],$_POST['descripcion']);
							$obj->Modificar();
							header('Location: principal.php?opcion=categoria&opc=Modificar&sus=1');
						}
					}
					if ($_GET['sus']==1){
						$template->assign('modsucces', 1);
					}
					
				} else if ($_GET['opc']=="Consultar") {
					$template->assign('opc', 3);
					if (isset($_POST['familia'])){
						include('includes/contenido/class.Consulta.php');
						
						$consulta = new Consulta();
						$x=$consulta->ConsultarCategoriaU($_POST['familia']);
						
						$template->assign('vec', $x);
					}
				} else if ($_GET['opc']=="Desactivar") {
					$template->assign('opc', 4);
				}
			}
			
		} else if ($_GET['opcion']=="producto"){
			
			$template->assign('submenu', 3);
			if(isset($_GET['opc'])) {
				if ($_GET['opc']=="Ingresar"){
					$template->assign('opc', 1);
				
                   
                    include('includes/contenido/class.Categoria.php');
                    include('includes/contenido/class.Producto.php');
					if (isset($_POST['insert'])){ 
                        include('includes/contenido/class.Consulta.php');

                        $consulta = new Consulta();
						$con=$consulta->ConsultarIdProducto($_POST['nombre']);
                        if($con=="n1"){
                            $categoria=new Categoria($_POST['codigo'],"");
                            $prod=new Producto($_POST['cantidadP'],$_POST['precio'],$_POST['estado'],$_POST['nombre']);
                            $prod->familia[] = $categoria;
                            //$prod->Imprimir();
                            $prod->Ingresar();
                            $template->assign('control','op0');
                            $con1=$consulta->ConsultarIdProducto($_POST['nombre']);
                            $template->assign('prod',$con1);
                        }else{
                            $template->assign('control','op1');        
                        }
                       
					}
				} else if ($_GET['opc']=="Modificar"){
					$template->assign('opc', 2);
					
					if (isset($_POST['nombre'])){	
						include('includes/contenido/class.Consulta.php');
						
						$consulta = new Consulta();
						$x=$consulta->ConsultarIdProducto($_POST['nombre']);
						$template->assign('mod', $x);
						if(isset($_POST['modifique'])){
							include('includes/contenido/class.Categoria.php');
							include('includes/contenido/class.Producto.php');
                            $categoria=new Categoria($_POST['familia'],"");
							$prod = new Producto($_POST['cantidad'],$_POST['precio'],$_POST['estado'],$_POST['nombre']);
                            //echo $_POST['nombreO'];
                            $prod->familia[] = $categoria;
                            $prod->nombreO[] = $_POST['nombreO'];
							$prod->Modificar();
							header('Location: principal.php?opcion=producto&opc=Modificar&sus=1');							
						}
					}
											
					if ($_GET['sus']==1){
							$template->assign('modsucces', 1);
					}
				} else if ($_GET['opc']=="Consultar"){
					$template->assign('opc', 3);
					
					include('includes/contenido/class.Consulta.php');
					
					$template->assign('opc', 3);
					$consulta = new Consulta();

					$a=$consulta->ConsultarIdProducto($_POST['buscar']);
					$template->assign('con', 1);
					$template->assign('dato1', $a);
				
				} else if ($_GET['opc']=="Desactivar"){
					$template->assign('opc', 4);
				}
			}
			
		} else if ($_GET['opcion']=="proveedor"){
			$template->assign('submenu', 4);
			if ($_GET['opc']=="Consultar"){
				$template->assign('opc', 1);
			} else if ($_GET['opc']=="Calificar"){
				$template->assign('opc', 2);
			}
			
		} else if ($_GET['opcion']=="vender"){
			$template->assign('submenu', 5);
			if ($_GET['opc']=="Ingresar"){
				$template->assign('opc', 1);
			} else if ($_GET['opc']=="Devolucion"){
				$template->assign('opc', 2);
			}
			
		} 
	}
	$template->display('principal.tpl'); 	
	
} else if (!isset($_SESSION['user'])) {
    session_start();
    session_destroy();
    header ('location: index.php?error=acceso');
}
?>
