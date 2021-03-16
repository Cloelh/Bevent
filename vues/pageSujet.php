<?php

    if(isset($_GET['idSujet'])){
        $idSujet = $_GET['idSujet'];
        $getSujet = $bdd->prepare('SELECT * FROM `sujet` WHERE `id`=:id');
        $getSujet->execute([
            'id' => $idSujet
        ]);
        $sujet = $getSujet->fetch();
        $idSujet = $sujet['id'];

        $getCom = $bdd->prepare('SELECT * FROM `commentaires` WHERE `id_sujet`=:id_sujet ORDER BY `id` DESC');
        $getCom->execute([
            'id_sujet' => $idSujet
        ]);
        $nbCom = $getCom->rowCount();
    }

?>

<div class="pageSujet marge d-flex">
    <div class="col-8 border border-1 p-5">
        <div class="sujet border border-1 p-3">
            <h2><?=$sujet['titre']?></h2>
            <p><?=$sujet['contenu']?></p>
            <a class="button d-flex align-items-center justify-content-center" href="#repondre">Répondre<img src="images/bulle.svg" alt="pen" width="20px"></a>
        </div>
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
                    <div class="text">
                        <b><?=$auteur['pseudo']?></b>
                        <p><?=$c['commentaire']?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="commenter border border-1 p-3">
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
    </div>
    
    <?php include('include/sidebar.php') ?>
</div>