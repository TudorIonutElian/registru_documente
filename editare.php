<?php require './includes/header.php';?>
<?php require './includes/navbar.php';?>
<?php require './includes/classes/CautaDocument.php';?>
<?php require './includes/classes/Editare.php';?>
<?php require './includes/classes/SecretarServiciu.php';?>



    <!DOCTYPE html><html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Registru Documente</title>
        <link rel='stylesheet' href='design/bootstrap.css'>
        <link rel='stylesheet' href='design/style.css'>
        </head>
    <body id='body'>
    <?php
    $id = $_GET['id'];
    $rol = $_SESSION['rol'];

    $registru = Functions::getRegistru($rol);

    $infoDoc = Editare::getData($id, $registru);
    ?>

<?php if(isLogged()) :?>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 py-2  text-white text-center bg-info">
                    <h5>Editare registru</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-4 py-4 col-4-flex">
                    <h5>Numarul Curent :</h5>
                    <input type="number" value="<?php echo $infoDoc['numar_curent_corespondenta'];?>">
                </div>
                <div class="col-4 py-4 col-4-flex">
                    <h5>Data intrarii :</h5>
                    <input type="date" value="<?php echo $infoDoc['data_intrarii'];?>">
                </div>
                <div class="col-4 py-4 col-4-flex">
                    <h5>Numarul de intrare :</h5>
                    <input type="text" value="<?php echo $infoDoc['numar_corespondenta_intrata'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-2  text-white text-center bg-info">
                    <h5>Date privind emitentul si continutul</h5>
                </div>
                <div class="col-8 py-3 col-8-flex">
                    <h5>Continutul</h5>
                    <textarea name="continutActualizare" id="continutActualizare" cols="30" rows="10"></textarea>
                    <div id="countEditare"></div>
                </div>
                <div class="col-4 py-3 col-4-flex">
                    <h5>Cui s-a repartizat lucrarea spre executare (serviciul, biroul)</h5>
                        <select name="serviciu-intrare-repartizare-lucrator" class="form-control" id="codRepartizareStructura">
                            <?php SecretarServiciu::getLucratoriServiciu($rol); ?>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3 col-4-flex"><button class="btn btn-block btn-info py-4 text-uppercase">Realocare document</button></div>
            </div>
        </div>
    <?php else: ?>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-8 m-auto box-theme-danger">
                Nu sunteti autentificat, va rugam sa va autentificati cu credentialele primite, conform structurii din care faceti parte.
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        document.getElementById('continutActualizare').onkeyup = function () {
            document.getElementById('countEditare').innerHTML = `Mai puteti introduce un numar de ${500 - this.value.length} caractere`;
        };

    </script>




<?php require './includes/footer.php'; ?>