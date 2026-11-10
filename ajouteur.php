<?php
include 'database_connect.php';
$mail = $nomPizza = $ingredients = '';
$errors = array('email' => '', 'nomPizza' => '', 'ingredients' => '');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = trim($_POST['mail'] ?? '');
    $nomPizza = trim($_POST['nomPizza'] ?? '');
    $ingredients = trim($_POST['ingredients'] ?? '');

    if ($mail === '') {
        $errors['email'] = 'Veuillez saisir votre adresse e-mail.';
    } else {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Cette adresse e-mail n’est pas valide.';
        }
    }
    if ($nomPizza === '') {
        $errors['nomPizza'] = 'Veuillez saisir le nom de la pizza.';
    } else {
        if (!preg_match('/^[\p{L}][\p{L}\s\'-]*$/u', $nomPizza)) {
            $errors['nomPizza'] = 'Utilisez des lettres, espaces, apostrophes ou traits d’union.';
        }
    }
    if ($ingredients === '') {
        $errors['ingredients'] = 'Veuillez saisir les ingrédients.';
    } else {
        if (!preg_match('/^\s*[\p{L}][\p{L}\s\'-]*(?:\s*,\s*[\p{L}][\p{L}\s\'-]*)*\s*$/u', $ingredients)) {
            $errors['ingredients'] = 'Séparez les ingrédients par des virgules.';
        }
    }

    if (!array_filter($errors)) {
        $statement = mysqli_prepare($connexion, 'INSERT INTO pizzas (nom_pizza, ingredients, email) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($statement, 'sss', $nomPizza, $ingredients, $mail);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
        mysqli_close($connexion);
        header('Location: index.php');
        exit;
    }
}
?>
<?php
require_once 'header.php';
?>
<main>
    <div class="ajout_pizza text-center">
        <h1>Partagez votre recette</h1>
        <p class="form-intro">Quelques détails suffisent pour la faire découvrir à tout le monde.</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" method="POST" class="formulaire">
        <label for="mail" id="emailLabel">Votre adresse email</label>
        <input type="email" name="mail" id="mail" autocomplete="email" value="<?php echo htmlspecialchars($mail, ENT_QUOTES, 'UTF-8'); ?>" onfocus="changeLabelColor('emailLabel')" onblur="resetLabelColor('emailLabel')">
        <p class="error"><?php echo $errors['email']; ?></p>
        <label for="nomPizza" id="pizzaLabel">Nom de la pizza</label>
        <input type="text" name="nomPizza" id="nomPizza" autocomplete="off" value="<?php echo htmlspecialchars($nomPizza, ENT_QUOTES, 'UTF-8'); ?>" onfocus="changeLabelColor('pizzaLabel')" onblur="resetLabelColor('pizzaLabel')">
        <p class="error"><?php echo $errors['nomPizza']; ?></p>
        <label for="ingredients" id="ingredientsLabel">Ingrédients (séparés par une virgule)</label>
        <input type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients, ENT_QUOTES, 'UTF-8'); ?>" onfocus="changeLabelColor('ingredientsLabel')" onblur="resetLabelColor('ingredientsLabel')">
        <p class="error"><?php echo $errors['ingredients']; ?></p>
        <input type="submit" name="submit" value="Ajouter la recette" class="btn btn-primary">
    </form>
</main>


<?php
require_once 'footer.php';
?>