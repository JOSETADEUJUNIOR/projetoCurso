<?php

namespace Src\Model\SQL;


class ChamadoSQL
{

    public static function AbrirChamadoSQL()
    {
        $sql = 'INSERT into tb_chamado (data_abertura, descricao_problema, funcionario_id, alocar_id) VALUES (?,?,?,?)';
        return $sql;
    }

    public static function ATUALIZAR_ALOCAMENTO()
    {
        $sql = 'UPDATE tb_alocar set situacao = ?
                where id = ?';
        return $sql;
    }

    public static function FILTRAR_CHAMADO($tipo)
    {

        $sql = 'SELECT ch.data_abertura,
                       ch.descricao_problema,
                       ch.data_atendimento,
                       ch.data_encerramento,
                       ch.laudo_tecnico,
                       us_fu.nome as nome_funcionario,
                       us_te.nome as nome_tecnico,
                       eq.identificacao,
                       mo.nome as nome_modelo,
                       ti.nome as nome_tipo
	                    FROM
	                    tb_chamado as ch
	                    INNER JOIN tb_funcionario as fu
	                    on fu.funcionario_id = ch.funcionario_id	
	                    INNER JOIN tb_usuario as us_fu
	                    on us_fu.id = fu.funcionario_id
	                    LEFT JOIN tb_tecnico as te
	                    on te.tecnico_id = ch.tecnico_atendimento
	                    LEFT JOIN tb_usuario as us_te
	                    on us_te.id = te.tecnico_id
	                    INNER JOIN tb_alocar as al
	                    on al.id = ch.alocar_id
	                    INNER JOIN tb_equipamento as eq
	                    on eq.id = al.equipamento_id
	                    INNER JOIN tb_modeloequip as mo
	                    on mo.id = eq.modeloequip_id
	                    INNER JOIN tb_tipoequip as ti
	                    on ti.id = eq.tipoequip_id';
        switch ($tipo) {
            case '1':
                $sql .= ' WHERE data_atendimento is null';
                break;
            case '2':
                $sql .= ' WHERE ch.data_atendimento is not null AND ch.data_encerramento is null';
                break;
            case '3':
                $sql .= ' WHERE ch.data_encerramento is not null';
                break;
        }
        return $sql;
    }
}
