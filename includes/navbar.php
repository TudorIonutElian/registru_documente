<?php 
  require 'includes/functions.php';
?>
<div id="top-content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-auto text-uppercase" href="index.php">Secretariat <span>v.1.0.0</span></a>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Registru <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Despre Registru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ghiduri de utilizare</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Statistici
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Zilnic</a>
                <a class="dropdown-item" href="#">Saptamanal</a>
                <a class="dropdown-item" href="#">Lunar</a>
                <a class="dropdown-item" href="#">Trimestrial</a>
                <a class="dropdown-item" href="#">Semestrial</a>
                <a class="dropdown-item" href="#">Anual</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Arhiva
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Creeaza Volum</a>
                <a class="dropdown-item" href="#">Genereaza opis</a>
                <a class="dropdown-item" href="#">Printeaza opis</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
          </ul>
        </div>
        <?php showLogoutButton(); ?>
        <?php showAdminButton(); ?>
      </nav>
    </div>