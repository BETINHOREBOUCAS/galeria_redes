<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/addProduto.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <script src="<?= $base; ?>/assets/js/jquery-3.4.1.min.js"></script>
</head>

<body>
    <div class="form-principal" style="top: 0;">

        <div class="form">
            <form method="post" enctype="multipart/form-data" id="form">
                <div class="form-header">
                    <div>
                        Criar nova conta
                    </div>
                </div>
                <div id="resultado">
                    
                </div>
                <div class="form-input">
                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="nome">Nome:<sup>*</sup></label> <span id="nomespan">Campo obrigatório</span><br>
                            <input type="text" name="nome" id="nome" class="campo" autofocus><br><br>
                        </div>
                        <div class="width-div margin-left">
                            <label for="sobrenome">Sobrenome:<sup>*</sup></label> <span id="sobrenomespan">Campo obrigatório</span><br>
                            <input type="text" name="sobrenome" id="sobrenome" class="campo"><br><br>
                        </div>
                    </div>


                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="email">E-mail:<sup>*</sup></label> <span id="emailspan">Campo obrigatório</span><br>
                            <input type="email" name="email" id="email" class="campo"> <br><br>
                        </div>

                        <div class="width-div margin-left">
                            <label for="senha">Senha:<sup>*</sup></label> <span id="senhaspan">Campo obrigatório</span><br>
                            <input type="password" name="senha" id="senha" class="campo"> <br><br>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="email2">Confirmar E-mail:<sup>*</sup></label> <span id="email2span">Campo obrigatório</span><br>
                            <input type="email" name="email2" id="email2" class="campo"> <br><br>
                        </div>

                        <div class="width-div margin-left">
                            <label for="senha2">Confirmar Senha:<sup>*</sup></label> <span id="senha2span">Campo obrigatório</span><br>
                            <input type="password" name="senha2" id="senha2" class="campo"> <br><br>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="width-div margin-right">
                            <br><br><br>
                        </div>
                        <div class="width-div margin-left labelP">
                            <label for="user" class="label">
                                <br>
                                <div class="flex">
                                    <div class="label-content" id="usercor">
                                        <i class="fas fa-cloud-upload-alt"></i> Adicionar Foto
                                    </div>
                                </div>

                            </label><br>
                            <input type="file" name="img_user" id="user" class="campo fotovalidate">
                        </div>
                    </div>

                    <label for="nome">URL: <sup> Obs: Não usar espaços e nem caracteres especiais.</sup></label><br>
                <div class="url">
                    
                    <div class="base-url">
                        <input type="text" class="campo" disabled value="<?=$base;?>/">
                    </div>
                    
                    <div class="nome-url">
                        <input type="text" name="exibicao" id="nome_exibicao" class="campo">
                    </div>
                </div>

                <br>

                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="endereco">Endereço:</label><br>
                            <input type="text" name="endereco" id="endereco" class="campo"> <br><br>
                        </div>

                        <div class="width-div margin-left">
                            <label for="bairro">Bairro:</label><br>
                            <input type="text" name="bairro" id="bairro" class="campo"> <br><br>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="cidade">Cidade:</label><br>
                            <input type="text" name="cidade" id="cidade" class="campo"> <br><br>
                        </div>

                        <div class="width-div margin-left">
                            <label for="estado">Estado:</label><br>
                            <input type="text" name="estado" id="estado" class="campo"> <br><br>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="zap">Whatsapp:<sup>*</sup></label> <span id="zapspan">Campo obrigatório</span><br>
                            <input type="text" name="zap" id="zap" class="campo"> <br><br>
                        </div>

                        <div class="width-div margin-left">
                            <label for="tel">Telefone:<sup></sup></label><br>
                            <input type="text" name="tel" id="tel" class="campo"> <br><br>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="width-div margin-right">
                            <label for="uso">Uso:<sup>*</sup></label> <span id="usospan">Campo obrigatório</span><br>
                            <select id="uso" name="uso" class="campo">
                                <option value=""></option>
                                <option value="Pessoal ">Pessoal</option>
                                <option value="Empresa">Empresa</option>
                            </select><br><br>
                        </div>
                        <div class="width-div margin-left labelP">
                            <label for="logo" class="label">
                                <br>
                                <div class="flex">
                                    <div class="label-content" id="logocor">
                                        <i class="fas fa-cloud-upload-alt"></i> Adicionar Logo
                                    </div>
                                </div>

                            </label><br>
                            <input type="file" name="img_logo" id="logo" class="campo fotovalidate">
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <div class="margin-right">
                        <a href="<?= $base; ?>/login" class="bt-sair">
                            Voltar
                        </a>
                    </div>

                    <div class="margin-left">
                        <input type="submit" value="Salvar" class="bt-entrar" id="botao">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= $base; ?>/assets/js/login.js"></script>
</body>

</html>