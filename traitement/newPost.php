<?php

    if(!empty($_POST['postTitle']) AND !empty($_POST['postContent']) AND !empty($_POST['cat'])){
        $titre = $_POST['postTitle'];
        $contenu = $_POST['postContent'];
        $idCat = $_POST['cat'];
        $resolue = 0;

        if(isset($_SESSION['id'])){
            $idAuteur = $_SESSION['id'];
            if(strlen($titre) < 255) {
                
                $insertPost = $bdd->prepare("INSERT INTO sujet(`titre` , `contenu`, `id_user`, `id_cat`, `resolue`) VALUES(:titre, :contenu, :id_user, :id_cat, :resolue)");
                echo "ok";
                $insertPost->execute([
                    'titre' => $titre,
                    'contenu' => $contenu,
                    'id_user' => $idAuteur,
                    'id_cat' => $idCat,
                    'resolue' => $resolue
                ]);
                echo "ok";
                header("Location: index.php?action=home");
            } else {
                $message = "titre trop long";
                header("Location: index.php?action=createPost&message=".$message);
            }
        } else {
            $message = "Vous devez être connecté";
            header("Location: index.php?action=connexion&messageConnexion=".$message);
        }
    } else {
        $message = "remplir tous les champs svp";
        header("Location: index.php?action=createPost&message=".$message);
    }


?>