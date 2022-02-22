<?php

// Remplissage tableau
$articles = array(
    array(
        "titre" => 'Premier article',
        "contenu" => '1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
    array(
        "titre" => 'Deuxième article',
        "contenu" => '2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
    array(
        "titre" => 'Troisième article',
        "contenu" => '3. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
    array(
        "titre" => 'Quatrième article',
        "contenu" => '4. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
    array(
        "titre" => 'Cinquième article',
        "contenu" => '5. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
    array(
        "titre" => 'Sixième article',
        "contenu" => '6. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
    array(
        "titre" => 'Septième article',
        "contenu" => '7. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur id vitae labore, praesentium harum quaerat necessitatibus molestias non numquam, assumenda nostrum dolores veniam ad dolore autem, totam tempora? Earum, quibusdam!'
    ),
);

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Blog</title>
</head>

<body>
    <h1>Blog</h1>
	
	

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

// Connexion à la base test
{
$mysqlConnection = new PDO(
	'mysql:host=localhost;dbname=test;charset=utf8',
	"root",
	""
	);
}
// Arrêt et message d'erreur si problème
catch (Exception $e)
{
			die('Erreur : ' . $e->getMessage());
}

$valeur = $mysqlConnection->prepare("DELETE FROM blog");
$valeur->execute();
	
$bdd = $mysqlConnection->prepare("INSERT INTO blog (titre, contenu) VALUES (:titre, :contenu)");
	for ($i = 0; $i < count((array)$articles); $i++) {
		$bdd->bindParam(':titre', $titre);
		$bdd->bindParam(':contenu', $contenu);
		$titre = $articles[$i]["titre"];
		$contenu = $articles[$i]["contenu"];
		$bdd->execute();
	}
?>
</html>