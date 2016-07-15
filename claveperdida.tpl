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
            <form action="index.php?modo=claveperdida" method="POST">
                <center>
                <table>
                    <tr>
                        <td><label>Email: </label></td><td><input type="email" name="email" /></td>
					</tr>
                </table>
                    </center>
                <center>
                    <input type="submit" value="Ingresar" id="buttons" />    
                </center>
            </form>
            <center>
                {if isset($error)}
                {$error}
                {/if}
            </center>	
			<br/><br/>
				
        </div>
    </body>
</html>