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
            <h1>Editar Módulo</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para editar un módulo</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
            $sql = " SELECT * FROM modulos WHERE id = $id ";
            $resultado = $conn->query($sql);
            $modulo = $resultado->fetch_assoc();
         ?>
        <form role="form" name="crear-modulo" id="crear-modulo" method="post" action="update-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del módulo" value="<?php echo $modulo['nombre']; ?>"required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción:</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del módulo"value="<?php echo $modulo['descripcion']; ?>"required>
            </div>
            <div class="form-group">
              <label for="imagen">imagen:</label>
              <input type="text" class="form-control" id="imagen" name="imagen"placeholder="Ruta de la imagen"value="<?php echo $modulo['imagen']; ?>"required>
            </div>
            <div class="form-group clearfix">
              <label for=""> Software:</label> <br>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="v5" name="v5" <?php if($modulo['software'] == 'v5' || $modulo['software'] != 'v6'){
                  echo "checked";
                } ?>>
                <label for="v5"> v5
                </label>
              </div><br>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="v6" name="v6" <?php if($modulo['software'] == 'v6' || $modulo['software'] != 'v5'){
                  echo "checked";
                } ?>>
                <label for="v6"> v6
                </label>
              </div>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="update-modulo" value="1">
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
