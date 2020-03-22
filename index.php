<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>


<?php 

    $isLoggedUser = isLogged();
    if($isLoggedUser){
        $indexPage    = 'user.php';
    }else{
        $indexPage    = 'visitor.php';
    }


?>

    <div id="main-content">
        <?php require $indexPage; ?>
    </div>
    

    </div>
    <?php require './includes/footer.php'; ?>
