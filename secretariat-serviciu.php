<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>



    <div id="container-top-bottom">
            <div class="container-fluid" id="container-serviciu">
                <div class="row">
                    <div class="col-12">
                    <form action="./includes/inregistreaza.php" method="POST" class="py-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4">
                                    <fieldset class="fieldset">
                                        <legend> # - INTRARE:</legend>
                                        <div class="rand mt-2">
                                            <label id="label" for="numarCorespondentaIntrata" class="">Numarul curent al corespondentei</label>
                                            <input name="serviciu-intrare-numar-curent" type="text" class="form-control mb-1 text-center" id="numarCorespondentaIntrata" placeholder="F.N.">
                                        </div>
                                        <div class="rand mt-2">
                                            <label id="label-data" for="dataIntrarii" class="">Data intrarii (ANUL 2020)</label>
                                            <input name="serviciu-intrare-data-intrarii" type="date" class="form-control mb-1 text-center" id="dataIntrarii">
                                        </div>
                                        <div class="rand mt-2">
                                            <label id="label-numar" for="numarCorespondentaIntrata" class="">Numarul corespondentei intrate</label>
                                            <input name="serviciu-intrare-numar" type="text" class="form-control mb-1 text-center" id="numarCorespondentaIntrata" placeholder="F.N.">
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">De la cine provine corespondenta</label>
                                            <select name="serviciu-intrare-cod-emitent" class="form-control" id="codEmitent">
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
                                                    <option value="0">Niciun serviciu selectat</option>    
                                                    <option value="1">S1 - SPCSRU</option>
                                                    <option value="2">S2 - SGP</option>
                                                    <option value="3">S3 - SO</option>
                                                    <option value="4">S4 - SFIC</option>
                                                    <option value="5">B1 - BIM</option>
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
                                            <label for="codEmitent" class="">Catre cine s-a trimis corespondenta</label>
                                            <select name="serviciu-iesire-emitent" class="form-control" id="codEmitent">
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>
                                        <div class="rand mt-2">
                                            <label for="codEmitent" class="">Unde s-a clasat lucrarea?</label>
                                            <select name="serviciu-iesire-clasare" class="form-control" id="codEmitent">
                                                <?php getAllEmitent();?>
                                            </select>
                                        </div>  
                                    </fieldset>
                                </div>
                                <div class="col-4">
                                    <button id="validareFormular" type="submit" class="btn btn-lg btn-theme btn-block mt-1">Inregistreaza documentul</button>
                                    <a href="cauta.php" type="submit" class="btn btn-lg btn-outline-dark btn-block mt-1">Vizualizare Documente</a>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
                
            </div>
    </div>

<?php require './includes/footer.php'; ?>