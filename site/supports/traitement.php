
<?php

require ("../include/config.php");
require (SITE["installDir"]."/include/class.php");
$page = new Page("Création d'un jeu");
include(SITE["installDir"]."/include/header.php");

$suppor=array(
'nom' =>$_POST['nom'],

);


$esaye= new support($suppor);




echo "<pre>";
print_r ($esaye);
echo "</pre>";
$db = new PDO('mysql:host=localhost;dbname=jeuxvideo;charset=utf8', 'root', '');

$manager= new supportManager($db);
$manager->add($esaye);


include(SITE["installDir"]."/include/footer.php");

?>
