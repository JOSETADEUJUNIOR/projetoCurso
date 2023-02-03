<?php

use Src\_public\Util;

 require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';
Util::VerificarLogado();
?>

<!DOCTYPE html>
<html>

<head>
    <?php include_once PATH_URL . '/Template/_includes/_head.php' ?>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once PATH_URL . '/Template/_includes/_topo.php';
        include_once PATH_URL . '/Template/_includes/_menu.php'
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Consultar Usuarios</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Consulta usuario</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Consulta usuario</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pesquisar pelo nome</label>
                            <input onkeyup="FiltrarUsuario(this.value)" type="text" name="nome_pesquisar" id="nome_pesquisar" class="form-control" placeholder="Digite aqui.....">
                        </div>
    
                    </div>
                    <div class="card-body ocultar" id="divResultado">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Usuários Encontrados</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                        include_once 'modal/_mudar_status.php';
                                    ?>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover " id="table_result">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Tipo</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pessoas as $p) { ?>
                                                    
                                                
                                                <tr>
                                                    <td><?= $p['nome']?></td>
                                                    <td><?= Util::DescricaoTipo($p['tipo'])?></td>
                                                    <td>
                                                        <a href="alterar_usuario.php?id_user=<?=$p['id']?>" class="btn btn-warning btn-xs">Alterar</a>
                                                        <a href="#" onclick="CarregarModalStatus('<?=$p['id'] ?>','<?=$p['nome'] ?>','<?=$p['status'] ?>')" data-toggle="modal" data-target="#modal_status" class="btn btn-<?= $p['status'] == STATUS_ATIVO ? "danger": "success"?> btn-xs"><?= $p['status'] == STATUS_ATIVO ? "INATIVAR ": "ATIVAR "?>USUÁRIO</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once PATH_URL . '/Template/_includes/footer.php' ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <script src="../../Resource/ajax/usuario-ajx.js"></script>
</body>

</html>