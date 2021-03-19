<?php

    if(isset($_GET['idAvatar'])){
        $idAvatar = $_GET['idAvatar'];

        $changeAvatar = $bdd->prepare("UPDATE `user` SET `idUserProfil` = :newAvatar WHERE `id` = :idSession");
        $changeAvatar->execute([
            'newAvatar' => $idAvatar,
            'idSession' => $_SESSION['id']
        ]);
        echo $_SESSION['idUserProfil'];
        $_SESSION['idUserProfil'] = $idAvatar;
        echo $_SESSION['idUserProfil'];

        // header("Location: ".$_SERVER['HTTP_REFERER']);
    }


?>
