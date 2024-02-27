<?php include_once("../Response/Comerciales.php")?>
<?php include_once("../templates/header.php")?>
    <link rel="stylesheet" href="../css/Comercial.css">
    <div class="w100p h100p bg-blackt absolute index100 f-col jc-c a-c v-hidden" id="modalFather">XD</div>
    <header class="bg-black p5 mayus">
        <h1 id="prueba">Comercial</h1>
    </header>
    <form action="../Request/Comerciales.php" method="post" class="f-row a-c" id="formulario_comercial">
        <div class="caja1 flex-1 relative f-col">
            <input type="radio" class="item-radio" name="id_cliente" id="radio-cliente">
            <input type="search" class="<?= (isset($_GET['editar']) && !is_null($id_comercial->des_cliente)) ? 'negrota bg-purple' : 'entrada'; ?> w100p fz15 select p10 b-shadow-5-1-gray" name="cliente" id="cliente" placeholder="Cliente..." <?= (isset($_GET['editar']) && is_null($id_comercial->des_cliente)) ? 'autofocus' : ''; ?> autocomplete="off" value="<?= (isset($_GET['editar'])) ? $id_comercial->des_cliente : ''; ?>">
            <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selectcliente">
                <div class="option">
                    <?php foreach(Clientes::Mostrar() as $item):?>
                    <input type="radio" class="item-radio programa-radio" name="id_cliente" id="<?= $item->id_cliente?>">
                    <label for="<?= $item->id_cliente?>" onclick="ValueOfLabel_cliente('<?= $item->des_cliente?>')" class="opt p10 pointer"><?= $item->des_cliente?></label>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="caja2 flex-1 relative f-row">
            <input type="radio" name="id_programa" id="radio-programa" class="item-radio">
            <input type="search" class="<?= (isset($_GET['editar']) && !is_null($id_comercial->des_programa)) ? 'negrota bg-purple' : 'entrada'; ?> w100p fz15 select p10 b-shadow-5-1-gray" name="programa" id="programa" placeholder="Programa..." autocomplete="off" <?= (isset($_GET['editar']) && is_null($id_comercial->des_programa)) ? 'autofocus' : ''; ?> value="<?= (isset($_GET['editar'])) ? $id_comercial->des_programa : ''; ?>">
            <div class="options index190 b-shadow-5-1-black w200px top40 Mh100px br10 bg-white" id="selectprograma">
                <div class="option">
                    <?php foreach(Programas::Mostrar() as $item):?>
                    <input type="radio" class="item-radio programa-radio" name="id_programa" id="<?= $item->id_programa?>">
                    <label for="<?= $item->id_programa?>" onclick="ValueOfLabel_programa('<?= $item->des_programa?>')" class="opt p10 pointer"><?= $item->des_programa?></label>
                    <?php endforeach;?>
                </div>
            </div>
            <button type="submit" class="absolute top5 derecha25 bg-transparent pointer" name="nuevo_programa" id="nuevo_programa">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </button>
        </div>
        <div class="caja3 flex-1 relative f-col">
            <input type="radio" name="id_tipo" id="radio-tipo" class="item-radio">
            <input type="search" class="<?= (isset($_GET['editar']) && !is_null($id_comercial->des_tipo)) ? 'negrota bg-purple' : 'entrada'; ?> w100p fz15 select p10 b-shadow-5-1-gray" name="tipo" id="tipo" placeholder="Tipo..." autocomplete="off" <?= (isset($_GET['editar']) && is_null($id_comercial->des_tipo)) ? 'autofocus' : ''; ?> value="<?= (isset($_GET['editar'])) ? $id_comercial->des_tipo : ''; ?>">
            <div class="options index190 b-shadow-5-1-black w100px top40 Mh100px br10 bg-white" id="selecttipo">
                <div class="option">
                    <?php foreach(Tipos::Mostrar() as $item):?>
                    <input type="radio" class="item-radio programa-radio" name="id_tipo" id="<?= $item->id_tipo?>">
                    <label for="<?= $item->id_tipo?>" onclick="ValueOfLabel_tipo('<?= $item->des_tipo?>')" class="opt p10 pointer"><?= $item->des_tipo?></label>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="caja4 flex-1 relative f-col">
            <input type="search" class="w100p fz15 select p10 b-shadow-5-1-gray" name="pases" id="pases" placeholder="Pases..." autocomplete="off"  value="<?= (isset($_GET['editar'])) ? $id_comercial->pases : ''; ?>">
        </div>
        <div class="btn">
            <button type="submit" class="p10 bg-purple mayus pointer negrita" name="<?= isset($_GET['editar'])? 'editar_comercial' : 'insertar_comercial' ?>" value="<?= (isset($_GET['editar'])) ? $id_comercial->id_comercial : '1';?>" id="insertar_comercial">
                <?= isset($_GET['editar'])? 'Editar' : 'Enviar' ?>
            </button>
        </div>
    </form>
    <header class="header-programado bg-black p10 f-row a-c jc-b wrap">
        <h3>Programado</h3>
        <input type="search" name="" id="buscadorProgramacion" class="p10 br50" placeholder="Buscardor">
    </header>
    <main class="tabla h100vh overflow-hidden relative">
        <div class="container space-nw overflow-auto relative">
            <table class="tabla-comerciales w100p relative h100p">
                <thead class="bg-black sticky">
                    <th class="p5 mayus">Clientes</th>
                    <th class="p5 mayus">Programa</th>
                    <th class="p5 mayus">Tipo</th>
                    <th class="p5 w100px mayus">Pases</th>
                    <th class="p5 w50px">
                        <div class="mayus">Marcar pase</div>
                    </th>
                    <th class="p5 mayus w100px">Opciones</th>
                </thead>
                <tbody id="vista_comercial" class="">
                    <?php foreach(Comerciales::Mostrar() as $item):?>
                    <tr class="b1">
                        <td class="b1">
                            <?= $item->des_cliente ?>
                        </td>
                        <td class="b1 relative">
                            <?= $item->des_programa ?>
                        </td>
                        <td class="b1">
                            <?= $item->des_tipo ?>
                        </td>
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
                        <td class="b1">
                            <form action="../Request/Pases_historial.php" method="post" class="">
                                <button type="submit" class="bg-green p10 br5 pointer mayus" name="pases" value="<?= $item->id_comercial ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="min-content-w f-row jc-c a-c gap5 overflow-auto">
                            <form action="../Request/Comerciales.php" method="post">
                                <button type="submit" class="bg-black p10 br5 pointer mayus"  name="ocultar" value="<?= $item->id_comercial ?>" id="ocultar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                        <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                    </svg>
                                </button>
                            </form>
                            <form action="?editar=<?= $item->id_comercial?>" method="post">
                                <button type="submit">
                                    <div type="submit" class="bg-yellow p10 br5 pointer mayus fz15"  name="editar" value="<?= $item->id_comercial ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                        </svg>
                                    </div>
                                </button>
                            </form>
                            <button class="bg-blue p10 br5 pointer mayus" name="informacion" value="<?= $item->id_comercial ?>" onclick="ModalComercial(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                <!-- <tfoot class="bg-black sticky">
                    <th class="p5 mayus">Clientes</th>
                    <th class="p5 mayus">Programa</th>
                    <th class="p5 mayus">Tipo</th>
                    <th class="p5 mayus">Pases</th>
                    <th class="p5 w50px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                        </svg>
                    </th>
                    <th class="p5 mayus w100px">Opciones</th>
                </tfoot> -->
            </table>
        </div>
    </main>
</body>
</html>
<script src="../js/script_prueba_3.js"></script>