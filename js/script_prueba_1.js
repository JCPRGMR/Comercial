var milisegundos = Date.now();
console.log("Milisegundos desde el inicio de la época:", milisegundos);
document.getElementById('buscadorProgramacion').addEventListener('input', function () {
    const term = this.value.toLowerCase();
    const rows = document.querySelectorAll('#vista_comercial tr');

    rows.forEach(row => {
        const cliente = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        const programa = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const tipo = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const pases = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

        if (cliente.includes(term) || programa.includes(term) || tipo.includes(term) || pases.includes(term)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});


// var i_comercial = document.getElementById("insertar_comercial")
// i_comercial.addEventListener('click', function (event) {
//     if (!window.confirm('Desea continuar?')) {
//         event.preventDefault()
//     }
// })
// function Enviar(){
//     var Enviar = document.getElementById("insertar_comercial")
//     Enviar.addEventListener('click', function(event){
//         if(!window.confirm('Desea continuar')){

//         }
//     })
// }
function Ocultar(){
    var Ocultar = document.getElementById("ocultar")
    Ocultar.addEventListener('click', function(event){
        if(!window.confirm("Esta seguro de elminar el registro?")){
            event.preventDefault()
        }
    })
}

Ocultar()

function InputOnRadio(inputId, radioId) {
    var input = document.getElementById(inputId);
    var radio = document.getElementById(radioId);

    input.addEventListener('focus', function () {
        radio.checked = true;
    });
}
function filtrarOpciones(inputId, optionsContainerId) {
    var input = document.getElementById(inputId);
    var labels = document.querySelectorAll('#' + optionsContainerId + ' .option label');
    input.addEventListener('input', function () {
        var textoBusqueda = this.value.toLowerCase();
        labels.forEach(label => {
            var labelTexto = label.textContent.toLowerCase();
            var mostrar = true;
            for (var i = 0; i < textoBusqueda.length; i++) {
                var caracter = textoBusqueda[i];
                if (labelTexto.includes(caracter)) {
                    labelTexto = labelTexto.replace(caracter, '');
                } else {
                    mostrar = false;
                    break;
                }
            }
            label.style.display = mostrar ? 'block' : 'none';
        });
    });
}
function ValueOfLabel_cliente(label) {
    var input = document.getElementById("cliente")
    input.value = label
}
function ValueOfLabel_programa(label) {
    var input = document.getElementById("programa")
    input.value = label
}
function ValueOfLabel_tipo(label) {
    var input = document.getElementById("tipo")
    input.value = label
}
filtrarOpciones("cliente", "selectcliente")
filtrarOpciones("programa", "selectprograma")
filtrarOpciones("tipo", "selecttipo")
InputOnRadio("cliente", "radio-cliente");
InputOnRadio("programa", "radio-programa");
InputOnRadio("tipo", "radio-tipo");