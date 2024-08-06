<?php
if($_POST['tabla'] == 'noticia'){
  try{
    $id = $_POST['id'];
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare( "DELETE FROM noticias WHERE id = ? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows){
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id
      );
      die(json_encode($respuesta));
    }
    else{
      $respuesta = array(
        'respuesta' => 'error'
      );
      die(json_encode($respuesta));
    }
    $stmt->close();
    $conn->close();
  }
  catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
}

if($_POST['tabla'] == 'admin'){
  try{
    $id = $_POST['id'];
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare( "DELETE FROM administradores WHERE id_admin = ? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows){
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id
      );
      die(json_encode($respuesta));
    }
    else{
      $respuesta = array(
        'respuesta' => 'error'
      );
      die(json_encode($respuesta));
    }
    $stmt->close();
    $conn->close();
  }
  catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
}

if($_POST['tabla'] == 'casoExito'){
  try{
    $id = $_POST['id'];
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare( "DELETE FROM casos_exito WHERE id = ? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows){
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id
      );
      die(json_encode($respuesta));
    }
    else{
      $respuesta = array(
        'respuesta' => 'error'
      );
      die(json_encode($respuesta));
    }
    $stmt->close();
    $conn->close();
  }
  catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
}

if($_POST['tabla'] == 'modulo'){
  try{
    $id = $_POST['id'];
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare( "DELETE FROM modulos WHERE id = ? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows){
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id
      );
      die(json_encode($respuesta));
    }
    else{
      $respuesta = array(
        'respuesta' => 'error'
      );
      die(json_encode($respuesta));
    }
    $stmt->close();
    $conn->close();
  }
  catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
}

if($_POST['tabla'] == 'reunion'){
  try{
    $id = $_POST['id'];
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare( "DELETE FROM reuniones WHERE id = ? ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows){
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id
      );
      die(json_encode($respuesta));
    }
    else{
      $respuesta = array(
        'respuesta' => 'error'
      );
      die(json_encode($respuesta));
    }
    $stmt->close();
    $conn->close();
  }
  catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
}

if($_POST['tabla'] == 'telefono'){
  try{
    $id = $_POST['id'];
    $telefono = $_POST['telefono'];
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare( "DELETE FROM telefonos_contacto WHERE id = ? AND telefono = ? ");
    $stmt->bind_param("is", $id, $telefono);
    $stmt->execute();
    if($stmt->affected_rows){
        $respuesta = array(
            'respuesta' => "exito",
            'id_eliminado' => $id,
            'telefono_eliminado' => $telefono
          );
          die(json_encode($respuesta));
    }
    else{
      $respuesta = array(
        'respuesta' => 'error'
      );
      die(json_encode($respuesta));
    }
    $stmt->close();
    $conn->close();
  }
  catch(Exception $e){
    echo "Error: " . $e->getMessage();
  }
}

?>
