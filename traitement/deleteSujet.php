<?php

    if(isset($_GET['idSujet'])){
        if($_SESSION['role'] == 'admin' OR isset($_GET['idAuteur']) == $_SESSION['id']){
            $idSujet = $_GET['idSujet'];

            $deleteSujet = $bdd->prepare('DELETE FROM `sujet` WHERE id = :id');
            $deleteSujet->execute([
                'id' => $idSujet
            ]);

            $deleteCom = $bdd->prepare('DELETE FROM `commentaires` WHERE id_sujet = :id');
            $deleteCom->execute([
                'id' => $idSujet
            ]);

            header("Location: index.php?action=home");
        } else {
            // TODO : on autorié 
            echo "non autorisé";
        }
    } else {
        // TODO : redirection
        echo "redirection";
    }


?>