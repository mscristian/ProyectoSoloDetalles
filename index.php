<?PHP

require('includes/contenido/class.Conexion.php');
include('includes/libs/Smarty.class.php');
include('includes/contenido/class.Acceso.php');
include('includes/contenido/class.Informe.php');
include('includes/contenido/class.ControlAcceso.php');
date_default_timezone_set('America/Bogota');
$template = new Smarty(0);

$modo = isset($_GET['modo']) ? $_GET['modo'] : 'default';

switch($modo) {
	case 'login':
		if (isset($_POST['login'])) {
			($_POST['sesion']==1) ? $ses=1 : $ses=0;
			if (!empty($_POST['user']) and !empty($_POST['pass']))
			{
				$login = new Acceso($_POST['user'],$_POST['pass'],"","","","","","",$ses);
				$login->Login();
			} else {
				header('location: index.php?error=campos_vacios');
			}
		} else {
			header('location: index.php');
		}
		break;
        
	case 'registro':
		if(isset($_POST['registro'])){
			if(!empty($_POST['user']) and !empty($_POST['pass']) and !empty($_POST['email']) and !empty($_POST['tipoU'])){
			
				empty($_POST['cc'])?$cc=0:$cc=$_POST['cc'];
				empty($_POST['nombre'])?$nombre="NULL":$nombre=$_POST['cc'];
				empty($_POST['apellido'])?$apellido="NULL":$apellido=$_POST['cc'];
				empty($_POST['telefono'])?$telefono=0:$telefono=$_POST['cc'];

				$registro = new Acceso($_POST['user'],$_POST['pass'],$_POST['email'],$_POST['tipoU'],$cc,$nombre,$apellido,$telefono);
				$registro->Registro();
			}else{
				header('location: index.php?modo=registro&error=campos_vacios');
			}
		}else if(isset($_GET['error']) and $_GET['error'] == 'campos_vacios'){
			$template->assign(array('error' => 'ERROR: Debe llenar todos los campos obligatorios'));
			$template->display('registro.tpl');
		}else if(isset($_GET['error']) and $_GET['error'] == 'usuario_usado'){
			$template->assign(array('error' => 'ERROR: El usuario ya existe'));
			$template->display('registro.tpl');
		}else if(isset($_GET['error']) and $_GET['error'] == 'email_usado'){
			$template->assign(array('error' => 'ERROR: El correo ya existe'));
			$template->display('registro.tpl');
		}else if(isset($_GET['error']) and $_GET['error'] == 'email_user_usado'){
			$template->assign(array('error' => 'ERROR: El correo y la contraseña ya existen haz olvidado tu contraseña? <a href="index.php?modo=claveperdida">Recuperar</a>'));
			$template->display('registro.tpl');
		} else {
			$template->display('registro.tpl');
		}
		break;
        
	case 'claveperdida':
		if(isset($_POST['email'])){
			if(!empty($_POST['email']))	{
				$recuperar = new Acceso("","",$_POST['email']);
				$recuperar->ClavePerdida();
			}else{
				header ('location: index.php?modo=claveperdida&error=campos_vacios');
			}
		}else if(isset($_GET['error']) and $_GET['error']=='campos_vacios'){
			$template->assign(array('error' => 'ERROR: Debe ingresar un correo'));
			$template->display('claveperdida.tpl');
		}else if(isset($_GET['error']) and $_GET['error']=='email_inexistente'){
			$template->assign(array('error' => 'ERROR: No se encontro el correo'));
			$template->display('claveperdida.tpl');
		}else if(isset($_GET['succes']) and $_GET['succes']=='1'){
			$template->assign(array('error' => 'Emos enviado una nueva clave a su correo'));
			$template->display('claveperdida.tpl');
		}else{
			$template->display('claveperdida.tpl');
		}
		break;
	default:
        if (isset($_GET['error']) and $_GET['error'] == 'campos_vacios') {
            $template->assign(array('error' => 'ERROR: Debes llenar los campos'));
            $template->display('index.tpl');
        } else if (isset($_GET['error']) and $_GET['error'] == 'datos_incorrectos') {
            $template->assign(array('error' => 'ERROR: Usuario o contraseña incorrectos'));
            $template->display('index.tpl');
        } else if (isset($_GET['error']) and $_GET['error'] == 'acceso') {
            $template->assign(array('error' => 'ERROR: La sesionn a caducado o no a iniciado sesion'));
            $template->display('index.tpl');
        } else {
        
		    $template->display('index.tpl');
		    break;
        }
}

?>
