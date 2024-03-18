<?php session_start()?>
<?php include_once("../Response/Comerciales.php")?>
<?php include_once("../templates/header.php")?>
    <link rel="stylesheet" href="../css/Comercial2.css">
    <div class="w100p h100p bg-blackt absolute index100 f-col jc-c a-c v-hidden" id="modalFather">XD</div>
    <header class="bg-black p20 mayus f-row jc-b a-c">
        <div id="prueba" class="negrita fz30">Comercial</div>
        <div class="f-row gap10 a-c">
            <?= (isset($_SESSION["rol"])) ? $_SESSION["rol"] : header("Location: ../index.php") ?>
            <a href="../index.php" class="bg-red fz12 br5 p5 negrita">
                salir
            </a>
        </div>
    </header>
    <?php if(!isset($_GET['editar'])):?>
        <label for="abrir_formulario" id="activar_formulario" class="p10 bg-purple pointer f-col jc-c a-c">Agregar comercial</label>
    <?php endif;?>
    <!-- FORMULARIO -->
    <input type="checkbox" name="" id="abrir_formulario" <?= (isset($_GET['editar']))? 'checked' : ''?> >
    <form action="../Request/Comerciales.php" method="post" class="f-col a-c wrap bg-black" id="formulario_comercial">
        <!-- INPUT PROGRAMAS -->
        <div class="caja2 flex-1 relative f-row w100p">
            <input type="radio" name="id_programa" id="radio-programa" class="item-radio" value="">
            <input type="search" style="text-align: center; color: white;" class="fz20 bg-black1F <?= (isset($_GET['editar']) && !is_null($id_comercial->des_programa)) ? 'negrota bg-yellow-strong' : 'negrota'; ?> w100p fz15 select p10 b-shadow-5-1-gray" name="programa" id="programa" placeholder="Programa..." autocomplete="off" <?= (isset($_GET['editar']) && is_null($id_comercial->des_programa)) ? '' : ''; ?> value="<?= (isset($_GET['editar'])) ? $id_comercial->des_programa : ''; ?>" required>
            <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selectprograma">
                <div class="option">
                    <?php foreach(Programas::Mostrar() as $item):?>
                    <input type="radio" class="item-radio programa-radio" name="id_programa" id="programa_<?= $item->id_programa?>">
                    <label for="programa_<?= $item->id_programa?>" onclick="ValueOfLabel_programa('<?= $item->des_programa?>')" class="opt p10 relative">
                        <?= $item->des_programa?>
                    </label>
                    <?php endforeach;?>
                </div>
            </div>
            <button type="submit" class="absolute top0 p5 derecha25 bg-transparent pointer" name="nuevo_programa" id="nuevo_programa">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </button>
        </div>
        <!-- INPUTS DE ABAJO -->
        <div class="w100p f-row wrap">
            <!-- INPUT CLIENTE -->
            <div class="caja1 relative f-row mw200p">
                <input type="radio" class="item-radio" name="id_cliente" id="radio-cliente">
                <input type="search" style="color: white;" class="bg-black1F <?= (isset($_GET['editar']) && !is_null($id_comercial->des_cliente)) ? 'negrota bg-yellow-strong' : 'entrada'; ?> w100p fz15 select p10 b-shadow-5-1-gray" name="cliente" id="cliente" placeholder="Cliente..." <?= (isset($_GET['editar']) && is_null($id_comercial->des_cliente)) ? '' : ''; ?> autocomplete="off" value="<?= (isset($_GET['editar'])) ? $id_comercial->des_cliente : ''; ?>" required>
                <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selectcliente">
                    <div class="option">
                        <?php foreach(Clientes::Mostrar() as $item):?>
                        <input type="radio" class="item-radio programa-radio" name="id_cliente" id="cliente_<?= $item->id_cliente?>">
                        <label for="cliente_<?= $item->id_cliente?>" onclick="ValueOfLabel_cliente('<?= $item->des_cliente?>')" class="opt p10 pointer"><?= $item->des_cliente?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- INPUT TIPO -->
            <div class="caja3 relative f-row">
                <input type="radio" name="id_tipo" id="radio-tipo" class="item-radio">
                <input type="search" style="color: white;" class="<?= (isset($_GET['editar']) && !is_null($id_comercial->des_tipo)) ? 'negrota bg-yellow-strong' : 'entrada'; ?> bg-black1F Mw100p fz15 select p10 b-shadow-5-1-gray" name="tipo" id="tipo" placeholder="Tipo..." autocomplete="off" <?= (isset($_GET['editar']) && is_null($id_comercial->des_tipo)) ? '' : ''; ?> value="<?= (isset($_GET['editar'])) ? $id_comercial->des_tipo : ''; ?>" required>
                <div class="options index190 b-shadow-5-1-black w100px top40 Mh100px br10 bg-white" id="selecttipo">
                    <div class="option">
                        <?php foreach(Tipos::Mostrar() as $item):?>
                        <input type="radio" class="item-radio programa-radio" name="id_tipo" id="tipo_<?= $item->id_tipo?>">
                        <label for="tipo_<?= $item->id_tipo?>" onclick="ValueOfLabel_tipo('<?= $item->des_tipo?>')" class="opt p10 pointer"><?= $item->des_tipo?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- INPUT PASES -->
            <div class="caja4 relative f-row">
                <input type="search" style="color: white;" class="w100p bg-black1F fz15 select p10 b-shadow-5-1-gray <?= isset($_GET["editar"])? 'negrota bg-yellow-strong' : '' ?> Mw90p" name="pases" id="pases" placeholder="Pases..." autocomplete="off"  value="<?= (isset($_GET['editar'])) ? $id_comercial->pases : ''; ?>">
            </div>
            <!-- INPUT DETALLES -->
            <div class="caja2 flex-1 relative f-row mw200p">
                <textarea name="detalles" id="detalles" cols="30" rows="1" placeholder="Detalles..."style=" color: white;" class="bg-black1F <?= (isset($_GET['editar']) && !is_null($id_comercial->detalles_comercial)) ? 'negrota bg-yellow-strong' : ''; ?> w100p fz15 select p10 b-shadow-5-1-gray" name="detalles" id="detalles" autocomplete="off"><?= (isset($_GET['editar'])) ? $id_comercial->detalles_comercial : ''; ?></textarea>
                <div class="options index190 b-shadow-5-1-black w200px top50 Mh100px br10 bg-white" id="selectdetalle">
                    <div class="option">
                        <?php foreach(Pases_historial::DetallesHistorial() as $item):?>
                        <input type="radio" class="item-radio programa-radio" name="id_programa" id="detalle_<?= $item->historial_detalles?>">
                        <label for="detalle_<?= $item->historial_detalles?>" onclick="ValueOfLabel_programa('<?= $item->historial_detalles?>')" class="opt p10 relative"><?= $item->historial_detalles?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- BUTTON'S BOX -->
            <div class="btn bg-black">
                <button type="submit" class="p10 bg-purple mayus pointer negrita" name="<?= isset($_GET['editar'])? 'editar_comercial' : 'insertar_comercial' ?>" value="<?= (isset($_GET['editar'])) ? $id_comercial->id_comercial : '1';?>" id="insertar_comercial" onclick="localStorage.clear()">
                    <?= isset($_GET['editar'])? 'Guardar' : 'Registrar' ?>
                </button>
                <?php if(isset($_GET['editar'])):?>
                <a href="index.php" class="p10 bg-red" onclick="localStorage.clear()">Cancelar</a>
                <?php endif;?>
            </div>
        </div>
    </form>
    <!-- HEADER ANTESD DE LA TABLA -->
    <header class="header-programado bg-black p10 f-row a-c jc-b wrap">
        <h3>Programado</h3>
        <!-- BUSCADOR -->
        <input type="search" name="" id="buscadorProgramacion" class="p10 br50" placeholder="Buscardor">
    </header>
    <!-- TALBA DE COMERCIALES REGISTRADOS -->
    <main class="tabla h100p overflow-auto relative bg-black1F">
        <div class="container space-nw relative">
            <table class="tabla-comerciales w100p relative h100p">
                <thead class="bg-black sticky">
                    <th class="p5 mayus">Clientes</th>
                    <th class="p5 mayus">Programa</th>
                    <th class="p5 mayus">Tipo</th>
                    <th class="p5 mayus">Detalles</th>
                    <th class="p5 w100px mayus">Pases</th>
                    <?php if($_SESSION['rol'] != 'editor'): ?>
                    <th class="p5 w50px">
                        <div class="mayus">Marcar pase</div>
                    </th>
                    <?php endif; ?>
                    <?php if($_SESSION['rol'] == 'editor' || $_SESSION["rol"] === 'administrador'): ?>
                    <th class="p5 mayus w100px">Opciones</th>
                    <?php endif; ?>
                </thead>
                <tbody id="vista_comercial" class="">
                    <?php foreach(Comerciales::Mostrar() as $item):?>
                    <tr class="b1">
                        <!-- COLUMNA DE CLIENTES -->
                        <td class="b1 hp10">
                            <?= $item->des_cliente ?>
                        </td>
                        <!-- COLUMNA DE PROGRAMA DE COMERCIAL -->
                        <td class="b1 hp10">
                            <?= $item->des_programa ?>
                        </td>
                        <!-- CLUMNA DE TIPO DE COMERCIAL -->
                        <td class="b1 hp10">
                            <?= $item->des_tipo ?>
                        </td>
                        <td class="b1 hp10">
                            <?= $item->detalles_comercial ?>
                        </td>
                        <!-- COLUMNA QUE MUESTRA LA CANTIDAD DE PASES ECHOS Y POR HACER -->
                        <td class="negrita fz25 f-row jc-c a-c">
                            <?php if($item->pases == 0): ?>
                                <div class="blue">
                                    <?= Pases_historial::Pases_echos($item->id_comercial) ?>
                                </div>
                            <?php else:?>
                                <div class="blue">
                                    <?= Pases_historial::Pases_echos($item->id_comercial) ?>
                                </div>
                                /
                                <div class="">
                                    <?= $item->pases ?>
                                </div>
                            <?php endif;?>
                        </td>
                        <!-- COLUMNA QUE MUESTRA LOS BOTONES DE AGREGAR Y ELIMINAR PASES -->
                        
                    <?php if($_SESSION['rol'] != 'editor'): ?>
                    <td class="b1 hp10">
                        <form action="../Request/Pases_historial.php" method="post" class="">
                            <!-- BOTON PARA AGREGAR PASES -->
                            <button type="submit" class="bg-green p10 br5 pointer mayus" name="pases" value="<?= $item->id_comercial ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                </svg>
                            </button>
                            <!-- BOTON PARA REDUCIR LOS PASES DE LOS HISTORIALES -->
                            <?php if($_SESSION["rol"] === 'administrador'):?>
                                <button type="submit" class="bg-red p10 br5 pointer mayus" name="quitar_pases" value="<?= Pases_historial::Mostrar_Ultimo_Pase($item->id_comercial) ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                    </svg>
                                </button>
                            <?php endif;?>
                        </form>
                    </td>
                    <?php endif; ?>
                        <?php if($_SESSION['rol'] == 'editor' || $_SESSION["rol"] === 'administrador'): ?>
                            <!-- COLUMNA QUE ALMACENA LOS BOTONES DE ELIMINAR Y EDITAR -->
                            <td class="<?= ($_SESSION['rol'] != 'editor')? 'f-row overflow-auto jc-c a-c' : ' overflow-auto b1' ; ?>">
                                <!-- BOTON DE OCULTAR O ELIMINAR COMERCIAL -->
                                <?php if($_SESSION["rol"] === 'administrador'):?>
                                <form action="../Request/Comerciales.php" method="post">
                                    <button type="submit" class="bg-red p10 br5 pointer mayus"  name="ocultar" value="<?= $item->id_comercial ?>" id="ocultar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </button>
                                </form>
                                <?php endif;?>
                                <!-- BOTON PARA ELMINAR O EDITAR COMERCIAL -->
                                <form action="?editar=<?= $item->id_comercial?>" method="post">
                                    <button type="submit" class=" bg-black1F">
                                        <div type="submit" class="bg-yellow p10 br5 pointer mayus fz15"  name="editar" value="<?= $item->id_comercial ?>" onclick="localStorage.clear()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </td>   
                        <?php endif; ?>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
<script src="../js/script_prueba_12.js"></script>
<?php if(!isset($_GET["editar"])): ?>
<script src="../js/Titulo_programa1.js"></script>
<?php endif;?>
<script src="../js/CancelarEnter.js"></script>
