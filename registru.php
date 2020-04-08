<?php
    session_start();
    require('./includes/classes/FPDF.php');
    require('./includes/classes/PrintareRegistru.php');
    require('./includes/classes/Database.php');
    require('./includes/classes/Functions.php');

    $rol = $_SESSION['rol'];
    $registru = Functions::getRegistru($rol);

    $pdf = new FPDF();
    // Prima pagina a registrului
    $pdf->AddPage('PA4');    
    $pdf->SetLineWidth(0.4);

    PrintareRegistru::printareRegistruAll($pdf, $registru);
    $pdf->Output();
?>