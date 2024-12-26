$(document).ready(function(){
    $("#telefone").mask("(99) 99999-9999");
});

//confirmação de senha
var senha = document.getElementById("senha"), conf_senha = document.getElementById("conf_senha");

function validatePassword() {
    if (senha.value != conf_senha.value) {
        conf_senha.setCustomValidity("Confirme a senha!");
    } else {
        conf_senha.setCustomValidity('');
    }
}

senha.onchange = validatePassword;
conf_senha.onkeyup = validatePassword;
