<?php

    $getTags = $bdd->prepare("SELECT * FROM `tag`");
    $getTags->execute();
    $allTags = [];
    while ($t = $getTags->fetch()){
        array_push($allTags, $t['name']);
    }
?>