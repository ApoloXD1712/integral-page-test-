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
            <h1>Crear Módulo</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para crear un módulo</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="crear-modulo" id="crear-modulo" method="post" action="insertar-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del módulo"required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción:</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del módulo"required>
            </div>
            <div class="form-group">
              <label for="imagen">imagen:</label>
              <input type="text" class="form-control" id="imagen" name="imagen"placeholder="Ruta de la imagen"required>
            </div>
            <div class="form-group clearfix">
              <label for=""> Software:</label> <br>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="v5" name="v5">
                <label for="v5"> v5
                </label>
              </div><br>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="v6" name="v6">
                <label for="v6"> v6
                </label>
              </div>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="agregar-modulo" value="1">
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
