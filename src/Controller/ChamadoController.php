<?php

namespace Src\Controller;

use Src\Model\ChamadoDAO;
use Src\VO\ChamadoVO;
use Src\_public\Util;

class ChamadoController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new ChamadoDAO;
    }

    public function AbrirChamadoController(ChamadoVO $vo)
    {
        if (empty($vo->getDescrciaoProblema()) || empty($vo->getAlocar())) {
            return 0;
        }

        $vo->setDataAbertura(Util::DataAtualBd());
        $vo->setSituacao(SITUACAO_MANUTENCAO);
        $vo->setfuncao(ABRIR_CHAMADO);
        $vo->setIdLogado($vo->getId());

        return $this->dao->AbrirChamado($vo);
    }

    public function FiltrarChamadoController($tipo, $setor)
    {
        if ($tipo == '') {
            return 0;
        }
        if ($tipo == PERFIL_FUNCIONARIO ) {
            if ($setor == '') {
                return 0;
            }
        }
        
        return $this->dao->FiltrarChamado($tipo, $setor);
    }
}
