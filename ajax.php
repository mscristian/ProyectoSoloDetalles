<?php
include('class.Conexion.php');
class Ajax {
    
    public $buscador;
    
    public function Buscar($a){
        $db = new Conexion();
        $this->buscador = $db->real_escape_string($a);
        
        $sql = $db->query("SELECT nombre_prod,precio,estado,cantidad_interna,familia,descripcion,existencia_total FROM producto,categoria WHERE nombre_prod LIKE '%$this->buscador%' AND cod_familias=categoria_cod_familias;");
        
        while($array = $db->recorrer($sql)){
            $resultado[] = $array['nombre_prod'];
        }
        
        return $resultado;
    }
}

$busqueda = new Ajax();
echo json_encode($busqueda->Buscar($_GET['term']));

?>