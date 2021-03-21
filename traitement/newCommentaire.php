<?php
    // on verifie que la personne est connecté et qu'il a entré un commentaire 
    if(
        isset($_POST['comment']) AND !empty($_POST['comment']) AND
        isset($_SESSION['id']) AND 
        isset($_GET['idSujet'])){

        $comment = $_POST['comment'];
        $idAuteur = $_SESSION['id'];
        $idSujet = $_GET['idSujet'];

        // on add le commentaire
        $insertCom = $bdd->prepare("INSERT INTO `commentaires`(`id_user`, `commentaire`, `id_sujet`) VALUES(:idUser, :comment, :idSujet)");
        $insertCom->execute([
            'idUser' => $idAuteur,
            'comment' => $comment,
            'idSujet' => $idSujet
        ]);
        header("Location: index.php?action=pageSujet&idSujet=".$idSujet);
        exit;
    }   else {
        $message = "renseigner un champs";
        header("Location: index.php?action=pageSujet&idSujet=".$idSujet."&messageCom=".$message);
        exit;
    }


?>