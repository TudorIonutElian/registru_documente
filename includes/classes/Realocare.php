<?php
    // TEST pentru SGP
    // Clasa pentru realocare numere care au fost sterse
    class Realocare{

            public static function identificareRealocare($registru){
            // Creare o noua conexiune la baza de date
            $baza = new Database();
            // Conectare la baza de date
            $conexiune = $baza->conectare();

            $sql = "SELECT id, numar_curent_corespondenta, data_intrarii FROM $registru WHERE cod_emitent = 0 ORDER BY numar_curent_corespondenta";
            if($result = mysqli_query($conexiune, $sql)){
                if(mysqli_num_rows($result) > 0){
                    $i = 1;
                    while($documente = mysqli_fetch_assoc($result)){
                        $luna_intrarii = substr($documente['data_intrarii'], 5, 2);
                        $data_intrarii = substr($documente['data_intrarii'], 8, 2);
                        echo 
                        '
                        <tr>
                            <td scope="col">' .$i .'</td>
                            <td scope="col">' .$documente['id']. '</td>
                            <td scope="col">' .$documente['numar_curent_corespondenta'] .'</td>
                            <td scope="col" colspan="2">
                                <div class="data-row">
                                    <div class="data-col">' . $luna_intrarii .'</div>
                                    <div class="data-col">' . $data_intrarii . '</div>
                                </div>
                            </td>
                            <td scope="col"><a  class="btn btn-sm btn-outline-info" href="editare.php?id='. $documente['id'] . '">Realoca NUMAR</a></td>
                        </tr>
                        ';
                        $i = $i + 1;
                    }
                }                
            }else{
                echo mysqli_error($conexiune);
            }
        }
    }