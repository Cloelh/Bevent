<div class="page marge">

<?php
    if(
        !empty($_POST['pseudo']) AND isset($_POST['pseudo']) AND
        !empty($_POST['mdp']) AND isset($_POST['mdp'])){

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $connectVerif = $bdd->prepare("SELECT * FROM `user` WHERE `pseudo` = :pseudo");
        $connectVerif->execute([
            'pseudo' => $pseudo
        ]);

        if( ($connectVerif->rowCount()) == 1 ){
            $userInfo = $connectVerif->fetch();

            if($mdp == $userInfo['mdp']){
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['pseudo'] = $userInfo['pseudo'];
                $_SESSION['email'] = $userInfo['email'];
                $_SESSION['mdp'] = $userInfo['mdp'];
                $_SESSION['role'] = $userInfo['role'];
                header("Location: index.php?action=home");
                exit;
            } else {
                $message = "mauvais mot de passe";
                header("Location: index.php?action=connexion&messageConnexion=".$message);
            }
        } else {
            $message = "ce compte n'existe pas";
            header("Location: index.php?action=connexion&messageConnexion=".$message);
        }
    } else{
        $message = "veuillez remplir tous les champs";
        header("Location: index.php?action=connexion&messageConnexion=".$message);
    }

?>

</div>  