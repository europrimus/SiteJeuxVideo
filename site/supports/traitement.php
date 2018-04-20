
<?php
require ("../include/config.php");
// renvois un objet PDO $db

$page = new Page("Création d'un jeu");
include(SITE["installDir"]."include/header.php");

$suppor=array(
'nom' =>$_POST['nom'],

);

$esaye= new support($suppor);


echo "<pre>";
print_r ($esaye);
echo "</pre>";

$manager= new supportManager($db);
$manager->add($esaye);


include(SITE["installDir"]."include/footer.php");

?>
