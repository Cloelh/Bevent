<?php
    include('traitement/allTypes.php');
    include('traitement/allStyles.php');
?>


<div class="home">
    <?php include('include/nav.php')?>

    <div class="header h100">
        <div class="banner hp100">
            <div class="filter hp100 padding">
                <div class="title padding-top">
                    <h1>soit prêt</h1>
                    <p>à entrer dans l'évenement</p>
                </div>
                <div class="search">
                    <h4>Rechercher un évenement</h4>
                    <form action="" class="d-flex row justify-content-between">
                        <div class="element">
                            <input type="date" placeholder="Quand ?">
                        </div>
                        <div class="element">
                            <input type="text" placeholder="Ville">
                        </div>
                        <div class="element">
                            <select id="types">
                                <option value="none">Types d'évenement</option>
                                <?php foreach ($allTypes as $t) { ?>
                                    <option value="<?=$t?>"><?=$t?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="element">
                            <select id="styles">
                                <option value="none">Style</option>
                                <?php foreach ($allTags as $t) { ?>
                                    <option value="<?=$t?>"><?=$t?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="element">
                            <input type="number" placeholder="Prix maximum" min=0>
                        </div>
                        <div class="button">
                            <button type="submit">
                                Rechercher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="presentation padding padding-top padding-bottom d-flex">
        <div class="text w50 d-flex flex-column align-items-start justify-content-center">
            <h3>Titre</h3>
            <h5>Sous titre sous titre sous titre</h5>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                sed diam nonumy eirmod tempor invidunt ut labore et dolore 
                magna aliquyam erat, sed diam voluptua. At vero eos et accusa
                m et justo duo dolores et ea rebum. Stet clita kasd guberg
                ren, no sea takimata sanctus est Lorem ipsum dolor sit ame
                t. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                sed diam nonumy eirmod tempor invidunt ut labore et dolore mag
                na aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo </p>
        </div>
        <div class="img w50 d-flex align-items-center justify-content-center">
            <img src="./source/image/presentation.svg" width="400px" alt="logo be event">
        </div>
    <div>
        
    </div>
    <?php include('include/event.php')?>

    <div class="comfort">
    
    </div>

    <?php include('include/contact.php')?>
    <?php include('include/footer.php')?>
</div>
