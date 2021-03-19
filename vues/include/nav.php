<?php 

    $getUserProfil = $bdd->prepare("SELECT * FROM userProfil");
    $getUserProfil->execute();

    $getCat = $bdd->prepare('SELECT * FROM cat');
    $getCat->execute();
?>


<div class="fixed-top">
    <nav class="navbar d-flex justify-content-around bg-light">
        <a href="index.php?action=home"><img src="images/logo.svg" alt="logo" width="200px"></a>
        <div class="search border border-1 p-2 rounded-pill">
            <form action="?action=search" method="POST">
                <div class="form-group">
                    <input type="text" id="contenuSearch" name="contenuSearch" class="contenuSearch" placeholder="Rechercher">
                    <button type="submit"><img src="images/search.svg" alt="search" width="30px"></button>
                </div>
            </form>
        </div>
        <?php if(isset($_SESSION['id'])){ ?>
                <!-- Button trigger modal -->
                <button class="bg-transparent" type="button" data-bs-toggle="modal" data-bs-target="#userProfil">
                    <img src="images/user/<?=$_SESSION['avatar']?>.svg" width="40px" alt=""> <?=$_SESSION['pseudo']?>
                </button>
            <?php if($_SESSION['role'] == 'admin') { ?>
                <a href="index.php?action=admin">Admin</a>
            <?php } else { ?>
                <a class="link" href="index.php?action=mySujet">Mes sujets</a>
                <a class="link" href="index.php?action=myMessage">Mes messages</a>
            <?php } ?>
            <a class="link" href="index.php?action=logout">Se déconnecter</a>
        <?php } else { ?>
            <a class="link" href="index.php?action=connexion">Se connecter</a>
        <?php } ?>
    </nav>
    <nav class="navbar list-categorie d-flex justify-content-around">
        <?php while($c = $getCat->fetch()){ ?>
            <a href="index.php?action=pageCategorie&idCat=<?=$c['id']?>"><?=$c['categorie']?></a>
        <?php } ?>
    </nav>
</div>


<!-- Modal -->
<div class="modal fade" id="userProfil" tabindex="-1" aria-labelledby="userProfilLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userProfilLabel">Choisir mon avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <?php while($u = $getUserProfil->fetch()) { ?>
                        <a href="index.php?action=changeAvatar&idAvatar=<?=$u['id']?>" >
                            <img src="images/user/<?=$u['name']?>.svg" width="50px" alt="">
                        </a>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>