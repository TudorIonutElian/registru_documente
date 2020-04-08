<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>
<?php require './includes/classes/CautaDocument.php';?>

<?php if(isLogged()) :?>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 py-3  my-2 text-center bg-outline-info">
                    <h5>Realocare numar de inregistrare. Numarul este editat, nu va fi sters!</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4 py-4 col-4-flex">
                    <h4>Numarul Curent :</h4>
                    <input type="number">
                </div>
                <div class="col-4 py-4 col-4-flex">
                    <h4>Data intrarii :</h4>
                    <input type="date">
                </div>
                <div class="col-4 py-4 col-4-flex">
                    <h4>Numarul de intrare :</h4>
                    <input type="number">
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3 my-2 text-center bg-outline-info">
                    <h5>Date privind emitentul si continutul</h5>
                </div>
                <div class="col-8 py-3 col-8-flex">
                    <h4>Continutul</h4>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <div>500 caractere ramase</div>
                </div>
                <div class="col-4 py-3 col-4-flex">
                    <h4>Cui s-a repartizat lucrarea spre executare (serviciul, biroul)</h4>
                        <select name="serviciu-intrare-repartizare-lucrator" class="form-control" id="codRepartizareStructura">
                            <option value="0">Nealocat</option>
                            <option value="0">Nealocat</option>

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3 col-4-flex"><button class="btn btn-block btn-info py-4">Realocare document</button></div>
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


<?php require './includes/footer.php'; ?>