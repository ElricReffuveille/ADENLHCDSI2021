    
    <?php
    
       require 'article.php';
       
       $titre = $_POST['titre'];
       $contenu =  $_POST['contenu'];

       $art = new article();
       $art->nouvel_article($titre, $contenu);

    ?>
