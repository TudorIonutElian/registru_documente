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

    <div id="container-top-bottom">
            <div class="container-fluid" id="container-serviciu">
                <div class="row">
                    <div class="col-12">
                    <form id="form_add_document" action="./includes/inregistreaza.php" method="POST" class="py-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4">
                                    <fieldset class="fieldset">
                                        <legend> # - INTRARE:</legend>
                                        <div class="rand mt-2">
                                            <label id="label" for="numarCorespondentaIntrata" class="">Numarul curent al corespondentei</label>
                                            <input name="serviciu-intrare-numar-curent" type="text" class="form-control mb-1 text-center" id="numarCorespondentaIntrata" value="<?php echo $numar_urmator; ?>">
                                        </div>
                                        <div class="rand mt-2">
                                            <label id="label-data" for="dataIntrarii" class="">Data intrarii (ANUL 2020)</label>
                                            <input name="serviciu-intrare-data-intrarii" type="date" class="form-control mb-1 text-center" id="dataIntrarii">
                                        </div>
                                        <div class="rand mt-2">
                                            <label id="label-numar" for="numarCorespondentaIntrata" class="">Numarul corespondentei intrate</label>
                                            <input name="serviciu-intrare-numar" type="number" class="form-control mb-1 text-center" id="numarCorespondentaIntrata" placeholder="F.N.">
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">De la cine provine corespondenta</label>
                                            <select name="serviciu-intrare-cod-emitent" class="form-control" id="codEmitent">
                                                <option value="0">Rezervare numar</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="continutCorespondenta" class="">C O N T I N U T U L</label>
                                            <textarea name="serviciu-intrare-continut" class="form-control" id="continutCorespondenta" rows="5"></textarea>
                                        </div>  

                                        <div class="rand mt-2">
                                            <label for="codRepartizareStructura" class="">Cui s-a repartizat lucrarea spre executare (serviciul, biroul)</label>
                                                <select name="serviciu-intrare-repartizare-lucrator" class="form-control" id="codRepartizareStructura">
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
                                            <input name="serviciu-iesire-data" type="date" class="form-control mb-1 text-center" id="dataIntrarii">
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="continutCorespondenta" class="">R E Z O L V A R E A</label>
                                            <textarea name="serviciu-iesire-rezolvare" class="form-control" id="continutCorespondenta" rows="5"></textarea>
                                        </div>  

                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Destinatar 1</label>
                                            <select name="serviciu-iesire-emitent" class="form-control" id="codEmitent">
                                                <option value="0">Nu a fost transmis</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>

                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Destinatar 2</label>
                                            <select name="serviciu-iesire-emitent" class="form-control" id="codEmitent">
                                                <option value="0">Nu a fost transmis</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>


                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Destinatar 3</label>
                                            <select name="serviciu-iesire-emitent" class="form-control" id="codEmitent">
                                                <option value="0">Nu a fost transmis</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>


                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Unde s-a clasat lucrarea?</label>
                                            <select name="serviciu-iesire-clasare" class="form-control" id="codEmitent">
                                                <option value="0">Nu a fost clasat</option>
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>  
                                    </fieldset>
                                </div>
                                <div class="col-4">
                                    <button id="validare_formular" type="submit" class="btn btn-lg btn-theme btn-block mt-1">Inregistreaza documentul</button>
                                    <a href="documente.php" type="submit" class="btn btn-lg btn-outline-dark btn-block mt-1">Vizualizare Documente</a>
                                    <a href="alocare.php" type="submit" class="btn btn-lg btn-outline-dark btn-block mt-1">Aveti (<?php echo $numar_documente;?>) document(e) de repartizat</a>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
                
            </div>
            <div id="demo"></div>
    </div>


<?php require './includes/footer.php'; ?>