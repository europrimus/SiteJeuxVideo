<?php
// charge la configuration et renvoi un objet PDO $db
require('../include/config.php');

$page = new Page("Ajout d'un DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
/*
"id","nom","description","editeur","editeurId","plateforme","plateformeId","jeu","jeuId","jeuSupportId","lien","date"
 */ 
/*
$dlc=new dlc(array(
"id"=>$_POST['id'],
"nom"=>$_POST['nom'],
"description"=>$_POST['description'],
//"editeur"=>$_POST['editeur'],
"editeurId"=>$_POST['editeurId'],
//"plateforme"=>$_POST['plateforme'],
"plateformeId"=>$_POST['plateformeId'],
"jeu"=>$_POST['jeu'],
"jeuId"=>$_POST['jeuId'],
"jeuSupportId"=>$_POST['jeuSupportId'],
"lien"=>$_POST['lien'],
"date"=>$_POST['date'],
));

echo "dlc  array post: <pre>";var_dump($dlc);echo "</pre>";
*/
echo "post: <pre>";var_dump($dlc);echo "</pre>";
$dlc=new dlc($_POST);
echo "dlc  post: <pre>";var_dump($dlc);echo "</pre>";

die();

$erreur = "";


// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($nom)){
	$manager = new EditeursManager($db);
	$editeurs = $manager->getList();
	$new_editeur = new Editeur([
		'nom' => $nom
	]);

	foreach ($editeurs as $editeur) {
		// On vérifie que le nom n'est pas déjà créer
		if(strtolower($new_editeur->nom()) == strtolower($editeur->nom())){
			$erreur = "Ce nom est déjà créé";
			echo $erreur;
		}
	}

	if(!$erreur){

		$manager->add($new_editeur);
		echo "L'éditeur " . $nom . " a été ajouté avec succès";
	}


} else {
	echo "Le champ non n'a pas été rempli";
}

// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
