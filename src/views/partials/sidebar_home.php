<div class="sidebar">
    <div class="category">
        Modelos
    </div>
    <div class="list">
        <div class="lista-sidebar">
            <ul>
                <li><a href="<?=$base;?>/<?=$url;?>">Todos Produtos</a></li>
                <?php foreach($modelos as $modelo):?>
                <li><a href="<?=$base;?>/<?=$url;?>?modelo=<?=$modelo['nome'];?>"><?=$modelo['nome']?></a></li>
                <?php endforeach ?>
            </ul>
        </div>

    </div>
</div>