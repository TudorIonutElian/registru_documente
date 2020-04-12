<?php 
    require './functions.php';
    require './classes/SecretarDirector.php';
    require './classes/SecretarServiciu.php';
    require './classes/Functions.php';
    session_start();

    //Aflare de unde a fost accesat link-ul catre pagina de inregistrare
    $referer = $_SERVER['HTTP_REFERER'];

    //Aflare a ultimei parti a linkului, ex. "secretariat-director" sau "secretariat serviciu"
    $link = basename($referer);

    if($link === "secretariat-director.php" || $link === "secretariat-director.php?inregistrare=true"){
        $dataIntrarii               = $_POST['dataIntrarii'];               // in registrul real este data intrarii
        $numarCorespondentaIntrata  = $_POST['numarCorespondentaIntrata'];  // in registrul real este numarul corespondentei
        $codEmitent                 = $_POST['codEmitent'];                 // in registrul real este de la cine provine corespondentei
        $codRepartizareStructura    = $_POST['codRepartizareStructura'];    // in registrul real NU ARE CORESPONDENT (este in plus pentru statistici detaliate)

        SecretarDirector::alocareDocument($dataIntrarii, $numarCorespondentaIntrata, $codEmitent, $codRepartizareStructura);
        header("Location: ../secretariat-director.php?inregistrare=true");
    }
    