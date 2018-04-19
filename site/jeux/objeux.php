<?php

require ("../include/config.php");
require (SITE["installDir"]."/include/class.php");
$page = new Page("Création d'un jeu");
include(SITE["installDir"]."/include/header.php");

$donnees=array(
'nom' =>$_POST['nom'],
'editeur'=>$_POST['editeur'],
'support'=>$_POST['console'],
'date'=>$_POST['date_sortie'],
'description'=>$_POST['description']

);


$esaye= new jeu($donnees);


echo "<pre>";
print_r ($esaye);
echo "</pre>";


include(SITE["installDir"]."/include/footer.php");

?>
