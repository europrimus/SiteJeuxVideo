<?php
// charge la configuration et renvoi un objet PDO $db
require('../include/config.php');

$page = new Page("Ajout d'un éditeur");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
$nom = $_POST['nom'];
$erreur = "";

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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
