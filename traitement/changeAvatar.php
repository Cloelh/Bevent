<?php

    // on verifie que l'user à selectionner un nouvel avatar
    if(isset($_GET['idAvatar'])){
        $idAvatar = $_GET['idAvatar'];

        // on modifie son avatar
        $changeAvatar = $bdd->prepare("UPDATE `user` SET `idUserProfil` = :newAvatar WHERE `id` = :idSession");
        $changeAvatar->execute([
            'newAvatar' => $idAvatar,
            'idSession' => $_SESSION['id']
        ]);
        // on met à jour les données de SESSIONS 
        $_SESSION['avatar'] = $idAvatar;
        
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        header("Location: index.php?action=home");
        exit;
    }


?>
