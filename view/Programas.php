<?php include_once("../Response/Horarios.php")?>
<?php include_once("../templates/header.php")?>
<link rel="stylesheet" href="../css/Programas.css">
<div class="Container f-row jc-c a-c h100vh w100p">
    <form action="../Request/Programas.php" method="post" class="f-col br10 overflow-hidden b-shadow-5-1-black bg-white" id="formulario">
        <div class="bg-black p20 negrita mayus f-row jc-b">
        Nuevo Programa
        <a href="index.php" class="bg-black">
            Cancelar
        </a>
        </div>
        <div class="p10 f-col">
            <input type="text" name="programa" id="des_programa" placeholder="Nombre..." autofocus class="b-shadow-5-1-gray p10 br7" required autocomplete="off">
        </div>
        <div class="p10 f-col">
            <label for="" class="negrita vp10">De que trata el programa?</label>
            <textarea name="detalles" id="" cols="30" rows="3" placeholder="Detalles" class="b-shadow-5-1-gray br7 p10"></textarea>
        </div>
        <div class="p10 mayus">
            <div class="negrita bg-purple p10 br10">
                Horario - dias
            </div>
            <div class="f-row gap10 p10 wrap">
                <input type="checkbox" name="dia[]" id="lunes" value="LUNES" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="lunes">
                    Lun
                </label>
                <input type="checkbox" name="dia[]" id="martes" value="MARTES" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="martes">
                    Mar
                </label>
                <input type="checkbox" name="dia[]" id="miercoles" value="MIERCOLES" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="miercoles">
                    Mie
                </label>
                <input type="checkbox" name="dia[]" id="jueves" value="JUEVES" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="jueves">
                    Jue
                </label>
                <input type="checkbox" name="dia[]" id="viernes" value="VIERNES" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="viernes">
                    Vie
                </label>
                <input type="checkbox" name="dia[]" id="sabado" value="SABADO" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="sabado">
                    Sab
                </label>
                <input type="checkbox" name="dia[]" id="domingo" value="DOMINGO" class="dia_c absolute v-hidden">
                <label class="b-shadow-5-1-gray p10 pointer dia negrita br20" for="domingo">
                    Dom
                </label>
            </div>
        </div>
        <div class="p10 mayus">
            <div class="negrita bg-purple p10 br10">
                Horario - horas
            </div>
            <div class="f-row gap10 p10 jc-a a-c negrita wrap">
                inicio
                <input type="time" name="h_inicio" id="h_inicio" class="b-shadow-5-1-gray p10 br7" value="<?= date('H:i') ?>">
                fin
                <input type="time" name="h_fin" id="h_fin" class="b-shadow-5-1-gray p10 br7" value="<?= date('H:i', strtotime('+1 hour')) ?>">
            </div>
        </div>
        <button type="submit" class="bg-purple p15 mayus negrita pointer" name="nuevo" id="enviar" value="">GUARDAR</button>
    </form>
</div>
<script>
var h_inicio = document.getElementById("h_inicio");
var h_fin = document.getElementById("h_fin");

h_inicio.addEventListener('input', function(){
    var horaInicio = new Date("2024-02-27 " + h_inicio.value);
    var horaFin = new Date("2024-02-27 " + h_fin.value);

    if (horaInicio >= horaFin) {
        horaInicio.setHours(horaInicio.getHours() + 1);
        h_fin.value = horaInicio.getHours().toString().padStart(2, '0') + ":" + horaInicio.getMinutes().toString().padStart(2, '0');
    }
});

h_fin.addEventListener('input', function(){
    var horaInicio = new Date("2024-02-27 " + h_inicio.value);
    var horaFin = new Date("2024-02-27 " + h_fin.value);

    if (horaInicio >= horaFin) {
        horaInicio.setHours(horaInicio.getHours() - 2);
        h_inicio.value = horaInicio.getHours().toString().padStart(2, '0') + ":" + horaInicio.getMinutes().toString().padStart(2, '0');
    }
});
function CancelarEnter(input){
    var miInput =document.getElementById(input)
    var formulario =document.getElementById("formulario")

    miInput.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });
}
CancelarEnter("des_programa")
CancelarEnter("h_inicio")
CancelarEnter("h_fin")

var btn_enviar = document.getElementById("enviar");
var checkboxes = document.querySelectorAll('input[type="checkbox"]');

btn_enviar.addEventListener("click", function(event) {
    var seleccionados = Array.from(checkboxes).filter(function(checkbox) {
        return checkbox.checked;
    });

    if (seleccionados.length === 0) {
        alert('Por favor seleccione al menos un día.');
        event.preventDefault();
    }
});

</script>
