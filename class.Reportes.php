<?php

include('class.Conexion.php');

class Reportes {
	
	protected $a;
	protected $b;
	protected $c;
	protected $d;
	
	public function Ventas($a,$b,$c,$d){
	
		$db = new Conexion();
		$sql = $db->query("
		
		SELECT venta.idVenta,venta.fecha,cliente.nombre,cliente.apellido,venta.total_original,venta.total_real,producto.nombre_prod,detalle_venta.cantidad,estado.descripcionEstado FROM 
		detalle_venta
		INNER JOIN venta ON detalle_venta.Venta_idVenta = venta.idVenta 
		INNER JOIN producto ON detalle_venta.producto_codigo_interno = producto.codigo_interno
		INNER JOIN estado ON detalle_venta.Estado_idEstado = estado.idEstado
		INNER JOIN cliente ON detalle_venta.Venta_cliente_idcliente = cliente.idcliente
		WHERE estado.idEstado = $a AND venta.fecha >= '$b' AND venta.fecha <= '$c'
		ORDER BY '$d' ASC	
						  
		");
		
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
			$vector[0][2] = $dato[2];
			$vector[0][3] = $dato[3];
			$vector[0][4] = $dato[4];
			$vector[0][5] = $dato[5];
			$vector[0][6] = $dato[6];
			$vector[0][7] = $dato[7];
			$vector[0][8] = $dato[8];

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
	
	public function Compras($a,$b,$c,$d){
	
		$db = new Conexion();
		$sql = $db->query("
		
		SELECT compra.idcompra,compra.fecha,proveedor.nombre,compra.total,producto.nombre_prod,producto.precio,detalle_compra.cantidad,estado.descripcionEstado FROM 
		detalle_compra
		INNER JOIN compra ON detalle_compra.compra_idcompra = compra.idcompra 
		INNER JOIN producto ON detalle_compra.producto_codigo_interno = producto.codigo_interno
		INNER JOIN estado ON detalle_compra.Estado_idEstado = estado.idEstado
		INNER JOIN proveedor ON detalle_compra.compra_proveedor_idproveedor = proveedor.idproveedor
		WHERE estado.idEstado = $a AND compra.fecha >= '$b' AND compra.fecha <='$c'  
		ORDER BY '$d'

						  
		");
		
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
			$vector[0][2] = $dato[2];
			$vector[0][3] = $dato[3];
			$vector[0][4] = $dato[4];
			$vector[0][5] = $dato[5];
			$vector[0][6] = $dato[6];
			$vector[0][7] = $dato[7];

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
	
	public function ConsultarProductos($a,$b,$c,$d){
	
		if ($a==1) {
			if ($d==1) {
				$d="detalle_venta.fecha";
			}
			$prodcon = "detalle_venta.Venta_idVenta,categoria.familia,producto.nombre_prod,producto.precio,estado.descripcionEstado,detalle_venta.cantidad,detalle_venta.fecha";
			$inven = "detalle_venta";
		} else {
			if ($d==1) {
				$d="detalle_compra.fecha";
			}
			$prodcon = "detalle_compra.compra_idcompra,categoria.familia,producto.nombre_prod,producto.precio,estado.descripcionEstado,detalle_compra.cantidad,detalle_compra.fecha";
			$inven = "detalle_compra";
		}
		
		$db = new Conexion();
		$sql = $db->query("
		
		SELECT $prodcon FROM 
		producto
		INNER JOIN categoria ON producto.categoria_cod_familias = categoria.cod_familias
		INNER JOIN $inven ON producto.codigo_interno = $inven.producto_codigo_interno
		INNER JOIN estado ON $inven.Estado_idEstado = estado.idEstado
		WHERE $inven.fecha >= '$b' AND $inven.fecha <='$c'
		ORDER BY $d

						  
		");
		
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
			$vector[0][2] = $dato[2];
			$vector[0][3] = $dato[3];
			$vector[0][4] = $dato[4];
			$vector[0][5] = $dato[5];
			$vector[0][6] = $dato[6];

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
	
	public function Clientes($a,$b,$c){
	
		$db = new Conexion();
		$sql = $db->query("
		
		
		SELECT venta.idVenta, cliente.nombre, cliente.apellido, cliente.documento, cliente.correo, cliente.telefono, cliente.direccion, venta.total_real, venta.fecha FROM 
		cliente
		INNER JOIN venta ON cliente.idcliente = venta.cliente_idcliente
		WHERE venta.fecha >= '$a' AND venta.fecha <= '$b'
		ORDER BY '$c'

						  
		");
		
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
			$vector[0][2] = $dato[2];
			$vector[0][3] = $dato[3];
			$vector[0][4] = $dato[4];
			$vector[0][5] = $dato[5];
			$vector[0][6] = $dato[6];
			$vector[0][7] = $dato[7];
			$vector[0][8] = $dato[8];

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
	
	public function Proveedores($a,$b,$c){
	
		$db = new Conexion();
		$sql = $db->query("
		
		
		SELECT proveedor.nombre,proveedor.correo,proveedor.telefono_f,proveedor.telefono_c,compra.idcompra,compra.total,compra.fecha FROM 
		proveedor
		INNER JOIN compra ON proveedor.idproveedor = compra.proveedor_idproveedor
		WHERE compra.fecha >= '$a' AND compra.fecha <= '$b'
		ORDER BY '$c'

						  
		");
		
		$dato = $db->recorrer($sql);
		
		if (!empty($dato))
		{
			$vector[0][0] = $dato[0];
			$vector[0][1] = $dato[1];
			$vector[0][2] = $dato[2];
			$vector[0][3] = $dato[3];
			$vector[0][4] = $dato[4];
			$vector[0][5] = $dato[5];
			$vector[0][6] = $dato[6];

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
}
?>