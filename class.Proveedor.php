<?php
class Proveedor {

	protected $nombre;
	protected $calificacion;
	protected $email;
	protected $telefonof;
	protected $telefonoc;
	protected $id;
	
	
	public function __construct($nombre,$calificacion,$email,$telefonof,$telefonoc,$id=null) {
		$this->nombre = $nombre;
		$this->calificacion = $calificacion;
		$this->email = $email;
		$this->telefonof = $telefonof;
		$this->telefonoc = $telefonoc;
		$this->id = $id;
	}
	
	public function Ingresar(){
		$db = new Conexion();
		$db->query("INSERT INTO `proveedor`(`nombre`, `calificacion`, `correo`, `telefono_f`, `telefono_c`) VALUES ('$this->nombre',$this->calificacion,'$this->email',$this->telefonof,$this->telefonoc);");
	}
	
	public function Modificar(){
		$db = new Conexion();
		$db->query("UPDATE proveedor SET nombre='$this->nombre',calificacion='$this->calificacion',correo='$this->email',telefono_f='$this->telefonof',telefono_c='$this->telefonoc' WHERE idproveedor='$this->id';");		
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