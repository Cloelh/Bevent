<?php

    if(isset($_GET['idAvatar'])){
        $idAvatar = $_GET['idAvatar'];

        $changeAvatar = $bdd->prepare("UPDATE `user` SET `idUserProfil` = :newAvatar WHERE `id` = :idSession");
        $changeAvatar->execute([
            'newAvatar' => $idAvatar,
            'idSession' => $_SESSION['id']
        ]);
        $_SESSION['avatar'] = $idAvatar;
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }


?>
