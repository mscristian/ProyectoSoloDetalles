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
					include('includes/contenido/class.Consultar.php');
					
					$template->assign('opc', 1);
					$consulta = new Consulta();
					$a=$consulta->IdProducto($_POST['buscar']);
					$b=$consulta->CodCategoria($_POST['buscar2']);
					
                    echo $b;
                    
					if ($_GET['con']==1){
						$template->assign('con', 1);
						$template->assign('dato1', $a);
					} else if ($_GET['con']==2) {
						$template->assign('con', 2);
						$template->assign('dato2', $b);
					}
				}
			}
			$template->display('principal.tpl');
			
		} else if ($_GET['opcion']==2){
			
			$template->assign('submenu', 2);
			$template->display('principal.tpl');
			
		} else if ($_GET['opcion']==3){
			
			$template->assign('submenu', 3);
			$template->display('principal.tpl');
			
		} else if ($_GET['opcion']==4){
			
			$template->assign('submenu', 4);
			$template->display('principal.tpl');
			
		} else {
			$template->display('principal.tpl'); 	
		}
	} else {
		$template->display('principal.tpl'); 	
	}
	
} else if (!isset($_SESSION['user'])) {
    session_start();
    session_destroy();
    header ('location: index.php?error=acceso');
}
?>
    