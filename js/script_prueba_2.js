// alert('XD')
var milisegundos = Date.now()
console.log("Milisegundos desde el inicio de la época:", milisegundos)
document.getElementById('buscadorProgramacion').addEventListener('input', function () {
    const term = this.value.toLowerCase()
    const rows = document.querySelectorAll('#vista_comercial tr')
    rows.forEach(row => {
        const cliente = row.querySelector('td:nth-child(1)').textContent.toLowerCase()
        const programa = row.querySelector('td:nth-child(2)').textContent.toLowerCase()
        const tipo = row.querySelector('td:nth-child(3)').textContent.toLowerCase()
        const pases = row.querySelector('td:nth-child(4)').textContent.toLowerCase()

        if (cliente.includes(term) || programa.includes(term) || tipo.includes(term) || pases.includes(term)) {
            row.style.display = ''
        } else {
            row.style.display = 'none'
        }
    })
})
// var padre = document.getElementById('body')
function ModalComercial(element) {
    var id_comercial = element.value;
    try {
        var response = new XMLHttpRequest()
        response.open("POST", "../Json/Comerciales.php", true)
        response.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        try {
            response.onreadystatechange = function(){
                if(response.readyState == 4 && response.status == 200){
                    var datos = JSON.parse(response.responseText)
                    cuerpo.innerHTML = /*html*/`
                    <div class="bg-white">
                        <label for="" id="cerrar_modal" class="pointer">Cerrar modal</label>
                        <form action="" method="post">
                            <input type="search" name="" id="" value="${datos.des_cliente}">
                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                    `
                }
                var cerrar_modal = document.getElementById("cerrar_modal")
                cerrar_modal.addEventListener('click', function(){
                    cuerpo.style.visibility = 'hidden'
                })
            }
        } catch (error) {
            console.log(error)
        }
        var parametros = "id_comercial=" + id_comercial
        response.send(parametros)
    } catch (error) {
        console.log(error)
    }

    var cuerpo = document.getElementById("modalFather")
    cuerpo.style.visibility = 'visible'
    
}
function Ocultar(){
    var Ocultar = document.getElementById("ocultar")
    Ocultar.addEventListener('click', function(event){
        if(!window.confirm("Ya no mostrar este comercial")){
            event.preventDefault()
        }
    })
}
Ocultar()
function InputOnRadio(inputId, radioId) {
    var input = document.getElementById(inputId)
    var radio = document.getElementById(radioId)

    input.addEventListener('focus', function () {
        radio.checked = true
    })
}
function filtrarOpciones(inputId, optionsContainerId) {
    var input = document.getElementById(inputId)
    var labels = document.querySelectorAll('#' + optionsContainerId + ' .option label')
    input.addEventListener('input', function () {
        var textoBusqueda = this.value.toLowerCase()
        labels.forEach(label => {
            var labelTexto = label.textContent.toLowerCase()
            var mostrar = true
            for (var i = 0; i < textoBusqueda.length; i++) {
                var caracter = textoBusqueda[i]
                if (labelTexto.includes(caracter)) {
                    labelTexto = labelTexto.replace(caracter, '')
                } else {
                    mostrar = false
                    break
                }
            }
            label.style.display = mostrar ? 'block' : 'none'
        })
    })
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
InputOnRadio("cliente", "radio-cliente")
InputOnRadio("programa", "radio-programa")
InputOnRadio("tipo", "radio-tipo")