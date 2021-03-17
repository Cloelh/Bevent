<?php
    if(isset($_GET['idSujet'])){
        $idUser = $_SESSION['id'];
        $idSujet = $_GET['idSujet'];

        $getSujet = $bdd->prepare('SELECT * FROM `sujet` WHERE `id`=:id');
        $getSujet->execute([
            'id' => $idSujet
        ]);
        $Sujet = $getSujet->fetch();

        $idAuteur = $Sujet['id_user'];

        if($idAuteur == $idUser){
            $validatePost = $bdd->prepare('UPDATE `sujet` SET `resolue` = 1 WHERE `id` = :id');
            echo $idSujet;
            $validatePost->execute([
                'id' => $idSujet
            ]);
            header("Location: index.php?action=mySujet");
        } else {
        echo "vous n'êtes pas autoriser à valider cette question";
        }
    } else {
        echo "pas d'idPost";
    }
?>
