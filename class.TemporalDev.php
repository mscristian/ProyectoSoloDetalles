<?php
class TemporalDev {
    
    protected $idEstado;
    protected $idDetalle;

    public function __construct($idEstado,$idDetalle) {
        $this->idEstado=$idEstado;
        $this->idDetalle=$idDetalle;
    }
    
    public function Ingresar(){
        $db = new Conexion();
		$db->query("INSERT INTO `temporal_ce`(`idEstado`, `idDetalle`) VALUES ($this->idEstado,$this->idDetalle);");
    }
    
    public function Imprimir(){
        echo 
        $this->idEstado,
        $this->idDetalle;
    }
    
    public function Limpiar() {
        $db = new Conexion();
		$db->query("DELETE FROM `temporal_ce` WHERE 1;");
    }

}

?>