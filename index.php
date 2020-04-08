<?php require 'includes/header.php' ;?>
<?php require 'includes/navbar.php' ;?>



        <?php 
            $isLoggedUser = isLogged();
            if(!$isLoggedUser){
                echo 
                '
                <div id="login-box">
                    <div class="box">
                        <img src="./design/img/stema.png" alt=""> 
                    </div>
                    <div class="box">
                        <form action="./includes/login.php" method="POST"><!-- A se modifica unde se transmit datele-->
                        <div class="input-group mb-1">
                            <div class="input-group-prepend text-right">
                            <span class="bg-primary text-white input-group-text">Username</span>
                            </div>
                            <input type="text" aria-label="Username" class="form-control text-center" name="username">
                        </div> 
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                            <span class="bg-primary text-white input-group-text">Parola</span>
                            </div>
                            <input type="password" aria-label="Parola" class="form-control text-center" name="parola">
                        </div>
                        <?php echo $eroareUsername; ?>
                        <?php echo $eroareParola; ?>   
                        <button class="btn btn-block btn-dark mt-3 font-weight-bold">Logheaza-te in Secretariat</button>
                        </form>
                    </div>
                </div>
            ';
            }
        ?>  
    <?php require './includes/footer.php'; ?>
