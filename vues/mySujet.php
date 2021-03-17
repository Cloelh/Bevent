<!-- 
    Cette page est la page où un utilisateur retrouve tous ses posts
        - il peut visualiser ses sujets et les passer en "resolue" 
 -->

<?php

if(isset($_SESSION['id'])){
    $idUser = $_SESSION['id'];
    $pseudo = $_SESSION['pseudo'];

    $getSujet = $bdd->prepare('SELECT * FROM `sujet` WHERE `id_user`=:idUser ORDER BY `id` DESC');
    $getSujet->execute([
        'idUser' => $idUser
    ]);
    $nbSujet = $getSujet->rowCount();

} else {
    // TODO : retour à la connexion
}

?>


<div class="mySujet marge page d-flex">
<div class="feed col-8 p-5">
    <h2 class="mb-4">Mes sujets</h2>
    <p><b><?=$pseudo?></b></p>
        
    <div class="mt-5">
        <div class="resultatNb"><?=$nbSujet?> résultat(s)</div>
            <?php while($p = $getSujet->fetch()){ ?>
                <div class="post d-flex align-items-start mb-5 border border-1 p-3">
                    <?php
                        $idCat = $p['id_cat'];
                        $catPost = $bdd->prepare('SELECT * FROM cat WHERE id=?');
                        $catPost->execute(array($idCat));
                        $cat = $catPost->fetch();
                    ?>
                    <img src="images/user.svg" alt="user" class="me-2" width="40px">
                    <div class="text">
                        <h4><a href="index.php?action=pagePost&idPost=<?=$p['id']?>"><?=$p['titre']?></a></h4>
                        <?php if(strlen($p['contenu']) > 150) { ?>
                            <p><?=substr($p['contenu'], 0, 150)?>...</p>
                        <?php } else { ?>
                            <p><?=$p['contenu']?></p>
                        <?php } ?>
                        
                        <div class="d-flex">
                            <?php if($p['resolue'] == 0) { ?>
                                <span class="valider"><a href="index.php?action=postResolue&idSujet=<?=$p['id']?>">Valider le post</a></span>
                            <?php } else { ?>
                                <span class="valider">Ce post à été validé et fermé</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('include/sidebar.php') ?>
</div>