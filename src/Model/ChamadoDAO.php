<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\ChamadoVO;
use Src\Model\SQL\ChamadoSQL;

class ChamadoDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function AbrirChamado(ChamadoVO $vo): int
    {
        $sql = $this->conexao->prepare(ChamadoSQL::AbrirChamadoSQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getDataAbertura());
        $sql->bindValue($i++, $vo->getDescrciaoProblema());
        $sql->bindValue($i++, $vo->getId());
        $sql->bindValue($i++, $vo->getAlocar());

        $this->conexao->beginTransaction();
        try {
            $sql->execute();

            $sql = $this->conexao->prepare(ChamadoSQL::ATUALIZAR_ALOCAMENTO());
            $i = 1;
            $sql->bindValue($i++, $vo->getSituacao());
            $sql->bindValue($i++, $vo->getAlocar());
            $sql->execute();

            $this->conexao->commit();
            return 1;
        } catch (\Exception $ex) {
            $this->conexao->rollBack();
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function FiltrarChamado($tipo, $setor)
    {
        $sql = $this->conexao->prepare(ChamadoSQL::FILTRAR_CHAMADO($tipo, $setor));
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
