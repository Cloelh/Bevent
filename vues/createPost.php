<?php
    // l'utilisateur doit être connecté pour accéder à cette page 
    if(!isset($_SESSION['id'])){
        $message = "Vous devez être connecté pour poster !";
        header("Location: index.php?action=connexion&messageConnexion=".$message);
    }

    $getCat = $bdd->prepare('SELECT * FROM cat');
    $getCat->execute();

?>

<div class="newPost marge page d-flex">
    <div class="addPost col-8 p-5">
        <form class="col-12" method="post" action="index.php?action=newPost">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Titre du post</label>
                <input type="text" class="form-control" id="postTitle" name="postTitle">
            </div>
            <div class="mb-3">
                <label for="postContent" class="form-label">Contenu du post</label>
                <textarea class="form-control" name="postContent" id="postContent" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="cat">Catégorie</label>
                <select class="form-select" name="cat" id="cat">
                    <option selected>Choisir une catégorie</option>
                    <?php while ($c = $getCat->fetch()){  ?>
                        <option value="<?=$c['id']?>"><?=$c['categorie']?></option>
                    <?php } ?>  
                </select>
            </div>
            <button type="submit" class="button">Poster</button>
        </form>
        <?php if(isset($_GET['message'])){ ?>
            <p class="messageErreur"><?=$_GET['message']?></p>
        <?php } ?>
    </div>

    <?php include('include/sidebar.php') ?>
</div>