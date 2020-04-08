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
    elseif($link === "secretariat-serviciu.php" || $link === "secretariat-serviciu.php?inregistrare=true"){
        
        // Preluare variable de la formularul de inregistrare de la secretariat
        $numar_curent       = (int)$_POST['serviciu-intrare-numar-curent'];             //preluarenumar curent ATTENTIE LA STABILIREA NR.
        $data_curenta       = $_POST['serviciu-intrare-data-intrarii'];            //preluare data intrarii
        $numar_intrare      = $_POST['serviciu-intrare-numar'];                    //preluare numarul de intrare al lucrarii
        $cod_emitent        = $_POST['serviciu-intrare-cod-emitent'];              //preluare emitent
        $continut           = preg_replace("/[\n\r]/"," ",$_POST['serviciu-intrare-continut']);                 //preluare continut
        $iesire             = $_POST['serviciu-iesire-data'];                      //preluare data iesirii
        $rezolvare          = $_POST['serviciu-iesire-rezolvare'];                 //preluare rezolvare
        $iesire_trans       = $_POST['serviciu-iesire-emitent'];                   //preluare iesire document
        $clasare            = $_POST['serviciu-iesire-clasare'];                   //preluare clasare
        $lucrator           = $_POST['serviciu-intrare-repartizare-lucrator'];     //preluare lucrator repartizat
        

        //Indentificare rol pentru a stabili in ce registru se va insera
        $rol = $_SESSION['rol'];
        SecretarServiciu::inregistrareDocument($rol, $numar_curent, $data_curenta, $numar_intrare, $cod_emitent, $continut, $iesire, $rezolvare, $iesire_trans, $clasare, $lucrator);
    }
    