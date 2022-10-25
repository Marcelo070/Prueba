<?php 


require_once "../model/Galpon.php";
require_once "../model/Animal.php";



switch($_GET["operGalpon"]){
    case "insertar":
        $canGallina = (int)$_POST["txtCantidadGallinas"];
        $cantGallos = (int)$_POST["txtCantidadGallos"];
        $comida = (int)$_POST["selectComida"];
        $raza = (int)$_POST["selectRaza"];
        $trabajador = $_POST["txtTrabajador"];
        $lista = array($canGallina,$cantGallos,$comida,$raza,$trabajador);    
        Galp::Insertar($lista);
        header("Location:../view/galpon.php");
        break;
    case "editar":
        $id = (int)$_GET["idGalpon"];
        $cantGallina = (int)$_POST["txtCantidadGallinas"];
        $cantGallos = (int)$_POST["txtCantidadGallos"];
        $comida = (int)$_POST["selectComida"];
        $raza = (int)$_POST["selectRaza"];
        $trabajador = $_POST["txtTrabajador"];
        $lista = array($cantGallina,$cantGallos,$comida,$raza,$trabajador,$id);
        Galp::Editar($lista);
        header("Location:../view/galpon.php");
        break;
    case "eliminar":
        $id = $_GET["idGalpon"];
        Galp::Eliminar($id);
        header("Location:../view/galpon.php");
        break;
    case "buscar":
        $id = $_GET["idGalpon"];
        header("Location:../view/editarGalpon.php?idGalpon=$id");
        break;
}


switch($_GET["oper"]){

    case "insertar":
        $raza = $_POST["txtNombreRaza"];
        $vida = $_POST["txtTiempoVida"];
        $crecimiento = $_POST["txtCrecimiento"];
        $comida = $_POST["txtComida"];
        $peso = (int)$_POST["txtPeso"];
        $lista = array($raza,$vida,$crecimiento,$comida,$peso);
        Animal::Insertar($lista);
        header("Location:../view/animal.php");
    
    case "editar":
        $raza = $_POST["txtNombreRaza"];
        $vida = $_POST["txtTiempoVida"];
        $crecimiento = $_POST["txtCrecimiento"];
        $comida = $_POST["txtComida"];
        $peso = (int)$_POST["txtPeso"];
        $id = (int)$_GET["idAnimal"]; // id animal
        $lista = array($raza,$vida,$crecimiento,$comida,$peso,$id);
        Animal::Actualizar($lista);
        header("Location:../view/animal.php");
        break;
 
    case "eliminar":
        $id = (int)$_GET["idAnimal"];
        Animal::Eliminar($id);
        header("Location:../view/animal.php");
        break;

    case "buscar":
        $id = (int)$_GET["idAnimal"];
        header("Location:../view/editar.php?idAnimal=$id");
}


?>