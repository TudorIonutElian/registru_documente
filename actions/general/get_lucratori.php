<?php
    session_start();
    require '../../includes/classes/SecretarServiciu.php';
    require '../../includes/classes/Database.php';

    $rol               = $_SESSION['rol'];
    $database          = new Database();
    $conexiune         = $database->conectare();
    $sql               = "SELECT * FROM rd_lucratori WHERE cod_serviciu = '$rol' ORDER BY lucrator";
    $lucratori_data    = [];

    if($result = mysqli_query($conexiune, $sql)){
        while($lucratori = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($lucratori_data, $lucratori);
        }
        echo json_encode($lucratori_data);
    }

