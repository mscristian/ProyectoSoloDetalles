<?php
class Informe {
    
    public static function ConsultarInvIdProducto($codigoI) {
		$db = new Conexion();
		$sql = $db->query("SELECT nombre_prod,precio,estado,cantidad_interna,familia,descripcion,existencia_total FROM producto,categoria WHERE nombre_prod = '$codigoI' AND cod_familias=categoria_cod_familias;");
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
		$sql = $db->query("SELECT nombre_prod,familia,cantidad_interna,precio,estado,categoria_cod_familias,codigo_interno FROM producto,categoria WHERE nombre_prod='$codigoI' AND cod_familias = categoria_cod_familias");
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
		$sql = $db->query("SELECT familia,descripcion,existencia_total,nombre_prod,cantidad_interna,precio,estado FROM producto,categoria WHERE familia LIKE '%$codigo%' AND categoria_cod_familias=cod_familias;");
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
		$sql = $db->query("SELECT familia,descripcion,existencia_total,nombre_prod,estado,precio,cantidad_interna FROM producto,categoria WHERE cod_familias=categoria_cod_familias ORDER BY familia ASC;");
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

    public static function ConsultarCategoriaId($codigo){
        $db = new Conexion();
		$sql = $db->query("SELECT * FROM categoria WHERE cod_familias='$codigo';");
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
	
    public static function ConsultarFamilias(){
        $db = new Conexion();
		$sql = $db->query("SELECT `cod_familias`, `familia` FROM `categoria`");
		$dato = $db->recorrer($sql);
        //return $dato;
        if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
            
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
    
    public static function ConsultarTemporalV(){
        
        $db = new Conexion();
		$sql = $db->query("SELECT producto,familia,precio,cantidad FROM temporal_venta WHERE 1;");
		$dato3 = $db->recorrer($sql);
		
		if (!empty($dato3))
		{
			$vector[0][0] = $dato3[0];
			$vector[0][1] = $dato3[1];
			$vector[0][2] = $dato3[2];
			$vector[0][3] = $dato3[3];

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
	
	public static function ConsultarTemporalC(){
        
        $db = new Conexion();
		$sql = $db->query("SELECT producto,familia,cantidad,precio FROM temporal_compra WHERE 1;");
		$dato3 = $db->recorrer($sql);
		
		if (!empty($dato3))
		{
			$vector[0][0] = $dato3[0];
			$vector[0][1] = $dato3[1];
			$vector[0][2] = $dato3[2];
			$vector[0][3] = $dato3[3];

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
    
	/*public static function ConsultarTemporalVt(){
        
        $db = new Conexion();
		$sql = $db->query("SELECT cod_categoria,cod_producto,cantidad FROM temporal_venta WHERE 1;");
		$dato3 = $db->recorrer($sql);
		
		if (!empty($dato3))
		{
			$vector[0][0] = $dato3[0];
			$vector[0][1] = $dato3[1];
			$vector[0][2] = $dato3[2];

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
    }*/
	
    public static function ConsultarTemporalVt(){
        
        $db = new Conexion();
		$sql = $db->query("SELECT cod_categoria,cod_producto,cantidad FROM temporal_venta WHERE 1;");
		$dato3 = $db->recorrer($sql);
		
		if (!empty($dato3))
		{
			$vector[0][0] = $dato3[0];
			$vector[0][1] = $dato3[1];
			$vector[0][2] = $dato3[2];

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
	
	public static function ConsultarTemporalCom(){
        
        $db = new Conexion();
		$sql = $db->query("SELECT cod_categoria,cod_producto,cantidad FROM temporal_compra WHERE 1;");
		$dato3 = $db->recorrer($sql);
		
		if (!empty($dato3))
		{
			$vector[0][0] = $dato3[0];
			$vector[0][1] = $dato3[1];
			$vector[0][2] = $dato3[2];

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
    
    public static function ConsultarTemporalVid() {
        $db = new Conexion();
		$sql = $db->query("select MAX(idVenta) as id from venta;");
		$dato3 = $db->recorrer($sql);
        return $dato3[0];
    }
	
	public static function ConsultarAccesoid() {
        $db = new Conexion();
		$sql = $db->query("select MAX(idacceso) as id from acceso;");
		$dato3 = $db->recorrer($sql);
        return $dato3[0];
    }
	
	/*select MAX(idacceso) as id from acceso*/
	
	public static function ConsultarTemporalCid() {
        $db = new Conexion();
		$sql = $db->query("select MAX(idcompra) as id from compra;");
		$dato3 = $db->recorrer($sql);
        return $dato3[0];
    }
	
	public static function ConsultarVenta() {
		$db = new Conexion();
		$sql = $db->query("SELECT idVenta,nombre,total_original,total_real,fecha,apellido FROM `venta`,`cliente` WHERE idcliente=cliente_idcliente;");
		$dato2 = $db->recorrer($sql);
		if (!empty($dato2)){
			$vector[0][0] = $dato2[0];
			$vector[0][1] = $dato2[1];
			$vector[0][2] = $dato2[2];
			$vector[0][3] = $dato2[3];
			$vector[0][4] = $dato2[4];
            $vector[0][5] = $dato2[5];

			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
        	return $vector;
		}else{
			return "n1";
		}
	}
	
	public static function ConsultarCompra() {
		$db = new Conexion();
		$sql = $db->query("SELECT idcompra,proveedor_idproveedor,total,fecha,nombre FROM `compra`,`proveedor` WHERE idproveedor=proveedor_idproveedor;");
		$dato2 = $db->recorrer($sql);
		if (!empty($dato2)){
			$vector[0][0] = $dato2[0];
			$vector[0][1] = $dato2[1];
			$vector[0][2] = $dato2[2];
			$vector[0][3] = $dato2[3];
            $vector[0][4] = $dato2[4];

			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
        	return $vector;
		}else{
			return "n1";
		}
	}
    
	public static function ConsultarVentaId($codigo) {
		$db = new Conexion();
		$sql = $db->query("SELECT idVenta,nombre,total_original,total_real,fecha,apellido FROM `venta`,`cliente` WHERE idcliente=cliente_idcliente AND idVenta = $codigo;");
		$dato2 = $db->recorrer($sql);
		if (!empty($dato2)){
			
        	return $dato2;
		}else{
			return "n1";
		}
	}
	
	public static function ConsultarCompraId($codigo) {
		$db = new Conexion();
		$sql = $db->query("SELECT idcompra,proveedor_idproveedor,total,fecha,nombre FROM `compra`,`proveedor` WHERE idproveedor=proveedor_idproveedor AND idcompra = '$codigo';");
		$dato2 = $db->recorrer($sql);
		if (!empty($dato2)){
			
        	return $dato2;
		}else{
			return "n1";
		}
	}
	
	public static function ConsultarProductosVen($codigo) {
		$db = new Conexion();
		$sql = $db->query("SELECT nombre_prod,familia,cantidad,precio,descripcionEstado,codigo_interno FROM producto,categoria,detalle_venta,venta,estado WHERE idVenta='$codigo' AND Venta_idVenta='$codigo' AND producto_codigo_interno=codigo_interno AND producto_categoria_cod_familias=cod_familias AND idEstado=Estado_idEstado;");
		$dato2 = $db->recorrer($sql);
		if (!empty($dato2)){
			$vector[0][0] = $dato2[0];
			$vector[0][1] = $dato2[1];
			$vector[0][2] = $dato2[2];
			$vector[0][3] = $dato2[3];
            $vector[0][4] = $dato2[4];
			$vector[0][5] = $dato2[5];
            
			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
        	return $vector;
		}else{
			return "n1";
		}
	}
	
	public static function ConsultarProductosCom($codigo) {
		$db = new Conexion();
		$sql = $db->query("SELECT nombre_prod,familia,cantidad,precio,descripcionEstado,codigo_interno FROM producto,categoria,detalle_compra,compra,proveedor,estado WHERE idcompra='$codigo' AND compra_idcompra='$codigo' AND producto_codigo_interno=codigo_interno AND producto_categoria_cod_familias=cod_familias AND idproveedor=proveedor_idproveedor AND idEstado=Estado_idEstado");
		$dato2 = $db->recorrer($sql);
		if (!empty($dato2)){
			$vector[0][0] = $dato2[0];
			$vector[0][1] = $dato2[1];
			$vector[0][2] = $dato2[2];
			$vector[0][3] = $dato2[3];
            $vector[0][4] = $dato2[4];
			$vector[0][5] = $dato2[5];

			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
        	return $vector;
		}else{
			return "n1";
		}
	}
	
	public static function ConsultarCliente($codigo) {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM cliente WHERE documento='$codigo';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}
	
	public static function ConsultarProveedor($codigo) {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM proveedor WHERE nombre='$codigo';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}
    
    public static function ConsultarProveedorAll() {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM proveedor;");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
			$vector[0][2] = $dato[2];
			$vector[0][3] = $dato[3];
            $vector[0][4] = $dato[4];
            $vector[0][5] = $dato[5];

			$array_fetch_all=mysqli_fetch_all($sql); 
			foreach($array_fetch_all as $indice=>$valor){ 
					foreach ($valor as $i=>$v){ 
						$vector[$indice+1][$i]=$v;
					} 

			}			
        	return $vector;
		}else{
			return "n1";
		}
		
	}
    
    public static function ConsultarIdProveedor($codigo) {
		
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM proveedor WHERE idproveedor='$codigo';");
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
		
	}
	
	public static function ConsultarUsuario($usuario){
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM usuario WHERE usser='$usuario';");
		$dato = $db->recorrer($sql);
		if (!empty($dato))
		{
			return $dato;
		}else{
			return "n1";
		}
	}
	
	/*SELECT nombre_prod,familia,cantidad_interna,precio FROM producto,categoria,detalle_venta,venta WHERE idVenta=1 AND Venta_idVenta=1 AND producto_codigo_interno=codigo_interno AND producto_categoria_cod_familias=cod_familias*/
	
	
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