<?php  

    $getCat = $bdd->prepare("SELECT * FROM cat");
    $getCat->execute();

?>

<div class="admin marge">

    <h1>Admin page</h1>
    <h4>Catégorie : </h4>
    <ul class="list-group">
        <?php while ($cat = $getCat->fetch()) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?=$cat['categorie']?>
                <span class="suppression"><a href="index.php?action=deleteCat&idCat=<?=$cat['id']?>">Suppression</a></span>
            </li>
        <?php } ?>
    </ul>

</div>