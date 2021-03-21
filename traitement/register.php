<?php
    // on verifie que les champs ont été remplit 
    if(
        !empty($_POST['pseudo']) AND isset($_POST['pseudo']) AND
        !empty($_POST['mail']) AND isset($_POST['mail']) AND
        !empty($_POST['mdp']) AND isset($_POST['mdp']))
        {
       
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp']); // <= cette fonction permet de hacher le mot de passe pour plus de sécurité 
        $role = "user";


        if (strlen($pseudo) < 255) {
                // on veut verifier que le pseudo n'existe pas déjà dans la bdd 
                $reqpseudo = $bdd->prepare("SELECT * FROM user WHERE `pseudo` = :pseudo");
                $reqpseudo->execute([
                    'pseudo' => $pseudo
                ]);
                $pseudoexist = $reqpseudo->rowCount();
                
                if($pseudoexist == 0){
                        // on veut verifier que le mail n'existe pas déjà dans la bdd 
                        $reqmail = $bdd->prepare("SELECT * FROM user WHERE `mail` = :mail");
                        $reqmail->execute([
                            'mail' => $mail
                        ]);
                        $mailexist = $reqmail->rowCount(); //si une ligne est renvoyé, l'email existe déjà dans la bdd

                        if($mailexist == 0) {
                                // on add l'user
                                $insertUser = $bdd->prepare("INSERT INTO user(`pseudo`, `mail`, `mdp`, `role`, `idUserProfil`) VALUES(:pseudo, :mail, :mdp, :role, :idAvatar)");
                                $insertUser->execute([
                                    'pseudo' => $pseudo,
                                    'mail' => $mail,
                                    'mdp' => $mdp,
                                    'role' => $role,
                                    'idAvatar' => 1
                                ]);
                                $message="votre compte a bien été crée";
                                header("Location: index.php?action=connexion&messageInscription=".$message);
                                exit;
                        } else {
                            $message = "l'email existe déjà";
                            header("Location: index.php?action=connexion&messageInscription=".$message);
                            exit;
                        }
                } else {
                    $message = "le pseudo existe déjà";
                    header("Location: index.php?action=connexion&messageInscription=".$message);
                    exit;
                }
            }  else {
            $message = "pseudo trop long ";
            header("Location: index.php?action=connexion&messageInscription=".$message);
            exit;
        }
    } else {
        $message = "veuillez remplir tous les champs";
        header("Location: index.php?action=connexion&messageInscription=".$message);
        exit;
    }

?>