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
            <h1>Crear Reunión</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para crear una reunión</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="crear-reunion" id="crear-reunion" method="post" action="insertar-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="fecha">fecha:</label>
              <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha en la que tomará lugar el evento"required>
            </div>
            <div class="form-group">
              <label for="inicio">Hora de inicio:</label>
              <input type="time" class="form-control" id="inicio" name="inicio" placeholder="Hora de inicio de la reunión"required>
            </div>
            <div class="form-group">
              <label for="finalizacion">Hora de finalización:</label>
              <input type="time" class="form-control" id="finalizacion" name="finalizacion" placeholder="Hora de finalización de la reunión">
            </div>
            <div class="form-group">
              <label for="titulo">Entidad:</label>
              <input type="text" class="form-control" id="entidad" name="entidad" placeholder="Entidad que lleva a cabo la reunión"required>
            </div>
            <div class="form-group">
              <label for="link">Link:</label>
              <input type="text" class="form-control" id="link" name="link"placeholder="link de la reunión"required>
            </div>
            <div class="form-group">
              <label for="">Plataforma:</label>
              <textarea class="form-control"name="plataforma" id="plataforma" rows="8" cols="80" placeholder="Plataforma usada para la reunión"required></textarea>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="agregar-reunion" value="1">
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
