<?php
include 'database_connect.php';
// écriture de la requête de toute les pizzas
$sql = 'SELECT nom_pizza, ingredients, id FROM pizzas ORDER BY created_at  ';

// execution de la requête et obtention du résultat
$result = mysqli_query($connexion, $sql);

//recupération des resultats grace à fetch qui recupère une ligne de la table pizza et fetch_all qui recupère toutes les lignes de la table pizza
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//resultat libre de la memoire
mysqli_free_result($result);

//fermer la connexion
mysqli_close($connexion);

// print_r($pizzas);
?>
<?php include 'header.php'; ?>

<main>
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero-copy">
            <p class="eyebrow"><span aria-hidden="true">✦</span> Le rendez-vous des gourmands</p>
            <h1 id="hero-title">La pizza qui rassemble.</h1>
            <p>Découvrez les recettes de la communauté et trouvez votre prochaine pizza préférée.</p>
            <div class="hero-actions">
                <a href="#recettes" class="btn btn-primary">Explorer les recettes <span aria-hidden="true">↓</span></a>
                <span class="hero-note">Des idées simples, à partager sans modération.</span>
            </div>
        </div>
        <div class="hero-art">
            <img src="images/Cartoon-style-pizza-580x386.jpg" alt="Illustration colorée d’une pizza garnie">
            <span class="hero-sticker"><strong>100%</strong><span>fait maison</span></span>
        </div>
    </section>

    <section id="recettes" aria-labelledby="recipes-title">
        <div class="recipes-heading">
            <div>
                <p class="eyebrow">À table !</p>
                <h2 class="titled_pizza" id="recipes-title">Nos pizzas</h2>
                <p class="pizza-subtitle">Des recettes à partager, préparées avec passion.</p>
            </div>
            <?php if (!empty($pizzas)) : ?>
                <span class="recipe-total"><?php echo count($pizzas); ?> recette<?php echo count($pizzas) > 1 ? 's' : ''; ?></span>
            <?php endif; ?>
        </div>
        <div class="container_pizza">
        <div class="row conteneur_all">
        <?php foreach ($pizzas as $pizza) { ?>
            <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                <div class="card_pizza">
                    <div class="img_position">
                        <img src="images/pizza.svg" alt="" class="img_pizza" loading="lazy">
                    </div>
                    <div class="card_content">
                        <h2><?php echo htmlspecialchars($pizza['nom_pizza'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <ul class="list_ing">
                            <?php foreach (explode(',', $pizza['ingredients']) as $ingredient) { ?>
                                <li><?php echo htmlspecialchars(trim($ingredient), ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="trait"></div>
                    <div class="card_bottom">
                        <a href="pizza_detail.php?id=<?php echo (int) $pizza['id']; ?>" class="infos">Découvrir la recette <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (empty($pizzas)) : ?>
            <div class="empty-state">
                <h2>La première pizza n’attend que vous !</h2>
                <p>Ajoutez une recette pour lancer la collection.</p>
                <a href="ajouteur.php" class="btn btn-primary">Ajouter une pizza</a>
            </div>
        <?php endif; ?>
        </div>
    </div>
    </section>
</main>

<?php include 'footer.php'; ?>