<?php

    if(isset($_GET['idCat'])){
        if($_SESSION['role'] == 'admin'){

            $idCat = $_GET['idCat'];

            $deleteCat = $bdd->prepare('DELETE FROM `cat` WHERE id = :id');
            $deleteCat->execute([
                'id' => $idCat
            ]);
            
            $getSujetFromCat = $bdd->prepare('SELECT * FROM `sujet` WHERE id_cat = :id');
            $getSujetFromCat->execute([
                'id' => $idCat
            ]);


            while($sujet = $getSujetFromCat->fetch()){
                $idSujet = $sujet['id']; 

                $deleteSujet = $bdd->prepare('DELETE FROM `sujet` WHERE id = :id');
                $deleteSujet->execute([
                    'id' => $idSujet
                ]);


                $deleteCom = $bdd->prepare('DELETE FROM `commentaires` WHERE id_sujet = :id');
                $deleteCom->execute([
                    'id' => $idSujet
                ]);

            }

            header("Location: index.php?action=admin");
        } else {
            // TODO : on autorié 
            echo "non autorisé";
        }
    } else {
        // TODO : redirection
        echo "redirection";
    }


?>