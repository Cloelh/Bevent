<div class="login d-flex justify-content-center align-items-center">
    <div class="connexion bg-dark light">
        <h2>Connexion</h2>
        <?php
            if(isset($_GET['messageConnexion'])){
                echo $_GET['messageConnexion'];
            }
        ?>
        <form method="post" action="index.php?action=login">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>

            <button type="submit" name="valider" id="valider" class="btn btn-primary">Se connecter</button>
        </form>
    </div>

    <div class="inscription bg-dark light">
        <h2>Inscription</h2>
        <form method="post" action="index.php?action=register">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo">
            </div>
            <div class="form-group">
                <label for="mail">Mail</label>
                <input type="email" class="form-control" name="mail" id="mail">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>

            <button type="submit" name="valider" id="valider" class="btn btn-primary">S'inscrire</button>
            <?php
            if(isset($_GET['messageInscription'])){
                echo $_GET['messageInscription'];
            }
        ?>

        </form>
    </div>
</div>