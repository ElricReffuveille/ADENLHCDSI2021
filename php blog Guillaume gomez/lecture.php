<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Ma Page</title>
</head>

<body>
    <h1>Mon blog</h1>
	
<?php
require 'article.php';
 
$art = new article();
$articles = $art->lire();
 
for ($i = 0; $i < sizeof($articles); $i++) {
    $article = $articles[$i];
    ?>
    <h1>Article : <?php echo $article['titre']?></h1>
    <p> <?php echo $article['contenu'] ?></p>
    <?php
}
?>
</body>

</html>
