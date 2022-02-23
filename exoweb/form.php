<?php

$articles = array(
    array(
        "titre" => 'Administration',
        "contenu" => 'Je ne recoit toujours pas la moindre aide pour mon handicap asperger pour être accompagné au moment compliqué, mais cela est une petite partie de tout le bordel.'
    ),
    array(
        "titre" => 'Machine Virtuelle',
        "contenu" => 'Les machines virtuelles sont une horreur: je met iso unbuntu avec iso debian, sauf que je fusionne les deux avec le disque dur, resultat tout perdu. Et elles foirent mes ports...'
    ),
    array(
        "titre" => 'Rapport de stage',
        "contenu" => 'Trop de pages pour moi, il y a 3 rapport en plus, je vais pas aimer faire chaque soutenance avec le stress.'
    )
);

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Mon blog (modif)</title>
</head>

<body>
    <h1>Tous les problèmes de ma formation</h1>

    <?php
    for ($i = 0; $i < count($articles); $i++) {
        echo
        "<section>" .
            "<h2>" . $articles[$i]["titre"] . "</h2>" .
            "<p>" . $articles[$i]["contenu"] . "</p>" .
            "</section>";
    }
    ?>

</body>

<?php
    try
    {
        // On se connecte à MySQL
        $conn = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', "root", "", array(
            PDO::ATTR_PERSISTENT => true
        ));
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }
    
    $stmt = $conn->prepare("INSERT INTO BLOG (titre, contenu) VALUES (:titre, :contenu)");
    $clear = $conn->prepare("DELETE FROM BLOG");
    $clear->execute();

    // On entre chaque titre et son contnu dans les collones de la table 'blog' de la BDD 'blog'
    for ($i = 0; $i < count($articles); $i++) {   
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $titre = $articles[$i]["titre"];
        $contenu = $articles[$i]["contenu"];
        $stmt->execute();
    }

?>
</html>