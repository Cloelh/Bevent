<?php

    $getTypes = $bdd->prepare("SELECT * FROM `category`");
    $getTypes->execute();
    $allTypes = [];
    while ($c = $getTypes->fetch()){
        array_push($allTypes, $c['name']);
    }
?>