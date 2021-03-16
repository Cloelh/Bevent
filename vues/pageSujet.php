<?php

    if(isset($_GET['idSujet'])){
        $idSujet = $_GET['idSujet'];
        $getSujet = $bdd->prepare('SELECT * FROM sujet WHERE id=:id');
        $getSujet->execute([
            'id' => $idSujet
        ]);
        $sujet = $getSujet->fetch();
    }

?>

<div class="pageSujet marge d-flex">
    
    <div class="col-8 border border-1 p-5">
        <div class="sujet border border-1 p-3">
            <h2><?=$sujet['titre']?></h2>
            <p><?=$sujet['contenu']?></p>
            <a class="button d-flex align-items-center justify-content-center" href="#repondre">Répondre<img src="images/bulle.svg" alt="pen" width="20px"></a>
        </div>
    </div>
    
    <?php include('include/sidebar.php') ?>

</div>