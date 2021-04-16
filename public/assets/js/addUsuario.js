$(function(){
    // Cadastro Principal
    $("#form").submit(function (e) {
        e.preventDefault();

        let form = $('#form')[0];
        let data = new FormData(form);

        // Dados obrigatorios
        let nome = $('#nome').val();
        let sobrenome = $('#sobrenome').val();
        let email = $('#email').val();
        let senha = $('#senha').val();

        let dados = [
            { campo: 'nome', value: nome },
            { campo: 'sobrenome', value: sobrenome },
            { campo: 'email', value: email },
            { campo: 'senha', value: senha }
        ];

        let acao = 0;

        for (let i = 0; i < dados.length; i++) {

            if (!dados[i].value) {
                acao += 1;
                // Mudar a cor da borda
                $('#' + dados[i].campo).css("border", "red 1px solid");
                // Aparece texto do erro
                $('#' + dados[i].campo + 'span').css("display", "inline");
                // Rolar para o topo
                $('html, body').animate({
                    scrollTop: 0
                }, 200, 'linear');

            } else {
                $('#' + dados[i].campo).css("border", "#c9c7c7 1px solid");
                $('#' + dados[i].campo + 'span').css("display", "none");
            }
        }

        console.log(acao);
        // Cadastrar novo usuário
        if (acao < 1) {
            console.log('ajax');
            $.ajax({
                url: 'addUsuarios',
                data: data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function () {
                   window.location = "admin";
                }
            });
        }

    });
    
});

var fotos = document.getElementById('fotos');
var labelFotos = document.getElementsByClassName('label-content');

fotos.addEventListener('change', function(){
    console.log("entrou");
    if (fotos.files.length > 0) {
        labelFotos[0].style.background = "lightgreen"
    }
});