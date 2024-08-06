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
            <h1>Crear Caso de éxito</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para crear un caso de éxito</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="crear-casoExito" id="crear-casoExito" method="post" action="insertar-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del módulo" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción (opcional):</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del módulo">
            </div>
            <div class="form-group">
              <label for="url">URL:</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="Página del cliente"required>
            </div>
            <div class="form-group">
              <label for="imagen">imagen:</label>
              <input type="text" class="form-control" id="imagen" name="imagen"placeholder="Ruta de la imagen"required>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="agregar-casoExito" value="1">
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
