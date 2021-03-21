<?php
    // on verifie qu'un message à été rentré dans le formulaire
    if(isset($_POST['message']) AND !empty($_POST['message'])){
        $message = ($_POST['message']);
        $idUser = $_SESSION['id'];
        $vu = 0;

        // on add le message 
        $addMessage = $bdd->prepare("INSERT INTO `message` (`id_user`, `message`, `vu` )VALUES (:idUser, :message, :vu)");
        $addMessage->execute([
            'idUser' => $idUser,
            'message' => $message,
            'vu' => $vu
        ]);

        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        header("Location: index.php?action=home");
        exit;
    }


?>