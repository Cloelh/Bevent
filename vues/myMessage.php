<?php

    $getMessage = $bdd->prepare("SELECT * FROM `message` WHERE `id_user` = :idUser ORDER BY id DESC");
    $getMessage->execute([
        'idUser' => $_SESSION['id']
    ]);
    $nbMessage = $getMessage->rowCount();
    include('include/nav.php');

?>

<div class="page myMessage marge d-flex">
    <div class="feed col-8 p-5">
        <h2 class="mb-4">Mes messages envoyé à l'Admin</h2>
        <div class="mt-5">
            <div class="resultatNb"><?=$nbMessage?> message(s) envoyé(s)</div>
                <?php while($m = $getMessage->fetch()){ ?>
                    <div class="post mb-5 border-violet p-3">
                        <p class="border-bottom border-1"><?=$m['message']?></p> 
                        <?php
                            $getReponse = $bdd->prepare('SELECT * FROM `reponse` WHERE `id_message` = :idMessage');
                            $getReponse->execute([
                                'idMessage' => $m['id']
                            ]);
                            $Reponse = $getReponse->fetch();
                            $nbReponse = $getMessage->rowCount();
                            if($nbReponse = 0){ ?>
                                <p>Vous n'avez pas encore de réponse de l'administrateur, revenez plus tard :)</p>
                            <?php } else { ?>
                                <p><b>Voici là réponse de l'administrateur : </b></p>
                                <p><?=$Reponse['reponse']?></p>
                            <?php }
                        ?>                        
                    </div>
                <?php } ?>
            </div>
        </div> 

    <?php include('include/sidebar.php'); ?>

</div>