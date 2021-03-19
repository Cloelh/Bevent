<!-- 
    Fonctionnalité ajouter une catégorie
 -->

<?php

    if(
        isset($_POST['addCat']) AND !empty($_POST['addCat']) AND
        isset($_POST['description']) AND !empty($_POST['description'])){
            
            $categorie = $_POST['addCat'];
            $def = $_POST['description'];

            $addCat = $bdd->prepare('INSERT INTO `cat`(`categorie`, `def`) VALUES(:categorie, :def)');
            $addCat->execute([
                'categorie' => $categorie,
                'def' => $def
            ]); 

            header("Location: index.php?action=admin");
    } else {
        $message = "renseigner le nom de la catégorie et sa description pour en ajouter une";
        header("Location: index.php?action=admin&messageAddCat=".$message);
    }

?>