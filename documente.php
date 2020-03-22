<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>
<?php
        $registru = $_GET['registru'];
        $titulatura_registru;
        $titulatura_documente;
        $titulatura_autorizatie;

    switch($registru){
        case 'n': 
            $titulatura_registru    = "Neclasificate";
            break;
        case 'ssv':
            $titulatura_registru    = "Secret de Serviciu";
            break;
        case 's':
            $titulatura_registru    = "Secret";
            break;
        case 'ss':
            $titulatura_registru    = "Strict Secret";
            break;
        case 'p':
            $titulatura_registru    = "Petitii";
            break;
        case 'a':
            $titulatura_registru    = "Adeverinte diverse";
            break;
        default :
            $titulatura_registru    = "Registru Invalid, va rugam reincercati!";
    }
?>

    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-lg-12 text-center">
                <h1>Registru  <span class="mx-2"><?php echo $titulatura_registru; ?></span></h1>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12 text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Numar</th>
                    <th scope="col">Data</th>
                    <th scope="col">De unde provine</th>
                    <th scope="col">Cui este repartizat</th>
                    <th scope="col">File</th>
                    <th scope="col">Ex.</th>
                    <th scope="col">Unde a fost transmis?</th>
                    <th scope="col">Arhiva</th>
                    <th scope="col">Arhiveaza</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td><a class="btn btn-block btn-outline-dark btn-sm" href="#">Arhiveaza</a></td>                  
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td><a class="btn btn-block btn-outline-dark btn-sm" href="#">Arhiveaza</a></td>
                </tr>
                <tr>
                <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td><a class="btn btn-block btn-outline-dark btn-sm" href="#">Arhiveaza</a></td>
                </tr>
            </tbody>
        </table>
        </div>
        </div>
    </div>

    <?php require './includes/footer.php'; ?>
