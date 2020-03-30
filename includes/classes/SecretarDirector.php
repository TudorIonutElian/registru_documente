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

            //Identificare serviciu
            $serviciu = self::getServiciu($codRepartizareStructura);
            $sqlServiciu = "INSERT INTO " . $serviciu ." (id, data_intrarii, numar_corespondenta_intrata, cod_emitent) 
            VALUES (
                        '$id_document', 
                        '$dataIntrarii', 
                        '$numarCorespondentaIntrata', 
                        '$codEmitent')";
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
