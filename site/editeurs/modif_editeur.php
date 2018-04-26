<?php

// Includes
require ("../include/config.php");
// renvoi un objet PDO $db

$page = new Page("Modifier un éditeur");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$nom = $_POST['nom'];
$id = $_POST['id'];
$erreur = "";

// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($nom) && !empty($id)){

	$manager = new editeursManager($db);
	$editeurs = $manager->getList();
	$new_editeur = new Editeur([
		'id' => $id,
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

		$manager->update($new_editeur);
		echo "L'éditeur " . $nom . " a été ajouté avec succès";
	}


} else {
	echo "Le champ non n'a pas été rempli";
}

// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
