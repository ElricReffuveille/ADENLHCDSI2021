<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <title>Création Article</title>
    <link href="assets/style/style.css" rel="stylesheet">
    <script src="assets/script/form.js" type="text/javascript"></script> 
</head>

<body>
    <header>
        <div></div>
        <h1 class="center">Création d'un article</h1>
        <a href="index.php" class="right">Retour</a>
    </header>
    <section>
    </section>
    <form method="post">
        <input type="text" name="title" placeholder="Titre de l'article" size="48">
        <textarea name="content" rows="16" cols="48" placeholder="Contenu de l'article"></textarea>
        <input type="submit" name="submit" value="Valider">
    </form>
</body>

<?php
//Post articles
if(isset($_POST['submit'])) {
    $title = $_POST["title"];
    $content = $_POST["content"];

    if ($title != "" && $content != "") {
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
        
        $sql = "INSERT INTO `Articles`(`title`, `content`) VALUES (:title,:content)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":title"=>$title,":content"=>$content));

        if($exec){
            echo 'Article créé';
        }else{
            echo "Échec";
        }
        $_POST["title"] = "";
        $_POST["content"] = "";
    } else {
        echo 'Veuillez remplir tous les champs';
    }
}
?>