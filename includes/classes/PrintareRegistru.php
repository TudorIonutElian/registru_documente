<?php 

class PrintareRegistru{
    public static function drawCellContinutIntrare($pdf, $data, $width){
        $propozitii = explode("\n", wordwrap($data, 35));
        
            $continutCelula = $data;
            $numarPropozitii = count($propozitii);
            $medieCelulaMica = 23 / $numarPropozitii;

            if(count($propozitii) == 1){
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+116, $y-23);
                $pdf->MultiCell($width, 23, $data, 1, 'C');
            }else{
                // Afisare primul cuvant
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+116, $y-23);
                $pdf->MultiCell($width, $medieCelulaMica, $propozitii[0], 0, 'C');
            
                // Afisare fiecare propozitie
                for($i = 1; $i < $numarPropozitii; $i++){
                    $x=$pdf->GetX();
                    $y=$pdf->GetY();
                    $pdf->SetXY($x+116, $y);

                    if($i == ($numarPropozitii-1)){
                        $pdf->MultiCell($width, $medieCelulaMica, $propozitii[$i], 'L B R', 'C');
                    }else{
                        $pdf->MultiCell($width, $medieCelulaMica, $propozitii[$i], 0, 'C');
                    }
                }
            }
    }

    // Functie pentru afisarea lucratorului -Functionala
    public static function drawCellLucratorIntrare($pdf, $data, $width){


        $propozitii = explode("\n", wordwrap($data, 13));
        
            $continutCelula = $data;
            $numarPropozitii = count($propozitii);
            $medieCelulaMica = 23 / $numarPropozitii;

            if(count($propozitii) == 1){
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+165, $y-23);
                $pdf->MultiCell($width, 23, $data, 1, 'C');
            }else{
                // Afisare primul cuvant
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+165, $y-23);
                $pdf->MultiCell($width, $medieCelulaMica, $propozitii[0], 'L T R', 'C');
            
                // Afisare fiecare propozitie
                for($i = 1; $i < $numarPropozitii; $i++){
                    $x=$pdf->GetX();
                    $y=$pdf->GetY();
                    $pdf->SetXY($x+165, $y);

                    if($i == ($numarPropozitii-1)){
                        $pdf->MultiCell($width, $medieCelulaMica, $propozitii[$i], 'L B R', 'C');
                    }else{
                        $pdf->MultiCell($width, $medieCelulaMica, $propozitii[$i], 'L R', 'C');
                    }
                }
            }
            /*
        $continutCelula = $data;
        $listaCuvinteCelula = explode(" ", $continutCelula);
        $numarCuvinteCelula = count($listaCuvinteCelula);
        $medieCelulaMica = 23 / $numarCuvinteCelula;

        $nextX = 165;
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->SetXY($x+$nextX, $y-23);

        if($numarCuvinteCelula == 1){
            $pdf->MultiCell(0, 23, $continutCelula, 1, 'C');
        }else{
            $pdf->MultiCell(0, $medieCelulaMica, $listaCuvinteCelula[0], 'L T R', 'C');

            for($i = 1; $i < $numarCuvinteCelula; $i++){
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+165, $y);

                if($i == ($numarCuvinteCelula-1)){
                    $pdf->MultiCell(0, $medieCelulaMica, $listaCuvinteCelula[$i], 'L, R, B', 'C');
                }else{
                    $pdf->MultiCell(0, $medieCelulaMica, $listaCuvinteCelula[$i], 'L R', 'C');
                }
            }  
        }*/
    }

    // Functie pentru desenarea unui rand - Functionala
    public static function drawRowIntrare($pdf, $data){
        $pdf->MultiCell(30, 23, $data['numar_curent_corespondenta'], 1, 'C');
            // Afisare luna inregistrare
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            $pdf->SetXY($x+30, $y-23);
        $pdf->MultiCell(12, 23, $data['luna_inregistrarii'], 1, 'C');

            // Afisare ziua inregistrare
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            $pdf->SetXY($x+42, $y-23);
        $pdf->MultiCell(12, 23, $data['ziua_inregistrarii'], 1, 'C');

            // Afisare numar corespondenta de la emitent
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            $pdf->SetXY($x+54, $y-23);
        $pdf->MultiCell(27, 23, $data['numar_inregistrare_emitent'], 1, 'C');

            // Afisare emitent
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            $pdf->SetXY($x+81, $y-23);
        $pdf->MultiCell(35, 23, $data['emitent'], 1, 'C');
            
            self::drawCellContinutIntrare($pdf, $data['continut'], 49);
            self::drawCellLucratorIntrare($pdf, $data['lucrator'], 0);
    }

    public static function drawCellRezolvareIesire($pdf, $data, $width){
            $propozitii = explode( "\n", wordwrap($data, 52));
        
            $continutCelula = $data;
            $numarPropozitii = count($propozitii);
            $medieCelulaMica = 23 / $numarPropozitii;

            if(count($propozitii) == 1){
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+40, $y-23);
                $pdf->MultiCell($width, 23, $data, 1, 'C');
            }else{
                // Afisare primul cuvant
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->SetXY($x+40, $y-23);
                $pdf->MultiCell($width, $medieCelulaMica, $propozitii[0], 0, 'C');
            
                // Afisare fiecare propozitie
                for($i = 1; $i < $numarPropozitii; $i++){
                    $x=$pdf->GetX();
                    $y=$pdf->GetY();
                    $pdf->SetXY($x+40, $y);

                    if($i == ($numarPropozitii-1)){
                        $pdf->MultiCell($width, $medieCelulaMica, $propozitii[$i], 'L B R', 'C');
                    }else{
                        $pdf->MultiCell($width, $medieCelulaMica, $propozitii[$i], 0, 'C');
                    }
                }
            }
    }

    // Afisare numere pe pagina de IESIRE
    public static function drawRowIesire($pdf, $data){
        $luna_curenta       = substr($data['data_iesirii'], 5, 2);
        $ziua_curenta       = substr($data['data_iesirii'], 8, 2);
        $rezolvare          = $data['rezolvare'];
        $destinatar         = Functions::getEmitent($data['transmis_catre']);
        // Printare linia de iesire
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->SetXY($x, $y);
        
        $pdf->MultiCell(20, 23, $luna_curenta, 1, 'C');

        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->SetXY($x+20, $y-23);
        $pdf->MultiCell(20, 23, $ziua_curenta, 1, 'C');


        self::drawCellRezolvareIesire($pdf, $rezolvare, 80);
        //$pdf->MultiCell(80, 23, $rezolvare, 1, 'C');

        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->SetXY($x+120, $y-23);
        $pdf->MultiCell(40, 23, $destinatar, 1, 'C');

        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->SetXY($x+160, $y-23);
        $pdf->MultiCell(0, 23, '', 1, 'C');
    }


    public static function printareRegistruAll($pdf, $registru){
        $baza = new Database();
        $conexiune = $baza->conectare();

        $sql = "SELECT * FROM $registru ORDER BY numar_curent_corespondenta LIMIT 10";
        $result = mysqli_query($conexiune, $sql);
        if(mysqli_num_rows($result) > 0){
            // Adaugare pagina pentru printare intrare documente
            $pdf->AddPage('PA4');
            $pdf->SetFont('Arial','B',8);
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            
            $rows = [];
            //Afisare numere din baza de date - INTRARE
                while($documente = mysqli_fetch_assoc($result)){
                    $rows[] = $documente;
                    $numar_curent       = $documente['numar_curent_corespondenta'];
                    $anul               = substr($documente['data_intrarii'], 0, 4);
                    $luna_curenta       = substr($documente['data_intrarii'], 5, 2);
                    $ziua_curenta       = substr($documente['data_intrarii'], 8, 2);
                    $numarCorespondenta = Functions::getNumar($documente['numar_corespondenta_intrata']);
                    $emitent            = Functions::getEmitent($documente['cod_emitent']);
                    $nume_lucrator      = Functions::getLucratorNume($documente['cod_lucrator']);
                    
                    $lucrator           = Functions::getLucratorNume($documente['cod_lucrator']);
                    $transmis_catre     = Functions::getEmitent($documente['transmis_catre']);

                    $numar = [
                        'numar_curent_corespondenta' => $numar_curent,
                        'luna_inregistrarii'         => $luna_curenta,
                        'ziua_inregistrarii'         => $ziua_curenta,
                        'numar_inregistrare_emitent' => $numarCorespondenta,
                        'emitent'                    => $emitent,
                        'continut'                   => $documente['continut_corespondenta'],
                        'lucrator'                   => $lucrator,
                        'transmis_catre'             => $transmis_catre
                    ];
                    self::drawRowIntrare($pdf, $numar);
                }

            
            //Afisare numere din baza de date - IESIRE
            $pdf->AddPage('PA4');
            $pdf->SetFont('Arial','B',8);
        
            for($i = 0; $i < count($rows); $i++){
                self::drawRowIesire($pdf, $rows[$i]);
            }
            
            
        }
    }
}