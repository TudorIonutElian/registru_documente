<?php 
  require 'functions.php';
  require 'classes/Functions.php';

  $home_link = Functions::getUserType();
  $secretar_director_check = $_SESSION['rol'];
?>
<div id="top-content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand ml-auto text-uppercase" href="<?php echo $home_link; ?>">Secretariat <span>v.1.0.0</span></a>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <?php if($secretar_director_check !== '2') :?>
                <li class="nav-item active">
                  <a class="nav-link" href="documente.php">Documente <span class="sr-only">(current)</span></a>
                </li>
              <?php endif;?>
          </ul>
        </div>
        <?php showLogoutButton(); ?>
        <a class="btn btn-theme mx-2" href="sesizari.php">Sesizari</a>
      </nav>
</div>