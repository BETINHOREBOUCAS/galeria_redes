<?= $render('header2', ['user' => $user]); ?>

<div class="content-config">
    <?php if (!empty($aviso)) : ?>
        <div class="aviso">
            <div style="background-color: <?= $color; ?>;"><?= $aviso; ?></div>
        </div>
    <?php endif ?>
    <div class="panel-admin">
        <div>
            <a href="<?= $base; ?>/admin/addProduto">
                <div class="options">
                    <div class="icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <div class="desc">
                        Adicionar <br> Produto
                    </div>
                </div>
            </a>

            <a href="<?= $base; ?>/admin/addUsuarios">
                <div class="options">
                    <div class="icon">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="desc">
                        Adicionar <br> Usúario
                    </div>
                </div>
            </a>

        </div>
        <div>
            <a href="<?= $base; ?>/admin/gerenciadorProduto">
                <div class="options">
                    <div class="icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="desc">
                        Gerenciar <br> Produto
                    </div>
                </div>
            </a>

            <a href="<?= $base; ?>/admin/usuarios">
                <div class="options">
                    <div class="icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="desc">
                        Gerenciar <br> Usúario
                    </div>
                </div>
            </a>
        </div>
        <div>
            <a href="<?= $base; ?>/admin/modelos">
                <div class="options">
                    <div class="icon">
                    <i class="fab fa-buromobelexperte"></i>
                    </div>
                    <div class="desc">
                        Gerenciar <br> Modelos
                    </div>
                </div>
            </a>

            <a href="<?= $base; ?>/admin/config">
                <div class="options" disabled>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="desc">
                        Configurações
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>