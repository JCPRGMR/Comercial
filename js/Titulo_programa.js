var programa = document.getElementById("programa");
var intervalo = setInterval(obtenerPrograma, 600);
programa.addEventListener('focus', function () {
    clearInterval(intervalo);
});
programa.addEventListener('click', function(){
    clearInterval(intervalo);
});
programa.addEventListener('input', function(){
    clearInterval(intervalo);
});
function obtenerPrograma() {
    var response = new XMLHttpRequest();
    response.open("POST", "../Json/Programa_input.php", true);
    response.onreadystatechange = function () {
        try {
            if (response.status === 200) {
                console.log(response.response);
                programa.value = response.response;
            }
        } catch (error) {
            console.log(error);
        }
    };
    response.send();
}
