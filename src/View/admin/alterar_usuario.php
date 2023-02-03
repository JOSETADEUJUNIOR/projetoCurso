<?php require_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';
use Src\_public\Util;
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
                            <h1>Novo Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active">ALterar (alterar) usuário</li>
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
                        <h3 class="card-title">Insere (altera) os usuários aqui</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                        </div>
                    </div>
                    <form id="form_usuario" action="alterar_usuario.php" method="post">
                        <input type="hidden" name="alteraTipo" id="alteraTipo" value="<?= $user['tipo'] ?>">
                        <input type="hidden" name="id" id="id" value="<?= $user['id_user'] ?>">
                        <input type="hidden" name="idEndereco" id="idEndereco" value="<?= $user['id_end'] ?>">
                        <input type="hidden" name="nomeUser" id="nomeUser" value="<?= $user['nome'] ?>">

                        <div class="card-body">
                            <div class="row">
                                <?php if ($user['tipo'] == PERFIL_FUNCIONARIO) { ?>
                                    <div id="divFunc" class="col-md-12">
                                        <div class="form-group">
                                            <label>Setor</label>
                                            <select class="form-control obg" id="setor" name="setor">
                                                <option value="">Selecione</option>
                                                <?php for ($i = 0; $i < count($setores); $i++) { ?>
                                                    <option value="<?= $setores[$i]['id'] ?>" <?= $user == '' ? '' : ($user['setor_id'] == $setores[$i]['id'] ? 'selected' : '') ?>><?= $setores[$i]['nome_setor'] ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <?php if ($user['tipo'] == PERFIL_TECNICO) { ?>
                                <div id="divTecnico" class="">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Empresa do Técnico</label>
                                            <input class="form-control" id="nome_empresa_tec" name="nome_empresa_tec" value="<?= $user['empresa_tecnico'] ?>" placeholder="Digite o aqui....">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input class="form-control obg" id="nome" name="nome" value="<?= $user['nome'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control obg" id="email" name="email" value="<?= $user['login'] ?>" onchange="VerficarEmail(this.value)" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input class="form-control cel num obg" id="telefone" name="telefone" value="<?= $user['telefone'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input class="form-control obg" id="cep" name="cep" onblur="BuscarCep()" value="<?= $user['cep'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rua</label>
                                    <input class="form-control obg" id="endereco" name="endereco" value="<?= $user['rua'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input class="form-control obg" id="bairro" name="bairro" value="<?= $user['bairro'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input class="form-control obg" id="cidade" name="cidade" value="<?= $user['cidade'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input class="form-control obg" id="estado" name="estado" value="<?= $user['sigla_estado'] ?>" placeholder="Digite o aqui....">
                                </div>
                            </div>
                            <div class="" id="divButton">
                                <button class="btn btn-success" onclick=" return AlterarUsuario('form_usuario')" name="btn_alterar">Alterar</button>
                                <a href="consulta_usuario.php" class="btn btn-warning">Voltar</a>
                            </div>
                        </div>


                    </form>
                </div>
        </div>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

    <?php include_once PATH_URL . '/Template/_includes/footer.php' ?>
    <!-- /.control-sidebar -->

    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once PATH_URL . '/Template/_includes/_scripts.php' ?>
    <?php include_once PATH_URL . '/Template/_includes/_msg.php' ?>
    <script src="../../Resource/ajax/usuario-ajx.js"></script>
    <script src="../../Resource/ajax/buscar_cep-ajx.js"></script>
</body>

</html>