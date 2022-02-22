<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <title>Ma Page</title>
</head>

<body>
    <h1>Mon blog</h1>

    <form method = "post">
        <label> Titre : </label>
        <input type = "text" name = "titre" size = "10">

        <label> Contenu : </label>
        <textarea name = "contenu" rows = "5" cols = "33"></textarea>

        <button type = "submit" name = "submit" value = "requete"> Envoyer à la BDD </button>
    </form>


    <?php
        // On vérifie si le bouton est cliqué et le formulaire envoyé en POST
        if(isset($_POST['submit'])) 
        {
            // On met les valeurs du formulaire dans des variables
            $titre = $_POST["titre"];
            $contenu = $_POST["contenu"];

            // On vérifie que les champs du formulaire ne sont pas vides
            if ($titre != "" && $contenu != "") 
            {
                // Chaine de connexion
                $bdd = new PDO('mysql:host=localhost;dbname=exo_web_21_02_22', 'root', '');

                // Requete SQL
                $sql = "INSERT INTO `articles`(`titre`, `contenu`) VALUES (:titre,:contenu)";
                $res = $bdd->prepare($sql);
                $exec = $res->execute(array(":titre"=>$titre,":contenu"=>$contenu));

                // On ferme la connexion à la BDD 
                $bdd = null;
                $sql = null;
            } 
            else 
            {
                echo 'Veuillez remplir tous les champs';
            }
        }
    ?>

</body>

</html>