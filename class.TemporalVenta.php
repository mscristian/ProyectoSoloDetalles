<?php
class TemporalV {
    
    protected $cod_familia;
    protected $cod_producto;
    protected $cod_venta;
    protected $producto;
    protected $familia;
    protected $precio;
	protected $cantidad;
    
    public function __construct($cod_familia=null,$cod_producto=null,$cod_venta=null,$producto=null,$familia=null,$precio=null,$cantidad=null) {
        $this->cod_familia=$cod_familia;
        $this->cod_producto=$cod_producto;
        $this->cod_venta=$cod_venta;
        $this->producto=$producto;
        $this->familia=$familia;
        $this->precio=$precio;
		$this->cantidad=$cantidad;
    }
    
    public function Ingresar(){
        $db = new Conexion();
		$db->query("INSERT INTO `temporal_venta`(`cod_categoria`, `cod_producto`, `codigo_venta`, `producto`, `familia`, `precio`, `cantidad`) VALUES ($this->cod_familia,$this->cod_producto,$this->cod_venta,'$this->producto','$this->familia',$this->precio,$this->cantidad);");
    }
    
    public function Imprimir(){
        echo  $this->cod_familia,
        $this->cod_producto,
        $this->cod_venta;
    }
    
    public function Limpiar() {
        $db = new Conexion();
		$db->query("DELETE FROM `temporal_venta` WHERE 1;");
    }

}

?>