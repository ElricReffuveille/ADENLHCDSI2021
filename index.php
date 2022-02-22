<?php

$articles = array(
    array(
        "titre_blog1" => 'Windows casser',
        "contenu_blog1" => '1.Lors du cours poste Windows et linux j ai casser le système d exploitation !'
    ),
    array(
        "titre_blog1" => 'Ruffus',
        "contenu_blog1" => '2.Jai utiliser Ruffus pour faire une cle bootable pour installer l iso de Windows10!'
    ),
    array(
        "titre_blog1" => 'installation Windows10',
        "contenu_blog1" => '3. J ai perdu toute ma journee pour faire toute ces installations!')
);

?>


<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Mon calvaire</title>
</head>

<body>
    <h1>Mon Windows</h1>

    <?php
    for ($i = 0; $i < count($articles); $i++) {
        echo
        "<section>" .
            "<h2>" . $articles[$i]["titre_blog1"] . "</h2>" .
            "<p>" . $articles[$i]["contenu_blog1"] . "</p>" .
            "</section>";
    }
    ?>

</body>

</html>

<?php
    try
    {
        // On s identifie à la bdd
        $connex = new PDO('mysql:host=localhost;dbname=ordinateur;charset=utf8', "root", "", array(
            PDO::ATTR_PERSISTENT => true
        ));
    }
    catch(Exception $e)
    {
        // Le programme s'arrete en cas d erreur
            die('Erreur : '.$e->getMessage());
    }

    $jpp = $connex->prepare("SELECT * FROM windows1");
    $jpp->execute();
    $view = $jpp->fetchAll();

    // On affiche chaque titre et le contenu du blog
    foreach ($view as $test) {
    ?>
        <h2><?php echo $test['titre_blog1']; ?></h2>
        <p><?php echo $test['contenu_blog1']; ?></p>
    <?php
    }
?>
