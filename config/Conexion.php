<?php
require_once "global.php";

$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query ($conexion, 'SET NAMES "'.DB_ENCODE.'"');

// Validar posibles erroes en la conexion
if (mysqli_connect_errno()) {
  printf ("Fallo de conexión a la Base de Datos: %s\n",mysqli_connect_errno());
  exit();
}

if (!function_exists('ejecutarConsulta'))
{
  function ejecutarConsulta($sql)
  {
    global $conexion;
    $query = $conexion->query($sql);
    return $query;
  }

  function ejecutarConsultaSimpleFilas($sql)
  {
    global $conexion;
    $query = $conexion->query($sql);
    $row = $query->fetch_assoc();
    return $row;
  }

  function ejecutarConsulta_retornarID($sql)
  {
    global $conexion;
    $query = $conexion->query($sql);
    return $conexion->insert_id;
  }

  function limpiarCadena($str)
  {
    global $conexion;
    $str = mysqli_real_scape_string($conexion,trim($srt));
    return htmlspecialchars($str);
  }
}
 ?>
