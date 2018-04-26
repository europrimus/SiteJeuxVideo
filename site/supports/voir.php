<?php
require_once ("../include/config.php");

$page = new Page("Informations sur ");

// charge le début de la page <html> à </header>
include(SITE["installDir"]."include/header.php");

$nom = $_GET['nom'];
	
	//création de l'objet Support
	$manager = new supportManager($db);
	$supports = $manager->getNom($nom);
		//echo'<pre>';var_dump($supports);echo'</pre>';
		
	//var_dump($supports"_nom");
		
		
	//foreach($supports as $support){
		//var_dump($support);
		//echo $support->nom();
		
		//};
	
	//$new_support = new support(['nom' => $nom]);

//$supports->nom());
//$supports->DateSortie());
	
//afichage de l'objet Support	
?>

<main>
	<?php if(!empty($nom)){ ?>
		<h3>Informations</h3>
		<ul>
			
			<li>Nom : <?php echo $supports->nom(); ?></li>
			
			<li>Date de sortie:<?php echo $supports->DateSortie();?></li>
		</ul>
	<?php } ?>
</main>

<?php
// charge la fin de la page de <footer> à </html>
include(SITE["installDir"]."include/footer.php");
?>
