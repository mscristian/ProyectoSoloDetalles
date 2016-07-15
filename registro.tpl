<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="stylesheet" href="estilos/css/estilo.css" />
        <link rel="stylesheet" href="estilos/css/font-awesome.min.css" />
    </head> 
    <body>
        <div id="prinick">
            <center><img src="estilos/images/IconLog.png" /></center>
            <form action="index.php?modo=registro" method="POST">
                <center>
                <table>
                    <tr>
                        <td><label>Usuario: </label></td><td><input type="text" name="user" required/></td>
                    </tr>
                    <tr>
                        <td><label>Contraseña: </label></td><td><input type="password" name="pass" required/></td>
                    </tr>
					<tr>
                        <td><label>Email: </label></td><td><input type="email" name="email" required/></td>
                    </tr>
					<tr>
                        <td><label>Numero Identificaciòn: </label></td><td><input type="number" name="cc" /></td>
                    </tr>
					<tr>
                        <td><label>Tipo Usuario: </label></td><td><input type="text" name="tipoU" /></td>
                    </tr>
					<tr>
                        <td><label>Nombre: </label></td><td><input type="text" name="nombre" /></td>
                    </tr>
					<tr>
                        <td><label>Apellido: </label></td><td><input type="text" name="apellido" /></td>
                    </tr>
					<tr>
                        <td><label>Telefono: </label></td><td><input type="number" name="telefono" /></td>
                    </tr>
                </table>
                    </center>
                <center>
                    <input type="hidden" name="registro" value="1" /> 
                    <input type="submit" value="Registrar" id="buttons" />    
                </center>
            </form>
            <center>
                {if isset($error)}
                {$error}
                {/if}
            </center>	
			<br/><br/>
			<a href="index.php?modo=registro">Registro</a>	
        </div>
    </body>
</html>