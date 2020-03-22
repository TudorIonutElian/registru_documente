<?php
    require 'includes/functions.php';

    //Pornire sesiuni
    session_start();

    //Distrugere sesiuni si redirect catre pagina transmisa ca parametru
    logoutUser("index.php");

    // Distrugere sesiuni.
    session_destroy();