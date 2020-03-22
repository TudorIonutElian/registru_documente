<?php 

function loginUser($username, $parola){
    
    $db_host = "localhost";
    $db_username = "root";
    $db_parola = "";
    $db_nume = "registru_documente";

    $conexiune = mysqli_connect($db_host, $db_username, $db_parola, $db_nume);

    $sql= "SELECT * FROM rd_utilizatori WHERE user = '" . $username ."'";
    $result = mysqli_query($conexiune, $sql);
    $user_identificat = mysqli_fetch_assoc($result);
    $user_session = $user_identificat['user'];
    $sql= "SELECT * FROM rd_utilizatori WHERE user = '" . $username ."'";
    $result = mysqli_query($conexiune, $sql);
    $user_identificat = mysqli_fetch_assoc($result);

    if($user_identificat == 0){
        header("Location: index.php?eroareUsername=false");
    }else{
        if($username === $user_identificat['user'] && $parola === $user_identificat['parola']){
            $_SESSION['isLogged'] = true;
            if($user_identificat['rol'] == "1"){
                $_SESSION['isAdmin'] = true;
            }
            header("Location: index.php");
        }elseif($parola !== $user_identificat['parola']){
            header("Location: index.php?eroareParola=true");
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

// Afisare buton logout
function showLogoutButton(){
    if(isLogged()){
        echo '<a class="btn btn-outline-danger mx-2" href="sesizari.php">Sesizari</a><a class="btn btn-danger" href="logout.php">Logout</a>';
    }
}

// Afisare buton de admin daca utilizatorul este administrator
function showAdminButton(){
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true){
        echo '<a class="btn btn-warning ml-2" href="admin.php">Admin</a>';
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
    $db_host = "localhost";
    $db_username = "root";
    $db_parola = "";
    $db_nume = "registru_documente";

    $conexiune = mysqli_connect($db_host, $db_username, $db_parola, $db_nume);

    if(mysqli_connect_error()){
        die("Nu se pot selecta utilizatori");
    }else{
        $sql= "SELECT * FROM rd_utilizatori";
        $result = mysqli_query($conexiune, $sql);
        
        while($utilizatori = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo '
                <tr>
                    <th scope="row"> '. $utilizatori["id"] . '</th>
                    <td> ' .$utilizatori["user"] . '</td>
                    <td> ' .$utilizatori["email"] . '</td>
                    <td> ' .$utilizatori["parola"] . '</td>
                    <td> ' .$utilizatori["rol"] . '</td>
                    <td><a class="btn btn-sm btn-danger" href=\'stergeutilizator?id=' . $utilizatori["id"] . '\'>Sterge</a></td>
                </tr>
                ';
        }
    }
}