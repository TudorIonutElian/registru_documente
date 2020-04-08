<?php

class Emitent{
    public static function afisareEmitent($id){
        $database = new Database();
        $conexiune = $database->conectare();
        

        $sql= "SELECT denumire_emitent_long FROM rd_emitent WHERE cod_emitent = '$id'";
        if($result = mysqli_query($conexiune, $sql)){
            $data = mysqli_fetch_assoc($result);
            return $data['denumire_emitent_long'];
        }
    }
}