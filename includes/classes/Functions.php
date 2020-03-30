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

        $sqlGetEmitent = "SELECT denumire_emitent FROM rd_emitent WHERE cod_emitent = $codEmitent";
        if($result = mysqli_fetch_assoc(mysqli_query($conexiune, $sqlGetEmitent))){
            return $result['denumire_emitent'];
        }
    }
}