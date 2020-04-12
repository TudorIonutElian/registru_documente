<?php
    session_start();
    require '../../includes/classes/Database.php';
    require '../../includes/classes/Functions.php';

    $rol = $_SESSION['rol'];
    $registru = Functions::getRegistru($rol);

    $data = json_decode($_POST['data']);
    $baza = new Database();
    $conexiune = $baza->conectare();

    $data_to_sent_back = [];

    $sql = "SELECT * FROM $registru WHERE id ='$data->id'";

    if($result = mysqli_query($conexiune, $sql)){
        $info = mysqli_fetch_assoc($result);

        // Preluare si transmitere ID-document
        $data_to_sent_back['id']                                    = $info['id'];
        $data_to_sent_back['numar_curent_corespondenta']            = $info['numar_curent_corespondenta'];
        $data_to_sent_back['data_intrarii']                         = $info['data_intrarii'];
        if($info['numar_corespondenta_intrata'] == "0"){
            $data_to_sent_back['numar_corespondenta_intrata']       = "Fara numar";
        }else{
            $data_to_sent_back['numar_corespondenta_intrata']       = $info['numar_corespondenta_intrata'];
        }
        $data_to_sent_back['cod_emitent']                           = Functions::getEmitentFull($info['cod_emitent']);
        $data_to_sent_back['continut_corespondenta']                = $info['continut_corespondenta'];

        echo json_encode($data_to_sent_back);
    }

