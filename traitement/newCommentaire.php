<?php
echo "commentaire : ";
echo $_POST['comment'];
echo "</br> id de session : ";
echo $_SESSION['id'];
echo "</br> id du sujet : ";
echo $_GET['idSujet'];


    if(
        isset($_POST['comment']) AND !empty($_POST['comment']) AND
        isset($_SESSION['id']) AND 
        isset($_GET['idSujet'])){

        $comment = $_POST['comment'];
        $idAuteur = $_SESSION['id'];
        $idSujet = $_GET['idSujet'];


        $insertCom = $bdd->prepare("INSERT INTO `commentaires`(`id_user`, `commentaire`, `id_sujet`) VALUES(:idUser, :comment, :idSujet)");
        $insertCom->execute([
            'idUser' => $idAuteur,
            'comment' => $comment,
            'idSujet' => $idSujet
        ]);
        header("Location: index.php?action=pageSujet&idSujet=".$idSujet);
    }   else {
        echo "erreur";
        // TODO
        // $message = "erreur";
        // header("Location: index.php?action=pageSujet&idSujet=".$$idSujet."&messageCom=".$message);
    }


?>