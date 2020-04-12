<?php require './includes/header.php';?>
<?php require './includes/navbar.php';?>
<?php require './includes/classes/CautaDocument.php';?>

<?php  
    if(isset($_SESSION['rol'])){
        $registru = Functions::getRegistru($_SESSION['rol']);
    }
?>
    <?php if(isLogged()) :?>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-container">
                <form action="">
                    <div class="container-box">
                        <input type="number">
                    </div>
                    <div class="container-box">
                        <select name="destinatar_1" class="form-control" id="codEmitent">
                            <option value="0">Nu a fost transmis</option>
                            <?php getAllEmitent();?>
                        </select>
                    </div>
                    <div class="container-box">
                        <button class="btn btn-block btn-dark">Schimba</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
        <div class="container-fluid mt-2">
            <div class="row">
                <div id="status-row" class="col-12 text-center py-1"></div>
            </div>
            <div class="row">
                <div class="col-12">
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
                                <th scope="col" colspan="2">
                                    <div class="data-row text-center">
                                        Data iesirii
                                    </div>
                                    <div class="data-row">
                                        <div class="data-col">Luna</div>
                                        <div class="data-col">Ziua</div>
                                    </div>
                                </th>
                                <th scope="col">Rezolvarea</th>
                                <th scope="col">Catre cine s-a trimis corespondenta</th>
                                <th scope="col">Unde s-a clasat lucrarea (serviciul, biroul)</th>
                                <th scope="col">Iesire numar</th>
                                <th scope="col">Sterge numar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php CautaDocument::afiseazaDocumentele($registru); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="ss-modal">
            <div id="form-alocare-info">
                <button id="btn-close" onclick="hideParent(this.parentNode.parentNode);" class="btn btn-lg btn-outline-danger">Close</button>
                <div class="container p-4">
                    <div class="row row-alocare mb-2">
                        <div class="col-5 py-3 text-right">Numarul curent al corespondentei</div>
                        <div id="m-numar_curent_corespondenta" class="col-7 py-3 text-center"></div>
                    </div>
                    <div class="row row-alocare mb-2">
                        <div class="col-5 py-3 text-right">Data intrarii corespondentei (documentului)</div>
                        <div id="m-data_intrarii" class="col-7 py-3 text-center">123456</div>
                    </div>
                    <div class="row row-alocare mb-2">
                        <div class="col-5 py-3 text-right">Numarul corespondentei intrate</div>
                        <div id="m-numar_corespondenta_intrata"class="col-7 py-3 text-center">123456</div>
                    </div>
                    <div class="row row-alocare mb-2">
                        <div class="col-5 py-3 text-right">De la cine provine corespondenta</div>
                        <div id="m-cod_emitent" class="col-7 py-3 text-center">
                            Directia Generala Management Resurse Umane
                        </div>
                    </div>
                    <div class="row row-alocare mb-2">
                        <div class="col-5 py-3 text-right">C O N T I N U T U L</div>
                        <div id="m-continut_corespondenta"class="col-7 py-3 text-center">
                            Directia Generala Management Resurse Umane
                        </div>
                    </div>
                    <div class="row row-alocare mb-2">
                        <div class="col-5 py-3 text-right">Alocare Lucrator</div>
                        <div class="col-7 py-3 text-center">
                            <select name="serviciu-intrare-cod-emitent" class="form-control" id="cod_emitent">
                                <option value="0">Niciun emitent</option>
                            </select>
                        </div>
                    </div>
                    <button onclick="alocaNumar();" id="btn-alocare-document" class="btn btn-block btn-outline-dark">Alocare Document</button>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container-fluid">
            <div class="row mt-5 py-5">
                <div class="col-8 m-auto box-theme-danger">
                Nu sunteti autentificat, va rugam sa va autentificati cu credentialele primite, conform structurii din care faceti parte.
                </div>
            </div>
        </div>
    <?php endif; ?>


    <script>
       document.getElementById('schimba_lucrator').onclick = function () {
           var modal = document.getElementById("myModal");
           var span = document.getElementsByClassName("close")[0];
           modal.style.display = "block";
       }
    </script>

<?php require './includes/footer.php'; ?>