<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>Blog de Florian</title>
    <link href="assets/style/style.css" rel="stylesheet">
    <script src="assets/script/index.js" type="text/javascript" defer></script> 
</head>

<?php
//Get articles
$server = "localhost";
$db = "blog";
$user = "root";
$password = "";

try
{
    $bdd = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $password);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, title, content FROM Articles ORDER BY title ASC');
?>

<body>
    <header>
        <h1 class="center">Blog de Florian</h1>
        <a href="form.php" class="right">Ecrire un article</a>
    </header>
    <main>
        <section id='list'>
            <?php
                while($articles = $req->fetch()) {?>
                <article class="not_current">
                <?php
                    echo '<h3>'.$articles['title'].'</h3>'.
                    '<p>'.$articles['content'].'</p>';
                ?>
                <button>Retour</Button>
                </article>
                <?php } ?>
        </section>
    </main>
</body>
