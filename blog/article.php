<?php
    
    class article # Déclaration de la classe
    {
        public $bdd;
        public function __construct()
        {
            $this->bdd = new PDO("mysql:host=localhost; dbname=Mon_blog", "root", "");#connexion à la base de donnée
     
     
        } 

        public function nouvel_article($titre, $contenu) 
        {
            if (empty($titre) or empty($contenu)) # Si jamais il manque un argument, la fonction ne s'exécute pas
            { 
                echo "Il manque un argument";
                return;
            }
     
            $this->bdd->exec("INSERT INTO articles(titre, contenu) VALUES('$titre', '$contenu')");
            echo "L'article as bien été ajouté";

        }

        public function lire()
        {
            $articles = $this->bdd->query('SELECT * from articles');
            return $articles->fetchAll(\PDO::FETCH_ASSOC); 
        }

    }    

?>

<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="UTF-8" />
        <title>Tristan's blog</title>
        <link rel="stylesheet" href="./assets/css/css.css">
    </head>

    <body>
        <h1>Mon blog</h1>

        <form id="form" action="form.php" method="post">
            <p id="titre">Titre de l'article : <input type="text" name="titre" /></p>
            <p id="contenu">Contenu :&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <input type="text" name="contenu" /></p>
            <p><input id="bouton" type="submit" value="Ajouter un l'article"></p>
        </form>


        <form action="form2.php" method="post">
            <p><input id="bouton" type="submit" value="Lire les articles"></p>
        </form>


    </body>

</html>