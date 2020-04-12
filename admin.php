<?php 
  require './includes/header.php';
  require './includes/navbar.php';
  require './includes/classes/Admin.php';
?>

<div class="container">
    <!-- UTILIZATORI -->
    <div class="row">
        <div class="col-11"><h3 class="h-inline-block">Utilizatori</h3></div>
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
    <!-- LUCRATORI -->
    <div class="row">
        <div class="col-11"><h3 class="h-inline-block">Lucratori</h3></div>
    </div>
    <div class="row">
        <div class="col-11 m-auto">
            <table class="table">
                <thead class="bg-theme">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nume si prenume</th>
                        <th scope="col">Serviciu</th>
                        <th scope="col">Stare</th>
                        <th scope="col">Numar documente alocate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php Admin::getAllLucratori();?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Unitati -->
    <div class="row">
        <div class="col-11"><h3 class="h-inline-block">Emitenti / unitati</h3></div>
    </div>
    <div class="row">
        <div class="col-11 m-auto">
            <table class="table">
                <thead class="bg-theme">
                    <tr>
                        <th scope="col">Id Unitate</th>
                        <th scope="col">Denumire scurta</th>
                        <th scope="col">Denumire lunga</th>
                        <th scope="col">Stare</th>
                        <th scope="col">Daca creare</th>
                    </tr>
                </thead>
                <tbody>
                    <?php Admin::getAllUnitati();?> 
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require './includes/footer.php';