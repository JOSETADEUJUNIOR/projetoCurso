<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/alocar_dataview.php';

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
                            <h1>Alocar equipamento</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">Alocar equipamento</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                
                <!-- Default box -->
                <div class="card">
                <a href="equipamento.php" class="btn btn-success btn-xs col-md-2">Adicionar Equipamento</a>
                <div class="card-header">
                        <h3 class="card-title">Aloque os equipamentos aqui</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form id="form_alocar" action="alocar_equipamento.php" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Equipamento</label>
                                        <select class="form-control obg" id="equipamento" name="equipamento">
                                            <option value="">Selecione</option>
                                            <?php foreach ($eqs as $e) { ?>
                                                <option value="<?= $e['id'] ?>"><?= $e['nome_modelo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Setor</label>
                                        <select class="form-control obg" id="setor" name="setor">
                                            <option value="">Selecione</option>
                                            <?php foreach ($setores as $setor) { ?>
                                                <option value="<?= $setor['id'] ?>"><?= $setor['nome_setor'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" onclick=" return alocarEquipamento('form_alocar')" name="btn_cadastrar">Cadastrar</button>
                    </form>

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
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>;
    <!-- jQuery -->
    <script src="../../Resource/ajax/equipamento.js"></script>
</body>

</html>