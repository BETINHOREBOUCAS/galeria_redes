function excluir(id) {
    let confirmar = confirm('Deseja excluir?');
    let xmlHttp;

    if (confirmar) {
        if (window.XMLHttpRequest) {
            xmlHttp = new XMLHttpRequest;
        } else {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlHttp.open('POST', 'http://localhost/projetos/projetos/galeria_redes/public/admin/gerenciadorProduto/excluir', true);

        // Cabeçalho de requisição

        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("id_produto="+id);

        window.location = window.location;
    }
}