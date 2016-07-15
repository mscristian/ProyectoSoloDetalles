<?php
class Producto {
	
	public $familia;
	protected $cant;
	protected $precio;
	protected $estado;
	protected $nombre;
    // $categoria = new Categoria();
	
	public function __construct($cant=null,$precio=null,$estado=null,$nombre=null){
		$this->cant = $cant;
		$this->precio = $precio;
		$this->estado = $estado;
		$this->nombre = $nombre;
		$this->familia = array();
        //$this->nombreO = array();
	}
	
	public function Ingresar(){
        $vec=$this->familia;
        $x=$vec[0]->getFamilia();
		$db = new Conexion();
		$db->query("INSERT INTO `producto`(`categoria_cod_familias`,`nombre_prod`, `cantidad_interna`, `precio`, `estado`) VALUES ('$x','$this->nombre',$this->cant,$this->precio,'$this->estado');");
	}

    /*
    ,'$x'
    INSERT INTO `producto`(`codigo_interno`, `categoria_cod_familias`, `cantidad_interna`, `precio`, `estado`,`nombre_prod`) VALUES (0,1,20,85000,'activo','Osos medianos')
    
    */
	
	public function Imprimir(){
        $vec=$this->familia;
        //echo $vec[0]->getFamilia();
		echo "cantidad",$this->cant,"<br>",
		"Precio",$this->precio,"<br>",
		"Estado",$this->estado,"<br>",
		"Nombre",$this->nombre,"<br>",
        "familia",$vec[0],"<br>"
		/*"Codigo",$this->codigoP,"<br>"*/;
	}
	
	public function Modificar(){
        $vec=$this->familia;
        $x=$vec[0];
        $p=$vec[1];
		$db = new Conexion();
		$db->query("UPDATE producto SET `nombre_prod`='$this->nombre',`categoria_cod_familias`='$x',`cantidad_interna`=$this->cant,`precio`=$this->precio,`estado`='$this->estado' WHERE nombre_prod='$p';");
	}
	/*UPDATE `producto` SET `nombre_prod`='Perros Medianos',`categoria_familia`='Perros',`cantidad_interna`=35,`precio`=0,`estado`='activo' WHERE nombre_prod='perros l'*/
	public function Desactivar(){
		
	}
    
    public function getFamilia(){
        return $this->familia;
    }
}
?>