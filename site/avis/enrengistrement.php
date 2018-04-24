<?php
// charge la configuration et renvoi un objet PDO $db
require('../include/config.php');

$page = new Page("Ajout d'un support");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
$nom = $_POST['nom'];
$erreur = "";

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($nom)){
	$manager = new supportManager($db);
	$supports = $manager->getList();
	$new_support = new support([
	'nom' => $nom]
	);

	foreach ($supports as $support) {
		// On vérifie que le nom n'est pas déjà créer
		if(strtolower($new_support->nom()) == strtolower($support->nom())){
			$erreur = "Plateforme deja crée";
			echo $erreur;
		}
	}

	if(!$erreur){

		$manager->add($new_support);
		echo "La platforme " . $nom . " a été ajouté avec succès";
	}


} else {
	echo "Le champ non n'a pas été rempli";
}

// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
