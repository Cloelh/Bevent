<!-- si l'utilisateur est déjà connecté, on le renvoie à la homePage -->
<?php if(isset($_SESSION['id'])){
    header("Location: index.php?action=home");
} 

include('include/nav.php');
?>

<div class="login h100 d-flex align-items-center justify-content-center">
    <div class="login_form d-flex align-items-center justify-content-center">
        <form method="post" action="index.php?action=login" class="d-flex align-items-center justify-content-center">
            <div>
                <h2>Connexion</h2>
                <div class="element">
                    <input type="text" class="form-control" name="pseudo" id="pseudo">
                </div>

                <div class="element">
                    <input type="password" class="form-control" name="mdp" id="mdp">
                </div>

                <button type="submit" name="valider" id="valider" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</div>