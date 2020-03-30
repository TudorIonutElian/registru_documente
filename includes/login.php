<?php
    require 'functions.php';
    
    
    session_start();
    $username = $_POST['username'];
    $parola   = $_POST['parola'];

    loginUser($username, $parola);
