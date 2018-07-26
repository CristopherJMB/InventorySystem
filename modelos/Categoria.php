<?php
// Incluimos la conexión a la base de datos
require "../config/Conexion.php";

Class categoria
{
  //Implementamos el constructor
  public function_construct()
  {

  }

  //Implementamos método para ingresar
  public function insetar($nombre,$descripcion)
  {
    $sql = "INSERT INTO categoria(nombre,descripcion,condicion)
    VALUES ('$nombre','$descripcion','1')";
    return ejecutarConsulta($sql);
  }

  //Implemetar método para editar registros
  public function editar($idcategoria,$nombre,$descripcion)
  {
    $sql = "UPDATE categoria SET nombre='$nombre',descripcion='$descripcion'
    WHERE idcategoria='$idcategoria' ";
    return ejecutarConsulta($sql);
  }

  //Implementar método para Desactivar categoria
  public function desactivar($idcategoria)
  {
    $sql = "UPDATE categoria SET condicion = '0' WHERE idcategoria='$idcategoria' ";
    return ejecutarConsulta($sql);
  }

  //Implementar método para Activar categoria
  public function activar($idcategoria)
  {
    $sql = "UPDATE categoria SET condicion = '1' WHERE idcategoria='$idcategoria' ";
    return ejecutarConsulta($sql);
  }

  //Implementar método para mostrar datos de un registro o modificarlos
  public function mostrar($idcategoria)
  {
    $sql = "SELECT * FROM categoria = '$idcategoria' ";
    return ejecutarConsultaSimpleFilas($sql);
  }

  //Implementar método para listar registros
  public function listar()
  {
    $sql = "SELECT * FROM categoria ";
    return ejecutarConsulta($sql);
  }
}
?>
