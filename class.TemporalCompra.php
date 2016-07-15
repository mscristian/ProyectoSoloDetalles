<?php
class TemporalCompra {
    
    protected $cod_familia;
    protected $cod_producto;
    protected $cod_compra;
    protected $producto;
    protected $familia;
    protected $precio;
	protected $cantidad;
    
    public function __construct($cod_familia=null,$cod_producto=null,$cod_compra=null,$producto=null,$familia=null,$cantidad=null,$precio=null) {
        $this->cod_familia=$cod_familia;
        $this->cod_producto=$cod_producto;
        $this->cod_compra=$cod_compra;
        $this->producto=$producto;
        $this->familia=$familia;
		$this->cantidad=$cantidad;
		$this->precio=$precio;
    }
    
    public function Ingresar(){
        $db = new Conexion();
		$db->query("INSERT INTO `temporal_compra`(`cod_categoria`, `cod_producto`, `codigo_compra`, `producto`, `familia`, `cantidad`, `precio`) VALUES ($this->cod_familia,$this->cod_producto,$this->cod_compra,'$this->producto','$this->familia',$this->cantidad,$this->precio);");

    }
    
    public function Imprimir(){
        echo  $this->cod_familia,
        $this->cod_producto,
        $this->cod_venta;
    }
    
    public function Limpiar() {
        $db = new Conexion();
		$db->query("DELETE FROM `temporal_compra` WHERE 1;");
    }

}

?>