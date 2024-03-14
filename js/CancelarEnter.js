// alert(2)
document.addEventListener('keypress', function(event){
    if (event.key === 'Enter') {
        event.preventDefault();
        
        var fprograma = document.getElementById("programa");
        var fcliente = document.getElementById("cliente");
        var ftipo = document.getElementById("tipo");
        var fpases = document.getElementById("pases");
        var fdetalles = document.getElementById("detalles");

        var btnEnviarRegistro = document.getElementById("insertar_comercial");
        
        if (document.activeElement.id === "programa") {
            fcliente.focus();
        } else if (document.activeElement.id === "cliente") {
            ftipo.focus();
        } else if (document.activeElement.id === "tipo") {
            fpases.focus();
        } else if (document.activeElement.id === "pases") {
            fdetalles.focus();
        } else if (document.activeElement.id === "detalles") {
            document.getElementById("insertar_comercial").click();
        }
    }
});
