<?php
require_once('admin/connect.php');

//on affiche seulement les articles qui sont en statut publiés
$requete = "SELECT * FROM articles WHERE statut_article = 'publié' ORDER BY article_id DESC";
$requete = $db->prepare($requete);
$requete->execute();
$articles = $requete->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Home</title>
</head>
<body>
    <?php
        //insertion du header
        include_once('components/header.php');
    ?>
    <main>
        
        <section class="listeArticles">
            <?php foreach($articles as $article): ?>
                <!-- lorsque l'utilisateur clique sur l'article, l'utilisateur est redirigé vers la page detailarticle.php avec l'id de l'article cliqué dans l'url -->
                <a href="detailarticle.php?id=<?php echo $article->article_id ?>">
                    <article>
                        <h3><?php echo $article->titre_article; ?></h3>
                        <p><?php echo $article->date_article; ?></p>
                        <img src="<?php echo $article->image_article; ?>" alt="image article">
                        <p><?php echo $article->contenu_article; ?></p>
                        <a href="categorie.php?cat=<?php echo $article->categorie_article; ?>"><?php echo $article->categorie_article; ?></a>
                    </article>
                </a>
            <?php endforeach; ?>
        </section>
    </main>
    <?php
        //insertion du footer
        include_once('components/footer.php');
    ?>
</body>
</html>