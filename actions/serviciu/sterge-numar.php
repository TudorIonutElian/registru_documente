<?php
    session_start();
    require '../../includes/classes/Functions.php';
    require '../../includes/classes/Database.php';

    $rol = $_SESSION['rol'];
    $registru = Functions::getRegistru($rol);
    $id = $_POST['id'];

    if(isset($_POST['id'])){
        $database = new Database();
        $conexiune = $database->conectare();

        $sql = "
            UPDATE $registru SET 
                numar_corespondenta_intrata = 0, 
                cod_emitent = 0,
                continut_corespondenta = NULL, 
                cod_lucrator = 0,
                data_iesirii = NULL, 
                rezolvare = NULL, 
                destinatari = NULL,
                clasare = 0, 
                este_arhivat = 0
            WHERE id = '$id' 
        ";
        if($result = mysqli_query($conexiune, $sql)){
            echo 200;
        }else{
            echo mysqli_error($conexiune);
        }
    }
?>