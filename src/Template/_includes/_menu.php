<!-- Main Sidebar Container -->

<?php


require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_public\Util;

if (isset($_GET['close']) && $_GET['close'] == '1') {
  Util::Deslogar();
}

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <span class="brand-text font-weight-light">SystemOS - <?= date("Y") ?></span>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Cadastros
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="usuario.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuario</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="equipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tipoequipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tipo Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="setor.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Setor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="modelo.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Modelo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="alocar_equipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Alocar</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="consulta_equipamento.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Consultar Equipamento
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="consulta_usuario.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Consultar Usuario
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="alocar_equipamento.php" class="nav-link">
            <i class="nav-icon fa fa-barcode"></i>
            <p>
              Equipamento
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../../Template/_includes/_menu.php?close=1" class="nav-link">
            <i class="nav-icon fa fa-barcode"></i>
            <p>
              Sair
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>

  <!-- /.sidebar -->
</aside>