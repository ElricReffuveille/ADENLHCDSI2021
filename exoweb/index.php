<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Mon blog</title>
</head>

<body>
    <h1>Tous les problèmes de ma formation</h1>
</body>
</html> 

<?php
    try
    {
        // On se connecte à MySQL
        $connex = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', "root", "", array(
            PDO::ATTR_PERSISTENT => true
        ));
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    
    $jpp = $connex->prepare("SELECT * FROM BLOG");
    $jpp->execute();
    $view = $jpp->fetchAll();

    // On affiche chaque titre et son contnu une à une
    foreach ($view as $test) {
    ?>
        <h2><?php echo $test['titre']; ?></h2>
        <p><?php echo $test['contenu']; ?></p>
    <?php
    }
?>


