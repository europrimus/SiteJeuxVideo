<?php

require ("../include/config.php");
$page = new Page("Création d'un jeu");
include(SITE["installDir"]."/include/header.php");

$donnees=array(
'nom' =>$_POST['nom'],
'editeur'=>$_POST['editeur'],
'support'=>$_POST['console'],
'date'=>$_POST['date_sortie'],
'description'=>$_POST['description']
);

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$newJeu= new jeu($donnees);
$manager = new jeuManager($db);
$manager->add($newJeu);



echo "<pre>";
print_r ($newJeu);
echo "</pre>";


include(SITE["installDir"]."/include/footer.php");

?>
