<?php 
    require './includes/header.php';
    require './includes/navbar.php';
    require './includes/classes/SecretarServiciu.php';
    
    if(isset($_SESSION['rol'])){
        $rol                = $_SESSION['rol'];
        $registru           = Functions::getRegistru($rol);
        $numar_documente    = SecretarServiciu::getCountAlocare($registru);
        $numar_urmator      = Functions::getNumarCurent($registru, $rol);
    }
?>
<?php if(isLogged()) :?>
    <div id="container-top-bottom">
            <div class="container-fluid" id="container-serviciu">
                <div class="row">
                    <div class="col-12">
                    <form id="form_add_document" action="./includes/inregistreaza.php" method="POST" class="py-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-5">
                                    <fieldset class="fieldset">
                                        <legend> # - INTRARE:</legend>
                                        <div class="rand mt-2">
                                            <label id="label" for="numarCorespondentaIntrata" class="">Numarul curent al corespondentei</label>
                                            <input name="serviciu-intrare-numar-curent" type="text" class="form-control mb-1 text-center" id="numar_curent_corespondenta" value="<?php echo $numar_urmator; ?>">
                                        </div>
                                        <div class="rand mt-2">
                                            <label id="label-data" for="dataIntrarii" class="">Data intrarii (ANUL 2020)</label>
                                            <input name="serviciu-intrare-data-intrarii" type="date" class="form-control mb-1 text-center" id="data_intrarii">
                                        </div>
                                        <div class="rand mt-2">
                                            <label id="label-numar" for="numarCorespondentaIntrata" class="">Numarul corespondentei intrate</label>
                                            <input name="serviciu-intrare-numar" type="number" class="form-control mb-1 text-center" id="numar_corespondenta_intrata" placeholder="F.N.">
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">De la cine provine corespondenta</label>
                                            <select name="serviciu-intrare-cod-emitent" class="form-control" id="cod_emitent">
                                                <option value="0">Niciun emitent</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="continutCorespondenta" class="">C O N T I N U T U L</label>
                                            <textarea name="serviciu-intrare-continut" class="form-control" id="continut_corespondenta" rows="5"></textarea>
                                        </div>
                                        <div class="rand mt-2">
                                            <div id="countContinut" class="text-center bg-success text-white p-2"></div>
                                        </div>

                                        <div class="rand mt-2">
                                            <label for="codRepartizareStructura" class="">Cui s-a repartizat lucrarea spre executare (serviciul, biroul)</label>
                                                <select name="serviciu-intrare-repartizare-lucrator" class="form-control" id="cod_lucrator">
                                                    <option value="0">Nealocat</option>
                                                    <?php SecretarServiciu::getLucratoriServiciu($rol); ?>
                                                </select>
                                        </div>    
                                    </fieldset>
                                </div>
                                <div class="col-4">
                                    <fieldset class="fieldset">
                                        <legend> # - IESIRE:</legend>
                                        <div class="rand mt-2">
                                            <label id="label-data" for="dataIntrarii" class="">Data iesirii (ANUL 2020)</label>
                                            <input name="serviciu-iesire-data" type="date" class="form-control mb-1 text-center" id="data_iesirii">
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="continutCorespondenta" class="">R E Z O L V A R E A</label>
                                            <textarea name="serviciu-iesire-rezolvare" class="form-control" id="rezolvare" rows="5"></textarea>
                                        </div>
                                        <div class="rand mt-2">
                                            <div id="countContinutExit" class="text-center bg-success text-white p-2"></div>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Destinatar 1</label>
                                            <select name="destinatar_1" class="form-control" id="destinatar_1">
                                                <option value="0">Nu a fost transmis</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Destinatar 2</label>
                                            <select name="destinatar_2" class="form-control" id="destinatar_2">
                                                <option value="0">Nu a fost transmis</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Destinatar 3</label>
                                            <select name="destinatar_3" class="form-control" id="destinatar_3">
                                                <option value="0">Nu a fost transmis</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Unde s-a clasat lucrarea?</label>
                                            <select name="serviciu-iesire-clasare" class="form-control" id="clasare">
                                                <option value="0">Nu a fost clasat</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>  
                                    </fieldset>
                                </div>
                                <div class="col-3">
                                    <button id="inregistrareDocument" type="submit" class="btn btn-lg btn-theme btn-block mt-1">Inregistreaza documentul</button>
                                    <a href="documente.php" type="submit" class="btn btn-lg btn-outline-dark btn-block mt-1">Vizualizare Documente</a>
                                    <a href="alocare.php" type="submit" class="btn btn-lg btn-outline-dark btn-block mt-1">Aveti (<?php echo $numar_documente;?>) document(e) de repartizat</a>
                                    <div class="mt-2" id="erori_inregistrare">

                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
                
            </div>
            <div id="demo"></div>
    </div>
    <?php else : ?>
        <div class="container-fluid">
            <div class="row mt-5 py-5">
                <div class="col-8 m-auto box-theme-danger">
                    Nu sunteti autentificat, va rugam sa va autentificati cu credentialele primite, conform structurii din care faceti parte.
                </div>
            </div>
        </div>


    <?php endif; ?>
<?php require './includes/footer.php'; ?>