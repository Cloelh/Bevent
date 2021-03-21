<?php

    // on verifie que l'on recupère bien un id de catégorie dans le get 
    if(isset($_GET['idCat'])){
        if($_SESSION['role'] == 'admin'){

            $idCat = $_GET['idCat'];

            // ond delete la catégorie 
            $deleteCat = $bdd->prepare('DELETE FROM `cat` WHERE id = :id');
            $deleteCat->execute([
                'id' => $idCat
            ]);
            
            // on selectionne tous ses sujets 
            $getSujetFromCat = $bdd->prepare('SELECT * FROM `sujet` WHERE id_cat = :id');
            $getSujetFromCat->execute([
                'id' => $idCat
            ]);

            // on boucle les sujets retournés 
            while($sujet = $getSujetFromCat->fetch()){
                $idSujet = $sujet['id']; 

                // on delete le sujet 
                $deleteSujet = $bdd->prepare('DELETE FROM `sujet` WHERE id = :id');
                $deleteSujet->execute([
                    'id' => $idSujet
                ]);

                // on delete les commentaires associés 
                $deleteCom = $bdd->prepare('DELETE FROM `commentaires` WHERE id_sujet = :id');
                $deleteCom->execute([
                    'id' => $idSujet
                ]);

            }

            header("Location: index.php?action=admin");
            exit;
        } else {
            header("Location: index.php?action=home");
            exit;
        }
    } else {
        header("Location: index.php?action=home");
        exit;
    }


?>