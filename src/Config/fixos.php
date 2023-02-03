<?php

#FUNÇÕES 

const CADASTRO_TIPO_EQUIPAMENTO = "CadastrarTipoEquipamento";
const ALTERAR_TIPO_EQUIPAMENTO = "AlterarTipoEquipamentoController";
const EXCLUIR_TIPO_EQUIPAMENTO = "ExcluirTipoEquipamento";
const CADASTRO_ALOCAR = 'AlocarEquipamentoController';

const ABRIR_CHAMADO = 'AbrirChamadoController';


const CADASTRO_SETOR = 'CadastrarSetor';
const ALTERA_SETOR = 'AlterarSetor';
const EXCLUI_SETOR = 'ExcluirSetorController';

const CADASTRO_CIDADE = 'CadastrarCidadeController';
const ALTERA_CIDADE = 'AlterarCidadeController';
const EXCLUI_CIDADE = 'ExcluirCidadeController';

const CADASTRO_EQUIPAMENTO = 'CadastrarEquipamentoController';
const ALTERA_EQUIPAMENTO = 'AlterarEquipamentoController';
const EXCLUI_EQUIPAMENTO = 'ExcluirEquipamentoController';

const CADASTRO_USUARIO = 'CadastrarUsuarioController';
const ALTERA_USUARIO = 'AlterarUsuarioController';
const MUDAR_STATUS = 'MudarStatusController';
const MUDAR_SENHA = 'AtualizarSenhaAtual';


# DADOS COMBO FILTRO
const FILTRO_TIPO = 1;
const FILTRO_MODELO = 2;
const FILTRO_IDENTIFICACAO = 3;
const FILTRO_DESCRICAO = 4;

const SITUACAO_ALOCADO = 1;
const SITUACAO_REMOVIDO = 2;
const SITUACAO_MANUTENCAO = 3;

const PERFIL_ADM         = 1;
const PERFIL_FUNCIONARIO = 2;
const PERFIL_TECNICO     = 3;

const STATUS_ATIVO   = 1;
const STATUS_INATIVO = 0;


const CADASTRO_MODELO = 'CadastrarModelo';
const EXCLUIR_MODELO  = 'ExcluirModeloController';
const ALTERAR_MODELO  = 'AlterarModeloController';

# Situação do atendimento
const SITUACAO_EM_ABERTO      = 1;
const SITUACAO_EM_ATENDIMENTO = 2;
const SITUACAO_ENCERRADO      = 3;
const SITUACAO_TODOS          = 4;

define('PATH_URL', $_SERVER["DOCUMENT_ROOT"] . '/projetoCurso/src/');

#chave Secreta Token;
const SECRET_JWT_FUNC = 'tokenFunc';

const NAO_AUTORIZADO = -1000;
