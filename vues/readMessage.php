<?php

    // on verifie que l'on recupere un id de message 
    if(isset($_GET['idMessage'])){

        $idMessage = $_GET['idMessage'];
        echo $idMessage;

        // on recupere le message de l'id selectionné, son pseudo associé 
        $getMessageById = $bdd->prepare("SELECT `message`.*, `user`.`pseudo` 
        FROM `message` 
        INNER JOIN `user` ON `message`.`id_user` = `user`.`id`
        WHERE `message`.`id` = :id");
        $getMessageById->execute([
            'id' => $idMessage
        ]);
        
        $Message = $getMessageById->fetch();

    }

    include('include/nav.php');
?>

<div class="admin marge page d-flex">
    <div class="feed col-8 p-5">
        <h4>Message de <?=$Message['pseudo']?></h4>
        <p><?=$Message['message']?></p>

        <?php
            $reponseExist = $bdd->prepare("SELECT * FROM reponse WHERE id_message = :idMessage");
            $reponseExist->execute([
                'idMessage' => $Message['id']
            ]);
            $Reponse = $reponseExist->fetch();
            $nbReponse = $reponseExist->rowCount();

            if($nbReponse > 0) { ?>
                <div class="border border-1 p-3">
                    <p><b>Votre réponse : </b></p>
                    <p><?=$Reponse['reponse']?></p>
                </div>
            <?php } else { ?>
                <?php if(isset($_GET['message'])){?>
                    <p><?=$_GET['message']?></p>
                <?php } ?>
                <form action="?action=sendReponse&idMessage=<?=$Message['id']?>" method="POST">
                    <div class="form-group">
                        <label for="reponse">Répondre :  </label>
                        <textarea class="form-control" name="reponse" id="reponse" rows="3"></textarea>
                        <button type="submit" class="button mt-3">Répondre</button>
                    </div>
                </form>
            <?php } ?>
    </div>


    <?php include('include/sidebar.php') ?>

</div>
