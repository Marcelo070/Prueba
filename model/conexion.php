<?php 

class DB{
    

    public $db = "dbprueba";
    public $host = "localhost:3307";
    public $user = "root";
    public $passw = "cristhian123456";

    function conectar(){
        try{
            $conexion = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->passw);
            return $conexion;
        }
        catch(PDOException $e){
            echo "error ".$e;
        }
    }

    function Sentencia($sql){
        $con = $this->conectar();
        $stmt = $con->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    function SentenciaSimple($sql){
        $con = $this->conectar();
        $stmt = $con->query($sql);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    function Ejecutar($sql,$lista){
        $con = $this->conectar();
        $stmt=$con->prepare($sql);
        $stmt->execute($lista);
        
    }
}

?>