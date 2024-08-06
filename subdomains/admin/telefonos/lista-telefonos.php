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
          <h1>Lista de Teléfonos de contacto</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin_area.php">Inicio</a></li>
            <li class="breadcrumb-item active">Lista de telefonos de contacto</li>
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
              <h3 class="card-title">Maneja a los telefonos de contacto en esta sección</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Teléfono</th>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Entidad</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    try {
                        $sql = " SELECT t.telefono, t.nombre, t.cargo, e.id, e.nombre AS entidad FROM telefonos_contacto t, casos_exito e WHERE t.id = e.id ";
                        $result = $conn->query($sql);
                    } catch (\Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while($telefono = $result->fetch_assoc()){?>
                      <tr>
                        <td><?php echo $telefono['telefono'];?></td>
                        <td><?php echo $telefono['nombre'];?></td>
                        <td><?php echo $telefono['cargo'];?></td>
                        <td><?php echo $telefono['entidad'];?></td>
                        <td> <a href="telefonos/editar-telefono.php?id=<?php echo $telefono['id'];?>" class="btn bg-orange btn-flat margin">
                          <li class="fa fa-pencil"></li>
                        </a>
                        <a href="#" data-id="<?php echo $telefono['id']; ?>" data-id2="<?php echo $telefono['telefono']; ?>" data-tipo="telefono" class="btn bg-red btn-flat margin borrar_registro_telefono">
                          <li class="fa fa-trash"></li>
                        </a>
                      </td>
                      </tr>
                    <?php  }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Teléfono</th>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Entidad</th>
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
