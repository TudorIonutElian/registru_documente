<?php 

    require 'classes/Database.php';
    require 'classes/Id.php';


function getNextNumber($registru){
    $dataBase = new Database();
    $conexiune = $dataBase->conectare();
    
    if(!$registru){
        return 1;
    }else{
        if($registru == 1){
            $sql = "SELECT MAX(numar_curent_corespondenta) FROM rd_spcsru";
        }elseif($registru == 2){
            $sql = "SELECT MAX(numar_curent_corespondenta) FROM rd_sgp";
        }elseif($registru == 3){
            $sql = "SELECT MAX(numar_curent_corespondenta) FROM rd_so";
        }elseif($registru == 4){
            $sql = "SELECT MAX(numar_curent_corespondenta) FROM rd_sfic";
        }elseif($registru == 5){
            $sql = "SELECT MAX(numar_curent_corespondenta) FROM rd_bim";
        }

        $result = mysqli_query($conexiune, $sql);
        $numar = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return (int)$numar['MAX(numar_curent_corespondenta)']+1;
    }
}



function loginUser($username, $parola){
    $dataBase = new Database();
    $conexiune = $dataBase->conectare();

    $sql= "SELECT * FROM rd_utilizatori WHERE user = '$username'";
    $result = mysqli_query($conexiune, $sql);
    $user_identificat = mysqli_fetch_assoc($result);
    $user_session = $user_identificat['user'];
    $sql= "SELECT * FROM rd_utilizatori WHERE user = '" . $username ."'";
    $result = mysqli_query($conexiune, $sql);
    $user_identificat = mysqli_fetch_assoc(mysqli_query($conexiune, $sql));

    if($user_identificat === 0){
        echo "UserEroare";
    }else{
        if($username === $user_identificat['user'] && $parola === $user_identificat['parola']){
            //Setare sesiuni cu privire la logare, user si rol
            $_SESSION['isLogged'] = true;
            $_SESSION['utilizator'] = $user_identificat['user'];
            $_SESSION['rol'] = $user_identificat['rol'];
            
            if($user_identificat['rol'] == "1"){
                $_SESSION['isAdmin'] = true;
                echo "A";
            }
            if($user_identificat['rol'] == "2"){
                echo "SD";
            }
            if($user_identificat['rol'] == "3" || $user_identificat['rol'] == "4" || $user_identificat['rol'] == "5" || $user_identificat['rol'] == "6" || $user_identificat['rol'] == "7"){
                echo "SS";
            }
            if($user_identificat['rol'] == "8"){
                echo "SL";
            }
        }elseif($parola !== $user_identificat['parola']){
            echo "Parola incorecta!";
        }       
    }
}
// Verificare daca utilizatorul este logat
function isLogged(){
    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] === true){
        return true;
    }
    return false;
}

function getCountAlocare($registru){
    // COnectare la baza de date
    $database = new Database();
    $conexiune = $database->conectare();

    $sql = "SELECT * FROM $registru WHERE cod_lucrator = 0";

    if($result = mysqli_query($conexiune, $sql)){
        if(!mysqli_num_rows($result)){
            return '0';
        }
        return mysqli_num_rows($result);
    }
}

// Afisare buton logout
function showLogoutButton(){
    
    if(isset($_SESSION['utilizator'])){
        $utilizator = '<a class="dropdown-item" href="profil.php"><img class="p-2" src="./design/img/profile.png">'. $_SESSION['utilizator'] .'</a>';
    }
    if(isset($_SESSION['rol'])){
        $rol                = Functions::getRol($_SESSION['rol']); //identificare structura
        $admin = '<a class="dropdown-item" href="./includes/profil.php"><img class="p-2" src="./design/img/profile.png">' . $rol .'</a>';
    }

    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true){
        $admin =  '
            <a class="dropdown-item" href="admin.php"><img class="p-2" src="./design/img/admin.png">Admin</a>
            <a class="dropdown-item" href="secretariat-director.php"><img class="p-2" src="./design/img/secretariat.png">Secretariat Director</a>
            <a class="dropdown-item" href="secretariat-serviciu.php"><img class="p-2" src="./design/img/secretariat-serviciu.png">Secretariat Serviciu</a>
            <a class="dropdown-item" href="secretariat-lucrator.php"><img class="p-2" src="./design/img/secretariat-lucrator.png">Secretariat Lucrator</a>
        ';
    }


    if(isLogged()){
        $registru           = Functions::getRegistru($_SESSION['rol']);
        $numar_documente    = getCountAlocare($registru);

        $classAlocare = 'alocare-success';

        if($numar_documente > 0){
            $classAlocare = "alocare-warning";
        }
        $alocare_link = "";

        echo '
    
            <li class="nav-item active">
                <a class="nav-link ' .$classAlocare . '" href="alocare.php">Alocare (' .$numar_documente. ')</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="secretariat-serviciu.php">Inregistrare</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contul meu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    ' . $admin .'
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><img class="p-2" src="./design/img/sesizari.png">Sesizari</a>
                    <a class="dropdown-item" href="alocare.php"><img class="p-2" src="./design/img/mesaje.png">Alocare (' .$numar_documente .') </a>
                    <a class="dropdown-item" href="logout.php"><img class="p-2" src="./design/img/logout.png">Logout</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mentenanta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="realocare.php"><img class="p-2" src="./design/img/sesizari.png">Realocare numar</a>
                    <a id="schimba_lucrator" class="dropdown-item" href="#"><img class="p-2" src="./design/img/sesizari.png">Schimba lucrator</a>
                    <a class="dropdown-item" href="#"><img class="p-2" src="./design/img/sesizari.png">Schimba destinatar</a>
                    <a class="dropdown-item" href="#"><img class="p-2" src="./design/img/sesizari.png">Adauga emitent</a>
                </div>
            </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nomenclator
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="realocare.php"><img class="p-2" src="./design/img/sesizari.png">Adauga Emitent</a>
                    <a class="dropdown-item" href="#"><img class="p-2" src="./design/img/sesizari.png">Adauga Lucrator</a>
                    <a class="dropdown-item" href="#"><img class="p-2" src="./design/img/sesizari.png">Adauga Destinatar</a>
                </div>
            </li>
            <li class="nav-item"><a class="btn btn-outline-info mx-2" href="registru.php" target="_blank">Printeaza Registru</a></li>
        ';
    }
}

// Delogare utilizator de pe site
function logoutUser($redirect){
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    header("Location: $redirect");
}

// Afisare utilizatori existenti in baza de date
function afisareUtilizatori(){
    $dataBase = new Database();
    $conexiune = $dataBase->conectare();

    if(mysqli_connect_error()){
        die("Nu se pot selecta utilizatori");
    }else{
        $sql= "SELECT * FROM rd_utilizatori";
        $result = mysqli_query($conexiune, $sql);
        $id = 1;
        while($utilizatori = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($utilizatori['stare'] == 1){
                $stare_utilizator = 'Activ';
            }else{
                $stare_utilizator = 'Inactiv';
            }
            
            echo '
                <tr>
                    <th scope="row"> '. $id . '</th>
                    <td> ' .$utilizatori["user"] . '</td>
                    <td> ' .$utilizatori["email"] . '</td>
                    <td> ' .$utilizatori["parola"] . '</td>
                    <td> ' .$utilizatori["rol"] . '</td>
                    <td> ' .$stare_utilizator . '</td>
                    <td><a class="btn btn-sm btn-danger" href=\'stergeutilizator.php?id=' . $utilizatori["id"] . '\'>Sterge</a></td>               </tr>
                ';
            $id++;
        }
    }
}


function getAllEmitent(){
    $dataBase = new Database();
    $conexiune = $dataBase->conectare();

    $sql= "SELECT * FROM rd_emitent";
    $result = mysqli_query($conexiune, $sql);


    while($emitenti = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        echo "<option value=" .$emitenti['cod_emitent']. "> ". $emitenti['denumire_emitent']. "</option>";
    }
}