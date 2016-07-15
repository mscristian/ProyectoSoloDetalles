<?php
class DetalleCompra {
    
    protected $cod_familia;
    protected $cod_producto;
    protected $cod_compra;
	protected $cod_proveedor;
	protected $cantidad;
	protected $estado;
    
    public function __construct($cod_familia=null,$cod_producto=null,$cod_compra=null,$cod_proveedor=null,$cantidad=null,$estado=null) {
        $this->cod_familia=$cod_familia;
        $this->cod_producto=$cod_producto;
        $this->cod_compra=$cod_compra;
		$this->cod_proveedor=$cod_proveedor;
		$this->cantidad=$cantidad;
		$this->estado=$estado;
    }
    
    public function Ingresar() {
        $db = new Conexion();
		$db->query("INSERT INTO `detalle_compra`(`compra_proveedor_idproveedor`, `compra_idcompra`, `producto_categoria_cod_familias`, `producto_codigo_interno`, `cantidad`, `Estado_idEstado`, `fecha`) VALUES ($this->cod_proveedor,$this->cod_compra,$this->cod_familia,$this->cod_producto,$this->cantidad,2,'$fecha_hora_actual');");
    }
    
    public function Sumar() {
        $db = new Conexion();
		$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`+$this->cantidad WHERE codigo_interno=$this->cod_producto;");
    }
	
	 public function ActualizarEstado() {
		$fecha_hora_actual = date('Y-m-d H:i:s');
        $db = new Conexion();
		$db->query("UPDATE detalle_compra SET Estado_idEstado=$this->estado,fecha='$fecha_hora_actual' WHERE compra_idcompra=$this->cod_compra AND producto_codigo_interno=$this->cod_producto;");
		if ($this->estado == 4){
			$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`-$this->cantidad WHERE codigo_interno=$this->cod_producto;");
		} else if ($this->estado == 2) {
			$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`+$this->cantidad WHERE codigo_interno=$this->cod_producto;");
		}
    }
}

?>