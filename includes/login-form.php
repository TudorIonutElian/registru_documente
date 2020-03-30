<?php 

    $eroareUsername = "";
    $eroareParola = "";
    $userRegistered ="";
    if(isset($_GET['eroareUsername'])){
        $eroareUsername = '<div class="bg-danger text-white p-2">Username incorect. Va rugam reincercati!</div>';
    }
    if(isset($_GET['eroareParola'])){
        $eroareParola = '<div class="bg-danger text-white p-2">Parola incorecta. Va rugam reincercati!</div>';
    }
    if(isset($_GET['status']) && $_GET['status'] === 'registered'){
        $userRegistered = '<div class="bg-primary my-3 text-center text-white ">Utilizator inregistrat inactiv. Asteptati activarea contului</div>';
    }
?>
<div id="login-box">
    <div class="box">
        <img src="../design/img/stema.png" alt=""> 
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
        <button class="btn btn-block btn-primary mt-3 font-weight-bold">Logheaza-te in Secretariat</button>
        <a href="register.php" class="btn btn-block btn-warning font-weight-bold">Creeaza cont nou</a>
        </form>
    </div>
</div>