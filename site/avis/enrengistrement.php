<?php
// charge la configuration et renvoi un objet PDO $db
require('../include/config.php');

$page = new Page("Ajout d'un support");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
echo$nom = $_POST['comentairee'];
$erreur = "";

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($nom)){
	$manager = new avisManager($db);
	$aviss = $manager->getList();
	$new_avis = new avis([
	'nom' => $nom]
	);

	foreach ($aviss as $avis) {
		// On vérifie que le nom n'est pas déjà créer
		if(strtolower($new_avis->nom()) == strtolower($avis->nom())){
			$erreur = "Plateforme deja crée";
			echo $erreur;
		}
	}

	if(!$erreur){

		$manager->add($new_avis);
		echo "La platforme " . $nom . " a été ajouté avec succès";
	}


} else {
	echo "Le champ non n'a pas été rempli";
}

// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
