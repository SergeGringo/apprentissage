<?php
// classes

class User
{
    private $name;
    private $mail;
    public function __construct($name, $mail)
    {
        $this->name = $name;
        $this->mail = $mail;
    }
    public function login()
    {
        // echo "l'utilisateur est connecté"  . '<br/>';
        echo $this->name  . ' est connecté' . '<br/>';
        //   $this->mail = $mail;

    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        if (is_string($name) && strlen($name) > 1) {
            $this->name = $name;
            return "le nom à été mis à jour à $name" . '<br/>';
        } else {
            return "ce n'est pas un nom valide" . '<br/>';
        }
    }
}
// $utilisateur_one = new User() ;
// $utilisateur_one->login()  . '<br/>'; 

// echo $utilisateur_one->name . '<br/>';
// echo $utilisateur_one->mail  . '<br/>';

$utilisateur_two = new User('serge', 'serge@l225.com');
// echo $utilisateur_two->getName() . '<br/>';
echo $utilisateur_two->setName('gringo oliver');
// echo $utilisateur_two->getName() . '<br/>';
// echo $utilisateur_two->setName(50);
// echo $utilisateur_two->name . '<br/>';
// echo $utilisateur_two->mail . '<br/>';
// $utilisateur_two->login() . '<br/>';
?>

<?php
// Exemple de classe en PHP



//  class Objet {
//     public $nom;
//     public $prix;

//     // constructeur
//     public function __construct($nom, $prix) {
//         $this->nom = $nom;
//         $this->prix = $prix;
//     }

//     // méthode pour afficher les détails de l'objet
//     public function afficherDetails() {
//         echo "Nom: " . $this->nom . ", Prix: " . $this->prix . "<br>";
//     }
//   }

//   // instanciation de la classe Objet
//   $objet1 = new Objet("Livre", 20);
//   $objet2 = new Objet("Stylo", 2);

//   // affichage des détails des objets
//   $objet1->afficherDetails();
//   $objet2->afficherDetails();


?>