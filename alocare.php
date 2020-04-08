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