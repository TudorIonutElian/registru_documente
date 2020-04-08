<?php 


class Numar{
    /* 
        Daca link-ul id-ului este corect atunci il returneaza
    */
    public static function verificareId(){
        if(isset($_GET['id'])){
            return $_GET['id'];
        }
    }

    /* 
        Verificare daca numarul are continut inainte de repartizare 
            - daca are continut este preluat in textbox si la repartizare este introdus noul text
            - daca nu are continut, textbox-ul are valoarea blank
    */
    public static function verificareContinut($id, $registru){
        $database = new Database();
        $conexiune = $database->conectare();

        $sql = "SELECT continut_corespondenta FROM $registru WHERE id = '$id'";
        if($query = mysqli_query($conexiune, $sql)){
            if($result = mysqli_fetch_assoc($query)){
                return $result['continut_corespondenta'];
            }
        }
    }
    /* 
        Alocare numar
            - la apasarea butonului, la numarul identificat conform id-ului din link, se introduce cod_lucator in registru secretarului
            - lucratorii sunt preluati in functie de registru
    */
    public static function alocareNumar($registru, $id, $text, $utilizator){
        $database = new Database();
        $conexiune = $database->conectare();
        $sql= "UPDATE $registru SET cod_lucrator = '$utilizator', continut_corespondenta = '$text' WHERE id = '$id'";
        $result = mysqli_query($conexiune, $sql);
        header("Location: alocare.php?alocat=true");
    }
    /* 
        Preluare informatii cu privire la iesirea documentului
    */
    public static function preluareInfoIesire($id, $registru){
        $database = new Database();
        $conexiune = $database->conectare();
        $sql = "SELECT 	id, numar_curent_corespondenta, cod_emitent, cod_lucrator FROM $registru WHERE id = '$id'";
        if($query = mysqli_query($conexiune, $sql)){
            if($result = mysqli_fetch_assoc($query)){
                return $result;
            }
        }
    }
    public static function iesireNumar($id, $data, $rezolvare, $destinatar, $registru){
        $database = new Database();
        $conexiune = $database->conectare();

        $sql= "UPDATE $registru SET data_iesirii = '$data', rezolvare = '$rezolvare', transmis_catre = '$destinatar' WHERE id = '$id'";
        $result = mysqli_query($conexiune, $sql);

        if($result){
            header_remove();
            header("Location: ./documente.php?alocat=true");
        }
    }
}