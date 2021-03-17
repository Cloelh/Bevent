<?php
    $getCat = $bdd->prepare('SELECT * FROM cat');
    $getCat->execute();

    // on verifie si l'utilisateur à demander le filtre pour n'avoir que les sujet résolues par les internautes 
    if(isset($_GET['actionResolue']) AND $_GET['actionResolue'] == true){
        $getSujet = $bdd->prepare('SELECT * FROM `sujet` WHERE `resolue` = :resolue ORDER BY `id` DESC');
        $getSujet->execute([
            'resolue' => 1
        ]);
    } else {
        // sinon on affiche tous les sujets 
        $getSujet = $bdd->prepare('SELECT * FROM `sujet` ORDER BY `id` DESC');
        $getSujet->execute();
    }

    

    $nbSujet = $getSujet->rowCount();
    
?>


<div class="home page marge d-flex">
    <div class="feed col-8 p-5">
        <a class="button d-flex align-items-center justify-content-center" href="index.php?action=createPost">Poser votre question<img src="images/pen.svg" alt="pen" width="20px"></a>
    
        <div class="mt-5">
            <div class="d-flex justify-content-between">
                <div class="resultatNb"><?=$nbSujet?> résultat(s)</div>
                <?php if(isset($_GET['actionResolue']) AND $_GET['actionResolue'] == true) { ?>
                    <div class="resolue"><a href="?action=home">voir tous les sujets </a></div>
                <?php } else { ?>
                    <div class="resolue"><a href="?action=home&actionResolue=true">ne voir que les sujets résolues</a></div>
                <?php  } ?>
            </div>
            <?php while($s = $getSujet->fetch()){ ?>
                <?php if($s['resolue'] == 0) { ?>
                <div class="post d-flex mb-5 border border-1 p-3 justify-content-between">
                <?php } else { ?>
                <div class="post d-flex justify-content-between mb-5 border-violet p-3">
                <?php } ?>
                
                    <?php
                    // TODO INNER JOIN ON 
                        $idCat = $s['id_cat'];
                        $catPost = $bdd->prepare('SELECT * FROM cat WHERE id=?');
                        $catPost->execute(array($idCat));
                        $cat = $catPost->fetch();
                    ?>
                    <div class="post d-flex align-items-start col-8">
                        <img src="images/user.svg" alt="user" class="me-2" width="40px">
                        <div class="sujetText">
                            <h4><a href="index.php?action=pageSujet&idSujet=<?=$s['id']?>"><?=$s['titre']?></a></h4>
                            <?php if(strlen($s['contenu']) > 150) { ?>
                                <p><?=substr($s['contenu'], 0, 150)?>...</p>
                            <?php } else { ?>
                                <p><?=$s['contenu']?></p>
                            <?php } ?>
                            <span class="categorie"><a href="index.php?action=pageCategorie&idCat=<?=$cat['id']?>"><?=$cat['categorie']?></a></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end col-4">
                        <?php if($s['resolue'] == 1) { ?>
                            <span class="p-3 d-flex align-items-center justify-content-center">
                                <img src="images/check.svg" width="50px" alt="chech">
                            </span>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('include/sidebar.php') ?>
</div>