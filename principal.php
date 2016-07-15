<!DOCTYPE HTML>
<?php
require('includes/contenido/class.Conexion.php');
include('includes/libs/Smarty.class.php');
include('includes/contenido/class.Informe.php');
include('includes/contenido/class.Categoria.php');
include('includes/contenido/class.Producto.php');
include('includes/contenido/class.TemporalVenta.php');
include('includes/contenido/class.Venta.php');
include('includes/contenido/class.Detalle.php');
$template = new Smarty(0);
error_reporting(0);
session_start();

if(isset($_SESSION['user'])) {
	
	
	if(isset($_GET['opcion'])){
		if ($_GET['opcion']=="inventario"){
			
			$template->assign('submenu', 1);
			if(isset($_GET['opc'])){
				if ($_GET['opc']=="consultar"){
					
					
					$template->assign('opc', 1);
					$consulta = new Informe();

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
			$template->assign('submenu', 2);
			if(isset($_GET['opc'])){
				if ($_GET['opc']=="Ingresar"){
					$template->assign('opc', 1);
					if (isset($_POST['nombreF']) and isset($_POST['descripcion'])){ 
                        $consulta = new Informe();
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
						
						$consulta = new Informe();
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
						
						$consulta = new Informe();
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
                    
                    $familia = new Informe();
                    $x=$familia->ConsultarFamilias();
                    $vec = count($x);
                    $template->assign('vec',$vec);
                    $template->assign('fam',$x);
                    
					if (isset($_POST['insert'])){ 
                        
                        $consulta = new Informe();
						$con=$consulta->ConsultarIdProducto($_POST['nombre']);
                        if($con=="n1"){
                            
                            $categoria=new Categoria($_POST['familia'],"");
                            $prod=new Producto($_POST['cantidadP'],$_POST['precio'],'activo',$_POST['nombre']);
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
						
						$consulta = new Informe();
						$x=$consulta->ConsultarIdProducto($_POST['nombre']);
						$template->assign('mod', $x);
                        
                        $familia = new Informe();
                        $z=$familia->ConsultarFamilias();
                        $vec = count($z);
                        $template->assign('vec',$vec);
                        $template->assign('fam',$z);
                        
						if(isset($_POST['modifique'])){;
							$prod = new Producto($_POST['cantidad'],$_POST['precio'],$_POST['estado'],$_POST['nombre']);
                            echo $_POST['familia_cod']+1;
                            $prod->familia[0] = $_POST['familia'];
                            $prod->familia[1] = $_POST['nombreO'];
                            
							$prod->Modificar();
							header('Location: principal.php?opcion=producto&opc=Modificar&sus=1');						
						}
					}
											
					if ($_GET['sus']==1){
							$template->assign('modsucces', 1);
					}
				} else if ($_GET['opc']=="Consultar"){
					$template->assign('opc', 3);
					
					
					$template->assign('opc', 3);
					$consulta = new Informe();

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
                $temporal1 = new TemporalV();
                $tablav = new Informe();
                
                
                if (isset($_POST['ingresar'])){
                    if (isset($_POST['buscar2'])){ 

                            $consulta = new Informe();
                            $con=$consulta->ConsultarIdProducto($_POST['buscar2']);
                            if($con=="n1"){
                                $template->assign('control','op0');
                            }else{
                                $temporal = new TemporalV($con[5],$con[6],0,$con[0],$con[1],$con[3]);
                                $temporal->Ingresar();
                                $template->assign('control','op1');     
                            }
                        }
                } else if (isset($_POST['vender'])){
					setlocale(LC_ALL, 'es_VE');	date_default_timezone_set('America/Bogota');
					
					$fecha_hora_actual = date('Y-m-d H:i:s');
					
					$vender = new Venta($_POST['total'],$_POST['total'],$fecha_hora_actual);
					
					$vender->Ingresar();
                    $conid= new Informe();
                    $id=$conid->ConsultarTemporalVid();
                    $vect=$tablav->ConsultarTemporalVt();
                    $c = count($vect);
                    for ($i = 0; $i <= $c-1; $i++){
                        $detalle = new Detalle($vect[$i][0],$vect[$i][1],$id);
                        $detalle->Ingresar();
                        $detalle->Descontar();
                    }
                    $template->assign('control','op2');  
					$template->assign('idv',$id);  
                    $temporal1->Limpiar();
                } else if (isset($_POST['cancelar'])){
                    $temporal1->Limpiar();
                }
                $vect=$tablav->ConsultarTemporalV();
                $c = count($vect);
                $template->assign('cont', $c);
                $template->assign('vect',$vect);
                 
			} else if ($_GET['opc']=="Devolucion"){
				$template->assign('opc', 2);
			} else if ($_GET['opc']=="Consultar"){
				$template->assign('opc', 3);
				$venta = new Informe();
				$conv=$venta->ConsultarVenta();
				$c = count($conv);
				$template->assign('c',$c);
				$template->assign('vec',$conv);
				if(isset($_POST['consultar'])){
					$template->assign('opcv', 1);
					$consultav = new Informe();
					$convi=$consultav->ConsultarVentaId($_POST['consultar']);
					$template->assign('vecci', $convi);
					$consultapv = new Informe();
					$conpv=$consultapv->ConsultarProductosVen($_POST['consultar']);
					$c = count($conpv);
					$template->assign('c',$c);
					$template->assign('vec',$conpv);
				}
			}
			
		} 
	}
	$template->display('principal.tpl'); 	
	
} else if (!isset($_SESSION['user'])) {
    session_start();
    session_destroy();
    header ('location: index.php?error=acceso');
}

if (isset($_POST['cerrar'])){
    session_start();
    session_destroy();
    header ('location: index.php');
}
?>