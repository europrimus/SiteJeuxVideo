<?php

// Includes
require ("../include/config.php");
// renvoi un objet PDO $db

$page = new Page("Modifier un support");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$nom = $_POST['nom'];
$id = $_POST['id'];
$erreur = "";

// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($nom) && !empty($id)){

	$manager = new supportManager($db);
	$supports = $manager->getList();
	$new_support = new support([
		'id' => $id,
		'nom' => $nom
	]);

	foreach ($supports as $support) {
		// On vérifie que le nom n'est pas déjà créer
		if(strtolower($new_support->nom()) == strtolower($support->nom())){
			$erreur = "Ce nom est déjà créé";
			echo $erreur;
		}
	}

	if(!$erreur){

		$manager->update($new_support);
		echo "L'support " . $nom . " a été ajouté avec succès";
	}


} else {
	echo "Le champ non n'a pas été rempli";
}

// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
