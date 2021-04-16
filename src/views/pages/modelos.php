<?php
$render('header2', ['user' => $user]);
?>
<div class="form-principal">

    <div class="form">
        <form method="post">

            <div class="form-header">
                <div>
                    Adicionar/Editar modelo
                </div>
            </div>
            <?php if (!empty($aviso)) : ?>
                <div class="aviso">
                    <div style="background-color: <?= $color; ?>;"><?= $aviso; ?></div>
                </div>
            <?php endif ?>
            <div class="checkbox">
                <input type="radio" name="checar" id="checkAdd" checked value="add"> <label for="checkAdd">Adicionar Modelo</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="checar" id="checkEditar" value="editar"> <label for="checkEditar">Editar Modelo</label>
            </div>
            <div class="checkbox">
                <input type="radio" name="checar" id="checkExcluir" value="excluir"> <label for="checkExcluir">Excluir Modelo</label>
            </div>

            <div class="form-input">

                <div id="campoModelos">
                    <label for="modelos">Modelos:</label><br>
                    <select name="modelos" id="modelos" class="campo">
                        <option value=""></option>
                        <?php foreach ($modelos as $modelo) : ?>
                            <option value="<?= $modelo['nome']; ?>"><?= $modelo['nome']; ?></option>
                        <?php endforeach ?>
                    </select> <br><br>
                </div>

                <div id="campoNovoModelo">
                    <label for="nModelo">Novo Modelo:</label><br>
                    <input type="text" name="nModelo" id="nModelo" class="campo"><br><br>
                </div>



            </div>
            <div class="form-footer">
                <div class="margin-right">
                    <a href="<?= $base; ?>/admin" class="bt-sair">
                        Voltar
                    </a>
                </div>

                <div class="margin-left">
                    <input type="submit" value="Gravar" class="bt-entrar">
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?= $base; ?>/assets/js/modelos.js"></script>
<?= $render('footer'); ?>