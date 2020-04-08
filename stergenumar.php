<?php 
    require './includes/classes/User.php';
    require './includes/classes/Database.php';
    
    if(User::isLogged()){
        $id_numar = "";
        if(isset($_GET['id'])){
            $id_numar = $_GET['id'];

            $database = new Database();
            $conexiune = $database->conectare();

            $sqlExecute = 
                "UPDATE rd_sgp 
                 SET 
                    numar_corespondenta_intrata = 0, 
                    cod_emitent = 0, 
                    continut_corespondenta = NULL, 
                    cod_lucrator = 0, 
                    data_iesirii = NULL, 
                    rezolvare = NULL, 
                    transmis_catre = 0, 
                    clasare = 0, 
                    este_arhivat = 0
                WHERE id = '$id_numar'
                ";
            if(mysqli_query($conexiune, $sqlExecute)){
                echo "Detaliile numarului au fost sterse dar acesta ramane inregistrat. Trebuie alocat altui document / lucrator!";
            }else{
                echo mysqli_error($conexiune);
            }
            
        }
    }else{
        echo "Eroare: nu sunteti autentificat!";
    }

    
    