// alert(2)
filtrarPrograma("programa", "selectprograma")
filtrarOpciones("cliente", "selectcliente")
filtrarOpciones("tipo", "selecttipo")
filtrarOpciones("detalles", "selectdetalle")
cargarValorDesdeLocalStorage("programa")
cargarValorDesdeLocalStorage("cliente")
cargarValorDesdeLocalStorage("tipo")
cargarValorDesdeLocalStorage("pases")
cargarValorDesdeLocalStorage("detalles")
/**
 * BUSCAR EN TODA LA TABLA
 */
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
/**
 * BUSCAR EN LA COLUMNA DE PROGRAMAS
 */
document.getElementById('programa').addEventListener('input', function () {
    const term = this.value.toLowerCase()
    const rows = document.querySelectorAll('#vista_comercial tr')
    rows.forEach(row => {
        const programa = row.querySelector('td:nth-child(2)').textContent.toLowerCase()
        if (programa.includes(term)) {
            row.style.display = ''
        } else {
            row.style.display = 'none'
        }
    })
})
document.getElementById('programa').addEventListener('focus', function () {
    const term = this.value.toLowerCase()
    const rows = document.querySelectorAll('#vista_comercial tr')
    rows.forEach(row => {
        const programa = row.querySelector('td:nth-child(2)').textContent.toLowerCase()
        if (programa.includes(term)) {
            row.style.display = ''
        } else {
            row.style.display = 'none'
        }
    })
})

function DateVerified(input){
    var input = document.getElementById(input)
    if(input.value.length > 0){
        input.style.backgroundColor = "#00ff6695"
    }else{
        input.style.backgroundColor = "#ffffff"
    }
    input.addEventListener('input', function(){
        if(input.value.length > 0){
            input.style.backgroundColor = "#00ff6695"
        }else{
            input.style.backgroundColor = "#ffffff"
        }
    });
}
function cargarValorDesdeLocalStorage(inputId) {
    const input = document.getElementById(inputId);
    const storedValue = localStorage.getItem(inputId + 'Value');
    if (storedValue) {
        input.value = storedValue;
    }
    input.addEventListener('input', function () {
        const inputValue = input.value;
        localStorage.setItem(inputId + 'Value', inputValue);
    });
    input.addEventListener('focus', function () {
        const inputValue = input.value;
        localStorage.setItem(inputId + 'Value', inputValue);
    });
    input.addEventListener('click', function () {
        const inputValue = input.value;
        localStorage.setItem(inputId + 'Value', inputValue);
    });
    
    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === 'Tab') {
            const inputValue = input.value;
            localStorage.setItem(inputId + 'Value', inputValue);
        }
    });
    const inputValue = input.value;
    localStorage.setItem(inputId + 'Value', inputValue);
}
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
                    <div class="bg-white p10 br10 f-col">
                        <header class="f-row jc-b bg-black p10 negrita a-c gap10">
                            <div class="mayus fz20">
                                Informacion del comercial...
                            </div>
                            <label for="" id="cerrar_modal" class="pointer bg-red p10 br10">X</label>
                        </header>
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
function InformacionPrograma(id){
    try {
        var response = new XMLHttpRequest()
        response.open("POST", "../Json/Programas.php", true)
        response.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        try {
            response.onreadystatechange = function(){
                if(response.readyState == 4 ** response.status == 200){
                    var datos = JSON.parse(response.responseText)
                    console.log(datos)
                }
            }
        } catch (error) {
            console.log(error)
        }
    } catch (error) {
        console.log(error)
    }
}
function InfoPrograma(id){
    alert(id)
}
function Ocultar(){
    var Ocultar = document.getElementById("ocultar")
    Ocultar.addEventListener('click', function(event){
        if(!window.confirm("Desea eliminar permanentemente ese registro?")){
            event.preventDefault()
        }
    })
}
function VerifiedInsertar(){
    var Ocultar = document.getElementById("insertar_comercial")
    Ocultar.addEventListener('click', function(event){
        var Cliente = document.getElementById("cliente").value
        var Programa = document.getElementById("programa").value
        var Tipo = document.getElementById("tipo").value
        var Pases = document.getElementById("pases").value
        var Detalles = document.getElementById("detalles").value

        if(Cliente.length == 0){
            Cliente = 'Sin dato'
        }
        if(Programa.length == 0){
            Programa = 'Sin dato'
        }
        if(Tipo.length == 0){
            Tipo = 'Sin dato'
        }
        if(Pases.length == 0){
            Pases = 'Sin dato'
        }
        if(Detalles.length == 0){
            Detalles = 'Sin dato'
        }

        if(!window.confirm(`Deseas registrar estos datos en comerciales?
        Cliente => ${Cliente}
        Programa => ${Programa}
        Tipo => ${Tipo}
        Cantidad de pases => ${Pases}
        `)){
            event.preventDefault()
        }
    })
}
VerifiedInsertar()
Ocultar()
function InputOnRadio(inputId, radioId) {
    var input = document.getElementById(inputId)
    var radio = document.getElementById(radioId)

    input.addEventListener('focus', function () {
        radio.checked = true
    })
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

    // Autocompletado cuando se presiona Enter o Tab
    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === 'Tab') {
            var primerLabelVisible = null;
            for (var i = 0; i < labels.length; i++) {
                var label = labels[i];
                // console.log(label.textContent)
                if (label.style.display !== 'none') {
                    primerLabelVisible = label;
                    break;
                }
            }
            if (primerLabelVisible !== null) {
                this.value = primerLabelVisible.textContent;
            }
        }
    });
}

function filtrarPrograma(inputId, optionsContainerId) {
    var input = document.getElementById(inputId);
    var labels = document.querySelectorAll('#' + optionsContainerId + ' .option label');

    input.addEventListener('input', function () {
        var textoBusqueda = this.value.trim().toLowerCase();
        labels.forEach(label => {
            var labelTexto = label.textContent.toLowerCase();
            var mostrar = false;

            if (textoBusqueda.length === 0 || labelTexto.includes(textoBusqueda)) {
                mostrar = true;
            }

            label.style.display = mostrar ? 'block' : 'none';
        });

        var algunaCoincidencia = Array.from(labels).some(label => label.style.display !== 'none');
        var nuevo_programa = document.getElementById("nuevo_programa")
        if (textoBusqueda.length > 0 && !algunaCoincidencia) {
            // nuevo_programa.style.color = "#0010ff"
            nuevo_programa.innerHTML = /*html*/`
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            <div class="absolute derecha0 p10 bg-white w200px index100 pointer br30">
                Si desea crear un nuevo programa, haga clic en el icono...
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </div>
            `;
        }else if(textoBusqueda.length == 0 || algunaCoincidencia){
            nuevo_programa.innerHTML = /*html*/`
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>`;
        }
    });
    

    // Autocompletado con el último valor visible cuando se presiona Enter o Tab
    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === 'Tab') {
            var ultimoLabelVisible = null;
            labels.forEach(label => {
                if (label.style.display !== 'none') {
                    ultimoLabelVisible = label;
                }
            });
            if (ultimoLabelVisible !== null) {
                this.value = ultimoLabelVisible.textContent;
            }
        }
    });
}


function ValueOfLabel_cliente(label) {
    var input = document.getElementById("cliente");
    input.value = label;
    localStorage.setItem('clienteValue', label);
    document.getElementById("tipo").focus()
}

function ValueOfLabel_programa(label) {
    var input = document.getElementById("programa");
    input.value = label;
    localStorage.setItem('programaValue', label);
    /**
     * BUSCAR SOLO EN PROGRAMAS
     */
    const term = label.toLowerCase()
    const rows = document.querySelectorAll('#vista_comercial tr')
    rows.forEach(row => {
        const programa = row.querySelector('td:nth-child(2)').textContent.toLowerCase()
        if (programa.includes(term)) {
            row.style.display = ''
        } else {
            row.style.display = 'none'
        }
    })
}

function ValueOfLabel_tipo(label) {
    var input = document.getElementById("tipo");
    input.value = label;
    localStorage.setItem('tipoValue', label);
    document.getElementById("pases").focus()
}

// Al cargar la página, restaurar los valores guardados en el almacenamiento local
window.onload = function() {
    var clienteValue = localStorage.getItem('clienteValue');
    var programaValue = localStorage.getItem('programaValue');
    var tipoValue = localStorage.getItem('tipoValue');

    if (clienteValue) {
        document.getElementById("cliente").value = clienteValue;
    }
    if (programaValue) {
        document.getElementById("programa").value = programaValue;
    }
    if (tipoValue) {
        document.getElementById("tipo").value = tipoValue;
    }
};

filtrarOpciones("cliente", "selectcliente")
filtrarOpciones("tipo", "selecttipo")

InputOnRadio("cliente", "radio-cliente")
InputOnRadio("programa", "radio-programa")
InputOnRadio("tipo", "radio-tipo")
