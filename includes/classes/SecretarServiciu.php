<?php 

class SecretarServiciu{

    public static function validareDataIesire($data){
        if($data === ""){
            return "1000-01-01";
        }
        return $data;
    }

    public static function inregistrareDocument($rol, $numar_curent, $data_curenta, $numar_intrare, $cod_emitent, $continut, $iesire, $rezolvare, $iesire_trans, $clasare, $lucrator){

        // COnectare la baza de date
        $database = new Database();
        $conexiune = $database->conectare();
        
        //Identificare rol secretar
        $registru = Functions::getRegistru($rol);

        //Generare id unic pentru fiecare document
        $id_document = Id::generareID(15);
        $sqlServiciu = "";
        if($iesire == ""){
            $sqlServiciu = "INSERT INTO " . $registru . " (id, numar_curent_corespondenta, data_intrarii, numar_corespondenta_intrata, cod_emitent, continut_corespondenta, rezolvare, transmis_catre, clasare, cod_lucrator) 
                                                VALUES ('$id_document', '$numar_curent', '$data_curenta', '$numar_intrare', '$cod_emitent', '$continut', '$rezolvare', '$iesire_trans', '$clasare', '$lucrator')";
        }else{
            $sqlServiciu = "INSERT INTO " . $registru . " (id, numar_curent_corespondenta, data_intrarii, numar_corespondenta_intrata, cod_emitent, continut_corespondenta, data_iesirii, rezolvare, transmis_catre, clasare, cod_lucrator) 
                                                VALUES ('$id_document', '$numar_curent', '$data_curenta', '$numar_intrare', '$cod_emitent', '$continut', '$iesire', '$rezolvare', '$iesire_trans', '$clasare', '$lucrator')";
        }
        
        
        if(mysqli_query($conexiune, $sqlServiciu)){
            header("Location: ../secretariat-serviciu.php?inregistrare=true");
        }else{
            die("Eroare: ". mysqli_error($conexiune));
        };
    }

    public static function getLucratoriServiciu($rol){
        $database = new Database();
        $conexiune = $database->conectare();

    
        $sql= "SELECT * FROM rd_lucratori WHERE cod_serviciu = $rol";
        $result = mysqli_query($conexiune, $sql);
    
    
        while($lucratori_serviciu = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
            echo "<option value=" .$lucratori_serviciu['id']. "> ". $lucratori_serviciu['lucrator']. "</option>";
        }
    }

    // Numarare documente de alocat
    public static function getCountAlocare($registru){
        // COnectare la baza de date
        $database = new Database();
        $conexiune = $database->conectare();

        $sql = "SELECT * FROM $registru WHERE cod_lucrator = 0";

        if($result = mysqli_query($conexiune, $sql)){
            if(!mysqli_num_rows($result)){
                return '0';
            }
            return mysqli_num_rows($result);
        }
    }
}
