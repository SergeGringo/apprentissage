<?php
// la fontion readfile sert à lire les fichiers exple :
//  $fichier = readfile ('text.txt');
//  echo $fichier . '<br>';
// $file = 'texte.txt';
// // vérification si le fichier existe

// if (file_exists($file)) {

//     echo readfile($file) . '<br/>';

//     //copie de fichier

//     copy($file, 'read.txt') . '<br/>';
//     $newtxt = 'read.txt';

//     // voir le chemin absolu

//     echo realpath($file) . '<br/>';

//     // voir la taille du fichier

//     echo filesize($file) . '<br/>';

//     // renommer le fichier

//     rename($file, 'texte.txt');
//     echo readfile($newtxt) . '<br/>'; 
// } else {
//     echo "le fichier n'existe pas";
// }

// verification de fichier systeme

$file = 'texte.txt';

// ouverture du fichier pour lecture
// la fonction fopen permet d'ouvrir un fichier et mode 'r' pour lecture
// la fonction 'r+' permet de lire et d'écrire dans le fichier
// la fonction 'a' permet d'ouvrir le fichier en mode ajout
// la fonction 'a+' permet d'ouvrir le fichier en mode ajout et lecture
$lecteur = fopen($file, 'a+');

// pour la lecture du fichier on utilise la fonction fread
//fread prend en compte deux paramètres :
// le premier est le pointeur de fichier et le second est la taille du fichier

// echo fread($lecteur, filesize($file)) . '<br/>';
// echo fread($lecteur, 100). '<br/>';

// pour lire le fichier ligne par ligne on utilise la fonction fgets

// echo fgets($lecteur) . '<br/>';
// echo fgets($lecteur) . '<br/>';
// // pour lire un seul caractère on utilise la fonction fgetc
// echo fgetc($lecteur) . '<br/>';

// la fonction fwrite permet d'écrire dans le fichier
//  l'attribut php_EOL permet de sauter une ligne

// fwrite($lecteur, "\nSalut salut bonjour et bonsoir à tous" /* . PHP_EOL*/);
//  la fonction fclose permet de fermer le fichier
fclose($lecteur);
// la fonction unlick permet de supprimer le fichier exemple :
// unlink($file);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture de fichier</title>
</head>

<body>

</body>

</html>