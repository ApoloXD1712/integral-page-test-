<?php
  include_once '../funciones/sesiones.php';
  include_once '../funciones/funciones.php';
  include_once '../templates/header.php';
  include_once '../templates/barra.php';
  include_once '../templates/navegacion.php';
?>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para crear un administrador</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="crear-admin" id="crear-admin" method="post" action="insertar-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo" required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario:</label>
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <label for="correo">Correo Electrónico:</label>
              <input type="email" class="form-control" id="correo" name="correo"placeholder="Correo" required>
            </div>
            <div class="form-group">
              <label for="contraseña">Contraseña:</label>
              <input type="password" class="form-control" id="contraseña" name="contraseña"placeholder="Contraseña" required>
            </div>
            <div class="form-group">
              <label for="contraseña">Repetir contraseña:</label>
              <input type="password" class="form-control" id="repetir-contraseña" name="repetir-contraseña" placeholder="Repite la contraseña" required>
              <span id="resultado_password" class="help-block"></span>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="agregar-admin" value="1">
              <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
          </form>
        </div>
        <!-- /.card-body -->

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once '../templates/footer.php';?>
