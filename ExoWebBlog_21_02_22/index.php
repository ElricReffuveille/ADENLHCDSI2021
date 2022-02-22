<?php
?>


<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Ma Page</title>
</head>

<body>
    <h1>Mon blog</h1>

    <?php
        // Chaine de connexion
        $bdd = new PDO('mysql:host=localhost;dbname=exo_web_21_02_22', 'root', '');

        // Requete SQL
        $sql = "SELECT * FROM articles";

        // Affichage des données de la requete
        foreach($bdd->query($sql) as $row)
        {
            echo
            "<section>" .
                "<h2>" . 'Titre: ' . $row['titre'] . "</h2>" .
                "<p>" . 'Contenu: ' . $row['contenu'] . "</p>" .
            "</section>";
        }

        // On ferme la connexion à la BDD 
        $bdd = null;
        $sql = null;
    ?>

</body>

</html>