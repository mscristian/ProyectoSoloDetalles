<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link rel="stylesheet" href="estilos/css/estilo.css" />
        <link rel="stylesheet" href="estilos/css/font-awesome.min.css" />
    </head> 
    <body>
        <div id="prinick">
            <center><img src="estilos/images/IconLog.png" /></center>
            <form action="index.php?modo=login" method="POST">
                <center>
                <table>
                    <tr>
                        <td><label>Usuario: </label></td><td><input type="text" name="user" /></td>
                    </tr>
                    <tr>
                        <td><label>Contraseña: </label></td><td><input type="password" name="pass" /></td>
                    </tr>
                </table>
                    </center>
                <center>
                    <input type="hidden" name="login" value="1" /> 
                    <label><input type="checkbox" name="sesion" value="1" />Recordar sesion</label><br />
                    <input type="submit" value="Ingresar" id="buttons" />    
                </center>
            </form>
            <center>
                {if isset($error)}
                {$error}
                {/if}
            </center>
        </div>
    </body>
</html>