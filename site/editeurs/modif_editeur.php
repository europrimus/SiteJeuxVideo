<?php

// Includes
require ("../include/config.php");

include(SITE["installDir"]."include/header.php");

$nom = $_POST['nom'];
$id = $_POST['id'];
$erreur = "";
// Accès base de donnéees
$db = new PDO('mysql:host=localhost;dbname=jeuxvideo', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// On vérifie que le nom a été tapé par l'utilisateur
if(!empty($nom) && !empty($id)){

	$manager = new EditeursManager($db);
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
include(SITE["installDir"]."include/footer.php");
?>
