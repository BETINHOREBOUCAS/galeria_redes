var fotos = document.getElementById('fotos');
var labelFotos = document.getElementsByClassName('label-content');

fotos.addEventListener('change', function(){
    console.log("entrou");
    if (fotos.files.length > 0) {
        labelFotos[0].style.background = "lightgreen"
    }
});