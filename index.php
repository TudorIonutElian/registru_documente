<?php require './includes/header.php' ;?>
<?php require './includes/navbar.php' ;?>

    <div id="main-content">
        <div id="login-box">
            <div class="box">
                <img src="./img/stema.png" alt="">
            </div>
            <div class="box">
                <form action="registre.php" method="POST"><!-- A se modifica unde se transmit datele-->
                    <div class="input-group mb-1">
                        <div class="input-group-prepend text-right">
                            <span class="bg-primary text-white input-group-text">Username</span>
                        </div>
                            <input type="text" aria-label="First name" class="form-control text-center">
                    </div>   
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="bg-primary text-white input-group-text">Parola</span>
                        </div>
                        <input type="text" aria-label="First name" class="form-control text-center">
                    </div>     
                    <button class="btn btn-block btn-primary mt-3 font-weight-bold">Logheaza-te in Secretariat</button>
                </form>
            </div>
        </div>
    </div>
    

    </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>
</html>