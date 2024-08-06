<?php
  include_once '../funciones/sesiones.php';
  include_once '../funciones/funciones.php';
  include_once '../templates/header.php';
  $id = $_GET['id'];
  if(!filter_var($id, FILTER_VALIDATE_INT)){
    die("error");
  }
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
            <h1>Editar Administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para Editar los datos de un administrador </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
            $sql = " SELECT * FROM administradores WHERE id_admin = $id";
            $resultado = $conn->query($sql);
            $admin = $resultado->fetch_assoc();
         ?>
        <form role="form" name="editar-admin" id="editar-admin" method="post" action="update-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo" value="<?php echo $admin['nombre']; ?>"required>
            </div>
            <div class="form-group">
              <label for="usuario">Usuario:</label>
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']; ?>"required>
            </div>
            <div class="form-group">
              <label for="correo">Correo Electrónico:</label>
              <input type="email" class="form-control" id="correo" name="correo"placeholder="Correo" value="<?php echo $admin['correo']; ?>"required>
            </div>
            <div class="form-group">
              <label for="contraseña">Contraseña:</label>
              <input type="password" class="form-control" id="contraseña" name="contraseña"placeholder="Contraseña">
            </div>
            <div class="form-group">
              <label for="contraseña">Repetir contraseña:</label>
              <input type="password" class="form-control" id="repetir-contraseña" name="repetir-contraseña" placeholder="Repite la contraseña">
              <span id="resultado_password" class="help-block"></span>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="update-admin" value="1">
              <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
              <button type="submit" class="btn btn-primary">Confirmar</button>
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
