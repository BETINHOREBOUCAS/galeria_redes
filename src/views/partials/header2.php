<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redes Rebouças</title>
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/header.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/sidebar.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/home.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/footer.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/admin.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/addProduto.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/gerenciarProduto.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/usuarios.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/addUsuario.css">
    <link rel="stylesheet" href="<?= $base;?>/assets/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
</head>

<body>
    <div class="menu-bar">
        <div class="sub-content">
            <div class="img">
                <img src="<?= $base; ?>/imgLogo/<?=$user['principal']['logo'];?>" alt="Logo Redes Rebouças" width="50">
            </div>   
            <div class="power"><a href="<?=$base;?>/admin/sair"><i class="fas fa-power-off" title="Sair"></i></a></div>         
        </div>
    </div>