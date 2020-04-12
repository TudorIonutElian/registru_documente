<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>
<?php require './includes/classes/SecretarDirector.php' ;?>

<?php 
    $isLoggedUser = isLogged();
    if(isset($_GET['structura'])){
        $registru = (int)$_GET['structura'];
        $nextNumber = getNextNumber($registru);
    }else{
        $nextNumber = 1;
    }
?>

<?php if($isLoggedUser) : ?>
    <div id="sesizari-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <form action="./includes/inregistreaza.php" method="POST" class="py-2">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-7">
                            <fieldset class="fieldset">
                                <legend> # - INTRARE:</legend>
                                <div class="rand mt-2" id="serviciu_drop_down">
                                    <label for="codRepartizareStructura" class="">Cui s-a repartizat lucrarea spre executare (serviciul, biroul)</label>
                                        <select name="codRepartizareStructura" class="form-control" id="codRepartizareStructura">
                                            <option value="0">Niciun serviciu selectat</option>    
                                            <option value="1">S1 - SPCSRU</option>
                                            <option value="2">S2 - SGP</option>
                                            <option value="3">S3 - SO</option>
                                            <option value="4">S4 - SFIC</option>
                                            <option value="5">B1 - BIM</option>
                                    </select>
                                </div>
                                <div class="rand mt-2">
                                    <label id="label-data" for="dataIntrarii" class="">Data intrarii (ANUL 2020)</label>
                                    <input name="dataIntrarii" type="date" class="form-control mb-1 text-center" id="dataIntrarii">
                                </div>
                                <div class="rand mt-2">
                                    <label id="rand_corespondenta_intrata" for="numarCorespondentaIntrata" class="">Numarul corespondentei intrate</label>
                                    <input name="numarCorespondentaIntrata" type="number" id="numarCorespondentaIntrata" class="form-control mb-1 text-center"  placeholder="F.N.">
                                </div>
                                <div class="rand mt-2">
                                    <label for="codEmitent" class="">De la cine provine corespondenta</label>
                                    <select name="codEmitent" class="form-control" id="codEmitent">
                                        <?php getAllEmitent();?>
                                    </select>
                                </div>
                            </fieldset>
                            <button id="validareFormular" type="submit" class="btn btn-theme btn-block mt-1">Inregistreaza documentul</button>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3 col-flexbox p-2">
                            <h5 class="text-center text-uppercase">Directia Resurse Umane</h5>
                            <img id="adaugareDocument" src="./design/img/stema.png" alt="">
                            <div id="form-response">
                                <div class="px-3 py-2 bg-info text-white">Serviciul 1 : 0 documente</div>
                                <div class="px-3 py-2 bg-info text-white">Serviciul 1 : 0 documente</div>
                                <div class="px-3 py-2 bg-info text-white">Serviciul 1 : 0 documente</div>
                                <div class="px-3 py-2 bg-info text-white">Serviciul 1 : 0 documente</div>
                                <div class="px-3 py-2 bg-info text-white">Serviciul 1 : 0 documente</div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php 
    else : header("Location: index.php?conectare=false"); 
    endif;
?>

    <?php require './includes/footer.php'; ?>


<script>
    let butonValidareFormular = document.getElementById("validareFormular");
    butonValidareFormular.addEventListener("click", function(e){

        let serviciu = document.getElementById("codRepartizareStructura");
        let rand_drop_down = document.getElementById("serviciu_drop_down");
        let optiuneServiciu = serviciu.options[serviciu.selectedIndex].value;
        let rand_corespondenta_intrata = document.getElementById("rand_corespondenta_intrata");
        let numarCorespondentaIntrata = document.getElementById("numarCorespondentaIntrata");

        if(optiuneServiciu == 0){
            e.preventDefault(); 
            rand_drop_down.classList.add('rand-invalid');
        }else{
            form.submit();
        }
    });

</script>