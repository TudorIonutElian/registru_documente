<?php
    require '../../includes/classes/Functions.php';
    require '../../includes/classes/SecretarServiciu.php';
    require '../../includes/classes/Database.php';
    require '../../includes/classes/Id.php';

    session_start();
    $rol                                    = $_SESSION['rol'];
    $info                                   = json_decode($_POST['data']);

    // Extragere informatii transmise de JS XHR
    $numar_curent                           = $info->numar_curent_corespondenta;
    $data_curenta                           = $info->data_intrarii;
    $numar_intrare                          = $info->numar_corespondenta_intrata;
    $cod_emitent                            = $info->cod_emitent;
    $continut                               = $info->continut_corespondenta;
    $data_iesirii                           = $info->data_iesirii;
    $rezolvare                              = $info->rezolvare;
        $destinatar_1                       = $info->destinatar_1;
        $destinatar_2                       = $info->destinatar_2;
        $destinatar_3                       = $info->destinatar_3;
    $destinatari                            = [$destinatar_1, $destinatar_2, $destinatar_3];
    $destinatari_full                       = implode("-", $destinatari);
    $clasare                                = $info->clasare;
    $cod_lucrator                           = $info->cod_lucrator;

    $result = SecretarServiciu::inregistrareDocument($rol, $numar_curent, $data_curenta, $numar_intrare, $cod_emitent, $continut, $data_iesirii, $rezolvare, $destinatari_full, $clasare, $cod_lucrator);

    echo ($result);
