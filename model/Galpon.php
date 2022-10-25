<?php 



require_once "conexion.php";

class Galp{
    
    public function __construct()
    {
        
    }
    public static function Insertar($lista){
        $sql = "INSERT INTO galpon values(null,?,?,?,?,?)";
        $bd = new DB();
        return $bd->Ejecutar($sql,$lista);
    }

    public static function buscarGalpon($idgalpon){
        $bd = new DB();
        $sql = "SELECT * FROM galpon WHERE IDGALPON=$idgalpon";
        $data = $bd->Sentencia($sql);
        return $data;
    }
    public static function verGalpones(){
        $bd = new DB();
        $sql = "SELECT * FROM galpon";
        $data = $bd->Sentencia($sql);
        return $data;
    }

    public static function Eliminar($idgalpon){
        $bd = new DB();
        $sql = "DELETE FROM GALPON WHERE IDGALPON=$idgalpon";
        return $bd->Ejecutar($sql,null);
    }

    public static function Editar($lista){
        $bd = new DB();
        $sql = "UPDATE GALPON SET CANTGALLINAS=?,CANTGALLOS=?,COMIDAKG=?,IDRAZA=?,TRABAJADOR=? WHERE IDGALPON=?";
        $bd->Ejecutar($sql,$lista);
    }
}





?>