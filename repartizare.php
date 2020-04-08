<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>
<?php require './includes/classes/SecretarServiciu.php' ;?>
<?php require './includes/classes/Numar.php' ;?>
<?php require './includes/classes/Url.php';

    // Identificare rol in urma sesiunii
    $rol = $_SESSION['rol'];
    // Identificare id document in baza linkului
    $id_document        = Numar::verificareId();
    // Identificare registru in baza rolului utilizatorului
    $registru           = Functions::getRegistru($rol);
    // Verificare daca numarul stabilit in baza id-ului are continut
    $continut           = Numar::verificareContinut($id_document, $registru);


    // Repartizare numar din registru catre lucrator in urma apasarii butonului repartizeaza
    if(isset($_POST['text']) && isset($_POST['lucrator'])){
        $registru           = Functions::getRegistru($rol);
        $text_validat       = preg_replace("/[\n\r]/"," ",$_POST['text']);
        Numar::alocareNumar($registru, $id_document, $text_validat, $_POST['lucrator']);
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="rand mt-2">
                                <label for="continutCorespondenta" class="">C O N T I N U T U L</label>
                                <textarea name="text" class="form-control" id="continutCorespondenta" rows="5"><?php echo $continut; ?></textarea>
                            </div> 
                        </div>
                        <div class="col-4">
                            <div class="rand mt-2">
                                <label for="codRepartizareStructura" class="">Cui s-a repartizat lucrarea spre executare (serviciul, biroul)</label>
                                <select name="lucrator" class="form-control" id="codRepartizareStructura">
                                    <?php SecretarServiciu::getLucratoriServiciu($rol) ?>
                                </select>
                            </div>
                            <button class="mt-3 btn btn-block btn-outline-dark">Repartizeaza document</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>