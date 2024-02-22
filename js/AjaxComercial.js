let btnRegistrarComercial = document.getElementById("enviar")
    
    document.addEventListener('keypress', function(event){
        if(event.key === 'Enter'){
            Insertar()
        }
    })
    btnRegistrarComercial.addEventListener('click', Insertar);
    function ValidacionEnteros(id) {
        var inputPases = document.getElementById(id);
        inputPases.addEventListener('input', function() {
            var valor = this.value;
            if (isNaN(valor)) {
                this.value = valor.slice(0, -1);
            }
        });
    }
    function InputConRadio(idInput, idRadio) {
        let Input = document.getElementById(idInput)
        let Radio = document.getElementById(idRadio)
        Input.addEventListener('focus', function () {
            Radio.checked = true
        })
    }
    function ValorDelRadio(Inputs, RadiosGroup, optionbox){
        var input = document.getElementById(Inputs)
        var radio = document.querySelectorAll(RadiosGroup)
        var box = document.getElementById(optionbox)
        radio.forEach(radio => {
            radio.addEventListener('change', function() {
                // box.style.visibility = 'hidden'
                if (this.checked) {
                    var radioId = this.id
                    input.value = radioId
                }
            })
        })
    }
    function filtrarOpciones(inputId, optionsContainerId) {
        var input = document.getElementById(inputId);
        var labels = document.querySelectorAll('#' + optionsContainerId + ' .option label');

        input.addEventListener('input', function() {
            var textoBusqueda = this.value.toLowerCase();

            labels.forEach(label => {
                var labelTexto = label.textContent.toLowerCase();
                label.style.display = labelTexto.includes(textoBusqueda) ? 'block' : 'none';
            });
        });
    }
    function Insertar() {
        let cliente = document.getElementById("cliente").value;
        let programa = document.getElementById("programa").value;
        let tipo = document.getElementById("tipo").value;
        let pases = document.getElementById("pases").value;
        let Elementcliente = document.getElementById("cliente");
        let Elementprograma = document.getElementById("programa");
        let Elementtipo = document.getElementById("tipo");
        let Elementpases = document.getElementById("pases");
        
        if (cliente.length > 0 || programa.length > 0 || tipo.length > 0 || pases.length > 0) {
            var respuesta = window.confirm("¿Deseas continuar?");
            if (respuesta) {
                var request = new XMLHttpRequest();
                request.open("POST", "../Request/Comerciales.php", true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                try {
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200) {
                            console.log(request.responseText)
                            Clientes()
                            Programas()
                            Tipos()
                            Comeciales()
                        }else{
                        }
                    };
                    var parametro = `insertar_comercial=1&programa=${encodeURIComponent(programa)}&cliente=${encodeURIComponent(cliente)}&tipo=${encodeURIComponent(tipo)}&pases=${encodeURIComponent(pases)}`;
                    request.send(parametro);
                } catch (error) {
                    console.log(error);
                }
            }
        }
    }
    function CheckConfirmacion(elemento){
        alert(elemento.id)
    }
    // BASE DE DATOS MOSTRAR VALORES
    function Clientes() {
        var response = new XMLHttpRequest()
        response.open("GET", "../Response/Clientes.php", true)
        response.onload = function () {
            if (response.status === 200) {
                try {
                    var ClientesDatos = JSON.parse(response.responseText)
                    var celdaClientes = document.getElementById("celdaClientes")
                    // console.log(ClientesDatos)
                    celdaClientes.innerHTML = `
                    <input type="radio" class="item-radio" name="cliente" id="new_cliente">
                    <input class="w100p fz15 select p10 b-shadow-5-1-gray" type="search" name="" id="cliente" placeholder="Clientes" autocomplete="off">
                    <div class="absolute options b-shadow-5-1-black w200px top45 Mh100px br10 bg-white" id="ClienteOptions">`
                    var OptionBox = document.getElementById("ClienteOptions")
                    ClientesDatos.forEach(element => {
                        OptionBox.innerHTML += `
                            <div class="option">
                                <input type="radio" class="item-radio cliente-radio" name="cliente" id="${element.des_cliente}">
                                <label for="${element.des_cliente}" class="opt p10 pointer">${element.des_cliente}</label>
                            </div>`
                    })
                    celdaClientes.innerHTML += '</div>'
                    ValorDelRadio("cliente", ".cliente-radio", "ClienteOptions")
                    InputConRadio("cliente", "new_cliente")
                    filtrarOpciones("cliente", "ClienteOptions")
                    /*PRUEBAS*/
                } catch (error) {
                    console.log(error)
                }
            }
        }
        response.send()
    }
    function Programas(){
        var response = new XMLHttpRequest()
        response.open("GET", "../Response/Programas.php", true)
        response.onload = function(){
            if(response.status === 200){
                try {
                    var ProgramasDatos = JSON.parse(response.responseText)
                    var celdaProgramas = document.getElementById("celdaProgramas")
                    // console.log(ProgramasDatos)
                    celdaProgramas.innerHTML = `
                    <input type="radio" class="item-radio" name="programa" id="new_programa">
                    <input class="w100p fz15 select p10 b-shadow-5-1-gray" type="search" name="" id="programa" placeholder="Programas" autocomplete="off">
                    <div class="absolute options b-shadow-5-1-black w200px top45 Mh100px br10 bg-white" id="ProgramaOptions">`
                    var OptionBox = document.getElementById("ProgramaOptions")
                    ProgramasDatos.forEach(element => {
                        OptionBox.innerHTML += `
                            <div class="option">
                                <input type="radio" class="item-radio programa-radio" name="programa" id="${element.des_programa}">
                                <label for="${element.des_programa}" class="opt p10 pointer">${element.des_programa}</label>
                            </div>`
                    });
                    celdaProgramas.innerHTML += '</div>'
                    ValorDelRadio("programa", ".programa-radio", "ProgramaOptions")
                    InputConRadio("programa", "new_programa")
                    filtrarOpciones("programa","ProgramaOptions")
                } catch (error) {
                    console.warn(error)
                }
            }
        }
        response.send()
    }
    function Tipos(){
        var response = new XMLHttpRequest()
        response.open("GET", "../Response/Tipos.php", true)
        response.onload = function(){
            if(response.status === 200){
                try {
                    var TiposDatos = JSON.parse(response.responseText)
                    var celdaTipos = document.getElementById("celdaTipos")
                    celdaTipos.innerHTML = `
                    <input type="radio" class="item-radio" name="tipo" id="new_tipo">
                    <input class="w100p fz15 select p10 b-shadow-5-1-gray" type="search" name="" id="tipo" placeholder="Tipos" autocomplete="off">
                    <div class="absolute options b-shadow-5-1-black w200px top45 Mh100px br10 bg-white" id="TipoOptions">`
                    var OptionBox = document.getElementById("TipoOptions")
                    TiposDatos.forEach(element => {
                        OptionBox.innerHTML += `
                            <div class="option">
                                <input type="radio" class="item-radio tipo-radio" name="tipo" id="${element.des_tipo}">
                                <label for="${element.des_tipo}" class="opt p10 pointer">${element.des_tipo}</label>
                            </div>`
                    });
                    celdaTipos.innerHTML += '</div>'
                    ValorDelRadio("tipo", ".tipo-radio", "TipoOptions")
                    InputConRadio("tipo", "new_tipo")
                    filtrarOpciones("tipo", "TipoOptions")
                } catch (error) {
                    console.error(error)
                }
            }
        }
        response.send()
    }
    function Comeciales(){
        var tabla = document.getElementById("vista_comercial")
        var response = new XMLHttpRequest
        response.open("GET", "../Response/Comerciales.php", true)
        response.onload = function(){
            if(response.status === 200){
                try {
                    var ComecialesDatos = JSON.parse(response.responseText)
                    tabla.innerHTML = ''
                    ComecialesDatos.comerciales.forEach(element => {
                        let checkboxes = '';
                        for (let i = 0; i < element.pases; i++) {
                            checkboxes += `<input type="checkbox" class="pointer" onclick="CheckConfirmacion(this)" id="${element.id_comercial}">`;
                        }
                        tabla.innerHTML += `
                        <tr>
                            <td>${(element.des_cliente) ?? ''}</td>
                            <td>${(element.des_programa) ?? ''}</td>
                            <td>${(element.des_tipo) ?? ''}</td>
                            <td>${/*pases_echos + ' / ' + */element.pases}</td>
                            <td class="f-row jc-c" id="celdaAccion">
                                ${checkboxes}
                            </td>
                        </tr>`;
                    });
                } catch (error) {
                    console.log(error)
                }
            }
        }
        response.send()
    }
    function pasesEchos(id, callback) {
        var request = new XMLHttpRequest();
        request.open("POST", "../Response/Comerciales.php", true);

        request.onload = function() {
            if (request.status === 200) {
                var devolver = JSON.parse(request.responseText);
                console.log(devolver);
                callback(devolver.pases); // Llamar al callback con los datos
            }
        };

        var parametros = `id_fk_comercial=${id}`;
        request.send(parametros);
    }
    function PasesEchos(id){
        return new Promise(function(resolve, reject){
            var request = new XMLHttpRequest()
            request.open("POST", "../Response/Comerciales.php", true)
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
            request.onreadystatechange = function(){
                try {
                    if(request.readyState == 4){
                        if(request.status == 200){
                            var datosPases = JSON.parse(request.response)
                            resolve(datosPases.pases);
                        } else {
                            reject('DX');
                        }
                    }
                } catch (error) {
                    reject(error)
                }
            }
            var parametros = `id_fk_comercial=${id}`
            request.send(parametros)
        })
    }
    async function obtenerPases(id) {
        try {
            // Llamamos a la función PasesEchos y esperamos su resolución con await
            const pases = await PasesEchos(id);
            // Almacenamos el valor retornado en una variable
            const pasesObtenidos = pases;
            console.log('Pases obtenidos:', pasesObtenidos);
            // Ahora puedes hacer lo que necesites con la variable 'pasesObtenidos'
            return pasesObtenidos; // Opcional: puedes retornar la variable si deseas
        } catch (error) {
            console.error('Error al obtener los pases:', error);
            // Manejar el error según sea necesario
        }
    }
    function ObtenerPasesFin(id){
        return obtenerPases(id)
            .then((pasesObtenidos)=>{
                return pasesObtenidos;
            })
            .catch((error) => {
                throw error;
            });
    }

    var i = ObtenerPasesFin(2)
    alert(i)
    Comeciales()
    Clientes()
    Programas()
    Tipos()
    ValidacionEnteros("pases")