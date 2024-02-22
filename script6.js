const btn = document.getElementById("btn");
var radio0 = document.getElementById("0");
var des_cliente = document.getElementById("des_cliente");

des_cliente.addEventListener('focus', function(){
    radio0.checked = "true";
    if(radio0.checked == "true"){
        alert("");
    }
})

Mostrar();

btn.addEventListener('click', insertar);

function insertar(){
    var request = new XMLHttpRequest();
    var des_cliente = document.getElementById("des_cliente").value;
    var btn_agregar = document.getElementById("btn").dataset.value;

    if (des_cliente.length > 0) {
        request.open("POST", "../Request/Clientes.php", true);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var parametros = "des_cliente=" + encodeURIComponent(des_cliente) + "&btn_agregar=" + encodeURIComponent(btn_agregar);

        request.onreadystatechange = function () {
            if (request.readyState == XMLHttpRequest.DONE) {
                if (request.status == 200) {
                    alert(request.responseText);
                } else {
                    alert("Error al enviar los datos. Código de estado: " + request.status);
                }
            }
        };
        request.send(parametros);
    } else {
        alert("El campo de cliente está vacío. Por favor, ingrese un valor. XDDD");
    }
}

function Mostrar() {
    var response = new XMLHttpRequest();
    response.open("GET", "../Response/Clientes.php", true);
    response.onload = function () {
        if (response.status === 200) {
            try {
                var clientes = JSON.parse(response.responseText);
                clientes.forEach(element => {
                    // console.log(element.des_cliente);
                    var select = document.getElementById("select");
                    select.innerHTML += `<input type="radio" class="item-radio" name="cliente" id="${element.id_cliente}">
                                            <label for="${element.id_cliente}" class="bg-purple">${element.des_cliente}</label>
                                        <br>`

                });
            } catch (error) {
                console.error("Error al analizar la respuesta JSON:", error);
            }
        }
    };
    response.send();
}


// function Mostrar(){
//     var response = new XMLHttpRequest()

//     response.open("GET", "../Response/Clientes.php", true)
//     response.onload = function () {
//         if (response.status === 200) {
//             var jsn = JSON.parse(response.responseText)
//             var option_box = document.getElementById("option_box")

//             jsn.clientes.forEach(function (obj, index) {
//                 option_box.innerHTML += `
//                     <div class="opt" id="opt">
//                         <input type="radio" name="item" class="item-radio" id="${obj.id_cliente}">
//                         <label for="${obj.id_cliente}" class="item">${obj.des_cliente}</label>
//                     </div>
//                 `
//             })
//         }
//     }
//     response.send()
// }