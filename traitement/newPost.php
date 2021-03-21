<?php
    // on verifie que tous les chmaps ont été remplit 
    if(!empty($_POST['postTitle']) AND !empty($_POST['postContent']) AND !empty($_POST['cat'])){
        $titre = $_POST['postTitle'];
        $contenu = $_POST['postContent'];
        $idCat = $_POST['cat'];
        $resolue = 0;

        // on verifie que la personne est connecté 
        if(isset($_SESSION['id'])){
            $idAuteur = $_SESSION['id'];
            // on verifie la taille du titre 
            if(strlen($titre) < 255) {
                
                // on add le post 
                $insertPost = $bdd->prepare("INSERT INTO sujet(`titre` , `contenu`, `id_user`, `id_cat`, `resolue`) VALUES(:titre, :contenu, :id_user, :id_cat, :resolue)");
                $insertPost->execute([
                    'titre' => $titre,
                    'contenu' => $contenu,
                    'id_user' => $idAuteur,
                    'id_cat' => $idCat,
                    'resolue' => $resolue
                ]);
                header("Location: index.php?action=home");
                exit;
            } else {
                $message = "titre trop long";
                header("Location: index.php?action=createPost&message=".$message);
                exit;
            }
        } else {
            $message = "Vous devez être connecté";
            header("Location: index.php?action=connexion&messageConnexion=".$message);
            exit;
        }
    } else {
        $message = "remplir tous les champs svp";
        header("Location: index.php?action=createPost&message=".$message);
        exit;
    }


?>