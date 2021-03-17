<?php

    if(isset($_POST['search']) AND !empty($_POST['search'])){
        $search = $_POST['search'];

        $getSujet = $bdd->prepare("SELECT * FROM `sujet` WHERE `titre`=:search OR `contenu`:search");
        $getSujet->execute([
            'search' => $search
        ]);


    } else {
        // header("Location: index.php?action=home");
        
    }

?>

<div class="marge page search p-3">
    <h1>search</h1>
    <?php
        echo "recherche = ";
        echo $_POST['search'];
        var_dump($_POST['search']);
        echo "</br>SERVER  = <pre >";
        var_dump($_SERVER);
        echo "</pre >";

    ?>
</div>