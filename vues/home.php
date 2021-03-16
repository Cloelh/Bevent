<?php
    $getCat = $bdd->prepare('SELECT * FROM cat');
    $getCat->execute();

    $getSujet = $bdd->prepare('SELECT * FROM sujet ORDER BY id DESC');
    $getSujet->execute();

    $nbSujet = $getSujet->rowCount();
?>


<div class="home marge d-flex">
    <div class="feed col-8 border border-2 p-5">
        <a class="button d-flex align-items-center justify-content-center" href="index.php?action=createPost">Poser votre question<img src="images/pen.svg" alt="pen" width="20px"></a>
    
        <div class="mt-5">
            <div class="resultatNb"><?=$nbSujet?> résultat(s)</div>
            <?php while($s = $getSujet->fetch()){ ?>
                <div class="post d-flex align-items-start mb-5 border border-1 p-3">
                    <?php
                        $idCat = $s['id_cat'];
                        $catPost = $bdd->prepare('SELECT * FROM cat WHERE id=?');
                        $catPost->execute(array($idCat));
                        $cat = $catPost->fetch();
                    ?>
                    <img src="images/user.svg" alt="user" class="me-2" width="40px">
                    <div class="sujetText">
                        <h4><a href="index.php?action=pageSujet&idSujet=<?=$s['id']?>"><?=$s['titre']?></a></h4>
                        <p><?=$s['contenu']?></p>
                        <span class="categorie"><a href="index.php?action=pageCategorie&idCat=<?=$cat['id']?>"><?=$cat['categorie']?></a></span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('include/sidebar.php') ?>
</div>