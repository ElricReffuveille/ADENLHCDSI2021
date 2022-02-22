<?php

use function blog\connexion;

require_once("connexion.php");

//Vous pouvez préciser l'hôte de votre BDD dans la fonction
$bdd = connexion();
$articles = $bdd->query("SELECT * FROM articles;");
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($articles->fetchAll(PDO::FETCH_ASSOC) as $article)
        {
            echo $article["nom"] ."\n";
            echo $article["text"] ."\n";
            echo $article["created_at"] ."\n";
            echo "<br/>";
        }
    ?>
    <p> <a href="new.php">Ajouter un nouvelle Article</a></p>
</body>
</html>