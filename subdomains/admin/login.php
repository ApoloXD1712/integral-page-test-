<?php
  session_start();
  if(isset($_GET['cerrar_sesion'])){
    session_destroy();
  }
  if(isset($_SESSION['usuario'])){
    header('Location:admin_area.php');
    exit();
  }
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
?>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index.php"> <img src="../../img/logos/blue-logo-integral.svg" alt="logo integral">  </a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Ingrese Usuario y Contraseña para iniciar sesión</p>
          <form action="insertar-admin.php" name="login-admin_form" id="login-admin" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="usuario" placeholder="Usuario">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-12 ">
                <input type="hidden" name="login-admin" value="1">
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>

<?php include_once 'templates/footer.php';?>
