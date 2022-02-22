
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Mon calvaire</title>
</head>

<body>
    <h1>Mon Windows</h1>
</body>

</html>
<?php
    try
    {
        // On se connecte à MySQL
        $conn = new PDO('mysql:host=localhost;dbname=ordinateur;charset=utf8', "root", "", array(
            PDO::ATTR_PERSISTENT => true
        ));
    }
    catch(Exception $e)
    {
        // En cas de problème on arrete le programme
            die('Erreur : '.$e->getMessage());
    }

    $nom_blog = $conn->prepare("INSERT INTO windows1 (titre_blog1, contenu_blog1) VALUES (titre_blog1, :contenu_blog1)");
    $clear = $conn->prepare("UPDATE windows1 SET contenu_blog1 = 'j ai passer une mauvaise journer'");
    $clear->execute();

    // On entre chaque informations dans les bonnes colonnes 
     
        $nom_blog->bindParam(':titre_blog1', $titre_blog1);
        $nom_blog->bindParam(':contenu_blog1', $contenu_blog1);
        $nom_blog = ["contenu_blog1"];
        $contenu_blog1 = ["conntenu_blog"];
        $nom_blog->execute();
    

?>
