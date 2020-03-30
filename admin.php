<?php 
  require './includes/header.php' ;
  require './includes/navbar.php' ;
  require './includes/classes/Admin.php';
?>

<div class="container">
    <div class="row">
        <div class="col-11"><h3>Utilizatori</h3></div>
    </div>
    <div class="row">
        <div class="col-11 m-auto">
            <table class="table">
                <thead class="bg-theme">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Reseteaza parola</th>
                        <th scope="col">Activeaza cont</th>
                        <th scope="col">Suspenda cont</th>
                    </tr>
                </thead>
                <tbody>
                    <?php Admin::getAllUsers();?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
    require './includes/footer.php';