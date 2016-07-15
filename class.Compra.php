<?php
class Compra {
    
	protected $proveedorid;
	protected $total;
	protected $fecha;
	
	
    public function __construct($proveedorid,$total,$fecha) {
        $this->proveedorid=$proveedorid;
		$this->total=$total;
		$this->fecha=$fecha;
    }
    
    public function Ingresar() {
       $db = new Conexion();
		$db->query("INSERT INTO `compra`(`proveedor_idproveedor`,`total`,`fecha`) VALUES ($this->proveedorid,$this->total,'$this->fecha');");
		
    }
	public function Imprimir() {
		echo 
		$this->total_origianl,"<br/>",
		$this->total_real,"<br/>",
		$this->fecha,"<br/>";
	}

}

?>