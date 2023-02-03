<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\UsuarioController;
use Src\VO\UsuarioVO;
use Src\VO\TecnicoVO;
use Src\VO\FuncionarioVO;
use Src\_public\Util;

use Src\Controller\SetorController;

$ctrl_setor = new SetorController;
$setores = $ctrl_setor->RetornarSetorController();
$ctrl_usuario = new UsuarioController;

if (isset($_POST['VerificaEmail']) and $_POST['VerificaEmail'] == 'ajx') {
    $ret = $ctrl_usuario->VerificarEmailController($_POST['Email']);
    if ($ret) {
        echo 1;
    } else {
        echo -1;
    }
} else if (isset($_POST['btn_acessar'])) {
    $ret = $ctrl_usuario->ValidarLoginController($_POST['login'], $_POST['senha']);
} else if (isset($_POST['filtrar_pessoa']) && $_POST['filtrar_pessoa'] == 'ajx') {

    $pessoas = $ctrl_usuario->FiltrarPessoaController($_POST['nome']); ?>
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
                    <td><?= $p['nome'] ?></td>
                    <td><?= Util::DescricaoTipo($p['tipo']) ?></td>
                    <td>
                        <a href="alterar_usuario.php?id_user=<?= $p['id'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                        <a href="#" onclick="CarregarModalStatus('<?= $p['id'] ?>','<?= $p['nome'] ?>','<?= $p['status'] ?>')" data-toggle="modal" data-target="#modal_status" class="btn btn-<?= $p['status'] == STATUS_ATIVO ? "danger" : "success" ?> btn-xs"><?= $p['status'] == STATUS_ATIVO ? "INATIVAR " : "ATIVAR " ?>USUÁRIO</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



<?php } else if (isset($_POST['mudar_status']) && $_POST['mudar_status'] == 'ajx') {

    $vo =  new UsuarioVO;

    $vo->setId($_POST['id_user']);
    $vo->setStatus($_POST['status_user']);
    echo $ctrl_usuario->MudarStatusController($vo);
} else if (isset($_GET['id_user']) && is_numeric($_GET['id_user'])) {
    $user = $ctrl_usuario->DetalharUsuarioController($_GET['id_user']);
    if (empty($user)) {
        Util::chamarPagina('consultar_usuario.php');
    }
    if ($user['tipo'] == PERFIL_FUNCIONARIO) {
        $ctrl_setor = new SetorController;
        $setores = $ctrl_setor->RetornarSetorController();
    }
} else if (isset($_POST['btn_cadastrar'])) {



    if ($_POST['tipo'] == '1') {
        $vo = new UsuarioVO;

        $vo->setTipo($_POST['tipo']);
        $vo->setNome($_POST['nome']);
        $vo->setLogin($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
    } else if ($_POST['tipo'] == '2') {
        $vo = new FuncionarioVO;
        $vo->setTipo($_POST['tipo']);
        $vo->setNome($_POST['nome']);
        $vo->setLogin($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
        $vo->setSetor($_POST['setor']);
    } else if ($_POST['tipo'] == '3') {
        $vo = new TecnicoVO;
        $vo->setTipo($_POST['tipo']);
        $vo->setNome($_POST['nome']);
        $vo->setLogin($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
        $vo->setNomeEmpresa($_POST['nome_empresa_tec']);
    }

    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['endereco']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);
    //Util::debug($vo);
    $ret = $ctrl_usuario->CadastrarUsuarioController($vo);

    if ($_POST['btn_cadastrar'] == 'ajx') {

        echo $ret;
    }
} else if (isset($_POST['btn_alterar']) && $_POST['btn_alterar'] == 'ajx') {

    if ($_POST['tipo'] == '1') {
        $vo = new UsuarioVO;
        $vo->setId($_POST['idUser']);
        $vo->setTipo($_POST['tipo']);
        $vo->setNome($_POST['nome']);
        $vo->setLogin($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
    } else if ($_POST['tipo'] == '2') {
        $vo = new FuncionarioVO;
        $vo->setId($_POST['idUser']);
        $vo->setTipo($_POST['tipo']);
        $vo->setNome($_POST['nome']);
        $vo->setLogin($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
        $vo->setSetor($_POST['setor']);
    } else if ($_POST['tipo'] == '3') {
        $vo = new TecnicoVO;
        $vo->setId($_POST['idUser']);
        $vo->setTipo($_POST['tipo']);
        $vo->setNome($_POST['nome']);
        $vo->setLogin($_POST['email']);
        $vo->setTelefone($_POST['telefone']);
        $vo->setNomeEmpresa($_POST['nome_empresa_tec']);
    }

    $vo->setIdEndereco($_POST['idEnd']);
    $vo->setCep($_POST['cep']);
    $vo->setRua($_POST['endereco']);
    $vo->setBairro($_POST['bairro']);
    $vo->setNomeCidade($_POST['cidade']);
    $vo->setEstado($_POST['estado']);
    //Util::debug($vo);
    $ret = $ctrl_usuario->AlterarUsuarioController($vo);

    if ($_POST['btn_alterar'] == 'ajx') {

        echo $ret;
    }
};
