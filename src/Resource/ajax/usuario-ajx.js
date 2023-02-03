

function VerficarEmail(emailTela) {


    if (emailTela != '') {
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                VerificaEmail: 'ajx',
                Email: emailTela
            }, success: function (ret) {
                if (ret == -1) {

                    MensagemGenerica("O e-mail " + emailTela + " já Existe");
                    $("#email").val('');
                    $("#email").focus();
                }
            }
        })

    }
}

function FiltrarUsuario(nome_filtro) {
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            nome: nome_filtro,
            filtrar_pessoa: 'ajx'
        }, success: function (resultado) {
            $("#table_result").html(resultado);
            if (nome_filtro != '') {
                $("#divResultado").show();
            } else {
                $("#divResultado").hide();
            }
        }
    })


}

function MudarStatus() {

    let id = $("#id_status").val();
    let status_atual = $("#status_atual").val();

    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            id_user: id,
            status_user: status_atual,
            mudar_status: 'ajx'
        },
        success: function (resultado) {
            if (resultado == 1) {
                MensagemSucesso();
                $("#modal_status").modal("hide");
                FiltrarUsuario($("#nome_pesquisar").val());
            } else {
                MensagemErro();
            }
        }
    })
}


function CadastrarUsuario(id_form) {
    if (NotificarCampos(id_form)) {

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {

                btn_cadastrar: 'ajx',
                tipo: $("#tipo").val(),
                setor: $("#setor").val(),
                nome_empresa_tec: $("#nome_empresa_tec").val(),
                nome: $("#nome").val(),
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                cep: $("#cep").val(),
                endereco: $("#endereco").val(),
                bairro: $("#bairro").val(),
                cidade: $("#cidade").val(),
                estado: $("#estado").val(),
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == '1') {
                    MensagemSucesso();
                    LimparCampos(id_form);
                } else {
                    MensagemErro();
                }

            }
        })

    }

    return false;
}


function AlterarUsuario(id_form) {

    if (NotificarCampos(id_form)) {

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {

                btn_alterar: 'ajx',
                idUser: $("#id").val(),
                tipo: $("#alteraTipo").val(),
                idEnd: $("#idEndereco").val(),
                setor: $("#setor").val(),
                nome_empresa_tec: $("#nome_empresa_tec").val(),
                nome: $("#nome").val(),
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                cep: $("#cep").val(),
                endereco: $("#endereco").val(),
                bairro: $("#bairro").val(),
                cidade: $("#cidade").val(),
                estado: $("#estado").val(),
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == '1') {
                    FiltrarUsuario($("#nomeUser").val());
                    MensagemSucesso();
                    LimparCampos(id_form);
                } else {
                    MensagemErro();
                }

            }
        })

    }

    return false;
}

