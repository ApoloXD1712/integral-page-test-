<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  
  <a href="../admin_area.php" class="brand-link nowt" style="white-space: wrap !important; overflow: auto;">
        <img src="img/white-logo-v6.svg"
         alt="logo integral"
         class="brand-image "
         style="opacity: .8; margin-bottom: 1rem;">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a  class="d-block usuario"><?php echo $_SESSION['nombre']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-cogs"></i>
            <p>
              Módulos
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="modulos/lista-modulos.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="modulos/crear-modulo.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-newspaper"></i>
            <p>
              Noticias
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="noticias/lista-noticias.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver todas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="noticias/crear-noticia.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-handshake"></i>
            <p>
              Reuniones
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="reuniones/lista-reuniones.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reuniones/crear-reunion.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-user-lock"></i>
            <p>
              Administradores
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="admins/lista-admins.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="admins/crear-admin.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-check-double"></i>
            <p>
              Casos de Éxito
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="casos_exito/lista-casosExito.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="casos_exito/crear-casoExito.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-phone"></i>
            <p>
              Teléfonos de contacto
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="telefonos/lista-telefonos.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="telefonos/crear-telefono.php" class="nav-link">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
