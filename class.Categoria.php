<?php
class Categoria {

	protected $familia;
	protected $descripcion;
	protected $cantidad;
	
	public function __construct($familia=null,$descripcion=null) {
		$this->familia = $familia;
		$this->descripcion = $descripcion;
		//$this->cantidad = CalcularCantidad();
	}
	
	public function Ingresar(){
		$db = new Conexion();
		$db->query("INSERT INTO `categoria`(`familia`, `descripcion`, `existencia_total`) VALUES ('$this->familia','$this->descripcion',0);");
	}
	
	public function CalcularCantidad(){
		return 1;
	}
	
	public function Modificar(){
		$db = new Conexion();
		$db->query("UPDATE categoria SET familia='$this->familia',descripcion='$this->descripcion' WHERE familia='$this->familia';");		
	}
	
	public function Desactivar(){
		return 1;
	}
    
    public function getFamilia(){
        return $this->familia;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function getCantidad(){
        return $this->cantidad;
    }
    
    public function setFamilia($familia)
    {
        $this->familia= $familia;
    }

}
?>