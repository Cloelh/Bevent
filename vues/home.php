<?php
    $getCat = $bdd->prepare('SELECT * FROM cat');
    $getCat->execute();

    // $getPost = $bdd->prepare('SELECT * FROM post ORDER BY id DESC');
    // $getPost->execute();

    // $nbPost = $reqPost->rowCount();
?>


<div class="home marge d-flex">
    <div class="feed col-8 border border-2 p-5">
        <a class="button d-flex align-items-center justify-content-center" href="index.php?action=createPost">Poser votre question<img src="images/pen.svg" alt="pen" width="20px"></a>
    </div>

    <?php include('include/sidebar.php') ?>
</div>