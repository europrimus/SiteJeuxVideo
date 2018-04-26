<?php

require ("../include/config.php");
$page = new Page("Jeu modifié");
include(SITE["installDir"]."/include/header.php");

//echo "request <pre>";print_r ($_REQUEST);echo "</pre>";

$donnees=array(
'id' =>$_POST['id'],
'nom' =>$_POST['nom'],
'editeur'=>$_POST['editeur'],
'description'=>$_POST['description'],
'pegi'=>$_POST['pegi'],
'lien'=>$_POST['lien']
);

$id= $donnees['id'];
$managerjeu = new jeuManager($db);
$jeu = $managerjeu->getbyId($id);



$jeu->setNom($donnees['nom']);
$jeu->setEditeur($donnees['editeur']);
$jeu->setDescription($donnees['description']);
$jeu->setPegi($donnees['pegi']);
$jeu->setLien($donnees['lien']);



// Accès base de donnéees
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*$newJeu= new jeu($donnees);
$manager = new jeuManager($db);
$manager->add($newJeu);
*/
// A FAIRE LA VERIFICATION DE L'EXISTENCE PRECEDENTE DU JEU

include(SITE["installDir"]."/include/footer.php");

?>
