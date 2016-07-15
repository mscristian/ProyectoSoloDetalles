<?php
class Detalle {
    
    protected $cod_familia;
    protected $cod_producto;
    protected $cod_venta;
    
    public function __construct($cod_familia,$cod_producto,$cod_venta) {
        $this->cod_familia=$cod_familia;
        $this->cod_producto=$cod_producto;
        $this->cod_venta=$cod_venta;
    }
    
    public function Ingresar() {
        $db = new Conexion();
		$db->query("INSERT INTO `detalle_venta`(`producto_categoria_cod_familias`, `Venta_idVenta`, `producto_codigo_interno`) VALUES ($this->cod_familia,$this->cod_venta,$this->cod_producto);");
    }
    
    public function Descontar() {
        $db = new Conexion();
		$db->query("UPDATE producto SET `cantidad_interna`=`cantidad_interna`-1 WHERE codigo_interno=$this->cod_producto;");
    }
}

?>