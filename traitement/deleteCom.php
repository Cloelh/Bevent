<?php

    if(isset($_GET['idCom'])){
        if($_SESSION['role'] == 'admin' OR isset($_GET['idAuteur']) == $_SESSION['id']){
            $idCom = $_GET['idCom'];
            $idSujet = $_GET['idSujet'];

            $deleteCom = $bdd->prepare('DELETE FROM `commentaires` WHERE id = :id');
            $deleteCom->execute([
                'id' => $idCom
            ]);
            header("Location: index.php?action=pageSujet&idSujet=".$idSujet);
        } else {
            // TODO : on autorié 
            echo "non autorisé";
        }
    } else {
        // TODO : redirection
        echo "redirection";
    }


?>