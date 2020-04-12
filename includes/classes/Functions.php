<?php

class Functions{
    public static function getUserType(){
        $link = 'index.php';
        if(isset($_SESSION['isLogged'])){
            if(isset($_SESSION['rol'])){
                if($_SESSION['rol'] == 1){
                    $link = 'admin.php';
                }elseif($_SESSION['rol'] == 2){
                    $link = 'secretariat-director.php';
                }elseif($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4 || $_SESSION['rol'] == 5 || $_SESSION['rol'] == 6 || $_SESSION['rol'] == 7){
                    $link = 'secretariat-serviciu.php';
                }elseif($_SESSION['rol'] == 8){
                    $link = 'secretariat-lucrator.php';
                }
            }
        }
        return $link;
    }
    public static function getRol($rolIdentificat){
        $rol = '';
        switch($rolIdentificat){
            case '1':
                $rol = 'Administrator';
            break;
            case '2':
                $rol = 'Secretar Director';
            break;
            case '3':
                $rol = 'Secretar SPCSRU';
            break;
            case '4':
                $rol = 'Secretar SGP';
            break;
            case '5':
                $rol = 'Secretar SO';
            break;
            case '6':
                $rol = 'Secretar SFIC';
            break;
            case '7':
                $rol = 'Secretar BIM';
            break;
            case '8':
                $rol = 'Lucrator';
            break;
        }
        return $rol;
    }

    public static function getRegistru($rol){
        switch($rol){
            case '1':
                $registru = 'rd_dru';
            break;
            case '2':
                $registru = 'rd_dru';
            break;
            case '3':
                $registru = 'rd_spcsru';
            break;
            case '4':
                $registru = 'rd_sgp';
            break;
            case '5':
                $registru = 'rd_so';
            break;
            case '6':
                $registru = 'rd_sfic';
            break;
            case '7':
                $registru = 'rd_bim';
            break;
    
        }
        return $registru;
    }
    public static function getEmitent($codEmitent){
        $database = new Database();
        $conexiune = $database->conectare();

        $sqlGetEmitent = "SELECT denumire_emitent FROM rd_emitent WHERE cod_emitent = '$codEmitent'";
        if($result = mysqli_fetch_assoc(mysqli_query($conexiune, $sqlGetEmitent))){
            return $result['denumire_emitent'];
        }
    }

    public static function getEmitentFull($codEmitent){
        $database = new Database();
        $conexiune = $database->conectare();

        $sqlGetEmitent = "SELECT denumire_emitent_long FROM rd_emitent WHERE cod_emitent = '$codEmitent'";
        if($result = mysqli_fetch_assoc(mysqli_query($conexiune, $sqlGetEmitent))){
            return $result['denumire_emitent_long'];
        }
    }

    // Verificare numar, daca este 0 afiseaza in registru F.N.
    public static function getNumar($numar){
        if($numar == 0){
            return "F.N.";
        }else{
            return $numar;
        }
    }

    public static function getLucratorType($cod_serviciu){
        switch($cod_serviciu){
            case '3':
                return "Serviciul Personal si Coordonare Structuri de Resurse Umane";
            break;
            case '4':
                return "Serviciul Gestioune Personal";
            break;
            case '5':
                return "Serviciul Organizare";
            break;
            case '6':
                return "Serviciul Formare Initiala si Continua";
            break;
            case '7':
                return "Biroul Inspectia Muncii";
            break;
        }
    }

    public static function getStare($cod_stare){
        switch($cod_stare){
            case '1':
                return "Utilizator Activ";
            break;
            case '2':
                return "Utilizator in rezerva";
            break;
            case '3':
                return "Utilizator in retragere";
            break;
            case '4':
                return "Utilizator mutat";
            break;
        }
    }
    public static function getNrDocumente($documente){
        switch($documente){
            case 0:
                return "Utilizatorul nu are alocate documente";
            break;
            default:
                return $documente;
        break; 
        }
    }

    // Afisare numele lucratorului in pagina de documente
    public static function getLucratorNume($id){
        $baza = new Database();
        $conexiune = $baza->conectare();
        
        $sql = "SELECT lucrator from rd_lucratori WHERE id = $id";
        $result = mysqli_query($conexiune, $sql);
        $nume_lucrator = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $nume_lucrator['lucrator'];
    }

    public static function getDataIesire($dataIesire){
        if($dataIesire == "0000-00-00"){
            return "";
        }else{
            return $dataIesire;
        }
    }
    public static function getIesireTransmitere($iesireTransmitere){
        if($iesireTransmitere == 0){
            return "";
        }
    }

    public static function getIesireClasare($iesireClasare){
        if($iesireClasare == "0"){
            return "";
        }
    }

    // Verificare daca registrul are numere inregistrate
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
}