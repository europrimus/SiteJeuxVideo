<?php
// charge la configuration et renvoi un objet PDO $db
require('../include/config.php');

$page = new Page("Ajout d'un DLC");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");
/*
 * les variable de l'objet DLC
 * "id","nom","description","editeur","editeurId","plateforme","plateformeId","jeu","jeuId","jeuSupportId","jeuSupportDlcId","lien","date"
 */ 

//echo "post: <pre>";var_dump($_POST);echo "</pre>";

$dlcnew=new dlc($_POST);
foreach($_POST["listeSupport"] as $jeuxSupportId => $val){
	//echo "jeuxSupportId : $jeuxSupportId<br>val : ";var_dump($val); echo "<br>";
	//setListeJeuSupport = array ("jeuSupportDlcId" => , "jeuSupportId" => , "plateforme" =>, "plateformeId" => , "dateSortie" => )
	if(array_key_exists("checkbox",$val)){
		//echo "ajout jeuxSupport";
		$dlcnew->setJeuId($val["jeuId"]);
		$info=array ( "jeuSupportId" => $jeuxSupportId, "dateSortie" => $val["dateSortie"]);
		$ret = $dlcnew->setListeSupport($info);
		//var_dump($ret);
	};
}

//echo "dlcnew: <pre>";var_dump($dlcnew);echo "</pre>";

if(isset($_POST["creer"])){
	// On vérifie que le nom tapé par l'utilisateur 
	if(!empty($dlcnew->getNom())){
		$manager = new dlcManager($db);
		if( !$manager->existeNom($dlcnew->getNom()) ){
			$manager->add($dlcnew);
			
			echo "Le DLC <strong>". $dlcnew->getNom() ."</strong> a été ajouté avec succès";
		}else{
			echo "Le DLC <strong>". $dlcnew->getNom() ."</strong> Existe déjà";
		}
	}
}elseif(isset($_POST["modifier"])){
	if(!empty($dlcnew->getNom())){
		$manager = new dlcManager($db);
//		$manager->update($dlcnew);
		echo "Vous ne pouvez pas modifier le DLC <strong>". $dlcnew->getNom() ."</strong>";
	}
}
 
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
