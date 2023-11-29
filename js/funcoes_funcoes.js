var aba_principal = document.getElementById("aba_principal");
var aba_cadastrar = document.getElementById("aba_cadastrar");
var botao_mais = document.getElementById("mais");

aba_cadastrar.setAttribute('class', 'd-none');
aba_principal.setAttribute('class', 'd-flex justify-content-center mt-5');
botao_mais.setAttribute('class', 'd-flex justify-content-center');

function mostrarCadastrar() {
    aba_cadastrar.setAttribute('class', 'd-flex justify-content-center');
    aba_principal.setAttribute('class', 'd-none');
    botao_mais.setAttribute('class', 'd-none');
}

function mostrarSenhaCadastro(){
    let senha = document.getElementById("senha_cadastrar");
    let conf_senha = document.getElementById("confirmar_senha_cadastrar");

    if (senha.getAttribute('type') == 'password') {
        senha.setAttribute('type', 'text');
        conf_senha.setAttribute('type', 'text');
    } else {
        senha.setAttribute('type', 'password');
        conf_senha.setAttribute('type', 'password');
    }
}

function validarSenha(){
    let senha = document.getElementById("senha_cadastrar");
    let conf_senha = document.getElementById("confirmar_senha_cadastrar");

    if (senha.value != conf_senha.value) {
        conf_senha.setCustomValidity("Senhas diferentes!");
        conf_senha.reportValidity();
        return false;
    } else {
        conf_senha.setCustomValidity("");
        return true;
    }
}