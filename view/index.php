<?php include_once("../Response/Comerciales.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/index1.css">
    <link rel="stylesheet" href="../css/style4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="header-principal bg-black p5">
        <h1 id="prueba">Comercial</h1>
    </header>
    <main class="tabla h100p">
        <form action="../Request/Comerciales.php" method="post" class="f-row a-c" id="formulario_comercial">
            <div class="caja1 flex-1 relative f-col">
                <input type="radio" class="item-radio" name="id_cliente" id="radio-cliente">
                <input type="search" class="w100p fz15 select p10 b-shadow-5-1-gray" name="cliente" id="cliente" placeholder="Cliente..." autocomplete="off">
                <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selectcliente">
                    <div class="option">
                        <?php foreach(Clientes::Mostrar() as $item):?>
                        <input type="radio" class="item-radio programa-radio" name="id_cliente" id="<?= $item->id_cliente?>">
                        <label for="<?= $item->id_cliente?>" onclick="ValueOfLabel_cliente('<?= $item->des_cliente?>')" class="opt p10 pointer"><?= $item->des_cliente?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="caja2 flex-1 relative f-col">
                <input type="radio" name="id_programa" id="radio-programa" class="item-radio">
                <input type="search" class="w100p fz15 select p10 b-shadow-5-1-gray" name="programa" id="programa" placeholder="Programa..." autocomplete="off">
                <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selectprograma">
                    <div class="option">
                        <?php foreach(Programas::Mostrar() as $item):?>
                        <input type="radio" class="item-radio programa-radio" name="id_programa" id="<?= $item->id_programa?>">
                        <label for="<?= $item->id_programa?>" onclick="ValueOfLabel_programa('<?= $item->des_programa?>')" class="opt p10 pointer"><?= $item->des_programa?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="caja3 flex-1 relative f-col">
                <input type="radio" name="id_tipo" id="radio-tipo" class="item-radio">
                <input type="search" class="w100p fz15 select p10 b-shadow-5-1-gray" name="tipo" id="tipo" placeholder="Tipo..." autocomplete="off">
                <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selecttipo">
                    <div class="option">
                        <?php foreach(Tipos::Mostrar() as $item):?>
                        <input type="radio" class="item-radio programa-radio" name="id_tipo" id="<?= $item->id_tipo?>">
                        <label for="<?= $item->id_tipo?>" onclick="ValueOfLabel_tipo('<?= $item->des_tipo?>')" class="opt p10 pointer"><?= $item->des_tipo?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="caja4 flex-1 relative f-col">
                <input type="search" class="w100p fz15 select p10 b-shadow-5-1-gray" name="pases" id="pases" placeholder="Pases..." autocomplete="off">
            </div>
            <div class="btn">
                <button type="submit" class="p10 bg-purple mayus pointer" name="insertar_comercial" value="1" id="insertar_comercial">Enviar</button>
            </div>
        </form>
        <header class="header-principal bg-black p10 f-row a-c jc-b">
            <h3>Programado</h3>
            <input type="search" name="" id="buscadorProgramacion" class="p10" placeholder="Buscardor">
        </header>
        <table class="tabla-comerciales tabla w100p" border="1">
            <thead>
                <th class="p5 bg-black">Clientes</th>
                <th class="p5 bg-black">Programa</th>
                <th class="p5 bg-black">Tipo</th>
                <th class="p5 bg-black">Pases</th>
                <th class="p5 bg-black">Accion</th>
            </thead>
            <tbody id="vista_comercial">
                <?php foreach(Comerciales::Mostrar() as $item):?>
                <tr>
                    <td>
                        <?= $item->des_cliente ?>
                    </td>
                    <td>
                        <?= $item->des_programa ?>
                    </td>
                    <td>
                        <?= $item->des_tipo ?>
                    </td>
                    <td>
                        <?= Pases_historial::Pases_echos($item->id_comercial) ?>
                        <?= '/ ' . $item->pases ?>
                    </td>
                    <td class="min-content-w bg-black">
                        <?php for($i = Pases_historial::Pases_echos($item->id_comercial); $i < $item->pases; $i++):?>
                        <input type="checkbox" name="check" id="" value="1">
                        <?php endfor;?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
<script>
    var i_comercial = document.getElementById("insertar_comercial")
    var formulario_comercial = document.getElementById("formulario_comercial")
    i_comercial.addEventListener('click', function(event){
        if(!window.confirm('Desea continuar?')){
            event.preventDefault()
        }
    })
    function InputOnRadio(inputId, radioId) {
        var input = document.getElementById(inputId);
        var radio = document.getElementById(radioId);

        input.addEventListener('focus', function() {
            radio.checked = true;
        });
    }
    function filtrarOpciones(inputId, optionsContainerId) {
        var input = document.getElementById(inputId);
        var labels = document.querySelectorAll('#' + optionsContainerId + ' .option label');
        input.addEventListener('input', function() {
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
    function ValueOfLabel_cliente(label){
        var input = document.getElementById("cliente")
        input.value = label
    }
    function ValueOfLabel_programa(label){
        var input = document.getElementById("programa")
        input.value = label
    }
    function ValueOfLabel_tipo(label){
        var input = document.getElementById("tipo")
        input.value = label
    }
    filtrarOpciones("cliente", "selectcliente")
    filtrarOpciones("programa","selectprograma")
    filtrarOpciones("tipo","selecttipo")
    InputOnRadio("cliente", "radio-cliente");
    InputOnRadio("programa", "radio-programa");
    InputOnRadio("tipo", "radio-tipo");
</script>