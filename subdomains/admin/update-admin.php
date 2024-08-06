<?php
if(isset($_POST['update-admin'])) {
  $id = $_POST['id_registro'];
  $usuario = $_POST['usuario'];
  $nombre = $_POST['nombre'];
  $password = $_POST['contraseña'];
  $correo = $_POST['correo'];
  $opciones = array(
    'cost' => 12
  );
  if(!trim($usuario) || !trim($nombre) || !trim($correo) ){
    $respuesta = array(
      'respuesta' => 'error',
      'admin' => $id_registro
    );
    die(json_encode($respuesta));
  }
  if(!trim($_POST['contraseña'])){
    try{
      include_once 'funciones/funciones.php';
      $stmt = $conn->prepare("UPDATE administradores SET usuario = ?, nombre = ?, correo = ?, editado = NOW() WHERE id_admin = ?");
      $stmt->bind_param("sssi", $usuario, $nombre, $correo, $id);
      $stmt->execute();
      $id_registro = $stmt->insert_id;
      if($stmt->affected_rows){
        $respuesta = array(
          'respuesta' => 'exito',
          'admin' => $id_registro
        );
        die(json_encode($respuesta));
      }
      else{
        $respuesta = array(
          'respuesta' => 'error',
          'admin' => $id_registro
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
  else{
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    try{
      include_once 'funciones/funciones.php';
      $stmt = $conn->prepare("UPDATE administradores SET usuario = ?, nombre = ?, correo = ?, password = ?, editado = NOW() WHERE id_admin = ?");
      $stmt->bind_param("ssssi", $usuario, $nombre, $correo, $password_hashed, $id);
      $stmt->execute();
      $id_registro = $stmt->insert_id;
      if($stmt->affected_rows){
        $respuesta = array(
          'respuesta' => 'exito',
          'admin' => $id_registro
        );
        die(json_encode($respuesta));
      }
      else{
        $respuesta = array(
          'respuesta' => 'error',
          'admin' => $id_registro
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
}
?>


<?php
 if(isset($_POST['update-reunion'])){
   if((!isset($_POST['fecha'])) || (!isset($_POST['inicio']))) {
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }
   $id = $_POST['id_registro'];
   $fecha = $_POST['fecha'];
   $inicio = $fecha . " " . $_POST['inicio'];
   if(isset($_POST['finalizacion']) ){
     $finalizacion = $fecha . " " . $_POST['finalizacion'];
   }
   $entidad = $_POST['entidad'];
   $link = $_POST['link'];
   $plataforma = $_POST['plataforma'];

   if(!trim($fecha) || !trim($inicio) || !trim($entidad) || !trim($link) || !trim($plataforma) ){
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }

   try{
     if(empty($_POST['finalizacion'])){
         include_once 'funciones/funciones.php';
         $stmt = $conn->prepare("UPDATE reuniones SET entidad = ?,plataforma = ?, url = ?, fecha_inicio = ? WHERE id = ?");
         $stmt->bind_param("ssssi", $entidad, $plataforma, $link, $inicio, $id);
         $stmt->execute();
         $id_registro = $stmt->insert_id;
         if($stmt->affected_rows){
           $respuesta = array(
             'respuesta' => 'exito',
             'admin' => $id_registro
           );
           die(json_encode($respuesta));
         }
         else{
           $respuesta = array(
             'respuesta' => 'error',
             'admin' => $id_registro
           );
           die(json_encode($respuesta));
         }
         $stmt->close();
         $conn->close();
     }
     else{
         include_once 'funciones/funciones.php';
         $stmt = $conn->prepare("UPDATE reuniones SET entidad = ?,plataforma = ?, url = ?, fecha_inicio = ?, fecha_fin = ? WHERE id = ?");
         $stmt->bind_param("sssssi", $entidad, $plataforma, $link, $inicio, $finalizacion, $id);
         $stmt->execute();
         $id_registro = $stmt->insert_id;
         if($stmt->affected_rows){
           $respuesta = array(
             'respuesta' => 'exito',
             'admin' => $id_registro
           );
           die(json_encode($respuesta));
         }
         else{
           $respuesta = array(
             'respuesta' => 'error',
             'admin' => $id_registro
           );
           die(json_encode($respuesta));
         }
         $stmt->close();
         $conn->close();
     }
   }
   catch(Exception $e){
     echo "Error: " . $e->getMessage();
   }
 }
 ?>

 <?php
 if(isset($_POST['update-modulo'])) {
   $id = $_POST['id_registro'];
   $nombre = $_POST['nombre'];
   $descripcion = $_POST['descripcion'];
   $imagen = $_POST['imagen'];
   $v5 = $_POST['v5'];
   $v6 = $_POST['v6'];
   if(!($v5 || $v6)){
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }
   if(!trim($nombre) || !trim($descripcion) || !trim($imagen)){
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }
   $software = "";
   if($v5 && $v6){
     $software = 'v5-v6';
   }
   else if($v5){
     $software = 'v5';
   }
   else{
     $software = 'v6';
   }

   try{
     include_once 'funciones/funciones.php';
     $stmt = $conn->prepare("UPDATE modulos SET nombre=?, descripcion=?, imagen=?, software=?  WHERE id = ?");
     $stmt->bind_param("ssssi",$nombre, $descripcion, $imagen, $software, $id);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($stmt->affected_rows){
       $respuesta = array(
         'respuesta' => 'cambiado',
         'admin' => $id_registro
       );
       die(json_encode($respuesta));
     }
     else{
       $respuesta = array(
         'respuesta' => 'error',
         'admin' => $id_registro
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

 <?php
 if(isset($_POST['update-noticia'])) {
   $id = $_POST['id_registro'];
   $titulo = $_POST['titulo'];
   $url = $_POST['url'];
   $imagen = $_POST['imagen'];
   if(!trim($titulo) || !trim($url) || !trim($imagen)){
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }

   try{
     include_once 'funciones/funciones.php';
     $stmt = $conn->prepare(" UPDATE noticias SET  titulo=?, url=?, imagen=? WHERE id = ? ");
     $stmt->bind_param("sssi",$titulo, $url, $imagen, $id);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($stmt->affected_rows){
       $respuesta = array(
         'respuesta' => 'cambiado',
         'admin' => $id_registro
       );
       die(json_encode($respuesta));
     }
     else{
       $respuesta = array(
         'respuesta' => 'error',
         'admin' => $id_registro
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

 <?php
 if(isset($_POST['update-casoExito'])) {
   $id = $_POST['id_registro'];
   $nombre = $_POST['nombre'];
   $descripcion = $_POST['descripcion'];
   $url = $_POST['url'];
   $imagen = $_POST['imagen'];

   if(!trim($nombre) || !trim($imagen) || !trim($url)){
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }

   try{
     include_once 'funciones/funciones.php';
     $stmt = $conn->prepare(" UPDATE casos_exito SET  nombre=?, descripcion=?, url=?, imagen=? WHERE id = ? ");
     $stmt->bind_param("ssssi",$nombre, $descripcion, $url, $imagen, $id);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($stmt->affected_rows){
       $respuesta = array(
         'respuesta' => 'cambiado',
         'admin' => $id_registro
       );
       die(json_encode($respuesta));
     }
     else{
       $respuesta = array(
         'respuesta' => 'error',
         'admin' => $id_registro
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

 <?php
 if(isset($_POST['update-telefono'])) {
   $id = $_POST['id_registro'];
   $telefono = $_POST['telefono'];
   $nombre = $_POST['nombre'];
   $cargo = $_POST['cargo'];
   $entidad = $_POST['entidad'];

   if(!trim($nombre) || !trim($telefono) || !trim($cargo) || !trim($entidad)){
     $respuesta = array(
       'respuesta' => 'error',
       'admin' => $id_registro
     );
     die(json_encode($respuesta));
   }

   try{
     include_once 'funciones/funciones.php';
     $stmt = $conn->prepare(" UPDATE telefonos_contacto SET id = ?, telefono= ?, nombre=?,cargo = ? WHERE id = ?");
     $stmt->bind_param("isssi", $entidad, $telefono, $nombre, $cargo, $id);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($stmt->affected_rows){
       $respuesta = array(
         'respuesta' => 'cambiado',
         'admin' => $id_registro
       );
       die(json_encode($respuesta));
     }
     else{
       $respuesta = array(
         'respuesta' => 'error',
         'admin' => $id_registro
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
