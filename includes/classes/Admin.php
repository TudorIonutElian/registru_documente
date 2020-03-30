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
                            <td><a class='btn btn-danger btn-sm' href='./admin/suspendacont.php?id=".$user['id']."'>Activeaza Cont</a></td>
                    </tr>";
                $i++;
            }
        }

        
    }