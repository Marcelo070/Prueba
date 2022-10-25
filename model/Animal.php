<?php 

require_once "conexion.php";


class Animal{

    public function __construct()
    {
        
    }
    public static function Insertar($lista){
        $sql = " INSERT INTO tipoanimal values(null,?,?,?,?,?)" ;
        $bd = new DB();
        return $bd->Ejecutar($sql,$lista);
    }

    public static function verAnimales(){
        $sql = " SELECT * FROM tipoanimal";
        $bd = new DB();
        $data = $bd->Sentencia($sql);
        return $data;
    }

    public static function Eliminar($idAnimal){
        $sql = " DELETE FROM tipoanimal WHERE IDRAZA=$idAnimal";
        $bd = new DB();
        $bd->Ejecutar($sql,null);
    }
    public static function Actualizar($lista){
        $sql = " UPDATE tipoanimal set NOMBRERAZA=?, TIEMPOVIDA=?, TIEMPOCRECIMIENTO=?, ALIMENTACION=?, PESOIDEALKG=? where IDRAZA=?";
        $bd= new DB();
        $bd->Ejecutar($sql, $lista);
    }
    public static function BuscarAnimal($idAnimal)
    {
        $sql= " SELECT * FROM tipoanimal where IDRAZA=$idAnimal";
        $bd = new DB();
        $data = $bd->Sentencia($sql);
        return $data;
    }
}


?>