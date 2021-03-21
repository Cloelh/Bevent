<?php

    // on verifie que l'on recupere un id sujet 
    if(isset($_GET['idSujet'])){
        if($_SESSION['role'] == 'admin' OR isset($_GET['idAuteur']) == $_SESSION['id']){
            $idSujet = $_GET['idSujet'];

            // on delete le sujet 
            $deleteSujet = $bdd->prepare('DELETE FROM `sujet` WHERE id = :id');
            $deleteSujet->execute([
                'id' => $idSujet
            ]);

            // on delete les commentaires associés
            $deleteCom = $bdd->prepare('DELETE FROM `commentaires` WHERE id_sujet = :id');
            $deleteCom->execute([
                'id' => $idSujet
            ]);

            header("Location: index.php?action=home");
            exit;
        } else {
            header("Location: index.php?action=home");
            exit;
        }
    } else {
        header("Location: index.php?action=home");
        exit;
    }


?>