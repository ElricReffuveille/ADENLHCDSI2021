<?php

use function blog\connexion;

require_once("connexion.php");

if(isset($_POST["nom"]) && isset($_POST["text"]))
{
    $nom = $_POST["nom"];
    $text = $_POST["text"];

    $data =  [
        "nom" => $nom,
        "text" => $text
    ];

    $bdd = connexion();
    $sql = 'INSERT INTO articles (nom,text) VALUES (:nom, :text);';
    $bdd->prepare($sql)->execute($data);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/form.css">
    <title>Nouvel article</title>
</head>
<body>
    <form action="#" method="post">
        <label for="nom">Le nom de l'article</label>
        <input type="text" name="nom" id="nom" placeholder="ex: Je suis un super Article ">
        <label for="text">Le Contenu</label>
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        <input type="submit" value="Enregistrer">
        <a href="/">Revenir à la liste</a>
    </form>
</body>
</html>