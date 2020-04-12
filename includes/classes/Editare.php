<?php


class Editare
{
    public static function getData($id, $registru){
        $baza = new Database();
        $conexiune = $baza->conectare();

        $sql = "SELECT * FROM $registru WHERE id = '$id'";
        if($result = mysqli_query($conexiune, $sql)){
            if($data = mysqli_fetch_assoc($result)){
                return $data;
            }
        }
    }

}