<!DOCTYPE HTML>
<?php
date_default_timezone_set('America/Bogota');	
require('includes/contenido/class.Conexion.php');
include('includes/libs/Smarty.class.php');
include('includes/contenido/class.Informe.php');
include('includes/contenido/class.Categoria.php');
include('includes/contenido/class.Producto.php');
include('includes/contenido/class.TemporalVenta.php');
include('includes/contenido/class.TemporalCompra.php');
include('includes/contenido/class.Venta.php');
include('includes/contenido/class.Detalle.php');
include('includes/contenido/class.Cliente.php');
include('includes/contenido/class.Proveedor.php');
include('includes/contenido/class.Compra.php');
include('includes/contenido/class.DetalleCom.php');
include('includes/contenido/class.ControlAcceso.php');
include('includes/contenido/class.Reportes.php');
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
			if ($_GET['opc']=="Ingresar"){
				$template->assign('opc', 1);
				
				if (isset($_POST['datos'])){ 
                        $consulta = new Informe();
						$con=$consulta->ConsultarProveedor($_POST['nombre']);
						
                        if($con=="n1"){
                            $categoria = new Proveedor($_POST['nombre'],$_POST['calificacion'],$_POST['email'],$_POST['tf'],$_POST['tc']);
				            $categoria->Ingresar();
                            $template->assign('control','op0');
                            $con1=$consulta->ConsultarProveedor($_POST['nombre']);
                            $template->assign('prod',$con1);
                        }else{
						  $template->assign('control','op1');                  
                        }						
					}
				
				
			} else if ($_GET['opc']=="Modificar"){
				$template->assign('opc', 2);
				
				if (isset($_POST['nombre'])){
						
						$consulta = new Informe();
						$x=$consulta->ConsultarProveedor($_POST['nombre']);
						$template->assign('mod', $x);
                        
						if(isset($_POST['modifique'])){
							$obj = new Proveedor($_POST['nombre'],$_POST['calificacion'],$_POST['email'],$_POST['tf'],$_POST['tc'],$_POST['id']);
							$obj->Modificar();
							header('Location: principal.php?opcion=proveedor&opc=Modificar&sus=1');
						}
					}
					if ($_GET['sus']==1){
						$template->assign('modsucces', 1);
					}
				
			} else if ($_GET['opc']=="Consultar"){
				$template->assign('opc', 3);
				if (isset($_POST['nombre'])){
						
						$consulta = new Informe();
						$x=$consulta->ConsultarProveedor($_POST['nombre']);
						
						$template->assign('vec', $x);
					}
			} else if ($_GET['opc']=="Calificar"){
				$template->assign('opc', 4);
                
                
                $calprov=new Informe();
                $vec=$calprov->ConsultarProveedorAll();
                $c=count($vec);
                $template->assign('c',$c);
                $template->assign('vec',$vec);
                
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
                                $temporal = new TemporalV($con[5],$con[6],0,$con[0],$con[1],$con[3],$_POST['cant']);
                                $temporal->Ingresar();
                                $template->assign('control','op1');     
                            }
                        }
                } else if (isset($_POST['vender'])){
					
					$fecha_hora_actual = date('Y-m-d H:i:s');
					
					$cliente = new Informe();
					if (empty($_POST['documento'])){
						$idc = 999999999;
					} else {
						$id=$cliente->ConsultarCliente($_POST['documento']);
						$idc = $id[0];
					}
					
					
					$vender = new Venta($idc,$_POST['total'],$_POST['totalR'],$fecha_hora_actual);
					
					$vender->Ingresar();
                    $conid= new Informe();
                    $id=$conid->ConsultarTemporalVid();
                    $vect=$tablav->ConsultarTemporalVt();
                    $c = count($vect);
                    for ($i = 0; $i <= $c-1; $i++){
                        $detalle = new Detalle($vect[$i][0],$vect[$i][1],$id,$idc,$vect[$i][2]);
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
				
				if(isset($_POST['cambiarE'])){
					$idVenta = 'idVenta';
					echo $_POST[$idVenta],'<br>';
						for($i=0;$i<=$c;$i++){
							$estado = 'Estado'.$i;
							$cantidad = 'Cantidad'.$i;
							$idProducto = 'idProducto'.$i;
							$actDet = new Detalle('',$_POST[$idProducto],$_POST[$idVenta],'',$_POST[$cantidad],$_POST[$estado]);
                            $actDet->ActualizarEstado();
						}
					}
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
			
		} else if ($_GET['opcion']=="clientes"){
			$template->assign('submenu', 6);
			if ($_GET['opc']=="Ingresar"){
				$template->assign('opc', 1);
				
				if (isset($_POST['datos'])){ 
                        $consulta = new Informe();
						$con=$consulta->ConsultarCliente($_POST['documento']);
						
                        if($con=="n1"){
                            $cliente = new Cliente($_POST['nombre'],$_POST['apellido'],$_POST['documento'],$_POST['email'],$_POST['telefono'],$_POST['direccion']);
							//$nombre,$apellido,$documento,$correo,$telefono,$direccion
				            $cliente->Ingresar();
                            $template->assign('control','op0');
                            $con1=$consulta->ConsultarCliente($_POST['documento']);
                            $template->assign('prod',$con1);
                        }else{
						  $template->assign('control','op1');                            
                        }						
					}
				
 			} else if ($_GET['opc']=="Modificar"){
				$template->assign('opc', 2);
				if (isset($_POST['documento'])){
						
						$consulta = new Informe();
						$x=$consulta->ConsultarCliente($_POST['documento']);
						$template->assign('mod', $x);
                        
						if(isset($_POST['modifique'])){
							$obj = new Cliente($_POST['nombre'],$_POST['apellido'],$_POST['documento'],$_POST['email'],$_POST['telefono'],$_POST['direccion'],$_POST['id']);
							$obj->Modificar();
							header('Location: principal.php?opcion=clientes&opc=Modificar&sus=1');
						}
					}
					if ($_GET['sus']==1){
						$template->assign('modsucces', 1);
					}
			} else if ($_GET['opc']=="Consultar"){
				$template->assign('opc', 3);
				if (isset($_POST['documento'])){
						
						$consulta = new Informe();
						$x=$consulta->ConsultarCliente($_POST['documento']);
						
						$template->assign('vec', $x);
					}
			}
			
		} else if ($_GET['opcion']=="reportes"){
            $template->assign('submenu', 7);
			$fecha = date('Y-m-d');
			$hora = date('H:i');
			$fecha_hora_actual = $fecha.'T'.$hora;
			$template->assign('fecha', $fecha_hora_actual);
			if ($_GET['opc']=="consulta_unica"){
				$template->assign('opc', 1);
				if (isset($_POST['registroV'])) {
					$reportes = new Reportes();
					$rep=$reportes->Ventas($_POST['Tipo'],$_POST['FechaI'],$_POST['FechaF'],$_POST['Orden']);
					$c = count($rep);
					$template->assign('c',$c);
					$template->assign('vec',$rep);
					$template->assign('men',1);
				} else if (isset($_POST['registroC'])) {
					$reportesCom = new Reportes();
					$repc=$reportesCom->Compras($_POST['Tipo'],$_POST['FechaI'],$_POST['FechaF'],$_POST['Orden']);
					$c = count($repc);
					$template->assign('c',$c);
					$template->assign('vec',$repc);
					$template->assign('men',2);
				} else if (isset($_POST['registroP'])) {
					$reportesPro = new Reportes();
					$repP=$reportesPro->ConsultarProductos($_POST['Tipo'],$_POST['FechaI'],$_POST['FechaF'],$_POST['Orden']);
					$c = count($repP);
					$template->assign('c',$c);
					$template->assign('vec',$repP);
					$template->assign('men',3);
				} else if (isset($_POST['registroCli'])) {
					$reportes = new Reportes();
					$rep=$reportes->Clientes($_POST['FechaI'],$_POST['FechaF'],$_POST['Orden']);
					$c = count($rep);
					$template->assign('c',$c);
					$template->assign('vec',$rep);
					$template->assign('men',4);
				} else if (isset($_POST['registroProv'])) {
					$reportes = new Reportes();
					$rep=$reportes->Proveedores($_POST['FechaI'],$_POST['FechaF'],$_POST['Orden']);
					$c = count($rep);
					$template->assign('c',$c);
					$template->assign('vec',$rep);
					$template->assign('men',5);
				}
				
				//////////////
				
				if (isset($_POST['TortaV'])) {
					header ("location: reportes/Diagramas/3d-pie/ventas.php?a=$_POST[Tipo]&b=$_POST[FechaI]&c=$_POST[FechaF]&d=$_POST[Orden]&e=Ventas");
				} else if (isset($_POST['TortaC'])) {
					header ("location: reportes/Diagramas/3d-pie/compras.php?a=$_POST[Tipo]&b=$_POST[FechaI]&c=$_POST[FechaF]&d=$_POST[Orden]&e=Compras");
				} else if (isset($_POST['TortaProd'])) {
					header ("location: reportes/Diagramas/3d-pie/productos.php?a=$_POST[Tipo]&b=$_POST[FechaI]&c=$_POST[FechaF]&d=$_POST[Orden]&e=ConsultarProductos");
				} else if (isset($_POST['TortaClie'])) {
					header ("location: reportes/Diagramas/3d-pie/clientes.php?a=$_POST[FechaI]&b=$_POST[FechaF]&c=$_POST[Orden]&e=Clientes");
				} else if (isset($_POST['TortaProv'])) {
					header ("location: reportes/Diagramas/3d-pie/proveedores.php?a=$_POST[FechaI]&b=$_POST[FechaF]&c=$_POST[Orden]&e=Proveedores");
				} 
				
				////////////////////
				
				if (isset($_POST['ColumnaV'])) {
					header ("location: reportes/Diagramas/3d-column-null-values/ventas.php?a=$_POST[Tipo]&b=$_POST[FechaI]&c=$_POST[FechaF]&d=$_POST[Orden]&e=Ventas");
				} else if (isset($_POST['ColumnaC'])) {
					header ("location: reportes/Diagramas/3d-column-null-values/compras.php?a=$_POST[Tipo]&b=$_POST[FechaI]&c=$_POST[FechaF]&d=$_POST[Orden]&e=Compras");
				} else if (isset($_POST['ColumnaProd'])) {
					header ("location: reportes/Diagramas/3d-column-null-values/productos.php?a=$_POST[Tipo]&b=$_POST[FechaI]&c=$_POST[FechaF]&d=$_POST[Orden]&e=ConsultarProductos");
				} else if (isset($_POST['ColumnaClie'])) {
					header ("location: reportes/Diagramas/3d-column-null-values/clientes.php?a=$_POST[FechaI]&b=$_POST[FechaF]&c=$_POST[Orden]&e=Clientes");
				} else if (isset($_POST['ColumnaProv'])) {
					header ("location: reportes/Diagramas/3d-column-null-values/proveedores.php?a=$_POST[FechaI]&b=$_POST[FechaF]&c=$_POST[Orden]&e=Proveedores");
				} 
			}else if ($_GET['opc']=="consulta_mezclada"){
				$template->assign('opc', 2);
				if(isset($_POST['buscar'])){
					$consulta = new Informe();
					//$res=$consulta->ReporteVenta($_POST['id'],$_POST['fechaI'],$_POST['fechaI']);
					echo $_POST['id'],$_POST['opcion'],$_POST['fechaI'],$_POST['fechaF'];
				}
			}
		} else if ($_GET['opcion']=="comprar"){
			$template->assign('submenu', 8);
			
			if ($_GET['opc']=="Ingresar"){
				$template->assign('opc', 1);
                $temporal1 = new TemporalCompra();
                $tablav = new Informe();
                
                
                if (isset($_POST['ingresar'])){
                    if (isset($_POST['buscar2'])){ 

                            $consulta = new Informe();
                            $con=$consulta->ConsultarIdProducto($_POST['buscar2']);
                            if($con=="n1"){
                                $template->assign('control','op0');
                            }else{
/*$cod_familia=null,$cod_producto=null,$cod_venta=null,$producto=null,$familia=null,$cantidad=null*/
                                $temporal = new TemporalCompra($con[5],$con[6],0,$con[0],$con[1],$_POST['cant'],$con[3]);
							
                                $temporal->Ingresar();
                                $template->assign('control','op1');   
                            }
                        }
                } else if (isset($_POST['comprar'])){
					
					$fecha_hora_actual = date('Y-m-d H:i:s');
					
					$proveedor = new Informe();
					if (empty($_POST['nombreE'])){
						$idc = 999999999;
					} else {
						$id=$proveedor->ConsultarProveedor($_POST['nombreE']);
						$idc = $id[0];
					}
					
					
					$comprar = new Compra($idc,$_POST['total'],$fecha_hora_actual);
					
					$comprar->Ingresar();
                    $conid= new Informe();
                    $id=$conid->ConsultarTemporalCid();
                    $vect=$tablav->ConsultarTemporalCom();
                    $c = count($vect);
                    for ($i = 0; $i <= $c-1; $i++){
/*$cod_familia,$cod_producto,$cod_compra,$cod_proveedor,$cantidad*/
                        $detalle = new DetalleCompra($vect[$i][0],$vect[$i][1],$id,$idc,$vect[$i][2]);
                        $detalle->Ingresar();
                        $detalle->Sumar();
                    }
                    $template->assign('control','op2');  
					$template->assign('idv',$id);  
                    $temporal1->Limpiar();
                } else if (isset($_POST['cancelar'])){
                    $temporal1->Limpiar();
                }
                $vect=$tablav->ConsultarTemporalC();
                $c = count($vect);
                $template->assign('cont', $c);
                $template->assign('vect',$vect);
                 
			} else if ($_GET['opc']=="Devolucion"){
				$template->assign('opc', 2);
				$venta = new Informe();
				$conv=$venta->ConsultarCompra();
				$c = count($conv);
				$template->assign('c',$c);
				$template->assign('vec',$conv);
				if(isset($_POST['consultar'])){
					$template->assign('opcv', 1);
					$consultav = new Informe();
					$convi=$consultav->ConsultarCompraId($_POST['consultar']);
					$template->assign('vecci', $convi);
					$consultapv = new Informe();
					$conpv=$consultapv->ConsultarProductosCom($_POST['consultar']);
					$c = count($conpv);
					$template->assign('c',$c);
					$template->assign('vec',$conpv);
				}
				if(isset($_POST['cambiarE'])){
					$idCompra = 'idCompra';
					echo $_POST[$idVenta],'<br>';
						for($i=0;$i<=$c;$i++){
							$estado = 'Estado'.$i;
							$cantidad = 'Cantidad'.$i;
							$idProducto = 'idProducto'.$i;
							$actDet = new DetalleCompra('',$_POST[$idProducto],$_POST[$idCompra],'',$_POST[$cantidad],$_POST[$estado]);
                            $actDet->ActualizarEstado();
						}
					}
				
				/*
				
				$template->assign('opc', 2);
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
				
				if(isset($_POST['cambiarE'])){
					$idVenta = 'idVenta';
					echo $_POST[$idVenta],'<br>';
						for($i=0;$i<=$c;$i++){
							$estado = 'Estado'.$i;
							$cantidad = 'Cantidad'.$i;
							$idProducto = 'idProducto'.$i;
							$actDet = new Detalle('',$_POST[$idProducto],$_POST[$idVenta],'',$_POST[$cantidad],$_POST[$estado]);
                            $actDet->ActualizarEstado();
						}
					}
				
				*/
			} else if ($_GET['opc']=="Consultar"){
				$template->assign('opc', 3);
				$venta = new Informe();
				$conv=$venta->ConsultarCompra();
				$c = count($conv);
				$template->assign('c',$c);
				$template->assign('vec',$conv);
				if(isset($_POST['consultar'])){
					$template->assign('opcv', 1);
					$consultav = new Informe();
					$convi=$consultav->ConsultarCompraId($_POST['consultar']);
					$template->assign('vecci', $convi);
					$consultapv = new Informe();
					$conpv=$consultapv->ConsultarProductosCom($_POST['consultar']);
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
	$accesoid= new Informe();
    $id=$accesoid->ConsultarAccesoid();
	$fecha_hora_actual = date('Y-m-d H:i:s');
	$usuario = new ControlAcceso($_SESSION['user'],$fecha_hora_actual,$id);
	$usuario->CerrarSesion();
    header ('location: index.php');
}
?>