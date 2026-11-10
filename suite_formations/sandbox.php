<?php 
//opérateur ternaires
$score = 50;

//echo $_SERVER['SERVER_NAME'] . "<br>"; // nom du serveur
//echo $_SERVER['SERVER_PORT'] . "<br>"; // port du serveur
//echo $_SERVER['REQUEST_METHOD'] . "<br>"; // méthode de la requête
//echo $_SERVER['SCRIPT_FILENAME'] . "<br>"; // nom du fichier
//echo $_SERVER['PHP_SELF'] . "<br>"; // renvoir le nom du fichier actuel

if (isset($_POST['submit'])) {

    //cookies pour le genre

    setcookie('genre', htmlspecialchars($_POST['genre']), time() + 86400, '/'); // expire dans 1 jour
    // on peut aussi utiliser setcookie('genre', htmlspecialchars($_POST['genre']), time() + 86400, '/'); pour définir le cookie

    session_start();
    $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
    header('location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>php sandbox tutorial</title>
</head>

<body>
    <h1>suite de la formation</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="nom" id="nom" placeholder="votre nom">
        <select name="genre">
            <option value="" disabled selected>Choisir votre genre</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select>
        <input type="submit" name="submit" id="submit">
    </form>

</body>

</html>