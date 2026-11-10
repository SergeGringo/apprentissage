<?php
include 'database_connect.php';

$pizza = null;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $idToDelete = filter_input(INPUT_POST, 'id_a_effacer', FILTER_VALIDATE_INT);
    if ($idToDelete) {
        $statement = mysqli_prepare($connexion, 'DELETE FROM pizzas WHERE id = ?');
        mysqli_stmt_bind_param($statement, 'i', $idToDelete);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
        mysqli_close($connexion);
        header('Location: index.php');
        exit;
    }
}

if ($id) {
    $statement = mysqli_prepare($connexion, 'SELECT nom_pizza, ingredients, email, created_at, id FROM pizzas WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'i', $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $pizza = mysqli_fetch_assoc($result) ?: null;
    mysqli_free_result($result);
    mysqli_stmt_close($statement);
}

mysqli_close($connexion);
?>

<?php include 'header.php'; ?>
<main class="container_pizza">
    <section class="detail-card">
        <p class="eyebrow">Une recette de la communauté</p>
        <h1>Détail de la pizza</h1>
    <?php if ($pizza) : ?>
        <h2><?php echo htmlspecialchars($pizza['nom_pizza'], ENT_QUOTES, 'UTF-8'); ?></h2>
        <p>Créée par : <strong><?php echo htmlspecialchars($pizza['email'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <p>Ingrédients : <strong><?php echo htmlspecialchars($pizza['ingredients'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
        <p>Ajoutée le : <strong><?php echo date('d/m/Y à H:i', strtotime($pizza['created_at'])); ?></strong></p>
        <div class="detail-actions">
            <a href="index.php" class="btn btn-outline-secondary">Retour aux pizzas</a>
            <form action="pizza_detail.php?id=<?php echo (int) $pizza['id']; ?>" method="POST" onsubmit="return confirm('Supprimer définitivement cette pizza ?');">
                <input type="hidden" name="id_a_effacer" value="<?php echo (int) $pizza['id']; ?>">
                <button type="submit" name="supprimer" class="btn btn-danger">Supprimer la pizza</button>
            </form>
        </div>
    <?php else : ?>
        <h2>Cette pizza n’existe pas.</h2>
        <p>Elle a peut-être été supprimée ou le lien est incorrect.</p>
        <a href="index.php" class="btn btn-primary">Retour aux pizzas</a>
    <?php endif ?>
</section>
</main>

<?php include 'footer.php'; ?>