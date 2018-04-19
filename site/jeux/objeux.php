<?php

  
  
  
  
$donnees=array(
'nom' =>$_POST['nom'],
'editeur'=>$_POST['editeur'],
'support'=>$_POST['console'],
'date'=>$_POST['date_sortie'],
'description'=>$_POST['description']

);

 function chargerClasse($class){
  
require$class.'.php';

}


spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$esaye= new jeu($donnees);


echo "<pre>";
print_r ($esaye);
echo "</pre>";




?>
