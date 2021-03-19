<?php

    if($_SESSION['role'] == 'admin'){
        if(isset($_GET['idUser'])){
            $idUser = $_GET['idUser'];

            // on delete l'utilisateur
            $deleteUser = $bdd->prepare("DELETE FROM `user` WHERE `id` = :id");
            $deleteUser->execute([
                'id' => $idUser
            ]);

            // on delete ses sujets
            $deleteSujet = $bdd->prepare("DELETE FROM `sujet` WHERE `id_user` = :id");
            $deleteSujet->execute([
                'id' => $idUser
            ]);

            // on delete ses commentaires
            $deleteCom = $bdd->prepare("DELETE FROM `commentaires` WHERE `id_user` = :id");
            $deleteCom->execute([
                'id' => $idUser
            ]);

            // on selectionne les messages qu'il a envoyé à l'admin
            $getMessageByUser = $bdd->prepare("SELECT * FROM `message` WHERE `id_user` = :id");
            $getMessageByUser->execute([
                'id' => $idUser
            ]);

            while($message = $getMessageByUser->fetch()){
                $idMessage = $message['id'];
                
                // on delete les messages envoyés à l'admin
                $deleteMessage = $bdd->prepare("DELETE FROM `message` WHERE `id` = :id");
                $deleteMessage->execute([
                    'id' => $idMessage
                ]);

                // on delete les réponses de l'admin à ses message 
                $deleteReponse = $bdd->prepare("DELETE FROM `reponse` WHERE `id_message` = :id");
                $deleteReponse->execute([
                    'id' => $idMessage
                ]);
            }


            header("Location: index.php?action=admin");
        } else {
            header("Location: index.php?action=admin");
        }
    } else {
        header("Location: index.php?action=home");
    }

?>