<?PHP

require('includes/contenido/class.Conexion.php');
include('includes/libs/Smarty.class.php');
$template = new Smarty(0);

$modo = isset($_GET['modo']) ? $_GET['modo'] : 'default';

switch($modo) {
	case 'login':
		if (isset($_POST['login'])) {
			if (!empty($_POST['user']) and !empty($_POST['pass']))
			{
				include('includes/contenido/class.Acceso.php');
				$login = new Acceso($_POST['user'],$_POST['pass']);
				$login->Login();
			} else {
				header('location: index.php?error=campos_vacios');
			}
		} else {
			header('location: index.php');
		}
		break;
	case 'registro':
		echo 'Registro';
		break;
	case 'claveperdida':
		echo 'clave perdida';
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
