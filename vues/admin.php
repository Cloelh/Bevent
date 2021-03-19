<!-- 
    Cette page est la page administrateur, elle permet à l'admin uniquement de : 
        - visualiser les catégories, d'en supprimer et d'en ajouter 
        - visualiser les users et d'en supprimer
        - visualiser les messages des utilisateurs
 -->
<?php  

    // on selectionne toutes les catégories
    $getAllCat = $bdd->prepare("SELECT * FROM `cat`");
    $getAllCat->execute();

    // on selectionnne tous les user
    $getUser = $bdd->prepare("SELECT * FROM `user`");
    $getUser->execute();

    // on selectionne tius 
    $getMessage = $bdd->prepare("SELECT message.*, user.pseudo 
    FROM `message`
    INNER JOIN `user` ON `message`.`id_user` = `user`.`id`
    WHERE `vu` = 0 
    ORDER BY `id` DESC");
    $getMessage->execute();

    $getMessageLus = $bdd->prepare("SELECT message.*, user.pseudo 
    FROM `message`
    INNER JOIN `user` ON `message`.`id_user` = `user`.`id`
    WHERE `vu` = 1 
    ORDER BY `id` DESC");
    $getMessageLus->execute();

    include('include/nav.php');
?>

<div class="admin marge page p-3">

    <h1>Admin page</h1>
    <!-- Liste des catégories  -->
    <h4>Catégorie </h4>
    <ul class="list-group">
        <?php while ($c = $getAllCat->fetch()) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?=$c['categorie']?>
                <span class="suppression"><a href="index.php?action=deleteCat&idCat=<?=$c['id']?>">Suppression</a></span>
            </li>
        <?php } ?>
    </ul>
    <!-- Button trigger modal => ajout d'une cat-->
    <button type="button" class="button mt-4" data-bs-toggle="modal" data-bs-target="#addCat">
        Ajouter une catégorie <img src="images/add.svg" width="30px" alt="">
    </button>

    <!-- Liste des users -->
    <!-- TODO supprimer aussi ses post et message !!  -->
    <h4 class="pt-5">Utilisateurs</h4>
    <ul class="list-group">
        <?php while ($u = $getUser->fetch()) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?=$u['pseudo']?> (<?=$u['mail']?>)
                <span class="suppression"><a href="index.php?action=deleteUser&idUser=<?=$u['id']?>">Suppression</a></span>
            </li>
        <?php } ?>
    </ul>

    <!-- listes des messages non lu -->
    <h4 class="pt-5">Messages non lus </h4>
    <ul class="list-group">
        <?php while ($m = $getMessage->fetch()) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?=$m['message']?> 
                <a href="?action=readMessage&idMessage=<?=$m['id']?> " class="voirMessage">Voir le message</a>
            </li>
        <?php } ?>
    </ul>

    <!-- listes des messages lu -->
    <h4 class="pt-5">Messages lus </h4>
    <ul class="list-group">
        <?php while ($l = $getMessageLus->fetch()) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Message de <?=$l['pseudo']?>
                <a href="?action=readMessage&idMessage=<?=$l['id']?> " class="voirMessage">Voir le message</a>
            </li>
        <?php } ?>
    </ul>
    

    <!-- MODAL -->

    <!-- Modal  ajout d'une cat-->
    <div class="modal fade" id="addCat" tabindex="-1" aria-labelledby="addCatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCatLabel">Ajouter une catégorie au site</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php?action=addCat">
                        <div class="mb-3">
                            <label for="addCat" class="form-label">Nom de la nouvelle catégorie</label>
                            <input type="text" class="form-control" id="addCat" name="addCat">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description de la nouvelle catégorie</label>
                            <textarea name="description" id="description" cols="50" rows="10"></textarea>
                        </div>
                        <button type="submit" class="button">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

</div>