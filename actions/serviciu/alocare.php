<?php
    require '../../includes/classes/Functions.php';
    require '../../includes/classes/Database.php';
    session_start();

    $data = json_decode($_POST['data']);

    $rol = $_SESSION['rol'];
    $registru = Functions::getRegistru($rol);

    $data = json_decode($_POST['data']);

    $baza = new Database();
    $conexiune = $baza->conectare();
    $sql = "UPDATE $registru SET cod_lucrator = $data->cod_lucrator WHERE id ='$data->id'";

    if($result = mysqli_query($conexiune, $sql)){
        echo "200";
    }else{
        echo mysqli_error($conexiune);
    }

