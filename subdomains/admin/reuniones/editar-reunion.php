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
            <h1>Editar Reunión</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para editar una reunión</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
            $sql = " SELECT * FROM reuniones WHERE id = $id";
            $resultado = $conn->query($sql);
            $reunion = $resultado->fetch_assoc();
            $partes1 = explode(" ", $reunion['fecha_inicio']);
            $partes2 = explode(" ", $reunion['fecha_fin']);
         ?>
        <form role="form" name="crear-reunion" id="crear-reunion" method="post" action="update-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="fecha">fecha:</label>
              <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha en la que tomará lugar el evento" value = "<?php echo $partes1[0]; ?>"required>
            </div>
            <div class="form-group">
              <label for="inicio">Hora de inicio:</label>
              <input type="time" class="form-control" id="inicio" name="inicio" placeholder="Hora de inicio de la reunión" value = "<?php echo $partes1[1]; ?>"required>
            </div>
            <div class="form-group">
              <label for="finalizacion">Hora de finalización:</label>
              <input type="time" class="form-control" id="finalizacion" name="finalizacion" placeholder="Hora de finalización de la reunión" value = "<?php echo $partes2[1]; ?>">
            </div>
            <div class="form-group">
              <label for="titulo">Entidad:</label>
              <input type="text" class="form-control" id="entidad" name="entidad" placeholder="Entidad que lleva a cabo la reunión" value = "<?php echo $reunion['entidad']; ?>">
            </div>
            <div class="form-group">
              <label for="link">Link:</label>
              <input type="text" class="form-control" id="link" name="link" placeholder="link de la reunión" value = "<?php echo $reunion['url']; ?>"required>
            </div>
            <div class="form-group">
              <label for="link">Plataforma:</label>
              <input type="text" class="form-control" id="plataforma" name="plataforma" placeholder="Plataforma en la que tomará lugar la reunión" value = "<?php echo $reunion['plataforma']; ?>"required>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="update-reunion" value="1">
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
