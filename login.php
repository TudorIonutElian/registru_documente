<?php
    require 'includes/functions.php';

    session_start();
    $username = $_POST['username'];
    $parola   = $_POST['parola'];



    if(mysqli_connect_error()){
        header("Location: index.php?conectare=false");
    }else{
        loginUser($username, $parola);
    }