<?php

    // on verifie que l'on recupère un id de commentaire dans le get 
    if(isset($_GET['idCom'])){
        if($_SESSION['role'] == 'admin' OR isset($_GET['idAuteur']) == $_SESSION['id']){
            $idCom = $_GET['idCom'];
            $idSujet = $_GET['idSujet'];

            // on delete le commentaire 
            $deleteCom = $bdd->prepare('DELETE FROM `commentaires` WHERE id = :id');
            $deleteCom->execute([
                'id' => $idCom
            ]);
            header("Location: index.php?action=pageSujet&idSujet=".$idSujet);
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