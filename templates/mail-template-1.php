<?php
header("Location: ../email_confirmation");

$errors = '';
if (isset($_POST['submit']))
{
   $errors .= "Error: first, you must to fill the form";
}

$name = filter_var($_POST['msgName'], FILTER_SANITIZE_STRING);
$email =  filter_var($_POST['msgEmail'], FILTER_SANITIZE_STRING);
$message =  filter_var($_POST['msgText'], FILTER_SANITIZE_STRING);
$phone =  filter_var($_POST['msgPhone'], FILTER_SANITIZE_STRING);

if(trim($name) == "" || trim($email) == "" || trim($message) == "" || trim($phone) == ""){
  $respuesta = array(
    'respuesta' => 'Asegurese de llenar todos los campos con datos válidos'
  );
  die(json_encode($respuesta));
}

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
  $respuesta = array(
    'respuesta' => 'Correo inválido'
  );
  die(json_encode($respuesta));}

// if submitted check response
if (empty($_POST["g-recaptcha-response"])) {
   $errors .= "\n Error: missing captcha";
}

if(empty($errors))
{
   $to = "juan.diaz@integralv6.co";
   $subject = "Nuevo registro: $name - $phone";
   $body = "
      <h2>Nueva pregunta en la página de Contacto de integralv6.co</h2>
      <h3>Datos personales</h3>
      <p>
         Nombre completo: $name<br>
         Correo: $email<br>
         Teléfono: $phone
      </p>
      <p>
      Escribió el siguiente mensaje para la empresa: <i>$message</i>
      </p>
   ";

   // Para el envío en formato HTML
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-type: text/html; charset=utf-8\r\n";

   // Remitente
   $headers .= "From: Formulario de Contacto <contacto-no-reply@integralv6.co>\r\n";

   // Reenvio al Remitente
   $headers .= "Reply-To: $email \r\n";
   mail($to, $subject, $body, $headers);
}
?>
