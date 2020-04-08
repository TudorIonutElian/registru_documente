<?php
    class Admin{
        public static function afiseazaRol($rol){
            switch($rol){
                case '1':
                    return 'Administrator';
                break;
                case '2':
                    return 'Secretar Director';
                break;
                case '3':
                    return 'Secretar Serviciul 1';
                break;
                case '4':
                    return 'Secretar Serviciul 2';
                break;
                case '5':
                    return 'Secretar Serviciul 3';
                break;
                case '6':
                    return 'Secretar Serviciul 4';
                break;
                case '7':
                    return 'Secretar Biroul IM';
                break;
                case '8':
                    return 'Lucrator';
                break;
            }
        }
        public static function getAllUsers(){
            $database = new Database();
            $conexiune = $database->conectare();

            $sqlGetAllUsers = "SELECT * from rd_utilizatori";
            $result = mysqli_query($conexiune, $sqlGetAllUsers);
            $i = 1;
            while($user = mysqli_fetch_assoc($result)){
                $rol = self::afiseazaRol($user['rol']);
                echo "
                    <tr>
                        <th scope=\"row\">".$i."</th>
                            <td>". $user['user'] ."</td>
                            <td>". $user['email'] ."</td>
                            <td>". $rol ."</td>
                            <td><a class='btn btn-theme btn-sm' href='./admin/reseteazaparola.php?id=".$user['id']."'>Reseteaza Parola</a></td>
                            <td><a class='btn btn-success btn-sm' href='./admin/activeazacont.php?id=".$user['id']."'>Activeaza Cont</a></td>
                            <td><a class='btn btn-danger btn-sm' href='./admin/suspendacont.php?id=".$user['id']."'>Suspenda Cont</a></td>
                    </tr>";
                $i++;
            }
        }

        public static function getAllLucratori(){
            $database = new Database();
            $conexiune = $database->conectare();

            $sqlGetAllUsers = "SELECT * from rd_lucratori";
            $result = mysqli_query($conexiune, $sqlGetAllUsers);
            $i = 1;
            while($lucrator = mysqli_fetch_assoc($result)){
                $serviciu   = Functions::getLucratorType($lucrator['cod_serviciu']);
                $stare      = Functions::getStare($lucrator['stare']);
                $documente  = Functions::getNrDocumente($lucrator['documente']);
                echo "
                    <tr>
                        <th scope=\"row\">".$i."</th>
                            <td>". $lucrator['lucrator'] ."</td>
                            <td>". $serviciu ."</td>
                            <td>". $stare ."</td>
                            <td>". $documente ."</td>
                    </tr>";
                $i++;
            }
        }

        public static function getStareUnitate($stare){
            if($stare == 0){
                return 'Radiata';
            }elseif($stare == 1){
                return 'Activa';
            }
        }

        public static function getFullText($cod_unitate){
            $database = new Database();
            $conexiune = $database->conectare();

            $sql = "SELECT denumire_emitent_long from rd_emitent WHERE cod_emitent = $cod_unitate";
            $result = mysqli_query($conexiune, $sql);
            if($fullText = mysqli_fetch_assoc($result['denumire_emitent_long'])){
                return $fullText;
            }
        }

        public static function getAllUnitati(){
            $database = new Database();
            $conexiune = $database->conectare();

            $sqlGetAllEmitenti = "SELECT * from rd_emitent";
            $result = mysqli_query($conexiune, $sqlGetAllEmitenti);

            while($emitent = mysqli_fetch_assoc($result)){
                echo "
                    <tr>
                        <th scope=\"row\">".$emitent['cod_emitent']."</th>
                            <td>". $emitent['denumire_emitent'] ."</td>
                            <td>". $emitent['denumire_emitent_long'] ."</td>
                            <td>". self::getStareUnitate($emitent['status_emitent']) ."</td>
                            <td>". $emitent['data_creare_emitent'] ."</td>
                    </tr>";
            }
        }

        
    }