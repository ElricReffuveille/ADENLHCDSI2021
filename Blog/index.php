<?php
    try {
        $dataBase = new PDO('mysql:host=localhost;dbname=cdsiBlog', "root", "");
    } catch (PDOException $e) {
        die("Error !: " . $e->getMessage());
    }

if (!empty($_POST)){
	$title = $_POST['title'];
	$content = $_POST['content'];

	$sql = "INSERT INTO article (title, content) VALUES (:title, :content)";
	$sth = $dataBase->prepare($sql);

	$sth->bindParam(':title', $title);
	$sth->bindParam(':content', $content);

	$sth->execute();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ty' Blog</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <header>
        <h1 id="title">Ty' Blog!</h1>
    </header>

    <main>
        <!-- Form to Add new article -->
        <section id="addArticle">
            <form method="post" action="">
                <input class="input-field" name="title" type="text" placeholder="Title" required size="20">
                <textarea class="input-field" name="content" placeholder="Content" required rows="3" cols="50"></textarea>
                <button type="submit">Send</button>
            </form>
        </section>

		<!-- List of articles saved in database -->
        <section id='list'>
            <?php

            try {
                $dataBase = new PDO('mysql:host=localhost;dbname=cdsiBlog', "root", "");
            } catch (PDOException $e) {
                die("Error !: " . $e->getMessage());
            }

            $req = $dataBase->query("SELECT title,content from article");

            while($articles = $req->fetch()){
                ?>
                <section class="articles">
                    <?php
                    echo '<h2>'.$articles['title'].'</h2>'.
                        '<p>'.$articles['content'].'</p>';
                    ?>
                </section>
            <?php
            }
            ?>
        </section>
    </main>

</body>
</html>
