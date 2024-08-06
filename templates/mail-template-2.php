<?php
header("Location: ../email_confirmation");

$errors = '';
if (isset($_POST['submit']))
{
   $errors .= "Error: first, you must to fill the form";
}

if(empty($_POST['msgName']) || empty($_POST['msgEmail']) ||
   empty($_POST['msgText']) || empty($_POST['msgPhone']))
{
   $errors .= "\n Error: all fields are required";
}

$name = filter_var($_POST['msgName'], FILTER_SANITIZE_STRING);
$email =  filter_var($_POST['msgEmail'], FILTER_SANITIZE_STRING);
$message =  filter_var($_POST['msgText'], FILTER_SANITIZE_STRING);
$phone =  filter_var($_POST['msgPhone'], FILTER_SANITIZE_STRING);
$version =  filter_var($_POST['msgVersion'], FILTER_SANITIZE_STRING);

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
   $errors .= "\n Error: Invalid email address";
}

// if submitted check response
if (empty($_POST["g-recaptcha-response"])) {
   $errors .= "\n Error: missing captcha";
}

if(empty($errors))
{
   $to = "juan.diaz@integralv6.co";
   $subject = "¡$name está interesado/a en el software!";
   $body = "
      <h2>Alguien se interesó en $version desde la página de Productos de integralv6.co</h2>
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

   if(isset($_POST['modules'])) {
      $modules = $_POST['modules'];
      $body .= "
      <p>
         También mencionó su interés en los siguientes módulos:<br>\n
      ";
      foreach($modules as $selected) {
         $body .= "<b>$selected</b><br>\n";
      }
      $body .= "</p>";
   } else {
      $body .= "<p>No seleccionó módulos en los que esté particularmente interesado/a.</p>";
   }
   
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