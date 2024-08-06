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
            <h1>Editar Noticia</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para editar una noticia</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
            $sql = " SELECT * FROM noticias WHERE id = $id";
            $resultado = $conn->query($sql);
            $noticia = $resultado->fetch_assoc();
         ?>
        <form role="form" name="crear-noticia" id="crear-noticia" method="post" action="update-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="titulo">Título:</label>
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de la noticia" value="<?php echo $noticia['titulo']; ?>"required>
            </div>
            <div class="form-group">
              <label for="url">URL:</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="URL o Link de la noticia"value="<?php echo $noticia['url']; ?>"required>
            </div>
            <div class="form-group">
              <label for="imagen">imagen:</label>
              <input type="text" class="form-control" id="imagen" name="imagen" placeholder="imagen de la noticia" value="<?php echo $noticia['imagen']; ?>"required>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="hidden" name="update-noticia" value="1">
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
