var programa = document.getElementById("programa")
if(programa.value.length > 0){
    
}else{
    setInterval(Titulo, 10)
    
    function Titulo(){
        var programa = document.getElementById("programa")
        var response = new XMLHttpRequest()
        // response.open("GET","../Json/Programa_input.php",true)
        response.open("GET","../Json/Programa_input.php",true)
        response.onload = function(){
            try {
                if(response.status === 200){
                    console.log(response.response)
                    programa.value = response.response;
                }
            } catch (error) {
                console.log(error)
            }
        }
        response.send()
    }
}
/**

            PROBLEM PRINCIPAL A ARREGLAR

 */