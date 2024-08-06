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
            <h1>Editar teléfono de contacto</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Llena el formulario para crear un teléfono de contacto</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php
            $sql = " SELECT * FROM telefonos_contacto WHERE id = $id";
            $resultado = $conn->query($sql);
            $telefono = $resultado->fetch_assoc();
         ?>
        <form role="form" name="crear-telefono" id="crear-telefono" method="post" action="update-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="telefono">Teléfono:</label>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono de contacto" value="<?php echo $telefono['telefono']; ?>"required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del contacto" value="<?php echo $telefono['nombre']; ?>"required>
            </div>
            <div class="form-group">
              <label for="cargo">Cargo:</label>
              <input type="text" class="form-control" id="cargo" name="cargo"placeholder="Cargo del contacto" value="<?php echo $telefono['cargo']; ?>"required>
            </div>
            <div class="form-group">
              <label>Entidad: </label>
              <select id="entidad" name="entidad" placeholder="Entidad a la que pertenece el número" class="form-control select2" style="width: 100%;">
                <?php
                $sql2 = " SELECT * FROM casos_exito WHERE id = " . $_GET['id'];
                $ejecutar = $conn->query($sql2);
                while($caso = $ejecutar->fetch_assoc()){
                  echo '<option value="' .  $caso['id']. '"' .'>'. $caso['nombre'] .'</option>';
                }
                 ?>
                 <?php
                 $sql3 = " SELECT * FROM casos_exito WHERE id != " . $_GET['id'];
                 $ejecutar = $conn->query($sql3);
                 while($caso = $ejecutar->fetch_assoc()){
                   echo '<option value="' .  $caso['id']. '"' .'>'. $caso['nombre'] .'</option>';
                 }
                  ?>
              </select>
            </div>
          </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <input type="hidden" name="update-telefono" value="1">
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
