<?php
class Consulta {
	
	public static function IdProducto($codigoI) {
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM producto WHERE codigo_interno='$codigoI';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "No se han encontrado datos";
		}
		
	}	
	
	public static function CodCategoria($codigo) {
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM producto,categoria WHERE cod_familias='$codigo' AND categoria_cod_familias='$codigo';");
		$dato2 = $db->recorrer($sql);
		
        
        
        
        
        
        return $dato2[2][0];
        
        
        
        
        /*
		if (!empty($dato2))
		{
			return $dato2;
		}else{
			return "No se han encontrado datos";
		}*/
	}
}