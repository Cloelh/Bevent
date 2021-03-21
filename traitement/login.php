<?php
    // on verifie que l'utilisateur à bien entrer des valeurs dans le formulaire  
    if(
        !empty($_POST['pseudo']) AND isset($_POST['pseudo']) AND
        !empty($_POST['mdp']) AND isset($_POST['mdp'])){

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']); // <= on hache le mdp pour qu'il corresponde à celui dans la bdd 

        // on verifie qu'un user de la bdd à le même pseudo que celui entré 
        $connectVerif = $bdd->prepare("SELECT * FROM `user` WHERE `pseudo` = :pseudo");
        $connectVerif->execute([
            'pseudo' => $pseudo
        ]);
        
        // si == 1, il existe 
        if( ($connectVerif->rowCount()) == 1 ){
            $userInfo = $connectVerif->fetch();

            // on verifie que le mot de passe correspond 
            if($mdp == $userInfo['mdp']){
                // on stock les variables de session 
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['pseudo'] = $userInfo['pseudo'];
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['mdp'] = $userInfo['mdp'];
                $_SESSION['role'] = $userInfo['role'];
                $_SESSION['avatar'] = $userInfo['idUserProfil'];
                header("Location: index.php?action=home");
                exit;
            } else {
                $message = "mauvais mot de passe";
                header("Location: index.php?action=connexion&messageConnexion=".$message);
                exit;
            }
        } else {
            $message = "ce compte n'existe pas";
            header("Location: index.php?action=connexion&messageConnexion=".$message);
            exit;
        }
    } else{
        $message = "veuillez remplir tous les champs";
        header("Location: index.php?action=connexion&messageConnexion=".$message);
        exit;
    }

?>