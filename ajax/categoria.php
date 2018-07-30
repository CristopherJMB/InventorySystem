<?php
require_once "../modelos/Categoria.php";

$categoria = new Categoria();

$idcategoria = isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]) {
  case 'guardaryeditar':
    if (empty($idcategoria)) {
      $rspta = $categoria->insertar($nombre,$descripcion);
      echo $rspta ? "Categoría registrada" : "Categorría no se pudo registrar";
    } else {
      $rspta = $categoria->editar($idcategoria,$nombre,$descripcion);
      echo $rspta ? "Categoría actualizada" : "Categorría no se pudo actualizar";
    }
  break;

  case'desactivar':
      $rspta = $categoria->desactivar($idcategoria);
      echo $rspta ? "Categoría desactivada" : "Categoría no se pudo desactivar";
  break;

  case'activar':
      $rspta = $categoria->activar($idcategoria);
      echo $rspta ? "Categoría activada" : "Categoria no se pudo activar";
  break;

  case'mostrar':
      $rspta = $categoria->mostar($idcategoria);
      // Codificamos el resultado con un JSON
      echo json_encode($rspta);
  break;

  case'listar':
      $rspta = $categoria->listar();
      // Declaramos un Array
      $data = Array();

      while ($reg =$rspta->fetch_object()){
        $data[] = array(
          "0" => $reg->idcategoria,
          "1" => $reg->nombre,
          "2" => $reg->descripcion,
          "3" => $reg->condicion
        );
      }

      $results = array(
        "sEcho"=>1, //Información recibida para las tablas
        "iTotalRecords"=>count($data), // Enviamos el total de registros al datatable
        "iTotalDisplayRecords"=>count($data),//Enviamos el total de registros para visualizar
        "aaData"=>$data
      );

      echo json_encode($results);

  break;
}
 ?>
