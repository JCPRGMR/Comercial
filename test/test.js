setInterval(Titulo, 1000)

function Titulo(){
    var response = new XMLHttpRequest()
    // response.open("GET","../Json/Programa_input.php",true)
    response.open("GET","../Json/Programa_input.php",true)
    response.onload = function(){
        try {
            if(response.status === 200){
                console.log(response.response)
            }
        } catch (error) {
            console.log(error)
        }
    }
    response.send()
}