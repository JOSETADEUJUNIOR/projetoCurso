<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Controller\AlocarEquipamentoController;
use Src\VO\AlocarVO;
use Src\Controller\EquipamentoController;
use Src\Controller\SetorController;
use Src\_public\Util;

Util::VerificarLogado();

$ctrl = new EquipamentoController();

if (isset($_POST['btn_cadastrar'])) {
    $vo = new AlocarVO;
    #$vo->setSituacao($_POST['situacao']);
    #$vo->setDataAlocacao($_POST['data_alocacao']);
    #$vo->setDataRemocao($_POST['data_remocao']);
    $vo->setEquipamentoID($_POST['equipamento']);
    $vo->setSetorID($_POST['setor']);

    $ret = $ctrl->AlocarEquipamentoController($vo);
    if (isset($_POST['btn_cadastrar']) && $_POST['btn_cadastrar'] == 'ajx') {
        echo $ret;
    } else {
        echo -4;
    }
    $eqs = (new EquipamentoController)->SelecionarEquipamentosNaoAlocadosController();
};



$setores = (new SetorController)->RetornarSetorController();
$eqs = (new EquipamentoController)->SelecionarEquipamentosNaoAlocadosController();

$alocar = new AlocarEquipamentoController;
