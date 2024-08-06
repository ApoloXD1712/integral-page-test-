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
            <h1>Editar Caso de éxito</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para editar un caso de éxito</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
            $sql = " SELECT * FROM casos_exito WHERE id = $id";
            $resultado = $conn->query($sql);
            $casoExito = $resultado->fetch_assoc();
         ?>
        <form role="form" name="crear-casoExito" id="crear-casoExito" method="post" action="update-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del módulo" value="<?php echo $casoExito['nombre'] ?>"required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción (opcional):</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del módulo" value="<?php echo $casoExito['descripcion'] ?>">
            </div>
            <div class="form-group">
              <label for="url">URL:</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="Página del cliente" value="<?php echo $casoExito['url'] ?>"required>
            </div>
            <div class="form-group">
              <label for="imagen">imagen:</label>
              <input type="text" class="form-control" id="imagen" name="imagen"placeholder="Ruta de la imagen" value="<?php echo $casoExito['imagen'] ?>"required>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
              <input type="hidden" name="update-casoExito" value="1">
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
