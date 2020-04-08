<?php

class Lucrator{
    public static function afisareLucrator($id){
        $database = new Database();
        $conexiune = $database->conectare();
        

        $sql= "SELECT lucrator FROM rd_lucratori WHERE id = '$id'";
        if($result = mysqli_query($conexiune, $sql)){
            $data = mysqli_fetch_assoc($result);
            return $data['lucrator'];
        }
    }
}