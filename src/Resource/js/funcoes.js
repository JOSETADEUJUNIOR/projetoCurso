function load() {
    $("#divload").addClass("overlay").html('<i class="fas fa-2x fa-sync-alt fa-spin"> </i>');
}
function RemoverLoad() {
    $("#divload").removeClass("overlay").html('');
}

function AlterarSetorModal(id, nome) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
}
function AlterarModeloModal(id, nome) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
}

function ExcluirModal(id, nome) {
    $("#ExcluirID").val(id);
    $("#ExcluirNome").html(nome);

}

function AlterarTipoEquipamentoModal(id, nome) {
    $("#AlteraID").val(id);
    $("#AlteraNome").val(nome);
}


function NotificarCampos(form_id) {

    var ret = true;

    $("#" + form_id + " input," + "#" + form_id + " select, " + "#" + form_id + " textarea").each(function () {

        if ($(this).hasClass("obg")) {
            if ($(this).val().trim() == "") {
                ret = false;
                $(this).addClass("is-invalid");
                $(this).focus();
            } else {
                $(this).removeClass("is-invalid").addClass('is-valid');
            }
        }
    });
    if (!ret)
        MensagemCamposObrigatorios();
    else
        load();

    return ret;
}
function LimparCampos(form_id) {

    $("#" + form_id + " input, select, textarea").each(function () {
        $(this).val('');

    });
}

function CarregarModalStatus(id, nome, status_atual)
{
    $("#id_status").val(id);
    $("#nome_user_status").html(nome);
    $("#status_atual").val(status_atual);
}

function BASE_URL_AJAX(dataview) {
    return "../../Resource/dataview/" + dataview + ".php";
}

function EscolherUsuario(tipo) {


    switch (tipo) {
        case '2':
            $("#divFunc").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#divTecnico").hide();
            $("#setor").addClass("obg");
            break;

        case '1':
            $("#divTecnico").hide();
            $("#divFunc").hide();
            $("#setor").removeClass('obg');
            $("#divGeral").show();
            $("#divButton").show();
            break;
        case '3':
            $("#divTecnico").show();
            $("#divFunc").hide();
            $("#divGeral").show();
            $("#divButton").show();
            $("#nome_empresa_tec").addClass('obg');
            break;

        default:
            $("#divFunc").hide();
            $("#divFunc").removeClass('obg');
            $("#divTecnico").hide();
            $("#divGeral").hide();
            $("#divButton").hide();
            break;
    }


}

