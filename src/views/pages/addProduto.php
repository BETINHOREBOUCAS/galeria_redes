<?php
$render('header2', ['user' => $user]);
?>
<div class="form-principal">
    <div class="form">
        <form method="post" enctype="multipart/form-data">
            <div class="form-header">
                <div>
                    Cadastro de produtos
                </div>
            </div>

            <div class="form-input">
                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="nome">Nome do produto:</label><br>
                        <input type="text" name="nome" id="nome" class="campo"><br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="nome">Cor do produto:</label><br>
                        <input type="text" name="cor" id="cor" class="campo"><br><br>
                    </div>
                </div>


                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="tamanhoTecido">Tamanho tecido:</label><br>
                        <input type="text" name="tamanho_tecido" id="tamanhoTecido" class="campo"
                            placeholder="Comprimento x Largura"><br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="tamanhoTotal">Tamanho total (punho a punho):</label><br>
                        <input type="text" name="tamanho_total" id="tamanhoTotal" class="campo"
                            placeholder="Comprimento x Largura"><br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="punho">Tipo de punho:</label><br>
                        <select name="punho" id="punho" class="campo">
                            <option value=""></option>
                            <option value="corda">Corda</option>
                            <option value="trancelim">Trancelim</option>
                        </select><br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="borda">Borda:</label> <br>
                        <select name="borda" id="borda" class="campo">
                            <option value=""></option>
                            <option value="sem borda">Sem Borda</option>
                            <option value="varanda">Varanda</option>
                            <option value="franja">Franja</option>
                        </select><br><br>
                    </div>

                </div>

                <div class="flex">
                    <div class="margin-right width-div">
                        <label for="tipo">Casal/Solteiro?:</label><br>
                        <select name="tipo" id="tipo" class="campo">
                            <option value=""></option>
                            <option value="casal">Casal</option>
                            <option value="solteiro">Solteiro</option>
                        </select><br>
                    </div>
                    <div class="margin-left width-div">
                        <label for="modelo">Modelo:</label><br>
                        <select name="modelo" id="modelo" class="campo">
                            <option value=""></option>
                            <?php foreach($modelo as $value):?>
                                <option value="<?=$value['nome'];?>"><?=$value['nome'];?></option>
                            <?php endforeach ?>
                        </select><br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="peso">Peso:</label><br>
                        <input type="text" name="peso" id="peso" class="campo"><br><br>
                    </div>
                    <div class="width-div margin-left labelP">
                        <label for="fotos" class="label" id="labelFotos">
                            <br>
                            <div class="flex">
                                <div class="label-content">
                                    <i class="fas fa-cloud-upload-alt"></i> Imagem do produto
                                </div>
                                <div id="apagar" title="Limpar imagens"><a href="#"><i class="fas fa-eraser"></i></a>
                                </div>
                        </label>

                    </div>

                    <br>
                    <input type="file" name="img_produto[]" id="fotos" class="campo">
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

<script src="<?=$base;?>/assets/js/script.js"></script>