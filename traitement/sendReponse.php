<?php
    // on verifie que l'on recupere un id de message dans le get  
    if(isset($_GET['idMessage']) AND !empty($_GET['idMessage'])){
        $idMessage = $_GET['idMessage'];
    } else {
        header("Location: index.php?action=admin");
        exit;
    }

    // on verifie qu'un reponse à été rentré dans le formulaire 
    if(isset($_POST['reponse']) AND !empty($_POST['reponse'])){
        $reponse = $_POST['reponse'];

        // on add la reponse 
        $addReponse = $bdd->prepare("INSERT INTO `reponse` (`id_message`, `reponse`) VALUES (:idMessage, :reponse)");
        $addReponse->execute([
            'idMessage' => $idMessage,
            'reponse' => $reponse
        ]);

        // on update le message pour qu'il passe en vu 
        $updateMessage = $bdd->prepare("UPDATE `message` SET `vu` = :vu WHERE `id` = :idMessage");
        $updateMessage->execute([
            'vu' => 1,
            'idMessage' => $idMessage
        ]);

        header("Location: index.php?action=admin");
        exit;
    } else {
        $message = "vous devez entrer un message pour soumettre le formulaire !";
        header("Location: index.php?action=readMessage&idMessage=".$idMessage."&message=".$message);
        exit;
    }

?>