<?php
class Detalle {
    
    protected $cod_familia;
    protected $cod_producto;
    protected $cod_venta;
	protected $cod_cliente;
	protected $cantidad;
    protected $estado;
    
    public function __construct($cod_familia=null,$cod_producto=null,$cod_venta=null,$cod_cliente=null,$cantidad=null,$estado=null) {
        $this->cod_familia=$cod_familia;
        $this->cod_producto=$cod_producto;
        $this->cod_venta=$cod_venta;
		$this->cod_cliente=$cod_cliente;
		$this->cantidad=$cantidad;
        $this->estado=$estado;
    }
    
    public function Ingresar() {
		$fecha_hora_actual = date('Y-m-d H:i:s');
        $db = new Conexion();
		$db->query("INSERT INTO `detalle_venta`(`producto_categoria_cod_familias`, `Venta_idVenta`, `producto_codigo_interno`,`Venta_cliente_idcliente`, `cantidad`, `Estado_idEstado`, `fecha`) VALUES ($this->cod_familia,$this->cod_venta,$this->cod_producto,$this->cod_cliente,$this->cantidad,1,'$fecha_hora_actual');");
    }
    
    public function Descontar() {
        $db = new Conexion();
		$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`-$this->cantidad WHERE codigo_interno=$this->cod_producto;");
    }
    
    public function ActualizarEstado() {
		$fecha_hora_actual = date('Y-m-d H:i:s');
        $db = new Conexion();
		$db->query("UPDATE detalle_venta SET Estado_idEstado=$this->estado,fecha='$fecha_hora_actual' WHERE Venta_idVenta=$this->cod_venta AND producto_codigo_interno=$this->cod_producto;");
		if ($this->estado == 4){
			$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`+$this->cantidad WHERE codigo_interno=$this->cod_producto;");
		} else if ($this->estado == 1) {
			$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`-$this->cantidad WHERE codigo_interno=$this->cod_producto;");
		}
    }
}

?>