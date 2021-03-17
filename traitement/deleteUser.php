<?php

    if($_SESSION['role'] == 'admin'){
        if(isset($_GET['idUser'])){
            $idUser = $_GET['idUser'];

            $getUser = $bdd->prepare("DELETE FROM `user` WHERE `id` = :id");
            $getUser->execute([
                'id' => $idUser
            ]);
            header("Location: index.php?action=admin");
        } else {
            // TODO
            header("Location: index.php?action=admin");
        }
    } else {
        header("Location: index.php?action=home");
    }

?>