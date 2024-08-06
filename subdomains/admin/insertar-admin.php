<?php
if(isset($_POST['agregar-admin'])) {


  $usuario = $_POST['usuario'];
  $nombre = $_POST['nombre'];
  $password = $_POST['contraseña'];
  $correo = $_POST['correo'];
  $opciones = array(
    'cost' => 12
  );
  if(!trim($usuario) || !trim($nombre) || !trim($password) || !trim($correo) ){
    $respuesta = array(
      'respuesta' => 'error',
      'admin' => $id_registro
    );
    die(json_encode($respuesta));
  }
  $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
  try{
    include_once 'funciones/funciones.php';
    $stmt = $conn->prepare("INSERT INTO administradores VALUES (NULL, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $usuario, $nombre, $correo, $password_hashed);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0){
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
?>

<?php
 if(isset($_POST['agregar-reunion'])) {
   $fecha = $_POST['fecha'];
   $inicio = $fecha . " " . $_POST['inicio'];
   $finalizacion = $fecha . " " . $_POST['finalizacion'];
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
         $stmt = $conn->prepare("INSERT INTO reuniones VALUES (NULL, ?, ?, ?, ?, NULL)");
         $stmt->bind_param("ssss", $entidad, $plataforma, $link, $inicio);
         $stmt->execute();
         $id_registro = $stmt->insert_id;
         if($id_registro > 0){
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
         $stmt = $conn->prepare("INSERT INTO reuniones VALUES (NULL, ?, ?, ?, ?, ?)");
         $stmt->bind_param("sssss", $entidad, $plataforma, $link, $inicio, $finalizacion);
         $stmt->execute();
         $id_registro = $stmt->insert_id;
         if($id_registro > 0){
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
 if(isset($_POST['agregar-modulo'])) {
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
     $stmt = $conn->prepare("INSERT INTO modulos VALUES (NULL, ?, ?, ?, ?)");
     $stmt->bind_param("ssss",$nombre, $descripcion, $imagen, $software);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($id_registro > 0){
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
 ?>

 <?php
 if(isset($_POST['agregar-noticia'])) {
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
     $stmt = $conn->prepare(" INSERT INTO noticias VALUES (NULL, ?, ?, ?) ");
     $stmt->bind_param("sss",$titulo, $url, $imagen);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($id_registro > 0){
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
 ?>

 <?php
 if(isset($_POST['agregar-casoExito'])) {
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
     $stmt = $conn->prepare(" INSERT INTO casos_exito VALUES (NULL, ?, ?, ?, ?) ");
     $stmt->bind_param("ssss",$nombre, $descripcion, $url, $imagen);
     $stmt->execute();
     $id_registro = $stmt->insert_id;
     if($id_registro > 0){
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
 ?>

 <?php
 if(isset($_POST['agregar-telefono'])) {
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
     $stmt = $conn->prepare(" INSERT INTO telefonos_contacto VALUES (?, ?, ?, ?) ");
     $stmt->bind_param("isss", $entidad, $telefono, $nombre, $cargo);
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
         'respuesta' => 'aqui llega',
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
   if(isset($_POST['login-admin'])) {
     $usuario = filter_var($_POST["usuario"], FILTER_SANITIZE_STRING);
     $contraseña = filter_var($_POST["contraseña"], FILTER_SANITIZE_STRING);

     try{
       include_once 'funciones/funciones.php';
       $stmt = $conn->prepare("SELECT * FROM administradores where usuario = ?;");
       $stmt->bind_param("s", $usuario);
       $stmt->execute();
       $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $correo_admin, $password_admin, $editado);
       if($stmt->affected_rows){
         $existe = $stmt->fetch();
         if($existe){
           if(password_verify($contraseña, $password_admin)){
             session_start();
             $_SESSION['nombre'] = $nombre_admin;
             $_SESSION['usuario'] = $usuario_admin;
             $respuesta = array( "respuesta" => "si");
           }
           else{
             $respuesta = array( "respuesta" => "error");
           }
         }
         else{
           $respuesta = array( "respuesta" => "error");
         }
       }
       $stmt->close();
       $conn->close();
     }
     catch(Exception $e){
     echo "Error: " . $e->getMessage();
     }
     die(json_encode($respuesta));
   }
  ?>
