<?php
class article # Déclaration de la classe
{
    public $bdd;
    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', 'root', ''); #connexion à la base de donnée
 
 
    }

	public function nouvel_article($titre, $contenu) {
		if (empty($titre) or empty($contenu)) { # Si jamais il manque un argument, la fonction ne s'exécute pas
           echo "il manque un argument";
           return;
       }
 
       $this->bdd->exec("INSERT INTO article(titre, contenu) VALUES('$titre', '$contenu')");
         
    }
	
	public function lire()
    {
        $articles = $this->bdd->query('SELECT * from article'); #recuperation
        return $articles->fetchAll(\PDO::FETCH_ASSOC); 
    }

}

?>








  <p>Bienvenue, vous êtes connecté</p>
    <p>Vous pouvez créer un nouvel article en remplissant le formulaire ci-dessous</p>
    <?php
    if (isset($_POST['titre']) and isset($_POST['contenu'])) {
        $art = new article();
        $art->nouvel_article($_POST['titre'], $_POST['contenu']);
        echo "l'article as bien été ajouté";
    }
    ?>
	
	<form method="post" action="article.php">
        <input type="text" placeholder="titre" name="titre" />
        <textarea placeholder="contenu" name="contenu"></textarea>
        <input type="submit" />
    </form>
