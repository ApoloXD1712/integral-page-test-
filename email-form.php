<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'templates/general-header.php'; ?>
    <link rel="stylesheet" href="css/alertify.min.css">
</head>

<body class="email-form">
    <title> Integral V6 | Petición de software </title>
    <header class="cw center">
        <h2>Formulario para solicitar el software</h2>
    </header>
    <main class="contenedor seccion contenido-centrado">
        <form method="post" name="emailform-2" class="form-email" action="templates/mail-template-2.php" onsubmit="return submitUserForm();">
        <p>Llena los siguientes datos y te contactaremos para que puedas usar nuestro software lo más pronto posible.</p>    
        <fieldset>
                <legend>Información Personal</legend>
                <label class="input-underlined">
                    <input id="msgName" name="msgName" type="text" required/>
                    <span class="input-placeholder">Nombre</span>
                    <span class="input-helper">Este campo es obligatorio</span>
                </label>
                <label class="input-underlined">
                    <input id="msgEmail" name="msgEmail" type="text" required multiple/>
                    <span class="input-placeholder">Email</span>
                    <span class="input-helper">Este campo es obligatorio</span>
                </label>
                <label class="input-underlined">
                    <input id="msgPhone" name="msgPhone" type="tel" required/>
                    <span class="input-placeholder">Teléfono</span>
                    <span class="input-helper">Este campo es obligatorio</span>
                </label>
                <textarea id="msgText" name="msgText" type="text" placeholder="¿Por qué estás interesado en nuestro software?"></textarea>
            </fieldset>

            <fieldset>
                <legend>Software</legend>
                <p>Arma tu paquete como quieras</p>
                <div class="dropdown-list">
                    <label for="msgVersion">Versión:</label>
                    <select id="msgVersion" name="msgVersion">
                        <?php
                        if ($_GET['producto'] == 'v5'){
                            echo  '<option value="v5">V5</option>';
                            echo  '<option value="v6">V6</option>';
                        }
                        else{
                            echo  '<option value="v6">V6</option>';
                            echo '<option value="v5">V5</option>';
                        }
                        ?>
                    </select>
                    <div class="arrow-1"></div>
                    <div class="arrow-2"></div>
                </div>
                
                <div class="flex-modulos">
                    <?php
                        include_once 'connect_db.php';
                        $sqlget = "SELECT nombre, descripcion, imagen, software FROM modulos";
                        $sqldata1 = mysqli_query($dbcon, $sqlget) or die('error getting data');
                        while ($temp = mysqli_fetch_array($sqldata1, MYSQLI_ASSOC)) {
                            if (strpos($temp['software'], $_GET['producto']) !== false) {
                                echo '<label class="checkbox-module">';
                            } else {
                                echo '<label class="checkbox-module display_none">';
                            }
                            echo '<input name="modules[]" id="modules" type="checkbox" value="'.$temp['nombre'].' '.$temp['software'].'">';
                            echo '<span class="checkmark">';
                            echo '<img src="img/modulos/'.$temp['imagen'].'" alt="'.$temp['nombre']."$".$temp['descripcion'].'">';
                            echo '</span>';
                            echo '</label>';
                        }
                    ?>
                </div>
            </fieldset>
            <div class="g-recaptcha" data-sitekey="6Lf7UKcZAAAAAEYeHlRCd_yEC2-0QpT-5Rcmk7uk"></div>
            <button class="button blue" type="submit">
                <p class="button-text">Enviar</p>
            </button>
        </form>

    </main>
    <div class="module-description display_none">
        <span>Título</span>
        <p>Texto</p>
    </div>
    <script src="js/form_correo.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="js/mail_notification.js"></script>
</body>
