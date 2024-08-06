<?php
  include_once '../funciones/sesiones.php';
  include_once '../funciones/funciones.php';
  include_once '../templates/header.php';
  include_once '../templates/barra.php';
  include_once '../templates/navegacion.php';
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lista de reuniones</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin_area.php">Inicio</a></li>
            <li class="breadcrumb-item active">Lista de reuniones</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Maneja las reuniones en esta sección</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Entidad</th>
                  <th>Plataforma</th>
                  <th>Link</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                        $sql = " SELECT * FROM reuniones ";
                        $result = $conn->query($sql);
                    } catch (\Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while($reunion = $result->fetch_assoc()){?>
                      <tr>
                        <td><?php echo $reunion['entidad'];?></td>
                        <td><?php echo $reunion['plataforma'];?></td>
                        <td><?php echo $reunion['url'];?></td>
                        <td><?php echo $reunion['fecha_inicio'];?></td>
                        <td><?php echo $reunion['fecha_fin'];?></td>
                        <td> <a href="reuniones/editar-reunion.php?id=<?php echo $reunion['id'];?>" class="btn bg-orange btn-flat margin">
                          <li class="fa fa-pencil"></li>
                        </a>
                        <a href="#" data-id="<?php echo $reunion['id']; ?>" data-tipo="reunion" class="btn bg-red btn-flat margin borrar_registro">
                          <li class="fa fa-trash"></li>
                        </a>
                      </td>
                      </tr>
                    <?php  }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Entidad</th>
                  <th>Plataforma</th>
                  <th>Link</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php include_once '../templates/footer.php';?>
