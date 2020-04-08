<?php
    class SecretarDirector{

        public static function getServiciu($serviciu){
            switch($serviciu){
                case '1':
                    $serviciu = 'rd_spcsru';
                break;
                case '2':
                    $serviciu = 'rd_sgp';
                break;
                case '3':
                    $serviciu = 'rd_so';
                break;
                case '4':
                    $serviciu = 'rd_sfic';
                break;
                case '5':
                    $serviciu = 'rd_bim';
                break;
        
            }
            return $serviciu;
        }

        public static function getNumarCurent($registru, $rol){
            // COnectare la baza de date
            $database = new Database();
            $conexiune = $database->conectare();
    
            $sql = "SELECT * FROM $registru";
    
            if($result = mysqli_query($conexiune, $sql)){
                if(mysqli_num_rows($result) > 0){
                    $sqlGetNumarUrmator = "SELECT MAX(numar_curent_corespondenta) FROM $registru";
                    if($result = mysqli_query($conexiune, $sqlGetNumarUrmator)){
                        $NumarUrmator = mysqli_fetch_assoc($result);
                        return (int)$NumarUrmator['MAX(numar_curent_corespondenta)'] + 1;
                    }
                }elseif(mysqli_num_rows($result) == 0 || mysqli_num_rows($result) == NULL){
                    $sqlGetNumarUrmatorBaza = "SELECT start_number FROM rd_start_numbers WHERE cod_registru = $rol";
                    if($result = mysqli_query($conexiune, $sqlGetNumarUrmatorBaza)){
                        $NumarUrmator = mysqli_fetch_assoc($result);
                        return (int)$NumarUrmator['start_number'];
                    };
                }
            }
        }

        public static function alocareDocument($dataIntrarii, $numarCorespondentaIntrata, $codEmitent, $codRepartizareStructura){
            $database = new Database();
            $conexiune = $database->conectare();
            
            //Generare id unic pentru fiecare document
            $id_document = Id::generareID(15);
            $sql = "INSERT INTO rd_dru (id, data_intrarii, numar_corespondenta_intrata, cod_emitent, cod_repartizare_structura) 
                    VALUES (
                                '$id_document', 
                                '$dataIntrarii', 
                                '$numarCorespondentaIntrata', 
                                '$codEmitent',
                                '$codRepartizareStructura'
                )";
            $result = mysqli_query($conexiune, $sql);
            if(!$result){
                die(mysqli_error($conexiune));
            };

            //Identificare serviciu si urmatorul numar
            $serviciu = self::getServiciu($codRepartizareStructura);
            $numar = self::getNumarCurent($serviciu, ((int)$codRepartizareStructura+2));

            $sqlServiciu = "INSERT INTO " . $serviciu ." (id, numar_curent_corespondenta, data_intrarii, numar_corespondenta_intrata, cod_emitent, cod_lucrator) 
            VALUES (
                        '$id_document',
                        '$numar', 
                        '$dataIntrarii', 
                        '$numarCorespondentaIntrata', 
                        '$codEmitent', 
                        0
                    )";
            $resultServiciu = mysqli_query($conexiune, $sqlServiciu);
            if(!$resultServiciu){
                die(mysqli_error($conexiune));
            };
        } 
        public static function getAlocareAstazi($structura, $data){
            $numar = 0;
            $astazi = date("Y-m-d");
            $serviciul = self::getServiciu($structura);
            $database = new Database();
            $conexiune = $database->conectare();

            $sql = "SELECT * FROM rd_dru WHERE cod_repartizare_structura ='$structura' AND data_intrarii ='$data'";
            if($result = mysqli_query($conexiune, $sql)){
                $numar = mysqli_num_rows($result);
            };
            return $numar;
        }
    }
    ?>
