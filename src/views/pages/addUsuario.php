<?php
$render('header2', ['user' => $user]);
?>
<script src="<?= $base; ?>/assets/js/jquery-3.4.1.min.js"></script>
<div class="form-principal">
    <div class="form">
        <form method="post" id="form">
            <div class="form-header">
                <div>
                    Cadastro de usuários
                </div>
            </div>

            <div class="form-input">
                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="nome">Nome:</label><br>
                        <input type="text" name="nome" id="nome" class="campo"><br><br>
                    </div>
                    <div class="width-div margin-left">
                        <label for="sobrenome">Sobrenome:</label><br>
                        <input type="text" name="sobrenome" id="sobrenome" class="campo"><br><br>
                    </div>
                </div>


                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="email">E-mail:</label><br>
                        <input type="email" name="email" id="email" class="campo"> <br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="senha">Senha:</label><br>
                        <input type="password" name="senha" id="senha" class="campo"> <br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="tipoUser">Permissão:</label><br>
                        <select for="tipoUser" class="campo" id="permissao" name="permissao">
                            <option value="secretario"></option>
                            <option value="admin">Administrador</option>
                            <option value="gerente">Gerente</option>
                            <option value="secretario">Secretário</option>
                        </select><br><br>
                    </div>
                    <div class="width-div margin-left labelP">
                        <label for="fotos" class="label" id="labelFotos">
                            <br>
                            <div class="flex">
                                <div class="label-content">
                                    <i class="fas fa-cloud-upload-alt"></i> Adicionar Foto
                                </div>
                            </div>

                        </label><br>
                        <input type="file" name="fotos" id="fotos" class="campo">
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
<script src="<?= $base; ?>/assets/js/addUsuario.js"></script>