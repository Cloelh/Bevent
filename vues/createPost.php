<?php
    // l'utilisateur doit être connecté pour accéder à cette page 
    if(!isset($_SESSION['id'])){
        $message = "Vous devez être connecté pour poster !";
        header("Location: index.php?action=connexion&messageConnexion=".$message);
    }

    $test = $bdd->prepare('SELECT * FROM cat');
    $test->execute();

    // si une catégorie à déjà été choisit par l'user, pour ensuite le mettre en selected dans le select du formulaire
    if(isset($_GET['idCat'])){
        $cat = true;
        $idCat = $_GET['idCat'];
    }

?>

<?php include('include/nav.php'); ?>

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
                    <?php while ($t = $test->fetch()){  ?>
                        <?php if($cat AND $idCat == $t['id']) { ?>
                            <option selected="selected" value="<?=$t['id']?>"><?=$t['categorie']?></option>
                        <?php } else { ?>
                            <option value="<?=$t['id']?>"><?=$t['categorie']?></option>
                        <?php } ?>
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