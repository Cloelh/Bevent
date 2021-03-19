<?php
    if(isset($_GET['idMessage']) AND !empty($_GET['idMessage'])){
        $idMessage = $_GET['idMessage'];
    } else {
        header("Location: index.php?action=admin");
    }
    
    if(isset($_POST['reponse']) AND !empty($_POST['reponse'])){
        $reponse = $_POST['reponse'];

        $addReponse = $bdd->prepare("INSERT INTO `reponse` (`id_message`, `reponse`) VALUES (:idMessage, :reponse)");
        $addReponse->execute([
            'idMessage' => $idMessage,
            'reponse' => $reponse
        ]);

        $updateMessage = $bdd->prepare("UPDATE `message` SET `vu` = :vu WHERE `id` = :idMessage");
        $updateMessage->execute([
            'vu' => 1,
            'idMessage' => $idMessage
        ]);

        header("Location: index.php?action=admin");
    } else {
        $message = "vous devez entrer un message pour soumettre le formulaire !";
        header("Location: index.php?action=readMessage&idMessage=".$idMessage."&message=".$message);
    }

?>