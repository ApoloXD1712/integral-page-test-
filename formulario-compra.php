<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="David Calle González y Juan Sebastián Diaz Osorio" />
    <meta name="copyright" content="David Calle González y Juan Sebastián Diaz Osorio" />
    <meta name="robots" content="nofollow"/>
    <link rel="shortcut icon" href="img/logos/blue-logo-v6.svg" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <link rel="normalize" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/styles.css?version=1">
    <script src="https://kit.fontawesome.com/395f2902dc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body class="email-form">
    <title> Integral V6 | Petición de software </title>
    <header class="cw center">
        <h2>Formulario para solicitar el software</h2>
    </header>
    <main class="contenedor seccion contenido-centrado">
        <form class="form-email" action="">
        <p>Llena los siguientes datos y te contactaremos para que puedas usar nuestro software lo más pronto posible.</p>    
        <fieldset>
                <legend>Información Personal</legend>
                <label class="input-underlined">
                    <input id="name" name="name" type="text" required/>
                    <span class="input-placeholder">Nombre</span>
                    <span class="input-helper">Este campo es obligatorio</span>
                </label>
                <label class="input-underlined">
                    <input id="email" name="email" type="text" required multiple/>
                    <span class="input-placeholder">Email</span>
                    <span class="input-helper">Este campo es obligatorio</span>
                </label>
                <label class="input-underlined">
                    <input id="phone" name="phone" type="tel" required/>
                    <span class="input-placeholder">Teléfono</span>
                    <span class="input-helper">Este campo es obligatorio</span>
                </label>
                <textarea id="text" name="text" type="text" placeholder="¿Por qué estás interesado en nuestro software?"></textarea>
            </fieldset>

            <fieldset>
                <legend>Software</legend>
                <p>Arma tu paquete como quieras</p>
                <div class="dropdown-list">
                    <label for="opciones">Versión:</label>
                    <select id="opciones">
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
                    <span class="arrow">▼</span>
                </div>
                
                <div class="grid modulos">
                    <?php
                        include_once 'connect_db.php';
                        $sqlget = "SELECT nombre, descripcion, imagen FROM modulos";
                        $sqldata1 = mysqli_query($dbcon, $sqlget) or die('error getting data');
                        while ($temp = mysqli_fetch_array($sqldata1, MYSQLI_ASSOC)) {
                            echo '<label class="checkbox-module">';
                            echo '<input type="checkbox">';
                            echo '<span class="checkmark">';
                            echo '<img src="img/modulos/'.$temp['imagen'].'" alt="'.$temp['nombre']."$".$temp['descripcion'].'">';
                            echo '</span>';
                            echo '</label>';
                        }
                    ?>
                </div>
            </fieldset>
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
</body>
