// Mudar a cor se tem foto para upload

var labelFotos = document.getElementById('labelFotos');
var apagar = document.getElementById("apagar");

labelFotos.addEventListener('change', function(){
    var fotos = document.getElementById("fotos");
    if (fotos.files.length > 0) {
        document.getElementsByClassName('label-content')[0].style.background = "lightgreen";
    }    
});

apagar.addEventListener("click", function(){
    fotos.value = "";
    document.getElementsByClassName('label-content')[0].style.background = "#C9C9CC";
});