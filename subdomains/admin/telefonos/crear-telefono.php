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
            <h1>Crear teléfono de contacto</h1>
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
        <form role="form" name="crear-telefono" id="crear-telefono" method="post" action="insertar-admin.php">
          <div class="card-body">
            <div class="form-group">
              <label for="telefono">Teléfono:</label>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono de contacto"required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del contacto"required>
            </div>
            <div class="form-group">
              <label for="cargo">Cargo:</label>
              <input type="text" class="form-control" id="cargo" name="cargo"placeholder="Cargo del contacto"required>
            </div>
            <div class="form-group">
              <label>Entidad: </label>
              <select id="entidad" name="entidad" placeholder="Entidad a la que pertenece el número" class="form-control select2" style="width: 100%;">
                <option value="">--Elija una entidad--</option>
                <?php
                $sql = " SELECT * FROM casos_exito ";
                $ejecutar = $conn->query($sql);
                while($caso = $ejecutar->fetch_assoc()){
                  echo '<option value="' .  $caso['id']. '"' .'>'. $caso['nombre'] .'</option>';
                }
                 ?>
              </select>
            </div>
          </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <input type="hidden" name="agregar-telefono" value="1">
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
