<?php 

class Document{
    public static function afisareDocumenteAll($registru){
        $baza = new Database();
        $conexiune = $baza->conectare();

        $sql = "SELECT * FROM $registru";
        $result = mysqli_query($conexiune, $sql);
        if(mysqli_num_rows($result) > 0){
            while($documente = mysqli_fetch_assoc($result)){
                $emitent            = Functions::getEmitent($documente['cod_emitent']);
                $numarCorespondenta = Functions::getNumar($documente['numar_corespondenta_intrata']);
                $nume_lucrator      = Functions::getLucratorNume($documente['cod_lucrator']);
                $anul               = substr($documente['data_intrarii'], 0, 4);
                $luna_curenta       = substr($documente['data_intrarii'], 5, 2);
                $ziua_curenta       = substr($documente['data_intrarii'], 8, 2);
    
                //Afisare date de iesire
                $data_iesire        = Functions::getDataIesire($documente['data_iesirii']); // preluare data si validare
                $luna_iesire        = substr($data_iesire, 5, 2);                           // afisare luna iesire
                $ziua_iesire        = substr($data_iesire, 8, 2);                           // afisare ziua iesire
    
                $transmis_catre     = Functions::getEmitent($documente['cod_emitent']);
                $clasare            = Functions::getIesireClasare($documente['clasare']);
    
                echo 
                "
                <tr>
                    <td>".$documente['numar_curent_corespondenta']."</td>
                    <td scope=\"col\" colspan=\"2\">
                        <div class=\"data-row\">
                            <div class=\"data-col\"> " . $luna_curenta  . "</div>
                            <div class=\"data-col\"> " . $ziua_curenta. "</div>
                        </div>
                    </td>
                    <td>". $numarCorespondenta."</td>
                    <td>". $emitent."</td>
                    <td>". $documente['continut_corespondenta']."</td>
                    <td>". $nume_lucrator."</td>
                    <td scope=\"col\" colspan=\"2\">
                        <div class=\"data-row\">
                            <div class=\"data-col\"> " . $luna_iesire . "</div>
                            <div class=\"data-col\"> " . $ziua_iesire . "</div>
                        </div>
                    </td>
                    <td>". $documente['rezolvare']."</td>
                    <td>". $transmis_catre."</td>
                    <td>". $clasare."</td>
                    <td><a class=\"btn btn-sm btn-outline-info\" href=\"\">Iesire</td>
                </tr>
                "
                ;
            }
        }else{
            echo
                "
                <tr>
                    <td colspan=\"14\" class=\"box-theme-danger py-3\">Nu exista documente inregistrate.</td>
                </tr>
                "
                ;
        }
    }
}