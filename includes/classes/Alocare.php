<?php 

class Alocare{
    public static function getLucratoriServiciu($rol){
        $database = new Database();
        $conexiune = $database->conectare();

    
        $sql= "SELECT * FROM rd_lucratori WHERE cod_serviciu = $rol";
        $result = mysqli_query($conexiune, $sql);
    
    
        while($lucratori_serviciu = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
            return "<option value=" .$lucratori_serviciu['id']. "> ". $lucratori_serviciu['lucrator']. "</option>";
        }
    }

    public static function getAlocareServiciu($serviciu){
        $database = new Database();
        $conexiune = $database->conectare();

        $sqlDocumenteNealocate = "SELECT * from $serviciu WHERE cod_lucrator = 0";
        $result = mysqli_query($conexiune, $sqlDocumenteNealocate);
        
        if($document = mysqli_num_rows($result)){
            while($document = mysqli_fetch_assoc($result)){
                $luna = substr($document['data_intrarii'], 5, 2);
                $ziua = substr($document['data_intrarii'], 8, 2);
                $emitent = Functions::getEmitent($document['cod_emitent']);
                $id = $document['id'];
                echo "
                <tr>
                    <td scope=\"col\"> " . $document['numar_curent_corespondenta'] . "</td>
                    <td scope=\"col\" colspan=\"2\">
                        <div class=\"data-row\">
                            <div class=\"data-col\">" . $luna . "</div>
                            <div class=\"data-col\">" . $ziua . "</div>
                        </div>
                    </td>
                    <td scope=\"col\">" . $document['numar_corespondenta_intrata'] . "</td>
                    <td scope=\"col\"> " . $emitent . "</td>
                    <td scope=\"col\">" . $document['continut_corespondenta']. "</td>
                    <td scope=\"col\"><a class=\"btn btn-outline-dark\" href=\"./repartizare.php?id=$id\">Repartizeaza</a></td>
                </tr>";
            }
        }else{
            echo "
            <tr>
                <td scope=\"col\" colspan=\"7\" class=\"no-documents-found\"> Nu sunt documente de alocat</td>
            </tr>";
        }
    }
}

?>

