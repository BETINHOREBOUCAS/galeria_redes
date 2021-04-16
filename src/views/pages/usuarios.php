<?= $render('header2', ['user' => $user]); ?>

<div class="user-content" style="justify-content: start; top: 150px;">
    <div class="voltar">
        <a href="<?=$base;?>/admin" title="voltar"><i class="far fa-arrow-alt-circle-left"></i></a>
    </div>
</div>

<?php if(!empty($usuarios) && isset($usuarios)) :?>

<?php $c = 0;
for ($i = 1; $i < count($usuarios)+1; $i++) : ?>
<?php
    $c = $c + 1;

    if ($c > 3) {
        $c = 1;
    }
    ?>
<?php if ($c == 1) : ?>
<div class="user-content">
    <?php endif ?>


    <div class="data-user">
        <div class="action">
            <div class="edit">
                <a href="<?=$base;?>/admin/usuarios/editar/<?=$usuarios[$i-1]['id'];?>"><i class="far fa-edit"></i></a>
            </div>
            <div class="delete" id="delete" onclick="excluir(<?=$usuarios[$i-1]['id'];?>)"><i class="far fa-trash-alt"></i></a>
            </div>
        </div> <br><br>
        <div class="photo">
            <img src="<?=$base;?>/imgUser/<?=$usuarios[$i-1]['img_user'];?>" width="100" height="100">
        </div>

        <div class="info">
            <p>Úsuario: <?=$usuarios[$i-1]['nome'];?></p>
            <p>E-mail: <?=$usuarios[$i-1]['email'];?></p>
            <p>Permissão: <?=$usuarios[$i-1]['permissao'];?></p>
        </div>
        <div class="options-user">

        </div>
    </div>

    <?php if ($c == 3) : ?>
</div>
<?php endif ?>

<?php endfor ?>
<?php if ((count($usuarios) % 3) != 0) : ?>
</div>
<?php endif ?>
<?php else :?>
<div class="user-content">
    <div style="text-align: center;">Nenhum usuário cadastrado!</div>
</div>
<?php endif ?>
</div>
</div>

<script src="<?=$base;?>/assets/js/produtos.js"></script>