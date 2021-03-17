<?php

    if(isset($_GET['idSujet'])){
        $idSujet = $_GET['idSujet'];
        $getSujet = $bdd->prepare('SELECT * FROM `sujet` INNER JOIN cat ON sujet.id_cat = cat.id WHERE sujet.id = :id');
        $getSujet->execute([
            'id' => $idSujet
        ]);
        $sujet = $getSujet->fetch();

        $getCom = $bdd->prepare('SELECT * FROM `commentaires` WHERE `id_sujet`=:id_sujet ORDER BY `id` DESC');
        $getCom->execute([
            'id_sujet' => $idSujet
        ]);
        $nbCom = $getCom->rowCount();
    }

?>

<div class="pageSujet page marge d-flex">
    <div class="col-8 p-5">
        <span class="categorie"><a href="index.php?action=pageCategorie&idCat=<?=$sujet['id_cat']?>"><?=$sujet['categorie']?></a></span>
        
        <div class="sujet border border-1 p-3">
            <?php if($sujet['resolue'] == 1) {?>
                <h2><img class="me-2" src="images/check.svg" width="40px" alt="chech"><?=$sujet['titre']?>  </h2>
            <?php } else {?>
                <h2><?=$sujet['titre']?></h2>
            <?php } ?>
            
            
            <p><?=$sujet['contenu']?></p>
            <!-- TODO : faire en sorte que la redirection au formulaire fonctionne -->
            <a class="button d-flex align-items-center justify-content-center" href="#commenter">Répondre<img src="images/bulle.svg" alt="pen" width="20px"></a>
        </div>
        <?php if($_SESSION['role'] == 'admin') { ?>
            <span class="suppression"><a href="index.php?action=deleteSujet&idSujet=<?=$idSujet?>">Suppression</a></span>
        <?php } else if ($_SESSION['id'] == $sujet['id_user']){ ?>
            <span class="suppression"><a href="index.php?action=deleteSujet&idSujet=<?=$idSujet?>&idAuteur=<?=$sujet['id_user']?>">Suppression</a></span>
        <?php } ?>

        <div class="commentaires mt-5">
            <b><?=$nbCom?> Commentaires </b>
            <?php while($c = $getCom->fetch()){ ?>
                <?php
                    $getAuteur = $bdd->prepare('SELECT * FROM `user` WHERE `id`=:idUser');
                    $getAuteur->execute([
                        'idUser' => $c['id_user']
                    ]);
                    $auteur = $getAuteur->fetch();    
                ?>
                <div class="commentaire border border-1 p-3 d-flex align-items-start">
                    <img src="images/user.svg" alt="user" width="40px" class="me-2">
                    <div class="text d-flex flex-column">
                        <b><?=$auteur['pseudo']?></b>
                        <p><?=$c['commentaire']?></p>
                        <?php if($_SESSION['role'] == 'admin') { ?>
                            <span class="suppression"><a href="index.php?action=deleteCom&idCom=<?=$c['id']?>&idSujet=<?=$idSujet?>">Suppression</a></span>
                        <?php } else if ($_SESSION['id'] == $c['id_user']){ ?>
                            <span class="suppression"><a href="index.php?action=deleteCom&idCom=<?=$c['id']?>&idSujet=<?=$idSujet?>&idAuteur=<?=$c['id_user']?>">Suppression</a></span>
                        <?php } ?>
                    </div>
                </div>
                
            <?php } ?>
        </div>

        <!-- il faut être connecté pour poster un commentaire -->
        <?php if(isset($_SESSION['id'])){ ?>
            <div id="commenter" class="commenter border border-1 p-3">
                <form action="index.php?action=newCommentaire&idSujet=<?=$idSujet?>" method="POST">
                    <div class="mb-3">
                        <label for="comment">Repondre : </label>
                        <input class="form-control" type="text" name="comment" id="comment">
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer la réponse</button>
                    <?php if(isset($_GET['messageCom'])){ ?>
                        <p class="messageErreur"><?=$_GET['messageCom']?></p>
                    <?php } ?>
                </form>
            </div>
        <?php } else { ?>
            <p>Vous devez être connecter pour poster ! <a href="?action=connexion">Se connecter maintenant :)</a></p>
            <div id="commenter" class="commenter border border-1 p-3">
                <form action="index.php?action=newCommentaire&idSujet=<?=$idSujet?>" method="POST">
                    <div class="mb-3">
                        <label for="comment">Repondre : </label>
                        <input disabled="disabled" class="form-control" type="text" name="comment" id="comment">
                    </div>
                    <button disabled="disabled" type="submit" class="btn btn-primary">Envoyer la réponse</button>
                </form>
            </div>
        <?php } ?>

        
    </div>
    
    <?php include('include/sidebar.php') ?>
</div>