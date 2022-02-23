<?php
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

$i=7;
try {
    $dbh = new PDO('mysql:host=localhost;dbname=exo_dev_web', "root", "");
    foreach($dbh->query('SELECT * from data') as $row) {
        $articles[$i]["titre"]   = $row[1];
        $articles[$i]["contenu"] = $row[2];
        $i++;
    }
    //echo "<br>data : ".json_encode($articles)."<br>";    
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
        <link href="style/style.css" rel="stylesheet">
        <title>Ma Page</title>
    </head>

    <body>
        <div class="container">
            <!-- affiche les articles -->
            <div class="row justify-content-md-center">
                <div class="col-sm-offset-2 col-sm-8 bg-light border border-light p-3 rounded">
                    <div id="scroll">
                        <h1>Mon blog</h1>
                        <table class="table">
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($articles); $i++) {
                                    echo
                                    "<tr>" .
                                        "<td class='titre   pl-3 ml-3'>".$articles[$i]["titre"]."</h2>" .
                                        "<td class='contenu pl-3 ml-3'>".$articles[$i]["contenu"]."</p>" .
                                    "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
            <!-- affiche le form -->                
            <br>
            <div class="row justify-content-md-center">
                <div class="col-sm-offset-3 col-sm-8">
                    <form action="" method="post" class="bg-light border border-dark p-2 rounded">
                        <fieldset>
                            <legend>Ajouter un article</legend>
                            <div class="form-group">
                                <label for="titre"    class="col-form-label">Titre de l'article</label>
                                <input type="text"    class="form-control" name="titre"  id="titre"    placeholder="Titre de l'article"                 required>
                            </div>
                            <div class="form-group">
                                <label for="contenu"  class="col-form-label">Contenu de l'article</label>
                                <textarea             class="form-control" name="contenu" id="contenu" placeholder="Rédigez votre article ici" rows="8" required></textarea>
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-outline-dark bouton" name="submit" onClick="history.go(0)"><i class="bi bi-clipboard-plus"></i></button>
                            </div>
                        </fieldset>
                    </form>

                    <?php                    
                        if(isset($_REQUEST['submit'])){
                            try {
                                $dbh = new PDO('mysql:host=localhost;dbname=exo_dev_web', "root", "");
                            } catch (Exception $e) {
                                die('Erreur : ' . $e->getMessage());
                            }
                            
                            $titre   = $_POST["titre"];
                            $contenu = $_POST["contenu"];

                            $sqlQuery     = "INSERT INTO data(titre,  contenu) VALUES (:titre, :contenu)";
                            $insertRecipe = $dbh->prepare($sqlQuery);
                                                        
                            $insertRecipe->execute([
                                'titre'   => $titre,
                                'contenu' => $contenu
                            ]);
                        }
                    ?>
                </div>
            </div>
		</div>
	</body>
</html>
