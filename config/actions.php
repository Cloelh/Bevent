<?php
// Voici la liste des actions possibles avec la page à charger associée

$listeDesActions = array(
    //vues
    "" => "vues/home.php",
    "home" => "vues/home.php",
    "connexion" => "vues/connexion.php",
    "mySujet" => "vues/mySujet.php",
    "admin" => "vues/admin.php",
    "createPost" => "vues/createPost.php",
    "pageSujet" => "vues/pageSujet.php",
    "pageCategorie" => "vues/pageCategorie.php",
    "search" => "vues/search.php",

    //traitement
    "register" => "traitement/register.php",
    "login" => "traitement/login.php",
    "logout" => "traitement/logout.php",
    "newPost" => "traitement/newPost.php",    
    "newCommentaire" => "traitement/newCommentaire.php",   
    "deleteCom" => "traitement/deleteCom.php",
    "deleteSujet" => "traitement/deleteSujet.php",
    "deleteCat" => "traitement/deleteCat.php",
    "addCat" => "traitement/addCat.php",
    "deleteUser" => "traitement/deleteUser.php",
    "postResolue" => "traitement/postResolue.php",
    "changeAvatar" => "traitement/changeAvatar.php",
)

?>