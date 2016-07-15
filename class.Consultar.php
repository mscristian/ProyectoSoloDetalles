<?php
class Consulta {
    
    public static function ConsultarInvIdProducto($codigoI) {
		$db = new Conexion();
		$sql = $db->query("SELECT codigo_interno,cantidad_interna,precio,estado,nombre,cod_familias,familia,descripcion,existencia_total FROM producto,categoria WHERE codigo_interno = '$codigoI' AND cod_familias=categoria_cod_familias;");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}	
	
	public static function ConsultarIdProducto($codigoI) {
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM producto WHERE nombre_prod='$codigoI';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}	
	
	public static function ConsultarCodCategoria($codigo) {
		$db = new Conexion();
		$sql = $db->query("SELECT cod_familias,familia,descripcion,existencia_total,codigo_interno,nombre,cantidad_interna,precio,estado FROM producto,categoria WHERE cod_familias ='$codigo' AND categoria_cod_familias='$codigo';");
		$dato2 = $db->recorrer($sql);
		
		if (!empty($dato2))
		{
			$vector[0][0] = $dato2[0];
			$vector[0][1] = $dato2[1];
			$vector[0][2] = $dato2[2];
			$vector[0][3] = $dato2[3];
			$vector[0][4] = $dato2[4];
			$vector[0][5] = $dato2[5];
			$vector[0][6] = $dato2[6];
			$vector[0][7] = $dato2[7];
			$vector[0][8] = $dato2[8];

			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
			return $vector;
		}else{
			return "No se han encontrado datos";
		}
	}
	
	public static function ConsultarTodo() {
		$db = new Conexion();
		$sql = $db->query("SELECT cod_familias,familia,descripcion,existencia_total,codigo_interno,nombre,estado,precio,cantidad_interna FROM producto,categoria WHERE cod_familias=categoria_cod_familias;");
		$dato3 = $db->recorrer($sql);
		
		if (!empty($dato3))
		{
			$vector[0][0] = $dato3[0];
			$vector[0][1] = $dato3[1];
			$vector[0][2] = $dato3[2];
			$vector[0][3] = $dato3[3];
			$vector[0][4] = $dato3[4];
			$vector[0][5] = $dato3[5];
			$vector[0][6] = $dato3[6];
			$vector[0][7] = $dato3[7];
			$vector[0][8] = $dato3[8];

			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
			return $vector;
		}else{
			return "No se han encontrado datos";
		}
	}
	
	public static function ConsultarCategoriaU($codigo) {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM categoria WHERE familia='$codigo';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}
	
	public static function ConsultarProductoU($codigo) {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM producto WHERE nombre='$codigo';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}
	
	/*public static function ConsultarCategoriaUnica($codigo) {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM categoria WHERE cod_familias='$codigo';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}*/
}
