<?php $render('header2', ['user' => $user]); ?>

<div class="form-principal">
    <div class="form">
        <form method="post" enctype="multipart/form-data">
            <div class="form-header">
                <div>
                    Editar produto
                </div>
            </div>

            <div class="form-input">
                <label for="nome">Nome do produto:</label><br>
                <input type="text" name="nome" id="nome" class="campo" value="<?=$itens['produto']['nome'];?>"><br><br>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="tamanhoTecido">Tamanho tecido:</label><br>
                        <input type="text" name="tamanho_tecido" id="tamanhoTecido" class="campo" placeholder="Comprimento x Largura" value="<?=$itens['produto']['tamanho_tecido'];?>"><br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="tamanhoTotal">Tamanho total (punho a punho):</label><br>
                        <input type="text" name="tamanho_total" id="tamanhoTotal" class="campo" placeholder="Comprimento x Largura" value="<?=$itens['produto']['tamanho_total'];?>"><br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="punho">Tipo de punho:</label><br>
                        <select name="punho" id="punho" class="campo">
                            <option value=""></option>
                            <option value="corda" <?= $itens['produto']['punho'] == 'Corda' || $itens['produto']['punho'] == 'corda'?'selected':''; ?>>Corda</option>
                            <option value="trancelim" <?= $itens['produto']['punho'] == 'Trancelim' || $itens['produto']['punho'] == 'trancelim'?'selected':''; ?>>Trancelim</option>
                        </select><br><br>
                    </div>

                    <div class="width-div margin-left">
                        <label for="borda">Borda:</label> <br>
                        <select name="borda" id="borda" class="campo">
                            <option value=""></option>
                            <option value="sem borda" <?= $itens['produto']['borda'] == 'sem borda'?'selected':''; ?>>Sem Borda</option>
                            <option value="varanda" <?= $itens['produto']['borda'] == 'varanda'?'selected':''; ?>>Varanda</option>
                            <option value="franja" <?= $itens['produto']['borda'] == 'franja'?'selected':''; ?>>Franja</option>
                        </select><br><br>
                    </div>

                </div>

                <div class="flex">
                    <div class="margin-right width-div">
                        <label for="tipo">Casal/Solteiro?:</label><br>
                        <select name="tipo" id="tipo" class="campo">
                            <option value=""></option>
                            <option value="casal" <?= $itens['produto']['tipo'] == 'casal'?'selected':''; ?>>Casal</option>
                            <option value="solteiro" <?= $itens['produto']['tipo'] == 'solteiro'?'selected':''; ?>>Solteiro</option>
                        </select><br>
                    </div>
                    <div class="margin-left width-div">
                        <label for="modelo">Modelo:</label><br>
                        <select name="modelo" id="modelo" class="campo">
                            <option value=""></option>
                            <?php foreach($modelos as $modelo):?>
                            <option value="<?=$modelo['nome'];?>" <?= $itens['produto']['modelo'] == $modelo['nome']?'selected':''; ?>><?=$modelo['nome'];?></option>
                            <?php endforeach ?>
                        </select><br><br>
                    </div>
                </div>

                <div class="flex">
                    <div class="width-div margin-right">
                        <label for="peso">Peso:</label><br>
                        <input type="text" name="peso" id="peso" class="campo" value="<?=$itens['produto']['peso'];?>"><br><br>
                    </div>
                    <div class="width-div margin-left labelP">
                        <label for="fotos" class="label" id="labelFotos">
                            <br>
                            <div class="flex">
                                <div class="label-content">
                                    <i class="fas fa-cloud-upload-alt"></i> Trocar imagem do produto
                                </div>
                                <div id="apagar" title="Limpar imagens"><a href="#"><i class="fas fa-eraser"></i></a></div>
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
<script src="<?=$base;?>/assets/js/script.js"></script>