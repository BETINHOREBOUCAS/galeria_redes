
<?php $render('header2', ['user' => $user]); ?>
<?php $render('sidebar', ['modelos' => $modelos]); ?>

<div class="content">

    <div class="voltar">
        <a href="<?= $base; ?>/admin" title="voltar"><i class="far fa-arrow-alt-circle-left"></i></a>
    </div>

    <?php if(!empty($produtos) && isset($produtos)) :?>

    <?php $c = 0;
    for ($i = 1; $i < count($produtos)+1; $i++) : ?>
    <?php
        $c = $c + 1;

        if ($c > 3) {
            $c = 1;
        }
        ?>
    <?php if ($c == 1) : ?>
    <div class="product">
        <?php endif ?>

        <div class="details">
            <div class="action">
                <div class="edit">
                    <a href="<?=$base;?>/admin/gerenciadorProduto/editar/<?=$produtos[$i-1]['id'];?>"><i class="far fa-edit"></i></a>
                </div>
                <div class="delete">
                    <a href="javascript:;" onclick="excluir(<?=$produtos[$i-1]['id'];?>)"><i class="far fa-trash-alt"></i></a>
                </div>
            </div> <br><br>
            <div class="image">
                <img src="<?= $base; ?>/imgProdutos/<?=$produtos[$i-1]['images'][0]['nome']?>" alt="Rede Gigante">
            </div>
            <div class="title">
                <?=$produtos[$i-1]['nome']?>
            </div>
            <div class="info">
                <ul>
                    <li>Rede <?=$produtos[$i-1]['tipo'];?></li>
                    <li>Cor: <?=$produtos[$i-1]['cor'];?></li>
                    <li>Tamanho Total: <?=$produtos[$i-1]['tamanho_total'];?> metros</li>
                    <li>Tamanho Tecido: <?=$produtos[$i-1]['tamanho_tecido'];?> metros</li>
                    <li>Punho: <?=$produtos[$i-1]['punho'];?></li>
                    <li>Borda: <?=$produtos[$i-1]['borda'];?></li>
                    <li>Peso: <?=$produtos[$i-1]['peso'];?> kg</li>
                    <li>Material: 100% Algodão</li>
                </ul>
            </div>
        </div>

        <?php if ($c == 3) : ?>
    </div>
    <?php endif ?>

    <?php endfor ?>
    <?php if ((count($produtos) % 3) != 0) : ?>
</div>
<?php endif ?>
<?php else :?>
    <div style="text-align: center;">Nenhum produto cadastrado para este usúario!</div>
<?php endif ?>

<script src="<?=$base;?>/assets/js/usuarios.js"></script>
<?=$render('footer');?>
