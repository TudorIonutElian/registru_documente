<?php 
    require './includes/header.php' ;
    require './includes/navbar.php' ;
    require './includes/classes/Alocare.php' ;
    require './includes/classes/CautaDocument.php' ;
    require './includes/classes/SecretarServiciu.php' ;

    if(isset($_SESSION['rol'])){
        $rol                = $_SESSION['rol'];
        $registru           = Functions::getRegistru($rol);
    }

  ?>

    <?php if (isLogged()): ?>
        <!--Alocare documente dupa inregistrare director-->
        <div class="container-fluid">
            <div class="row my-2">
                <div class="col-2 m-right">
                    <a href="documente.php" class="btn btn-sm btn-outline-info">Inapoi la registru</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 m-auto">
                <table class="table">
                    <thead class="bg-theme">
                        <tr>
                            <th scope="col">Numarul curent al corespondentei</th>
                            <th scope="col" colspan="2">
                                <div class="data-row text-center">
                                    Data intrarii
                                </div>
                                <div class="data-row">
                                    <div class="data-col">Luna</div>
                                    <div class="data-col">Ziua</div>
                                </div>
                            </th>
                            <th scope="col">Numarul corespondentei intrate</th>
                            <th scope="col">De la cine vine corespondenta</th>
                            <th scope="col">Continutul</th>
                            <th scope="col">Cui i s-a repartizat spre executare (serviciul, biroul)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php Alocare::getAlocareServiciu($registru);?> 
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    <div id="ss-modal">
        <div id="form-alocare-info">
            <button id="btn-close" onclick="hideParent(this.parentNode.parentNode);" class="btn btn-sm btn-outline-danger">Close</button>
            <div class="container p-4">
                <div class="row">
                    <div class="col-12 bg-info py-3 text-white text-center my-2 mt-3 text-uppercase">Repartizare numar inregistrat</div>
                </div>
                <div class="row row-alocare mb-2 row-hide">
                    <div class="col-5 py-3 text-right">ID Document (preluat din registru)</div>
                    <div id="m-id_document" class="col-7 py-3 text-center"></div>
                </div>
                <div class="row row-alocare mb-2">
                    <div class="col-5 py-3 text-right">Numarul curent al corespondentei</div>
                    <div id="m-numar_curent_corespondenta" class="col-7 py-3 text-center"></div>
                </div>
                <div class="row row-alocare mb-2">
                    <div class="col-5 py-3 text-right">Data intrarii corespondentei (documentului)</div>
                    <div id="m-data_intrarii" class="col-7 py-3 text-center"></div>
                </div>
                <div class="row row-alocare mb-2">
                    <div class="col-5 py-3 text-right">Numarul corespondentei intrate</div>
                    <div id="m-numar_corespondenta_intrata"class="col-7 py-3 text-center"></div>
                </div>
                <div class="row row-alocare mb-2">
                    <div class="col-5 py-3 text-right">De la cine provine corespondenta</div>
                    <div id="m-cod_emitent" class="col-7 py-3 text-center">

                    </div>
                </div>
                <div class="row row-alocare mb-2">
                    <div class="col-5 py-3 text-right">C O N T I N U T U L</div>
                    <div id="m-continut_corespondenta"class="col-7 py-3 text-center">

                    </div>
                </div>
                <div class="row row-alocare mb-2">
                    <div class="col-5 py-3 text-right">Alocare Lucrator</div>
                    <div class="col-7 py-3 text-center">
                        <select name="serviciu-intrare-cod-emitent" class="form-control" id="r-cod_lucrator">
                        </select>
                        <input type="text" id="r-input-hidden" hidden>
                    </div>
                </div>
                <button id="btn-repartizare-document" class="btn btn-block btn-outline-dark">Repartizeaza Documentul Inregistrat</button>
            </div>
        </div>
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