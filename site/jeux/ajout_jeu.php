<?php

require ("../include/config.php");
$page = new Page("Création d'un jeu");
include(SITE["installDir"]."/include/header.php");

$donnees=array(
'nom' =>$_POST['nom'],
'editeur'=>$_POST['editeur'],
'support'=>$_POST['support'],
'date'=>$_POST['date_sortie'],
'description'=>$_POST['description'],
'pegi'=>$_POST['pegi'],
'lien'=>$_POST['lien']
);

// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$newJeu= new jeu($donnees);
$manager = new jeuManager($db);
$manager->add($newJeu);

// A FAIRE LA VERIFICATION DE L'EXISTENCE PRECEDENTE DU JEU

include(SITE["installDir"]."/include/footer.php");

?>
