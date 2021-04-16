// Verificar Checkbox

var add = document.getElementById('checkAdd');
var editar = document.getElementById('checkEditar');
var excluir = document.getElementById('checkExcluir');

var modelos = document.getElementById('campoModelos');
var modelosNovo = document.getElementById('campoNovoModelo');

add.addEventListener('click', function(){
    modelosNovo.style.display = 'block';
    modelos.style.display = 'none';

    if (add.checked) {
        modelosNovo.style.display = 'block';
    }
    console.log('add');
});

editar.addEventListener('click', function(){
    modelosNovo.style.display = 'block';
    modelos.style.display = 'none';

    if (editar.checked) {
        modelosNovo.style.display = 'block';
        modelos.style.display = 'block';
    }
    console.log('editar');
});

excluir.addEventListener('click', function(){
    modelosNovo.style.display = 'block';
    modelos.style.display = 'none';

    if (excluir.checked) {
        modelosNovo.style.display = 'none';
        modelos.style.display = 'block';
    }
    console.log('excluir');
});




/*
checkEditar.addEventListener('click', function(){
    if (checkEditar.checked) {
        modelosEditar.style.display = 'block';
    } else {
        modelosEditar.style.display = 'none';
    }
    console.log('editar');
});

checkExcluir.addEventListener('click', function(){
    if (checkExcluir.checked) {
        modelosExcluir.style.display = 'none';
        
    } else {
        modelosExcluir.style.display = 'block';
        
    }
    console.log('excluir');
});
*/