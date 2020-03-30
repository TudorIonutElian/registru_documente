<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>
<?php require './includes/classes/CautaDocument.php';?>

<?php  
    if(isset($_SESSION['rol'])){
        $registru = Functions::getRegistru($_SESSION['rol']);
    }
?>

    <div id="container-top-bottom">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 m-auto">
                        <form id="form-serviciu" class="form-inline">
                            <div class="form-group">
                                <label for="cautaData">Cauta Numar</label>
                                <input type="text" class="form-control text-center" id="cautaNumar">
                            </div>
                            <div class="form-group">
                                <label for="cautaData">Cauta Data</label>
                                <input name="dataIntrarii" type="date" class="form-control mb-1 text-center" id="cautaData">
                            </div>
                            <div class="form-group">
                                <label for="cautData">Cauta Numar inregistrat</label>
                                <input type="text" class="form-control" id="cautaData">
                            </div>
                            <div class="form-group">
                                <label for="cautUnitatea">Cauta Emitent</label>
                                <select name="codRepartizareStructura" class="form-control text-center" id="cautaUnitatea">
                                        <option class="text-center" value="0">Niciun serviciu selectat</option>    
                                        <option value="1">S1 - SPCSRU</option>
                                        <option value="2">S2 - SGP</option>
                                        <option value="3">S3 - SO</option>
                                        <option value="4">S4 - SFIC</option>
                                        <option value="5">B1 - BIM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cautTip">Cauta tip document</label>
                                <select name="codRepartizareStructura" class="form-control text-center" id="cautTip">
                                        <option class="text-center" value="0">Niciun tip selectat</option>    
                                        <option value="1">Adeverinta</option>
                                        <option value="2">Informare</option>
                                        <option value="3">Plan de control</option>
                                        <option value="4">Dispozitie personal</option>
                                        <option value="5">Adrese diverse</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-hide">Cauta document</label>
                                <button type="submit" class="btn btn-dark">Cauta numar ...</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="bg-theme">
                            <tr>
                                <th scope="col">#Numar Criteriu</th>
                                <th scope="col">Numarul curent al corespondentei</th>
                                <th scope="col">Data intrarii</th>
                                <th scope="col">Numarul corespondentei intrate</th>
                                <th scope="col">De la cine vine corespondenta</th>
                                <th scope="col">Continutul</th>
                                <th scope="col">Cui i s-a repartizat spre executare (serviciul, biroul)</th>
                                <th scope="col">Data iesirii</th>
                                <th scope="col">Rezolvarea</th>
                                <th scope="col">Catre cine s-a trimis corespondenta</th>
                                <th scope="col">Unde s-a clasat lucrarea (serviciul, biroul)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php CautaDocument::afiseazaDocumentele($registru); ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>



<?php require './includes/footer.php'; ?>