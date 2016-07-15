<?php
class Venta {
    
	protected $total_origianl;
	protected $total_real;
	protected $fecha;
	protected $id;
	
	
    public function __construct($id,$total_origianl,$total_real,$fecha) {
		$this->id = $id;
        $this->total_origianl=$total_origianl;
		$this->total_real=$total_real;
		$this->fecha=$fecha;
    }
    
    public function Ingresar() {
       $db = new Conexion();
		$db->query("INSERT INTO `venta`(`cliente_idcliente`,`total_original`, `total_real`,`fecha`) VALUES ($this->id,$this->total_origianl,$this->total_real,'$this->fecha');");
		
    }
	public function Imprimir() {
		echo 
		$this->total_origianl,"<br/>",
		$this->total_real,"<br/>",
		$this->fecha,"<br/>";
	}

}

?>