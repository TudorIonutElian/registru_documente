<?php 

class SecretarServiciu{

    public static function inregistrareDocument($rol /*
        $numar, $data, $numarExistent, $dataExistenta, 
        $emitent, $continut, $repartizare, $dataIesire, 
        $rezolvare, $transmiterCorespondenta, $clasareCorespondenta*/){

            $database = new Database();
            $conexiune = $database->conectare();
            
            //Identificare rol secretar
            $registru = Functions::getRegistru($rol);
            
            return $registru;
    }
}

/*
        Numarul curent al corespondentei	
        Data intrarii	
        Numarul corespondentei intrate	
        De la cine vine corespondenta	
        Continutul	
        Cui i s-a repartizat spre executare (serviciul, biroul)	
        Data iesirii	
        Rezolvarea	
        Catre cine s-a trimis corespondenta	
        Unde s-a clasat lucrarea (serviciul, biroul)
*/