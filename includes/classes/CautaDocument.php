<?php 

class CautaDocument{
    // functie de test - se va sterge in varianta publica
    public static function afiseazaDocumentele($registru){
        $baza = new Database();
        $conexiune = $baza->conectare();

        $sql = "SELECT * FROM $registru";
        $result = mysqli_query($conexiune, $sql);
        $i = 1;
        while($documente = mysqli_fetch_assoc($result)){
            $emitent = Functions::getEmitent($documente['cod_emitent']);
            echo 
            "
            <tr>
                <th scope=\"row\">".$i."</th>
                <th>".$documente['numar_curent_corespondenta']."</th>
                <td>".$documente['data_intrarii']."</td>
                <td>".$documente['numar_corespondenta_intrata']."</td>
                <td>".$emitent."</td>
                <td>".$documente['continut_corespondenta']."</td>
                <td>".$documente['cod_lucrator']."</td>
                <td>".$documente['data_iesirii']."</td>
                <td>".$documente['rezolvare']."</td>
                <td>".$documente['transmis_catre']."</td>
                <td>".$documente['clasare']."</td>
            </tr>
            "
            ;
            $i = $i+1;
        }
    }
}
