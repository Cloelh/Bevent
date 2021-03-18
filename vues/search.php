<div class="marge page search p-3">

<?php

    if(isset($_POST['contenuSearch']) AND !empty($_POST['contenuSearch']) 
        OR isset($_GET['contenuSearch']) AND !empty($_GET['contenuSearch'])){
        if(isset($_POST['contenuSearch'])){
            $contenuSearch = $_POST['contenuSearch'];
            $search = "%".$_POST['contenuSearch']."%";
        }
        if(isset($_GET['contenuSearch'])){
            $contenuSearch = $_GET['contenuSearch'];
            $search = "%".$_GET['contenuSearch']."%";
        }

        if(isset($_GET['actionResolue']) AND $_GET['actionResolue'] == true){
            $getSujet = $bdd->prepare("SELECT * FROM `sujet` 
            INNER JOIN `cat` ON `sujet`.`id_cat` = `cat`.`id` 
            INNER JOIN `user` ON `sujet`.`id_user` = `user`.`id` 
            WHERE (`titre` LIKE :search OR `contenu` LIKE :search OR `categorie` LIKE :search ) 
            AND `resolue` = true 
            ORDER BY `sujet`.`id` DESC");
        } else {
            $getSujet = $bdd->prepare("SELECT * FROM `sujet` 
            INNER JOIN `cat` ON `sujet`.`id_cat` = `cat`.`id` 
            INNER JOIN `user` ON `sujet`.`id_user` = `user`.`id` 
            WHERE `titre` LIKE :search OR `contenu` LIKE :search OR `categorie` LIKE :search
            ORDER BY `sujet`.`id` DESC");
        }
        
        $getSujet->execute([
            'search' => $search
        ]);
        $nbRes = $getSujet->rowCount();
    } else {
        echo "pas rentré";
        // header("Location: index.php?action=home");
    }

    include('include/nav.php');

?>

    <div class="d-flex">
        <div class="feed col-8 p-5">
            <h1>Résultats</h1>
            <div class="search border border-1 p-2 rounded-pill">
                <form action="?action=search" method="POST">
                    <div class="form-group d-flex justify-content-between">
                        <input type="text" id="contenuSearch" name="contenuSearch" class="contenuSearch w-100" value="<?=$contenuSearch?>" placeholder="Rechercher">
                        <button type="submit"><img src="images/search.svg" alt="search" width="30px"></button>
                    </div>
                </form>
            </div>
            <div class="mt-5">
                <div class="d-flex justify-content-between">
                    <p><?=$nbRes?> résulats pour votre recherche</p>
                    <?php if(isset($_GET['actionResolue']) AND $_GET['actionResolue'] == true) { ?>
                        <div><a class="link" href="?action=search&contenuSearch=<?=$contenuSearch?>">voir tous les sujets </a></div>
                    <?php } else { ?>
                        <div><a class="link" href="?action=search&actionResolue=true&contenuSearch=<?=$contenuSearch?>">ne voir que les sujets résolues</a></div>
                    <?php  } ?>
                </div>
                <?php while($s = $getSujet->fetch()){ ?>
                <?php if($s['resolue'] == 0) { ?>
                <div class="post d-flex mb-5 border border-1 p-3 justify-content-between">
                <?php } else { ?>
                <div class="post d-flex justify-content-between mb-5 border-violet p-3">
                <?php } ?>
                    <div class="post d-flex align-items-start col-8">
                        <img src="images/user.svg" alt="user" class="me-2" width="40px">
                        <div class="sujetText">
                            <h4><a href="index.php?action=pageSujet&idSujet=<?=$s['id']?>"><?=$s['titre']?></a></h4>
                            <?php if(strlen($s['contenu']) > 150) { ?>
                                <p><?=substr($s['contenu'], 0, 150)?>...</p>
                            <?php } else { ?>
                                <p><?=$s['contenu']?></p>
                            <?php } ?>
                            <span class="categorie"><a href="index.php?action=pageCategorie&idCat=<?=$s['cat.id']?>"><?=$s['categorie']?></a></span>
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
</div>