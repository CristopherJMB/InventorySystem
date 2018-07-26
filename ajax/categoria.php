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
    // code...
    break;

  case'activar':
      // code...
      break;

  case'mostrar':
        // code...
        break;

  case'listar':
          // code...
          break;
}
 ?>
