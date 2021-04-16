<?php

$render('header2', ['user' => $user]);
?>

<div class="form-principal">
    <div class="form">
        <form method="post" enctype="multipart/form-data">
            <div class="form-header">
                <div>
                    Dados do site
                </div>
            </div>

            <div class="form-input">

            <label for="nome">URL: <sup> Obs: Não usar espaços e nem caracteres especiais.</sup></label><br>
                    <div class="url">

                        <div class="base-url">
                            <input type="text" class="campo" disabled value="<?=$base;?>/">
                        </div>

                        <div class="nome-url">
                            <input type="text" name="nome_exibicao" id="nome_exibicao" class="campo" value="<?=$empresa['nome_exibicao'];?>" readonly>
                        </div>
                    </div>

                    <br>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="endereço">Endereço:</label><br>
                        <input type="text" name="endereco" id="endereço" class="campo" value="<?=$empresa['endereco']?>"> <br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="bairro">Bairro:</label><br>
                        <input type="text" name="bairro" id="bairro" class="campo" value="<?=$empresa['bairro']?>"> <br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="cidade">Cidade:</label><br>
                        <input type="text" name="cidade" id="cidade" class="campo" value="<?=$empresa['cidade']?>"> <br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="estado">Estado:</label><br>
                        <input type="text" name="estado" id="estado" class="campo" value="<?=$empresa['estado']?>"> <br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="zap">Whatsapp:</label><br>
                        <input type="text" name="zap" id="zap" class="campo" value="<?=$empresa['zap']?>"> <br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="tel">Telefone:</label><br>
                        <input type="text" name="tel" id="tel" class="campo" value="<?=$empresa['tel']?>"> <br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="uso">Uso:</label><br>
                        <select id="uso" name="uso" class="campo">
                            <option value=""></option>
                            <option value="Pessoal" <?= $empresa['uso'] == 'Pessoal'?'selected':''; ?>>Pessoal</option>
                            <option value="Empresa" <?= $empresa['uso'] == 'Empresa'?'selected':''; ?>>Empresa</option>
                        </select><br><br>
                    </div>
                    <div class="width-div margin-left labelP">
                        <label for="fotos" class="label">
                            <br>
                            <div class="flex">
                                <div class="label-content">
                                    <i class="fas fa-cloud-upload-alt"></i> Adicionar/Alterar Logo
                                </div>
                            </div>

                        </label><br>
                        <input type="file" name="logo" id="fotos" class="campo">
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <div class="margin-right">
                    <a href="<?= $base; ?>/admin" class="bt-sair">
                        Voltar
                    </a>
                </div>

                <div class="margin-left">
                    <input type="submit" value="Salvar" class="bt-entrar">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?=$base;?>/assets/js/config.js"></script>