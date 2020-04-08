<?php 

class CautaDocument{
    // Functie pentru verificarea iesirii documentului, daca este iesit, nu mai are butonul de IESIRE
    public static function verificareIesireDocument($data_iesire, $id){
        if($data_iesire == NULL){
            return "<td><a class=\"btn btn-sm btn-outline-info\" href=\"iesirenumar.php?id=$id\">Iesire</td>";
        }else{
            return "<td class=\"bg-success text-white\">Iesit</td>";
        }
    }

    // functie de test - se va sterge in varianta publica
    public static function afiseazaDocumentele($registru){
        $baza = new Database();
        $conexiune = $baza->conectare();

        $sql = "SELECT * FROM $registru ORDER BY numar_curent_corespondenta";
        $result = mysqli_query($conexiune, $sql);
        if(mysqli_num_rows($result) > 0){
            while($documente = mysqli_fetch_assoc($result)){
                $id = $documente['id'];
                $emitent            = Functions::getEmitent($documente['cod_emitent']);
                $numarCorespondenta = Functions::getNumar($documente['numar_corespondenta_intrata']);
                $nume_lucrator      = Functions::getLucratorNume($documente['cod_lucrator']);
                $anul               = substr($documente['data_intrarii'], 0, 4);
                $luna_curenta       = substr($documente['data_intrarii'], 5, 2);
                $ziua_curenta       = substr($documente['data_intrarii'], 8, 2);
                $linkIesire         = self::verificareIesireDocument($documente['data_iesirii'], $documente['id']);
    
                //Afisare date de iesire
                $data_iesire        = Functions::getDataIesire($documente['data_iesirii']); // preluare data si validare

                $luna_iesire        = substr($data_iesire, 5, 2);                           // afisare luna iesire
                $ziua_iesire        = substr($data_iesire, 8, 2);                           // afisare ziua iesire
    
                $transmis_catre     = Functions::getEmitent($documente['transmis_catre']);
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
                    ". $linkIesire ."
                    <td><a class=\"btn btn-sm btn-outline-danger\" href=\"stergenumar.php?id=$id\">Sterge</td>
                </tr>
                "
                ;
            }
        }else{
            echo
                "
                <tr>
                    <td colspan=\"14\ class=\"no-documents-found py-3\">Nu exista documente inregistrate.</td>
                </tr>
                "
                ;
        }
    }
}
