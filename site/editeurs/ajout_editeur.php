<?php
$nom = $_POST['nom'];

if(!empty($nom)){
	require('../../lib/editeursManager.php');
	$editeur = new Editeur([
	  'nom' => $nom

	]);

	$db = new PDO('mysql:host=localhost;dbname=jeuxvideo', 'root', '');
	$manager = new EditeursManager($db);
	    
	$manager->add($editeur);

	echo "L'éditeur " . $nom . " a été ajouté avec succès";
} else {
	echo "Le champ non n'a pas été rempli";
}

?>

<a href="../index.php">Revenir à la page d'accueil</a>
