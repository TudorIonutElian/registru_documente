<?php require './includes/header.php';?>
<?php require './includes/navbar.php';?>
<?php require './includes/classes/SecretarServiciu.php';?>
<?php require './includes/classes/Emitent.php';?>
<?php require './includes/classes/Lucrator.php';?>
<?php require './includes/classes/Url.php';?>
<?php require './includes/classes/Numar.php';


    // Identificare rol in urma sesiunii
    $rol = $_SESSION['rol'];
    // Identificare registru in baza rolului utilizatorului
    $registru           = Functions::getRegistru($rol);
    // Identificare id document in baza linkului
    $id_document        = Numar::verificareId();
    

    if(isset($_POST['rezolvare']) && isset($_POST['destinatar_1'])){
        $rezolvare              = $_POST['rezolvare'];
        $destinatar_1           = $_POST['destinatar_1'];
        $destinatar_2           = $_POST['destinatar_2'];
        $destinatar_3           = $_POST['destinatar_3'];
        $destinatari_lista      = [$destinatar_1, $destinatar_2, $destinatar_3];
        $destinatari_text       = implode("-", $destinatari_lista);

        $data           = $_POST['data-iesirii'];
        Numar::iesireNumar($id_document, $data, $rezolvare, $destinatari_text, $registru);
    }else{
        echo 
        "
            <div class=\"container\">Invalid</div>
        ";
    }

    $id         = Numar::verificareId();
    $doc        = Numar::preluareInfoIesire($id, $registru);
    $emitent    = Emitent::afisareEmitent($doc['cod_emitent']);
    $lucrator   = Lucrator::afisareLucrator($doc['cod_lucrator']);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8 m-auto p-2">
            <div class="container">
                <form action="" method="POST">
                    <fieldset class="fieldset">
                        <legend> # - IESIRE DOCUMENT:</legend>
                    <div class="row py-2">
                        <div class="col-6">Id document :</div>
                        <div class="col-6">
                            <input disabled type="text" class="form-control text-center" value="<?php echo $doc['id'];?>">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">Numar document :</div>
                        <div class="col-6">
                            <input disabled type="text" class="form-control text-center" value="<?php echo $doc['numar_curent_corespondenta'];?>">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">Emitent document :</div>
                        <div class="col-6">
                            <input disabled type="text" class="form-control text-center" value="<?php echo $emitent;?>">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">Gestionar document:</div>
                        <div class="col-6">
                            <input disabled type="text" class="form-control text-center" value="<?php echo $lucrator;?>">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">Data iesirii</div>
                        <div class="col-6">
                            <input name="data-iesirii" type="date" class="form-control mb-1 text-center" id="dataIntrarii">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">Rezolvare document</div>
                        <div class="col-6">
                            <textarea name="rezolvare" class="form-control" id="continutCorespondenta" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-6">Documentul a fost transmis catre: </div>
                        <div class="col-6">
                            <select name="destinatar_1" class="form-control" id="codEmitent">
                                <?php getAllEmitent();?>
                            </select>
                            <select name="destinatar_2" class="form-control" id="codEmitent">
                                <?php getAllEmitent();?>
                            </select>
                            <select name="destinatar_3" class="form-control" id="codEmitent">
                                <?php getAllEmitent();?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-success btn-block">Actualizeaza document</button>
                </form>
            </div>
        </div>
    </div>
</div>
    

<?php 

