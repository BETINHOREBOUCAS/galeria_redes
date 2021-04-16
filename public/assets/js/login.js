$(function () {

    // Cadastro Principal
    $("#form").submit(function (e) {
        e.preventDefault();

        let form = $('#form')[0];
        let data = new FormData(form);

        // Dados obrigatorios
        let nome = $('#nome').val();
        let sobrenome = $('#sobrenome').val();
        let email = $('#email').val();
        let email2 = $('#email2').val();
        let senha = $('#senha').val();
        let senha2 = $('#senha2').val();
        let nomeExibicao = $('#exibicao').val();
        let zap = $('#zap').val();
        let uso = $('#uso').val();

        let dados = [
            { campo: 'nome', value: nome },
            { campo: 'sobrenome', value: sobrenome },
            { campo: 'email', value: email },
            { campo: 'email2', value: email2 },
            { campo: 'senha', value: senha },
            { campo: 'senha2', value: senha2 },
            { campo: 'nomeExibicao', value: nomeExibicao },
            { campo: 'zap', value: zap },
            { campo: 'uso', value: uso }
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

        if (email === email2) {

        } else {
            acao += 1;
            $('#emailspan, #email2span').text('E-mail diferentes');
            $('#email, #email2').css("border", "red 1px solid");
            $('#emailspan, #email2span').css("display", "inline");
        }

        if (senha === senha2) {

        } else {
            acao += 1;
            $('#senhaspan, #senha2span').text('Senhas diferentes');
            $('#senha, #senha2').css("border", "red 1px solid");
            $('#senhaspan, #senha2span').css("display", "inline");
        }

        console.log(acao);
        // Cadastrar novo usuário
        if (acao <= 1) {
            console.log('ajax');
            $.ajax({
                url: 'cadastro',
                data: data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function () {
                   window.location = "login";
                }
            });
        }

    });

    $('.fotovalidate').on('change', function(){
        var imgUser = document.getElementById("user");
        var imgBuss = document.getElementById("logo");

        if (imgUser.files.length == 1) {
            $('#usercor').css("background", "lightgreen");
        }

        if (imgBuss.files.length == 1) {
            $('#logocor').css("background", "lightgreen");
        }
    });

    $('.campo').on('click', function () {
        $(this).css("border", "#c9c7c7 1px solid");
    });

    $('#email').focusout(function () {
        var resultado;
        let email = $('#email').val();
        $.ajax({
            url: 'verificarEmail',
            data:{email:email},
            type: 'POST',
            success: function (html) {
                $('#resultado').html(html);      
                resultado = $('#emailexist').val();
                
                if (resultado == 'true') {
                    
                    $('#emailspan').text('E-mail já cadastrado!');
                    $('#email').css("border", "red 1px solid");
                    $('#emailspan').css("display", "inline");
                    $('#botao').css("display", "none");
                } else {
                    $('#botao').css("display", "block");
                    $('#emailspan').css("display", "none");
                }        
            }
        });
        
    });
    
});

// Tirar acentos e caracteres especiais
document.getElementById('nome_exibicao').addEventListener('blur', function(){
    str = document.getElementById('nome_exibicao').value;
    str = str.replace(/[ÀÁÂÃÄÅ]/g,"A");
    str = str.replace(/[çÇ]/g,"c");
    str = str.replace(/[àáâãäå]/g,"a");
    str = str.replace(/[ÈÉÊË]/g,"E");
    str = str.replace(/[^a-z0-9]/gi,'');
    document.getElementById('nome_exibicao').value = str;
});