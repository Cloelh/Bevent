<?php
    // on verifie que l'on recupere un id sujet en get  
    if(isset($_GET['idSujet'])){
        $idUser = $_SESSION['id'];
        $idSujet = $_GET['idSujet'];

        // on selectionne le sujet avec l'id en get 
        $getSujet = $bdd->prepare('SELECT * FROM `sujet` WHERE `id`=:id');
        $getSujet->execute([
            'id' => $idSujet
        ]);
        $Sujet = $getSujet->fetch();

        $idAuteur = $Sujet['id_user'];

        // on verifie que l'user est l'auteur du sujet 
        if($idAuteur == $idUser){
            // on modifie dans la bdd 
            $validatePost = $bdd->prepare('UPDATE `sujet` SET `resolue` = 1 WHERE `id` = :id');
            $validatePost->execute([
                'id' => $idSujet
            ]);
            header("Location: index.php?action=mySujet");
            exit;
        } else {
        echo "vous n'êtes pas autoriser à valider cette question";
        }
    } else {
        echo "pas d'idPost";
    }
?>
